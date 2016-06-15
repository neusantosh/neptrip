<?php 
class VehiclesController extends Controller{
	
	public $layout = 'admin';


	public function actionIndex(){
		$criteria 	= new CDbCriteria;
        $total 		= Vehicles::model()->count();

        $pages 			 = new CPagination($total);
        $pages->pageSize = Yii::app()->params['itemsperpage'];
        $pages->applyLimit($criteria);
 
        $vehicles = Vehicles::model()->findAll($criteria);

        $this->pageTitle = 'Vehicles';
		$this->render('index', array(
			'vehicles' => $vehicles,
			'pages'	=> $pages
		));
	}


	public function actionView($id=null){
		$this->pageTitle = 'View';
		$this->render('views',array(
			'data' => Vehicles::model()->findByPk($id)
		));
	}

	public function actionSuspendrelease(){
		$id = $_POST['id'];
		$type = $_POST['type'];
		if($type == 1){
			Vehicles::model()->updateByPk($id, array('suspend' => 0));
			echo 'Release';
		}else{
			Vehicles::model()->updateByPk($id, array('suspend' => 1));
			echo 'Suspend';
		}
	}
}