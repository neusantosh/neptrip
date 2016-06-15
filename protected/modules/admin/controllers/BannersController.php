<?php 
class BannersController extends Controller{

	public $layout = 'admin';


	public function actionIndex(){
		$criteria = new CDbCriteria;
        $total = Banners::model()->count();
 
        $pages = new CPagination($total);
        $pages->pageSize = Yii::app()->params['itemsperpage'];
        $pages->applyLimit($criteria);

        $banners = Banners::model()->findAll($criteria);

		$this->pageTitle  = 'Banners';
		$this->render('index',array(
			'banners' 	=> $banners,
			'pages'		=> $pages
			));
	}

	public function actionAdd(){

		if(isset($_POST['Banners'])){
		$model = new Banners('create');
		$uploadedFile = CUploadedFile::getInstance($model, "banner");
			if(isset($uploadedFile)){
				$fileName = "banner_" . time() . "." . $uploadedFile->getExtensionName();
				$model->banner = $fileName;
				$fullPath = Yii::app()->basePath.'/../images/banners/'.$fileName;
				$uploadedFile->saveAs($fullPath);
			}else{
				$model->banner = '';
			}

			$model->status = $_POST['Banners']['status'];

			if($model->validate()){
				if($model->save()){
					Yii::app()->user->setFlash('success', 'Banner added successfully');
					$this->redirect(array('banners/index'));
				}
			}else{
				$errors = $model->getErrors();
				Yii::app()->user->setFlash('error', $errors['banner'][0]);
				$this->redirect(array('banners/add'));
			}

		}

		$this->pageTitle  = 'Add Banner';
		$this->render('add', array(
			'model' => new Banners('create')
		));
	}


	public function actionUpdate($id=null){

		if(isset($_POST['Banners'])){
			$model = new Banners('update');
			$uploadedFile = CUploadedFile::getInstance($model, "banner");

			if(isset($uploadedFile)){
				@unlink(Yii::getPathOfAlias('webroot').'/images/banners/'.$_POST['old_image']);
				$fileName = "banner_" . time() . "." . $uploadedFile->getExtensionName();
				$model->banner = $fileName;
				$fullPath = Yii::app()->basePath.'/../images/banners/'.$fileName;
				$uploadedFile->saveAs($fullPath);
			}else{
				$model->banner = $_POST['old_image'];
			}

			$model->status = $_POST['Banners']['status'];

			if($model->validate()){
				if($model->updateByPk($id, array('banner'=>$model->banner, 'status'=>$model->status))){
					Yii::app()->user->setFlash('success', 'Banner updated successfully');
					$this->redirect(array('banners/index'));
				}
			}else{
				$errors = $model->getErrors();
				print_r($errors);exit;
				Yii::app()->user->setFlash('error', $errors['banner'][0]);
				$this->redirect(array('banners/update/'.$id));
			}

		}


		$this->pageTitle = "Edit Banner";
		$this->render('update', array(
			'record' => Banners::model()->findByPk($id),
			'model'  => new Banners
		));
	}

	public function actionDelete($id=null){
		$res = Banners::model()->findByPk($id);
		if(!empty($res)){
			@unlink(Yii::getPathOfAlias('webroot').'/images/banners/'.$res['banner']);
		} 
		Banners::model()->deleteBypK($id);
		Yii::app()->user->setFlash('success', 'Banner image deleted successfully');
		$this->redirect(array('banners/index'));
	}

	public function actionSuspendrelease(){
		$id = $_POST['id'];
		$type = $_POST['type'];
		if($type == 1){
			Banners::model()->updateByPk($id, array('status' => 0));
			echo 'Published';
		}else{
			Banners::model()->updateByPk($id, array('status' => 1));
			echo 'Publish Later';
		}
	}
}