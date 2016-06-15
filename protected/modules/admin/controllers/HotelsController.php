<?php 
class HotelsController extends Controller{

	public $layout = 'admin';

	public function actionIndex(){

			$criteria = new CDbCriteria;
            $total = Hotels::model()->count();
 
            $pages = new CPagination($total);
            $pages->pageSize = Yii::app()->params['itemsperpage'];
            $pages->applyLimit($criteria);
 
            $hotels = Hotels::model()->findAll($criteria);

            $this->pageTitle = 'Hotels';
			$this->render('index', array(
				'hotels' => $hotels,
	            'pages' 	=> $pages,
			));
	}

	public function actionView($id=null){

		$this->pageTitle = 'Views';
		$this->render('view',array(
			'data' => Hotels::model()->findByPk($id)
		));
	}

	public function actionSuspendrelease(){
		$id = $_POST['id'];
		$type = $_POST['type'];
		if($type == 1){
			Hotels::model()->updateByPk($id, array('suspend' => 0));
			echo 'Release';
		}else{
			Hotels::model()->updateByPk($id, array('suspend' => 1));
			echo 'Suspend';
		}
	}


	public function actionViewrooms(){
		$id 					= $_POST['id'];
		$criteria   			= new CDbCriteria;
		$criteria->select 		= "id,name,slug";
		$criteria->condition 	= "hotel_id=".$id;
		$rooms = Hotelrooms::model()->findAll($criteria);
		if(!empty($rooms))
			$this->renderPartial('application.views.partials.__hotelrooms',array('rooms'=>$rooms));
	}

	public function actionViewRoom($id=null){
		$this->pageTitle = "Room Details";
		$this->render('room_details',array(
			'data' => Hotelrooms::model()->findByPk($id)
			));
	}
}