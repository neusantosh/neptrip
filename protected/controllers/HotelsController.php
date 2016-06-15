<?php
class HotelsController extends Controller{

	public function actionIndex(){

	}

	public function actionView(){
		$cur_url 		= Yii::app()->request->url;
		$slug 	= substr(strrchr($cur_url, '/'), 1);

		$this->render('views', array(
			'hotel_details' => Hotels::model()->findAllByAttributes(array('slug'=>$slug)),
		));
		
	}

	public function actionManageHotels(){
		 $this->layout = 'user_layout';

		if(!Yii::app()->user->isGuest){
			if(Yii::app()->user->hasState('user_id'))
     		$userid = Yii::app()->user->getState('user_id',NULL);

				$this->pageTitle = 'Manage Hotels';
				$criteria = new CDbCriteria;
				$criteria->condition = 'business_user_id='.$userid;
				$total = Hotels::model()->count($criteria);

				$pages = new CPagination($total);
				$pages->pageSize = Yii::app()->params['itemsperpage'];
				$pages->applyLimit($criteria);

				$hotels = Hotels::model()->findAll($criteria);

				$this->render('application.views.hotels.manage_hotels',array(
					'hotels' => $hotels,
					'pages' => $pages,
				));

		}else{
			$this->redirect(array('login/index'));
		}		
	}
	
	public function actionAdd(){
		 $this->layout = 'user_layout';
		if(!Yii::app()->user->isGuest){
			$model 				 =  new Hotels;
			if(isset($_POST['Hotels'])){
				if(Yii::app()->user->hasState('user_id'))
	     		$userid = Yii::app()->user->getState('user_id',NULL);
				$model->attributes  		= $_POST['Hotels'];
				$model->business_user_id 	= $userid;

				$uploadedFile = CUploadedFile::getInstance($model, "hotel_image");
				if(!empty($uploadedFile)){
					$filename = "hotels_" . time() . "." . $uploadedFile->getExtensionName();
					$fullPath = Yii::app()->basePath.'/../images/hotels/'.$filename;
					$uploadedFile->saveAs($fullPath);	
				}else{
					$filename = '';
				}
				$model->hotel_image = $filename;
				if($model->validate()){
					if($model->save()){
					$photos = CUploadedFile::getInstancesByName('galleryimages');
						 // proceed if the images have been set
	            	if (isset($photos) && count($photos) > 0) {
	                // go through each uploaded image
	                foreach ($photos as $image => $pic) {
	                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/hotels/gallery/'.$pic->name)) {
	                        // add it to the main model now
	                        $img_add = new Hotelgallery();
	                        $img_add->image = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
	                        $img_add->hotel_id = $model->id; // this links your picture model to the main model (like your user, or profile model)
	 						$img_add->status = 1;
	                        $img_add->save(); // DONE
	                    }
	                    else{
	                        echo 'Cannot upload!';
	                    }
	                }
				}
			}

			$facilities = $_POST['Hotelfacilities']['facility'];
            if(!empty($facilities) && is_array($facilities)){
            	foreach ($facilities as $key => $facility) {
            		$hotel_facility = new Hotelfacilities;
            			$hotel_facility->hotel_id = $model->id;
                		$hotel_facility->facility = $facility;
                		$hotel_facility->save(); 
            	}
            }

            Yii::app()->user->setFlash('success', "Hotel added successfully");
            $this->redirect(array('hotels/managehotels'));
		}else{
			echo '<pre>';print_r($model->getErrors());exit;
		}

		}
			if(Yii::app()->user->hasState('user_id'))
     		$userid=Yii::app()->user->getState('user_id',NULL);

     		//$test = Business::model()->findByAttributes(array('id'=>$userid));
			$this->pageTitle = 'Add Hotel';
			$this->render('application.views.hotels.add_hotel',array(
				'model' 					=> new Hotels,
				'facilitiesmodel'			=> new Hotelfacilities,
				'user_details' 				=> Business::model()->findByAttributes(array('id'=>$userid)),
				'user_id'					=> $userid,
				'facilities'    			=> Facilities::model()->findAll()  
				)
			);
		}

	}

	public function actionDelete($id=null){

		if(!Yii::app()->user->isGuest){
			$criteria = new CDbCriteria;
			$criteria->select  = array('hotel_image');
			$criteria->condition = 'id='.$id;
			$hotel_details = Hotels::model()->findAll($criteria);

			$criteria = new CDbCriteria;
			$criteria->select  = array('image');
			$criteria->condition = 'hotel_id='.$id;
			$galleryimages = Hotelgallery::model()->findAll($criteria);


			// deletes all the rooms associated with hotel
			Hotelrooms::model()->deleteAllByAttributes(array('hotel_id'=>$id));
			// deletes all the facilities associated with hotel
			Hotelfacilities::model()->deleteAllByAttributes(array('hotel_id'=>$id));

			// deletes the hotel image
			if(!empty($hotel_details) && is_array($hotel_details)){
				if($hotel_details[0]['hotel_image']!= '' ){
					@unlink(Yii::app()->baseUrl.'/images/hotels/'.$hotel_details[0]['hotel_image']); // removes the hotel image from the table
					Hotels::model()->deleteByPk($id); //deletes the hotel form the table
				}
			}

			// deletes the hotel gallery image
			if(!empty($galleryimages) && is_array($galleryimages)){
				foreach($galleryimages as $galleryimage):
					@unlink(Yii::app()->baseUrl.'/images/hotels/'.$galleryimage['image']);
					Hotelgallery::model()->deleteAllByAttributes(array('hotel_id'=>$id));
				endforeach;
			}


			 Yii::app()->user->setFlash('success', "Hotel deleted successfully");
			 $this->redirect(array('hotels/managehotels'));
		}else{
			$this->redirect(array('login/index'));
		}	
	} 


	public function actionEdit($id=null){
		$this->layout = 'user_layout';
		if(!Yii::app()->user->isGuest){

				if(isset($_POST['Hotels'])){
					$model = Hotels::model()->findByPk($id);
					$model->attributes  = $_POST['Hotels'];
					$uploadedFile = CUploadedFile::getInstance($model, "hotel_image");

					if(!empty($uploadedFile)){
						@unlink(Yii::getPathOfAlias('webroot').'/images/hotels/'.$_POST['old_image']);  //removes the old image
						$fileName = "hotels_" . time() . "." . $uploadedFile->getExtensionName();
						$fullPath = Yii::app()->basePath . '/../images/hotels/' . $fileName;
						$uploadedFile->saveAs($fullPath);
						$model->hotel_image  = $fileName;
					}else{
						
						$model->hotel_image  = $_POST['old_image'];
					}

					if($model->validate()){
						if($model->save()){
						$photos = CUploadedFile::getInstancesByName('galleryimages');
							 // proceed if the images have been set
		            	if (isset($photos) && count($photos) > 0) {
		                // go through each uploaded image
		                foreach ($photos as $image => $pic) {
		                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/hotels/gallery/'.$pic->name)) {
		                        // add it to the main model now
		                        $img_add = new Hotelgallery();
		                        $img_add->image = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
		                        $img_add->hotel_id = $model->id; // this links your picture model to the main model (like your user, or profile model)
		 						$img_add->status = 1;
		                        $img_add->save(); // DONE
		                    }
		                    else{
		                        echo 'Cannot upload!';
		                    }
		                }
					}
				}

				Hotelfacilities::model()->deleteAllByAttributes(array('hotel_id'=>$id));
				$facilities = $_POST['Hotelfacilities']['facility'];
	            if(!empty($facilities) && is_array($facilities)){
	            	foreach ($facilities as $key => $facility) {
	            		$hotel_facility = new Hotelfacilities;
	            			$hotel_facility->hotel_id = $model->id;
	                		$hotel_facility->facility = $facility;
	                		$hotel_facility->save(); 
	            	}
	            }

	            Yii::app()->user->setFlash('success', "Hotel updated successfully");
	            $this->redirect(array('hotels/managehotels'));
			}else{
				echo '<pre>';print_r($model->getErrors());exit;
			}
		}

			$this->pageTitle="Edit Hotel";
			$this->render('application.views.hotels.update_hotel', array(
				'model'	 				=> new Hotels,
				'facilitiesmodel'		=> new Hotelfacilities,
				'record' 				=> Hotels::model()->findByPk($id),
				'hotel_facilities'		=> array_keys(CHtml::listData(Hotelfacilities::model()->findAllByAttributes(array('hotel_id'=>$id)), 'facility' , 'facility')),
				'hotel_images'			=> Hotelgallery::model()->findAllByAttributes(array('hotel_id'=>$id))
				)
			);
		}else{
			$this->redirect(array('login/index'));
		}
	}

	public function actionAddRoom($id=null){
		$this->layout = 'user_layout';
		if(!Yii::app()->user->isGuest){
			$model = new Hotelrooms;
			if(isset($_POST['Hotelrooms'])){
				$model->attributes =$_POST['Hotelrooms'];
				if($model->validate()){
					$model->save();	
				}else{
					echo '<pre>';print_r($model->getErrors());exit;
				}
				
				$images = CUploadedFile::getInstancesByName('images');
				// proceed if the images have been set
            if (isset($images) && count($images) > 0) {
                // go through each uploaded image
                foreach ($images as $image => $pic) {
                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/rooms/'.$pic->name)) {
                        // add it to the main model now
                        $img_add = new Roomgallery;
                        $img_add->image = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
                        $img_add->room_id = $model->id; // this links your picture model to the main model (like your user, or profile model)
                        if($img_add->validate())
                        	$img_add->save(); // DONE
                    }
                }
			}

			$facilities = $_POST['Roomfacility']['facility'];
			foreach ($facilities as $key => $facility) {
				//echo '<pre>';print_r($facility);
				$model1 = new Roomfacility;
				$model1->facility  = $facility;
				$model1->room_id   = $model->id;
				$model1->save();
			}
			Yii::app()->user->setFlash('success', "Room added successfully");
			$this->redirect(array('hotels/managerooms'));
		}

		$this->render('application.views.hotels.addroom',
				array(
						'model' 	=> $model,
						'model1'	=> new Roomfacility,
						'hotel_id'	=> $id
					)
		);
		}else{
			$this->redirect('login/index');
		}
	}

	public function actionManageRooms(){
		$this->layout = 'user_layout';
		if(!Yii::app()->user->isGuest){
			$criteria = new CDbCriteria;
            $total = Hotelrooms::model()->count();

            $pages = new CPagination($total);
            $pages->pageSize = Yii::app()->params['paramName'];
            $pages->applyLimit($criteria);

            $rooms = Hotelrooms::model()->findAll($criteria);

			$this->render('application.views.hotels.manage_rooms',array(
				'rooms' => $rooms,
	            'pages' => $pages,
 			));
		}else{
			$this->redirect('login/index');
		}
	}


	public function actionUpdateroom($id=null){
		$this->layout = 'user_layout';
		if(!Yii::app()->user->isGuest){
			$model = new Hotelrooms;
			if(isset($_POST['Hotelrooms'])){
				$rooms = Hotelrooms::model()->findByPk($id);
				$rooms->attributes =$_POST['Hotelrooms'];
				if($rooms->validate()){
					$rooms->save();	
				}else{
					echo '<pre>';print_r($rooms->getErrors());exit;
				}
				
			  $images = CUploadedFile::getInstancesByName("images");
			  //echo '<pre>';print_r($images);exit;
				// proceed if the images have been set
            if (isset($images) && count($images) > 0) {
                // go through each uploaded image
                foreach ($images as $image => $pic) {
                    if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/rooms/'.$pic->name)) {
                        // add it to the main model now
                        $img_add = new Roomgallery;
                        $img_add->image = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
                        $img_add->room_id = $id; // this links your picture model to the main model (like your user, or profile model)
                        if($img_add->validate())
                        	$img_add->save(); // DONE
                    }
                }
			}
			Roomfacility::model()->deleteAllByAttributes(array('room_id'=>$id));
			$facilities = $_POST['Roomfacility']['facility'];
			foreach ($facilities as $key => $facility) {
				$model1 = new Roomfacility;
				$model1->facility  = $facility;
				$model1->room_id   = $id;
				$model1->save();
			}
			Yii::app()->user->setFlash('success', "Room updated successfully");
			$this->redirect(array('hotels/managerooms'));
		}

			$this->render('application.views.hotels.update_room', array(
				'model' 			=> $model,
				'model1'			=> new Roomfacility,
				'model2'			=> new Roomgallery,
				'record'  			=> Hotelrooms::model()->findByPk($id),
				'roomfacility'		=> array_keys(CHtml::listData(Roomfacility::model()->findAllByAttributes(array('room_id'=>$id)), 'facility' , 'facility')),
				'roomimages'		=> Roomgallery::model()->findAllByAttributes(array('room_id'=>$id)),
			));

		}else{
			$this->redirect(array('login/index'));
		}
	}



	public function actionDeleteRoom($id=null){
		if(!Yii::app()->user->isGuest){
			$criteria = new CDbCriteria;
			$criteria->select  = array('image');
			$criteria->condition = 'room_id='.$id;
			$roomimages = Roomgallery::model()->findAll($criteria);
			if(!empty($roomimages) && is_array($roomimages)){
				foreach($roomimages as $roomimage):
					if($roomimage['image']!='' && file_exists('images/rooms/'.$roomimage['image']))
						@unlink(Yii::app()->baseUrl.'/images/rooms/'.$roomimage['image']);
				endforeach;
			}
			Roomgallery::model()->deleteAllByAttributes(array('room_id'=>$id));
			Roomfacility::model()->deleteAllByAttributes(array('room_id'=>$id));
			Hotelrooms::model()->deleteByPk($id);
			Yii::app()->user->setFlash('success','Room deleted successfully');
			$this->redirect(array('hotels/managerooms'));
		}else{
			$this->redirect('login/index');
		}
	}

	public function actionDeleteroomimage(){
		$id 	= $_POST['image_id'];
		$image 	= Roomgallery::model()->findByPk($id);
		@unlink(Yii::app()->baseUrl.'/images/rooms/'.$image['image']);
		 $res = Roomgallery::model()->deleteAllByAttributes(array('id'=>$id));
		 if($res)
		 	echo 'Image deleted';
		 else
		 	echo 'some error';
	}

	public function actionRemovelogo(){
		$id 	= $_POST['id'];
		$image 	= $_POST['imagename'];
		Hotels::model()->updateByPk($id, array('hotel_image' => ''));
		@unlink(Yii::app()->baseUrl.'/images/hotels/'.$image);
		echo 'Logo removed successfully';exit;
	}

	public function actionRemovehotelgallery(){
		$id = $_POST['id'];
		$image = Hotelgallery::model()->findByPk($id);
		if(isset($image)){
			@unlink(Yii::app()->baseUrl.'/images/hotels/gallery/'.$image['image']);
			$res = Hotelgallery::model()->deleteByPk($id);
			if($res)
				echo "Gallery Image deleted successfully.";
		}
	}


}