<?php 

class ResturantsController extends Controller{
	
	public $layout = 'admin';

	public function actionIndex(){

		$criteria = new CDbCriteria;
        $total = Resturants::model()->count();

        $pages = new CPagination($total);
        $pages->pageSize = Yii::app()->params['itemsperpage'];
        $pages->applyLimit($criteria);
 
        $resturants = Resturants::model()->findAll($criteria);

        $this->pageTitle = "Restaurants";

		$this->render('index', array(
			'resturants' => $resturants,
             'pages' 	=> $pages,
		));
	}


	public function actionView($id=null){
		$this->pageTitle = "View";
		$this->render('view',array(
			'data' => Resturants::model()->findByPk($id)
		));
	}

	public function actionSuspendrelease(){
		$id = $_POST['id'];
		$type = $_POST['type'];
		if($type == 1){
			Resturants::model()->updateByPk($id, array('suspend' => 0));
			echo 'Release';
		}else{
			Resturants::model()->updateByPk($id, array('suspend' => 1));
			echo 'Suspend';
		}
	}
}