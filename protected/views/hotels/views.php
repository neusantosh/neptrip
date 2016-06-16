<div class="hotel_details">
	<h2>
		<?php echo $hotel_details[0]['hotel_name'];?>
	</h2>
	<span>
		<?php echo $hotel_details[0]['hotel_type'];?>
	</span>
	<br/>
	<span class="address_details">
		<i class="fa fa-map-marker"></i>
		<?php 
			echo $hotel_details[0]['city_village'].', '.Districts::model()->getName($hotel_details[0]['district']).', '.Zones::model()->getZoneName($hotel_details[0]['zone']);
		?>
	</div>
	<div class="rating">
		<?php 
		$this->widget('ext.DzRaty.DzRaty', array(
					'name' => 'rating',
					'value' => $hotel_details[0]['star_rating'],
					'options' => array(
							  'readOnly' => TRUE,
					),
		));

		?>
	</div>

	<div class="hotel_galleryimages">
		<?php 
			//Create an instance of ColorBox
			//$colorbox = $this->widget('application.extensions.colorpowered.JColorBox');
 
			//Call addInstance (chainable) from the widget generated.
			// $colorbox
			//     ->addInstance('.colorbox', array('maxHeight'=>'80%', 'maxWidth'=>'90%'))
			//     ->addInstance('.colorbox1', array('iframe'=>true, 'width'=>'80%', 'height'=>'80%'))
			//     ->addInstance("a[rel='example1']");

			$galleryImages = Hotelgallery::model()->findAllByAttributes(array('hotel_id'=>$hotel_details[0]['id']));
			if(!empty($galleryImages) && is_array($galleryImages)){
					foreach($galleryImages as $galleryImage):
						if($galleryImage['image']!='' && file_exists('images/hotels/gallery/'.$galleryImage['image'])){
		?>
				<a href="<?php echo Yii::app()->baseUrl;?>/images/hotels/gallery/<?php echo $galleryImage['image'];?>" class="colorbox">
					<img src="<?php echo Yii::app()->baseUrl;?>/images/hotels/gallery/<?php echo $galleryImage['image'];?>" width="150px">
				</a>
		<?php				
						}
					endforeach;
				}else{
					echo '<p>No images found<p>';
			}
		?>
	</div>	

	<p>
		<?php echo $hotel_details[0]['hotel_description'];?>
	</p>

	<p>
		<strong>Things to do </strong><?php echo $hotel_details[0]['things_to_do'];?>
	</p>

	<legend>Find us on Map</legend>

	<?php
		Yii::import('ext.EGMap.*');
		 
		$gMap = new EGMap();
		$gMap->zoom = 10;

		$gMap->setWidth(1110);
		// it can also be called $gMap->height = 400;
		$gMap->setHeight(400);

		$mapTypeControlOptions = array(
		  'position'=> EGMapControlPosition::LEFT_BOTTOM,
		  'style'=>EGMap::MAPTYPECONTROL_STYLE_DROPDOWN_MENU
		);
		 
		$gMap->mapTypeControlOptions= $mapTypeControlOptions;
		 
		$gMap->setCenter($hotel_details[0]['latitude'], $hotel_details[0]['longitude']);
		 
		// Create GMapInfoWindows
		//$info_window_a = new EGMapInfoWindow('<div>I am a marker with custom image!</div>');
		$info_window_b = new EGMapInfoWindow($hotel_details[0]['address_on_map']);
		 
		$icon = new EGMapMarkerImage("");
		 
		$icon->setSize(100, 100);
		$icon->setAnchor(16, 16.5);
		$icon->setOrigin(0, 0);
		 
		// Create marker with label
		$marker = new EGMapMarkerWithLabel($hotel_details[0]['latitude'], $hotel_details[0]['longitude'], array('title' => $hotel_details[0]['address_on_map']));
			 
		$marker->addHtmlInfoWindow($info_window_b);
		 
		$gMap->addMarker($marker);
		 
		// enabling marker clusterer just for fun
		// to view it zoom-out the map
		$gMap->enableMarkerClusterer(new EGMapMarkerClusterer());
		 
		$gMap->renderMap();
	?>

	<p>
		<strong>Check in Time: </strong><?php echo $hotel_details[0]['checkin_time'];?>
	</p>

	<p>
		<strong>Check out Time: </strong><?php echo $hotel_details[0]['checkout_time'];?>
	</p>

	<p>
		<strong>Terms and condition</strong><?php echo $hotel_details[0]['terms_policy'];?>
	</p>

	<legend>Contact Details</legend>

	<p>
		<strong>Phone: </strong><?php echo $hotel_details[0]['phone1']?$hotel_details[0]['phone1']:'N/A';?>
	</p>
	<p>
		<strong>Alternate Phone: </strong><?php echo $hotel_details[0]['phone2']?$hotel_details[0]['phone2']:'N/A';?>
	</p>

	<p>
		<strong>Fax: </strong><?php echo $hotel_details[0]['fax_no']?$hotel_details[0]['fax_no']:'N/A';?>
	</p>

	<p>
		<strong>Email: </strong><?php echo $hotel_details[0]['email']?$hotel_details[0]['email']:'N/A';?>
	</p>

	<p>
		<strong>Web: </strong><?php echo $hotel_details[0]['web_url']?$hotel_details[0]['web_url']:'N/A';?>
	</p>
	<p>
		<strong>Facebook: </strong><?php echo $hotel_details[0]['facebook']?$hotel_details[0]['facebook']:'N/A';?>
	</p>

	<legend>Contact Person Details</legend>
	<p>
		<strong>Contact Person: </strong><?php echo $hotel_details[0]['contact_person']?$hotel_details[0]['contact_person']:'N/A';?>
	</p>
	<p>
		<strong>Role: </strong><?php echo $hotel_details[0]['role']?$hotel_details[0]['role']:'N/A';?>
	</p>
	<p>
		<strong>Mobile Number: </strong><?php echo $hotel_details[0]['mobile_number']?$hotel_details[0]['mobile_number']:'N/A';?>
	</p>

	<legend>Facilities</legend>

	<div class="hotel_facilities">
		<?php 
			$facilites = Facilities::model()->findAll();
			if(!empty($facilites) && is_array($facilites)){
				foreach ($facilites as $key => $facility) {
		?>	
			<span class="hotel_facility">
				<?php 
					$res = Hotelfacilities::model()->exists('facility = :facility_id', array(":facility_id"=>$facility['id']));
					if($res){
				?>
				<i class="fa fa-check"></i>

				<?php
					}else{
				?>
				<i class="fa fa-times"></i>
				<?php
					}
					echo $facility['facility'];
				?>
			</span>

			<br/>
		<?php				
				}
			}
		?>
	</div>
	
	<?php $this->renderPartial('application.views.partials.__roomdetails', array('hotel_id'=>$hotel_details[0]['id']));?>
</div>