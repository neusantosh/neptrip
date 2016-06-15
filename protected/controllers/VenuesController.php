<?php

class VenuesController extends Controller
{


	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionManageVenues(){
		$this->layout = 'user_layout';
		if(!Yii::app()->user->isGuest){
			if(Yii::app()->user->hasState('user_id'))
     		$userid = Yii::app()->user->getState('user_id',NULL);

				$this->pageTitle = 'Manage Venues';
				$criteria = new CDbCriteria;
				$criteria->condition = 'business_user_id='.$userid;
				$total = Venues::model()->count($criteria);
				
				$pages = new CPagination($total);
				$pages->pageSize = Yii::app()->params['itemsperpage'];
				$pages->applyLimit($criteria);

				$venues = Venues::model()->findAll($criteria);

				$this->pageTitle = 'Manage Venues';
				$this->render('application.views.venues.managevenue',array(
						'venues' => $venues,
						'pages' => $pages,
					));
		}else{
			$this->redirect(array('login/index'));
		}
	}


	public function actionAdd(){
		if(!Yii::app()->user->isGuest){
			if(isset($_POST['Venues'])){
				if(Yii::app()->user->hasState('user_id'))
	     		$userid = Yii::app()->user->getState('user_id',NULL);
				$model = new Venues;
				$model->attributes  = $_POST['Venues'];
				$model->business_user_id = $userid;

				$uploadedFile = CUploadedFile::getInstance($model, "image");
				if(isset($uploadedFile)){
					$fileName = "venues_" . time() . "." . $uploadedFile->getExtensionName();
					$model->image = $fileName;
					$fullPath = Yii::app()->basePath.'/../images/venues/'.$fileName;
					$uploadedFile->saveAs($fullPath);	
				}else{
					$model->image = '';
				}
				if($model->validate()){
					if($model->save()){
						$photos = CUploadedFile::getInstancesByName('Venuegallery[image]');
		            	if (isset($photos) && count($photos) > 0) {
		                // go through each uploaded image
			                foreach ($photos as $image => $pic) {
			                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/venues/gallery/'.$pic->name)) {
			                        // add it to the main model now
			                        $img_add = new Venuegallery();
			                        $img_add->image = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
			                        $img_add->venue_id = $model->id; // this links your picture model to the main model (like your user, or profile model)
			                        $img_add->save(); // DONE
			                    }
			                    else{
			                        echo 'Cannot upload!';
			                    }
			                }
						}

						//saves the facility of the venue
						$venuefacilities = $_POST['Venuefacility']['facility'];
						if(!empty($venuefacilities) && is_array($venuefacilities)){
			            	foreach ($venuefacilities as $key => $facility) {
			            		    $venue_facility = new Venuefacility;
			            			$venue_facility->venue_id = $model->id;
			                		$venue_facility->facility = $facility;
			                		$venue_facility->save(); 
			            	}
            			}


            			//saves the specaility of the venue
            			$venuespecalities = $_POST['Venuespecality']['specality'];
            			if(!empty($venuespecalities) && is_array($venuespecalities)){
			            	foreach ($venuespecalities as $key => $specality) {
			            		    $venue_specality = new Venuespecality;
			            			$venue_specality->venue_id = $model->id;
			                		$venue_specality->specality = $specality;
			                		$venue_specality->save(); 
			            	}
            			}
					}
				}else{
					echo '<pre>';print_r($model->getErrors());exit;
				}

				Yii::app()->user->setFlash('success', 'Venue added successfully');
				$this->redirect(array('venues/managevenues'));
			}

			

			$this->pageTitle = 'Add Venue';			
			$this->render('application.views.venues.addvenue',array(
				'model'  => new Venues,
				'model1' => new Venuegallery,
				'model2' => new Venuefacility,
				'model3' => new Venuespecality,
			));
		}else{
			$this->redirect(array('login/index'));
		}
	}


	public function actionEdit($id=null){
		if(!Yii::app()->user->isGuest){
				if(isset($_POST['Venues'])){				
				$model = Venues::model()->findByPk($id);
				$model->attributes  = $_POST['Venues'];

				$uploadedFile = CUploadedFile::getInstance($model, "image");
				if(isset($uploadedFile)){
					@unlink(Yii::getPathOfAlias('webroot').'/images/venues/'.$_POST['old_image']);  //removes the old image
					$fileName = "venues_" . time() . "." . $uploadedFile->getExtensionName();
					$model->image = $fileName;
					$fullPath = Yii::app()->basePath.'/../images/venues/'.$fileName;
					$uploadedFile->saveAs($fullPath);	
				}else{
					$model->image = $_POST['old_image'];
				}
				
				if($model->validate()){
					if($model->save()){
						$photos = CUploadedFile::getInstancesByName('Venuegallery[image]');
		            	if (isset($photos) && count($photos) > 0) {
		                // go through each uploaded image
			                foreach ($photos as $image => $pic) {
			                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/venues/gallery/'.$pic->name)) {
			                        // add it to the main model now
			                        $img_add = new Venuegallery();
			                        $img_add->image = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
			                        $img_add->venue_id = $id; // this links your picture model to the main model (like your user, or profile model)
			                        $img_add->save(); // DONE
			                    }
			                    else{
			                        echo 'Cannot upload!';
			                    }
			                }
						}

						//deletes the all the facilities 
						Venuefacility::model()->deleteAllByAttributes(array('venue_id'=>$id));
						//saves the facility of the venue
						$venuefacilities = $_POST['Venuefacility']['facility'];
						if(!empty($venuefacilities) && is_array($venuefacilities)){
			            	foreach ($venuefacilities as $key => $facility) {
			            		    $venue_facility = new Venuefacility;
			            			$venue_facility->venue_id = $id;
			                		$venue_facility->facility = $facility;
			                		$venue_facility->save(); 
			            	}
            			}


            			//deletes the all the facilities 
						Venuespecality::model()->deleteAllByAttributes(array('venue_id'=>$id));
            			//saves the specaility of the venue
            			$venuespecalities = $_POST['Venuespecality']['specality'];
            			if(!empty($venuespecalities) && is_array($venuespecalities)){
			            	foreach ($venuespecalities as $key => $specality) {
			            		    $venue_specality = new Venuespecality;
			            			$venue_specality->venue_id = $id;
			                		$venue_specality->specality = $specality;
			                		$venue_specality->save(); 
			            	}
            			}
					}
				}else{
					echo '<pre>';print_r($model->getErrors());exit;
				}

				Yii::app()->user->setFlash('success', 'Venue updated successfully');
				$this->redirect(array('venues/managevenues'));
			}

			$this->pageTitle  = 'Edit Venue';
			$this->render('application.views.venues.updatevenue', array(
				'record' 			=> Venues::model()->findByPk($id),
				'model'  			=> new Venues,
				'model1' 			=> new Venuegallery,
				'model2' 			=> new Venuefacility,
				'model3' 			=> new Venuespecality,
				'venuefacility' 	=> array_keys(CHtml::listData(Venuefacility::model()->findAllByAttributes(array('venue_id'=>$id)), 'facility' , 'facility')),
				'venuespecality' 	=> array_keys(CHtml::listData(Venuespecality::model()->findAllByAttributes(array('venue_id'=>$id)), 'specality' , 'specality')),
				'venuegallery'		=> Venuegallery::model()->findAllByAttributes(array('venue_id'=>$id))
			));
		}else{
			$this->redirect(array('login/index'));
		}
	}

	public function actionDeletegalleryimage(){
		$id = $_POST['id'];
		$image = $_POST['imagename'];	
		$res = Venuegallery::model()->deleteByPk($id);
		//if($res){
			@unlink(Yii::getPathOfAlias('webroot').'/images/venues/gallery/'.$image);
			echo 'Image deleted';exit;
		//}
	}

	public function actionDeletevenuelogo(){
		$id = $_POST['id'];
		$image = $_POST['imagename'];	
		Venues::model()->updateByPk($id, array('image' => ''));
		@unlink(Yii::getPathOfAlias('webroot').'/images/venues/'.$image);
		echo 'Image deleted';exit;
	}

	public function actionDelete($id=null){
		if(!Yii::app()->user->isGuest){
			$res 			= Venues::model()->findByPk($id);
			$galleryimages 	= Venuegallery::model()->findAllByAttributes(array('venue_id'=>$id));

			if($res['image']!=''){
				@unlink(Yii::getPathOfAlias('webroot').'/images/venues/'.$res['image']);
			}

			if(!empty($galleryimages) && is_array($galleryimages)){
				foreach($galleryimages as $galleryimage):
					if($galleryimage['image']!='' && file_exists('images/venues/gallery/'.$galleryimage['image'])){
						@unlink(Yii::getPathOfAlias('webroot').'/images/venues/gallery/'.$galleryimage['image']);
					}
				endforeach;
			}

			Venues::model()->deleteByPk($id);		
			Venuefacility::model()->deleteAllByAttributes(array('venue_id'=>$id));
			Venuespecality::model()->deleteAllByAttributes(array('venue_id'=>$id));
			Venuegallery::model()->deleteAllByAttributes(array('venue_id'=>$id));

			Yii::app()->user->setFlash('success', 'Venue deleted successfully');
			$this->redirect(array('venues/managevenues'));
		}else{
			$this->redirect(array('login/index'));
		}	
	}

}