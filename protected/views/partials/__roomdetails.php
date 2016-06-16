<legend>Rooms</legend>

	<?php 
		$rooms = Hotelrooms::model()->findAllByAttributes(array('hotel_id'=>$hotel_id,'status'=>1));
		if(!empty($rooms) && is_array($rooms)){
			foreach($rooms as $room):
				$image = Roomgallery::model()->findAllByAttributes(array('room_id'=>$room['id']), array('limit'=>1));
	?>	<div class="room_listing">
		<?php 
			if($image[0]['image']!='' && file_exists('images/rooms/'.$image[0]['image']))
				$imageurl = Yii::app()->baseUrl.'/images/rooms/'.$image[0]['image'];
			else
				$imageurl = Yii::app()->baseUrl.'/images/imagenotfound.png';
		?>

		<img src="<?php echo $imageurl;?>" width="150px" title="<?php echo $room['name'];?>" alt="<?php echo $room['name'];?>"/>
		
			<strong><?php echo $room['name'];?></strong>
			<br/>
				Adults <?php echo $room['max_adults']?$room['max_adults']:"N/A";?>, Children <?php echo $room['max_children']?$room['max_children']:"N/A";?>
			<br/>
			<strong><?php echo Roomtypes::model()->getRoom($room['room_type']);?></strong>
			<br/>
			<a href="javascript:void(0);" class="btn btn-danger view_more" data-id="<?php echo $room['id'];?>">More Details</a>
			<br/>

			<div id="room_details_<?php echo $room['id'];?>" style="display:none;">

				<?php 
					$room_images = Roomgallery::model()->findAllByAttributes(array('room_id'=>$room['id']));
					if(!empty($room_images) && is_array($room_images)){
						foreach($room_images as $room_image):
							if($room_image['image']!='' && file_exists('images/rooms/'.$room_image['image'])){
				?>
				<a href="<?php echo Yii::app()->baseUrl;?>/images/rooms/<?php echo $room_image['image'];?>" class="colorbox">
					<img src="<?php echo Yii::app()->baseUrl;?>/images/rooms/<?php echo $room_image['image'];?>" width="150px">
				</a>
				<?php
							}
										
						endforeach;
					}
				?>

				<p>
					<strong>Price: </strong><?php echo $room['price']?$room['price']:"N/A";?>
				</p>
				<p>
					<strong>Number of rooms: </strong><?php echo $room['no_rooms']?$room['no_rooms']:"N/A";?>
				</p>
					
				<p>
					<strong>Number of Extra bed: </strong><?php echo $room['max_children']?$room['max_children']:"N/A";?>
				</p>
				<p>
					<strong>Extra bed charges: </strong><?php echo $room['bedcharges']?$room['bedcharges']:"N/A";?>
				</p>
			</div>

		</div>

	<?php			
			endforeach;
		}else{
			echo '<p>No Results found</p>';
		}
	?>