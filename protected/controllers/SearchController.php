<?php 
class SearchController extends Controller{
	
	public function actionHotels(){
		if(!empty($_GET['Hotels']) && !empty($_GET['Hotelrooms'])){
			$address  		= $_GET['Hotels']['city_village'];
			$checkin_time 	= $_GET['Hotels']['checkin_time'];
			$checkout_time 	= $_GET['Hotels']['checkout_time'];
			$room_type 		= $_GET['Hotelrooms']['room_type'];
			$max_adults 	= $_GET['Hotelrooms']['max_adults'];
			$max_children 	= $_GET['Hotelrooms']['max_children'];

			$hotel_search = array(
				'address' 	=> $address,
				'checkin'	=> $checkin_time,
				'checkout' 	=> $checkout_time,
				'room_type'	=> $room_type,
				'adults'    => $max_adults,
				'children'	=> $max_children					
			);	

			$session = Yii::app()->session;
			$session['hotel_search'] = $hotel_search;

			$sql 			= "select t1.* from  tbl_hotels t1 left join tbl_hotelrooms t2 on t1.id = t2.hotel_id where t1.city_village='$address' and t2.room_type=$room_type and t2.max_adults=$max_adults and t2.max_children=$max_children and t1.status=1 and t2.status = 1 and t1.suspend=0";
			$results 		= Yii::app()->db->createCommand($sql)->queryAll();

		    // results per page
		    $pages = new CPagination(count($results));
			$pages->setPageSize(Yii::app()->params['itemsperpage']);	   

		    $this->pageTitle = 'Search Results Hotels';
			$this->render('hotels', array(
				'records'	=> $results,
				'pages' 	=> $pages
			));
		}
	}
}