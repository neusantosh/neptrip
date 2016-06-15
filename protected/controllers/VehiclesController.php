<?php

class VehiclesController extends Controller
{

	public $layout  = 'user_layout';

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionManagevehicles(){
		if(!Yii::app()->user->isGuest){

			if(Yii::app()->user->hasState('user_id'))
	     	$userid = Yii::app()->user->getState('user_id',NULL);

			$criteria = new CDbCriteria;
			$criteria->condition = 'business_user_id='.$userid;
			$total = Vehicles::model()->count($criteria);
			
			$pages = new CPagination($total);
			$pages->pageSize = Yii::app()->params['itemsperpage'];
			$pages->applyLimit($criteria);

			$vehicles = Vehicles::model()->findAll($criteria);

			$this->pageTitle  = 'Manage Vehicle';

			$this->render('managevehicles',array(
				'vehicles'	=> $vehicles,
				'pages'		=> $pages
			));	
		}else{
			$this->redirect(array('login/index'));
		}
	}

	public function actionAdd(){
		if(!Yii::app()->user->isGuest){
			if(isset($_POST['Vehicles'])){
				if(Yii::app()->user->hasState('user_id'))
	     		$userid = Yii::app()->user->getState('user_id',NULL);
				$model = new Vehicles;
				$model->attributes  = $_POST['Vehicles'];
				$model->business_user_id = $userid;
				$uploadedFile = CUploadedFile::getInstance($model, "image");
				if(isset($uploadedFile)){
					$fileName = "vehicles_" . time() . "." . $uploadedFile->getExtensionName();
					$model->image = $fileName;
					$fullPath = Yii::app()->basePath.'/../images/vehicles/'.$fileName;
					$uploadedFile->saveAs($fullPath);
				}else{
					$model->image = '';
				}
				
				if($model->validate()){
					$model->save();
				}else{
					echo '<pre>';print_r($model->getErrors());exit;
				}

				Yii::app()->user->setFlash('success', 'Vehicle added successfully');
				$this->redirect(array('vehicles/managevehicles'));
			}

			$this->pageTitle  = 'Add Vehicle';
			$this->render('add',array(
				'model' => new Vehicles,
				));	
		}else{
			$this->redirect(array('login/index'));
		}
	}

	public function actionEdit($id=null){
		if(!Yii::app()->user->isGuest){

			if(isset($_POST['Vehicles'])){
				$model = Vehicles::model()->findByPk($id);
				$model->attributes  = $_POST['Vehicles'];
				$uploadedFile = CUploadedFile::getInstance($model, "image");
				if(isset($uploadedFile)){
					$fileName = "vehicles_" . time() . "." . $uploadedFile->getExtensionName();
					$model->image = $fileName;
					$fullPath = Yii::app()->basePath.'/../images/vehicles/'.$fileName;
					$uploadedFile->saveAs($fullPath);	
				}else{
					$model->image = $_POST['old_image'];
				}

				if($model->validate()){
					$model->save();
				}else{
					echo '<pre>';print_r($model->getErrors());exit;
				}

				Yii::app()->user->setFlash('success', 'Vehicle updated successfully');
				$this->redirect(array('vehicles/managevehicles'));
			}


			$this->pageTitle  = 'Edit Vehicle';
			$this->render('edit',array(
				'record' => Vehicles::model()->findByPk($id),
				'model' => new Vehicles,
				));	
		}else{
			$this->redirect(array('login/index'));
		}
	}

	public function actionDeleteimage(){
		$id 		= $_POST['id'];
		$imagename 	= $_POST['imagename'];
		Vehicles::model()->updateByPk($id,array('image'=>''));
		@unlink(Yii::getPathOfAlias('webroot').'/images/vehicles/'.$imagename);
		echo "Image deleted";exit();
	}


	public function actionDelete($id=null){
		if(!Yii::app()->user->isGuest){
				$res = Vehicles::model()->findByPk($id);
				if($res['image']!='' && file_exists('images/vehicles/'.$res['image'])){
					@unlink(Yii::getPathOfAlias('webroot').'/images/vehicles/'.$res['image']);
				}
				Vehicles::model()->deleteByPk($id);

				Yii::app()->user->setFlash('success', 'Vehicle deleted successfully');
				$this->redirect(array('vehicles/managevehicles'));
			}else{
				$this->redirect(array('login/index'));
			}
	
	}



}