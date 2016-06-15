<?php 
class ResturantsController extends Controller{
	
	public function actionIndex(){

	}

	public function actionManageresturants(){
		$this->layout = 'user_layout';
		if(!Yii::app()->user->isGuest){

			if(Yii::app()->user->hasState('user_id'))
     		$userid = Yii::app()->user->getState('user_id',NULL);

				$this->pageTitle = 'Manage Resturants';
				$criteria = new CDbCriteria;
				$criteria->condition = 'business_user_id='.$userid;
				$total = Resturants::model()->count($criteria);
				
				$pages = new CPagination($total);
				$pages->pageSize = Yii::app()->params['itemsperpage'];
				$pages->applyLimit($criteria);

				$resturants = Resturants::model()->findAll($criteria);

				$this->render('application.views.resturants.manageresturant',array(
					'resturants' => $resturants,
					'pages' 	 => $pages,
				));
		}else{
			$this->redirect(array('login/index'));
		}
	}

	public function actionAdd(){
		$this->layout = 'user_layout';
		if(!Yii::app()->user->isGuest){
			if(isset($_POST['Resturants'])){
				if(Yii::app()->user->hasState('user_id'))
	     		$userid = Yii::app()->user->getState('user_id',NULL);
				$model = new Resturants;
				$model->attributes  = $_POST['Resturants'];
				$model->business_user_id = $userid;
				$uploadedFile = CUploadedFile::getInstance($model, "image");
				if(isset($uploadedFile)){
					$fileName = "resturant_" . time() . "." . $uploadedFile->getExtensionName();
					$model->image = $fileName;
					$fullPath = Yii::app()->basePath.'/../images/resturants/'.$fileName;
					$uploadedFile->saveAs($fullPath);
				}else{
					$model->image = '';
				}
				if($model->validate()){
					if($model->save()){
						$photos = CUploadedFile::getInstancesByName('Resturantgallery[image]');
		            	if (isset($photos) && count($photos) > 0) {
		                // go through each uploaded image
			                foreach ($photos as $image => $pic) {
			                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/resturants/gallery/'.$pic->name)) {
			                        // add it to the main model now
			                        $img_add = new Resturantgallery();
			                        $img_add->image = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
			                        $img_add->resturant_id	 = $model->id; // this links your picture model to the main model (like your user, or profile model)
			                        $img_add->save(); // DONE
			                    }
			                    else{
			                        echo 'Cannot upload!';
			                    }
			                }
						}

						//saves the facility of the venue
						$resturantsfacilities = $_POST['Resturantfacility']['facility'];
						if(!empty($resturantsfacilities) && is_array($resturantsfacilities)){
			            	foreach ($resturantsfacilities as $key => $facility) {
			            		    $resturant_facility = new Resturantfacility;
			            			$resturant_facility->resturant_id = $model->id;
			                		$resturant_facility->facility = $facility;
			                		$resturant_facility->save(); 
			            	}
            			}


            			//saves the specaility of the venue
            			$resturantdiningstyles = $_POST['Resturantdiningstyle']['resturant_diningstyle'];
            			if(!empty($resturantdiningstyles) && is_array($resturantdiningstyles)){
			            	foreach ($resturantdiningstyles as $key => $diningstyle) {
			            		    $resturantdiningstyle = new Resturantdiningstyle;
			            			$resturantdiningstyle->resturant_id = $model->id;
			                		$resturantdiningstyle->resturant_diningstyle = $diningstyle;
			                		$resturantdiningstyle->save(); 
			            	}
            			}
					}
				}else{
					echo '<pre>';print_r($model->getErrors());exit;
				}

				Yii::app()->user->setFlash('success', 'Restaurant added successfully');
				$this->redirect(array('resturants/manageresturants'));
			}

			$this->pageTitle  = 'Add Restaurant';

			$this->render('application.views.resturants.add', array(
				'model' 	=> new Resturants,
				'model1' 	=> new Resturantgallery,
				'model2'	=> new Resturantfacility,
				'model3'	=> new Resturantdiningstyle
				));
		}else{
			$this->redirect(array('login/index'));
		}
	}

	public function actionEdit($id){
		$this->layout = 'user_layout';
		if(!Yii::app()->user->isGuest){
			
			if(isset($_POST['Resturants'])){				
				$model = Resturants::model()->findByPk($id);
				$model->attributes  = $_POST['Resturants'];

				$uploadedFile = CUploadedFile::getInstance($model, "image");
				if(isset($uploadedFile)){
					@unlink(Yii::getPathOfAlias('webroot').'/images/tours/'.$_POST['old_image']);
					$fileName = "resturant_" . time() . "." . $uploadedFile->getExtensionName();
					$model->image = $fileName;
					$fullPath = Yii::app()->basePath.'/../images/resturants/'.$fileName;
					$uploadedFile->saveAs($fullPath);	
				}else{
					$model->image = $_POST['old_image'];
				}
				
				//echo '<pre>';print_r($model->attributes);exit;

				if($model->validate()){
					if($model->save()){
						$photos = CUploadedFile::getInstancesByName('Resturantgallery[image]');
		            	if (isset($photos) && count($photos) > 0) {
		                // go through each uploaded image
			                foreach ($photos as $image => $pic) {
			                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/resturants/gallery/'.$pic->name)) {
			                        // add it to the main model now
			                        $img_add = new Resturantgallery();
			                        $img_add->image = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
			                        $img_add->resturant_id	 = $id; // this links your picture model to the main model (like your user, or profile model)
			                        $img_add->save(); // DONE
			                    }
			                    else{
			                        echo 'Cannot upload!';
			                    }
			                }
						}
						//deletes the Resturantfacility
						Resturantfacility::model()->deleteAllByAttributes(array('resturant_id'=>$id));

						//saves the facility of the venue
						$resturantsfacilities = $_POST['Resturantfacility']['facility'];
						if(!empty($resturantsfacilities) && is_array($resturantsfacilities)){
			            	foreach ($resturantsfacilities as $key => $facility) {
			            		    $resturant_facility = new Resturantfacility;
			            			$resturant_facility->resturant_id = $id;
			                		$resturant_facility->facility = $facility;
			                		$resturant_facility->save(); 
			            	}
            			}

            			//deletes the Resturantfacility
						Resturantdiningstyle::model()->deleteAllByAttributes(array('resturant_id'=>$id));

            			//saves the specaility of the venue
            			$resturantdiningstyles = $_POST['Resturantdiningstyle']['resturant_diningstyle'];
            			if(!empty($resturantdiningstyles) && is_array($resturantdiningstyles)){
			            	foreach ($resturantdiningstyles as $key => $diningstyle) {
			            		    $resturantdiningstyle = new Resturantdiningstyle;
			            			$resturantdiningstyle->resturant_id = $id;
			                		$resturantdiningstyle->resturant_diningstyle = $diningstyle;
			                		$resturantdiningstyle->save(); 
			            	}
            			}
					}
				}else{
					echo '<pre>';print_r($model->getErrors());exit;
				}

				Yii::app()->user->setFlash('success', 'Restaurant added successfully');
				$this->redirect(array('resturants/manageresturants'));
			}


			$this->pageTitle  = 'Edit Restaurant';
			$this->render('application.views.resturants.edit', array(
				'record'  				=> Resturants::model()->findByPk($id),
				'resturantfacility' 	=> array_keys(CHtml::listData(Resturantfacility::model()->findAllByAttributes(array('resturant_id'=>$id)), 'facility' , 'facility')),
				'resturantdiningstyle' 	=> array_keys(CHtml::listData(Resturantdiningstyle::model()->findAllByAttributes(array('resturant_id'=>$id)), 'resturant_diningstyle' , 'resturant_diningstyle')),
				'gallerimages'			=> Resturantgallery::model()->findAllByAttributes(array('resturant_id'=>$id)),
 				'model' 				=> new Resturants,
				'model1' 				=> new Resturantgallery,
				'model2'				=> new Resturantfacility,
				'model3'				=> new Resturantdiningstyle
				));
		}else{
			$this->redirect(array('login/index'));
		}
	}

	public function actionDeletelogo(){
		$id 		= $_POST['id'];
		$imagename 	= $_POST['imagename'];
		Resturants::model()->updateByPk($id, array('image'=>''));
		@unlink(Yii::getPathOfAlias('webroot').'/images/resturants/'.$imagename);
		echo "Logo Deleted";exit;
	}

	public function actionDeletegalleryimage(){
		$id 		= $_POST['id'];
		$imagename 	= $_POST['imagename'];
		Resturantgallery::model()->deleteByPk($id);
		@unlink(Yii::getPathOfAlias('webroot').'/images/resturants/gallery/'.$imagename);
		echo "Image Deleted";exit;
	}

	public function actionDelete($id){
		if(!Yii::app()->user->isGuest){
			$res 			= Resturants::model()->findByPk($id);
			$galleryimages 	= Resturantgallery::model()->findAllByAttributes(array('resturant_id'=>$id));

			if($res['image']!=''){
				@unlink(Yii::getPathOfAlias('webroot').'/images/resturants/'.$res['image']);
			}

			if(!empty($galleryimages) && is_array($galleryimages)){
				foreach($galleryimages as $galleryimage):
					if($galleryimage['image']!='' && file_exists('images/resturants/gallery/'.$galleryimage['image'])){
						@unlink(Yii::getPathOfAlias('webroot').'/images/resturants/gallery/'.$galleryimage['image']);
					}
				endforeach;
			}

			Resturants::model()->deleteByPk($id);		
			Resturantfacility::model()->deleteAllByAttributes(array('resturant_id'=>$id));
			Resturantdiningstyle::model()->deleteAllByAttributes(array('resturant_id'=>$id));
			Resturantgallery::model()->deleteAllByAttributes(array('resturant_id'=>$id));

			Yii::app()->user->setFlash('success', 'Restaurant deleted successfully');
			$this->redirect(array('resturants/manageresturants'));
		}else{
			$this->redirect(array('login/index'));
		}	
	}
}