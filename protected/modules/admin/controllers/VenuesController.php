<?php 
class VenuesController extends Controller{
	
	public $layout = 'admin';

	public function actionIndex(){
		$criteria = new CDbCriteria;
		$total = Venues::model()->count();
        $pages = new CPagination($total);
        $pages->pageSize = Yii::app()->params['itemsperpage'];
        $pages->applyLimit($criteria);
        $venues = Venues::model()->findAll($criteria);

		$this->pageTitle = 'Venues';
		$this->render('index', array(
			'venues' => $venues,
			'pages'	 => $pages 
			));
	}

	public function actionView($id=null){
		$this->pageTitle = 'View';
		$this->render('view', array(
			'data' => Venues::model()->findByPk($id)
		));		
	}

	public function actionSuspendrelease(){
		$id = $_POST['id'];
		$type = $_POST['type'];
		if($type == 1){
			Venues::model()->updateByPk($id, array('suspend' => 0));
			echo 'Release';
		}else{
			Venues::model()->updateByPk($id, array('suspend' => 1));
			echo 'Suspend';
		}
	}
}