<?php

class ToursController extends Controller
{
	public $layout  = 'user_layout';

	public function actionIndex(){
		$this->render('index');
	}

	
	public function actionManagetours(){
		if(!Yii::app()->user->isGuest){
			if(Yii::app()->user->hasState('user_id'))
	     	$userid = Yii::app()->user->getState('user_id',NULL);

			$criteria = new CDbCriteria;
			$criteria->condition = 'business_user_id='.$userid;
			$total = Tours::model()->count($criteria);
			
			$pages = new CPagination($total);
			$pages->pageSize = Yii::app()->params['itemsperpage'];
			$pages->applyLimit($criteria);

			$tours = Tours::model()->findAll($criteria);


			$this->pageTitle = 'Manage Tours';
			$this->render('application.views.tours.managetours',array(
				'tours'=> $tours,
				'pages'=> $pages
				));
		}else{
			$this->redirect(array('login/index'));
		}
	}

	public function actionAdd(){
		if(!Yii::app()->user->isGuest){
			if(isset($_POST['Tours'])){
				if(Yii::app()->user->hasState('user_id'))
	     		$userid = Yii::app()->user->getState('user_id',NULL);
				$model = new Tours;
				$model->attributes  = $_POST['Tours'];
				$model->business_user_id = $userid;
				$uploadedFile = CUploadedFile::getInstance($model, "image");
				if(!empty($uploadedFile)){
					$filename = "tours_" . time() . "." . $uploadedFile->getExtensionName();
					$fullPath = Yii::app()->basePath.'/../images/tours/'.$filename;
					$uploadedFile->saveAs($fullPath);	
				}else{
					$filename = '';
				}
				$model->image = $filename;
				if($model->validate()){
					if($model->save()){
						$photos = CUploadedFile::getInstancesByName('Toursgallery[image]');
		            	if (isset($photos) && count($photos) > 0) {
		                // go through each uploaded image
			                foreach ($photos as $image => $pic) {
			                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/tours/gallery/'.$pic->name)) {
			                        // add it to the main model now
			                        $img_add = new Toursgallery();
			                        $img_add->image = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
			                        $img_add->tour_id	 = $model->id; // this links your picture model to the main model (like your user, or profile model)
			                        $img_add->save(); // DONE
			                    }
			                    else{
			                        echo 'Cannot upload!';
			                    }
			                }
						}
            			
					}
				}else{
					echo '<pre>';print_r($model->getErrors());exit;
				}

				Yii::app()->user->setFlash('success', 'Tour added successfully');
				$this->redirect(array('tours/managetours'));
			}
			$this->pageTitle = 'Add Tour';
			$this->render('application.views.tours.add',array(
				'model' 	=> new Tours,
				'model1' 	=> new Toursgallery
				));
		}else{
			$this->redirect(array('login/index'));
		}
	}

	public function actionEdit($id){
		if(!Yii::app()->user->isGuest){
			if(isset($_POST['Tours'])){

				$model = Tours::model()->findByPk($id);
				$model->attributes  = $_POST['Tours'];
				$uploadedFile = CUploadedFile::getInstance($model, "image");

				if(isset($uploadedFile)){
					//removes the old logo 
					@unlink(Yii::getPathOfAlias('webroot').'/images/tours/'.$_POST['old_image']);
					$fileName = "tours_" . time() . "." . $uploadedFile->getExtensionName();
					$model->image = $fileName;
					$fullPath = Yii::app()->basePath.'/../images/tours/'.$fileName;
					$uploadedFile->saveAs($fullPath);
					$model->image  = $fileName;
				}else{
					$model->image  = $_POST['old_image'];
				}
				
				if($model->validate()){
					if($model->save()){
						$photos = CUploadedFile::getInstancesByName('Toursgallery[image]');
		            	if (isset($photos) && count($photos) > 0) {
		                // go through each uploaded image
			                foreach ($photos as $image => $pic) {
			                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/tours/gallery/'.$pic->name)) {
			                        // add it to the main model now
			                        $img_add 			= new Toursgallery();
			                        $img_add->image 	= $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
			                        $img_add->tour_id	= $id; // this links your picture model to the main model (like your user, or profile model)
			                        $img_add->save(); // DONE
			                    }
			                    else{
			                        echo 'Cannot upload!';
			                    }
			                }
						}
            			
					}
				}else{
					echo '<pre>';print_r($model->getErrors());exit;
				}

				Yii::app()->user->setFlash('success', 'Tour updated successfully');
				$this->redirect(array('tours/managetours'));
			}

			$this->pageTitle = 'Edit Tour';
			$this->render('application.views.tours.edit',array(
				'record'    	=> Tours::model()->findByPk($id),
				'galleryimages'	=> Toursgallery::model()->findAllByAttributes(array('tour_id'=>$id)),
				'model' 		=> new Tours,
				'model1' 		=> new Toursgallery
				));
		}else{
			$this->redirect(array('login/index'));
		}
	}

	public function actionDeletetourlogo(){
		$id 	= $_POST['id'];
		$image 	= $_POST['imagename'];
		Tours::model()->updateByPk($id, array('image'=>''));
		@unlink(Yii::getPathOfAlias('webroot').'/images/tours/'.$image);
		echo "Logo deleted";exit;
	}

	public function actionDeletetourimage(){
		$id 	= $_POST['id'];
		$image 	= $_POST['imagename'];
		Toursgallery::model()->deleteByPk($id);
		@unlink(Yii::getPathOfAlias('webroot').'/images/tours/gallery/'.$image);
		echo "Image deleted";exit;
	}

	public function actionDelete($id){
		if(!Yii::app()->user->isGuest){
			$res 			= Tours::model()->findByPk($id);
			$galleryimages 	= Toursgallery::model()->findAllByAttributes(array('tour_id'=>$id));
			if($res['image']!='' && file_exists('images/tours/'.$res['image'])){
				@unlink(Yii::getPathOfAlias('webroot').'/images/tours/'.$res['image']);
			}

			if(!empty($galleryimages) && is_array($galleryimages)){
				foreach($galleryimages as $galleryimage):
					if($galleryimage['image']!='' && file_exists('images/tours/gallery/'.$galleryimage['image'])){
						@unlink(Yii::getPathOfAlias('webroot').'/images/tours/gallery/'.$galleryimage['image']);
					}
				endforeach;
			}

			Tours::model()->deleteByPk($id);
			Toursgallery::model()->deleteAllByAttributes(array('tour_id'=>$id));
			
			Yii::app()->user->setFlash('success', 'Tour deleted successfully');
			$this->redirect(array('tours/managetours'));
		}else{
			$this->redirect(array('login/index'));
		}
	}
}