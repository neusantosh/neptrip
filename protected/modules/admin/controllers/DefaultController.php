<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$model = new LoginForm();
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array('dashboard/index'));
		}

		$this->pageTitle = 'Login';
		$this->layout = 'admin_login';	
		$this->render('index', array('model'=>$model));
	}

	public function actionLogout(){
		Yii::app()->user->logout(true);
        $this->redirect(Yii::app()->getModule('admin')->user->loginUrl);
	}
}