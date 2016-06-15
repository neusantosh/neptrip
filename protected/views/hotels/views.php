<div class="hotel_details">
	<h2>
		<?php echo $hotel_details[0]['hotel_name'];?>
	</h2>

	<?php 
		$galleryImages = Hotelgallery::model()->findAllByAttributes(array('hotel_id'=>$hotel_details[0]['id']));
		if(!empty($galleryImages) && is_array($galleryImages)){
			foreach($galleryImages as $galleryImage):
	?>
			
			
	<?php 				
			endforeach;
		}
	?>	
</div>