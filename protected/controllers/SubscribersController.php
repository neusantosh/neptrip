<?php
class SubscribersController extends Controller{
	public $layout = 'admin';


	public function actionIndex(){

		$criteria = new CDbCriteria;
        $total = Subscribers::model()->count();
 
        $pages = new CPagination($total);
        $pages->pageSize = Yii::app()->params['itemsperpage'];
        $pages->applyLimit($criteria);

        $subscribers = Subscribers::model()->findAll($criteria);

        $this->pageTitle = 'Subscribers'; 
        
		$this->render('index', array(
			'records' => $subscribers,
			'pages'		   => $pages 	
			));
	}
}