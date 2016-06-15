<?php 
class ToursController extends Controller{
	
	public $layout = 'admin';


	public function actionIndex(){
		$criteria 	= new CDbCriteria;
        $total 		= Tours::model()->count();

        $pages 			 = new CPagination($total);
        $pages->pageSize = Yii::app()->params['itemsperpage'];
        $pages->applyLimit($criteria);
 
        $tours = Tours::model()->findAll($criteria);
        $this->pageTitle = 'Tours';
		$this->render('index', array(
			'tours' => $tours,
			'pages'	=> $pages
		));
	}


	public function actionView($id=null){
		$this->pageTitle = 'View';
		$this->render('views',array(
			'data' => Tours::model()->findByPk($id)
		));
	}

	public function actionSuspendrelease(){
		$id = $_POST['id'];
		$type = $_POST['type'];
		if($type == 1){
			Tours::model()->updateByPk($id, array('suspend' => 0));
			echo 'Release';
		}else{
			Tours::model()->updateByPk($id, array('suspend' => 1));
			echo 'Suspend';
		}
	}
}