<?php 
class SettingsController extends Controller{
	
	public $layout = 'admin';

	public function actionIndex(){

		// updates username and password from here 
		if(isset($_POST['Admin'])){
			$model = Admin::model()->findByPk(1);
			$model->username = $_POST['Admin']['username'];
			$model->password = sha1($_POST['Admin']['password']);
			if($model->update()){
				Yii::app()->user->setFlash('success', "Username and password updated successfully");
				$this->redirect(array('settings/index'));
			}
		}

		// updates site configuration from here 
		if(isset($_POST['Siteconfig'])){
			$model = Siteconfig::model()->findByPk(1);
			$model->attributes = $_POST['Siteconfig'];
			if($model->validate()){
				if($model->update()){
					Yii::app()->user->setFlash('success', "Site configuration updated successfully");
					$this->redirect(array('settings/index'));
				}
			}
		}

		$this->pageTitle  = 'Settings';
		$this->render('index',array(
			'model'		=> new Admin('update'),
			'record'	=> Admin::model()->findByPk(1)
		));
	}
}