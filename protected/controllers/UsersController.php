<?php
class UsersController extends CController
{
	public $layout = 'user_layout';

    public function actionDashboard(){	
    	
    	if(!Yii::app()->user->isGuest){
    		$this->pageTitle = 'Dashboard';
			$this->render('dashboard');	
    	}else{
    		$this->redirect($this->createUrl('/'));
    	}
    }

    public function actionLogout(){
    	Yii::app()->user->logout(false);
        $this->redirect($this->createUrl('/'));
    }




	// -----------------------------------------------------------
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}