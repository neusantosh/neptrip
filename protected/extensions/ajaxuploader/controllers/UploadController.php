<?php
class UploadController extends Controller
{
	
	public function actionProcess()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			    $model =  new UploadModel;
				
			    if(isset($_POST['UploadModel']))
				{
						$model->attributes = $_POST['UploadModel'];					
					   
					   $folder = Yii::app()->getModule('ajaxuploader')->folder;						
					   $baseUrl = Yii::app()->request->baseUrl;
						
						
					   ############ Edit settings ##############
						$ThumbSquareSize 		= 100; //Thumbnail will be 200x200
						$BigImageMaxSize 		= 300; //Image Maximum height or width
						$ThumbPrefix			= "thumb_"; //Normal thumb Prefix
						$DestinationDirectory	= '..'.$baseUrl.'/'.$folder.'/'; //specify upload directory ends with / (slash)
						$Quality 				= 90; //jpeg quality
						##########################################
					
						
						
						//get the uploading file instance
						$image = $model->ImageFile = CUploadedFile::getInstance($model,'ImageFile');			
						/*validates with the rules in UploadModel,
						* this checks for the file type,size etc as specified
						*/	
						if($model->validate())
						{		
						
						// Random number will be added after image name
						$RandomNumber 	= rand(0, 9999999999); 
					
						$ImageName 		= str_replace(' ','-',strtolower($image->name)); //get image name
						$ImageSize 		= $image->size; // get original image size
						$TempSrc	 	= $image->tempName; // Temp name of image file stored in PHP tmp folder
						$ImageType	 	= $image->type; //get file type, returns "image/png", image/jpeg, text/plain 			
	
	                   //Let's check allowed $ImageType, we use PHP SWITCH statement here
						switch(strtolower($ImageType))
						{
							case 'image/png':
								//Create a new image from file 
								$CreatedImage =  imagecreatefrompng($TempSrc);
								break;
							case 'image/gif':
								$CreatedImage =  imagecreatefromgif($TempSrc);
								break;			
							case 'image/jpeg':
							case 'image/pjpeg':
								$CreatedImage = imagecreatefromjpeg($TempSrc);
								break;
							default:
								die('Unsupported File!'); //output error and exit
						}
						 
					//PHP getimagesize() function returns height/width from image file stored in PHP tmp folder.
					//Get first two values from image, width and height. 
					//list assign svalues to $CurWidth,$CurHeight
					list($CurWidth,$CurHeight)=getimagesize($TempSrc);
					
					//Get file extension from Image name, this will be added after random name
					$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
					$ImageExt = str_replace('.','',$ImageExt);
					
					//remove extension from filename
					$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
					
					//Construct a new name with random number and extension.
					$NewImageName = $ImageName.'-'.$RandomNumber.'.'.$ImageExt;
					
					//set the Destination Image
					$thumb_DestRandImageName = $DestinationDirectory.$ThumbPrefix.$NewImageName; 
					
					//Thumbnail name with destination directory
					$DestRandImageName = $DestinationDirectory.$NewImageName; // Image with destination directory
					
		//Resize image to Specified Size by calling resizeImage function.
			if($this->resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType))
			{
				//Create a square Thumbnail right after, this time we are using cropImage() function
				if(!$this->cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType))
					{
						echo 'Error Creating thumbnail';
					}
				/*
				We have succesfully resized and created thumbnail image
				We can now output image to user's browser or store information in the database
				*/
				
				
				
					/*
					  * Here you can save image details into the datase							
					*/
				
					//SAVE INFO INTO DATABASE	
					$module = Yii::app()->getModule('ajaxuploader');
					
                    CActiveRecord::model($module->userModel)->updateByPk(Yii::app()->user->id, array($module->userPixColumn=>$NewImageName));		 
		
		            $original = $NewImageName;  //original size of image
				    $resized = $ThumbPrefix.$NewImageName; //resized image
					// output for users
					$output = $this->renderPartial('_view', array('source'=>$DestinationDirectory,'original'=>$original,'resized'=>$resized));
											
					Yii::app()->clientScript->renderBodyEnd($output);
											
					//pass the result of $output to the calling ajax function
					 echo $output;					
						
					 Yii::app()->end();			
				
							
					}//end resize function call		
								
				}//end validation block					
						
			}//end isset(_Post[])				
		}//end isAjaxRequest
	}//end process
	
	// This function will proportionally resize image 
	public function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
{
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	
	//Construct a proportional size of new image
	$ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 
	$NewWidth  			= ceil($ImageScale*$CurWidth);
	$NewHeight 			= ceil($ImageScale*$CurHeight);
	$NewCanves 			= imagecreatetruecolor($NewWidth, $NewHeight);
	
	// Resize Image
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
	{
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	//Destroy image, frees memory	
	if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
	return true;
	}

}

//This function corps image to create exact square images, no matter what its original size!
public function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType)
{	 
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	
	//abeautifulsite.net has excellent article about "Cropping an Image to Make Square bit.ly/1gTwXW9
	if($CurWidth>$CurHeight)
	{
		$y_offset = 0;
		$x_offset = ($CurWidth - $CurHeight) / 2;
		$square_size 	= $CurWidth - ($x_offset * 2);
	}else{
		$x_offset = 0;
		$y_offset = ($CurHeight - $CurWidth) / 2;
		$square_size = $CurHeight - ($y_offset * 2);
	}
	
	$NewCanves 	= imagecreatetruecolor($iSize, $iSize);	
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size))
	{
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	//Destroy image, frees memory	
	if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
	return true;

	}
	  
}
}