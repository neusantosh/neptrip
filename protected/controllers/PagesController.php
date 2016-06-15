<?php 
class PagesController extends Controller{
	
	public function actionIndex(){
		$cur_url 		= Yii::app()->request->url;
		$current_page 	= substr(strrchr($cur_url, '/'), 1);
	
		$this->render('index', array(
			'record' => Pages::model()->findByAttributes(array('slug'=>$current_page,'page_status'=>1))
		));
	}

}