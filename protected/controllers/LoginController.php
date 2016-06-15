<?php
class LoginController extends CController
{
    public function actionIndex()
    {
    	$model = new LoginForm();
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->redirect(array('users/dashboard'));
		}
		$this->pageTitle = 'Login';
        $this->render('index', array('model'=> $model));
    }
}