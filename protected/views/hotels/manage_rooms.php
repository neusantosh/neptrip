	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				
			</ol>
		</div><!--/.row-->
		

		<!--Top Buttons Section-->
		<div class"row">
		 <div class="col-md-6">
		 <h2>
		 		Manage Rooms 
		 </h2>
		 </div>
		 
		</div>		
		<!--/.Top Buttons Section-->

				 <?php $this->widget('bootstrap.widgets.TbAlert', array(
				        'block'=>true, // display a larger alert block?
				        'fade'=>true, // use transitions?
				        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
				        'alerts'=>array( // configurations per alert type
				            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
				        ),
    			)); ?>

		<!--bookin table-->
		<div class="row">
			<div class="col-lg-12">
				<div class="room_wrapper">
					<?php 
							if(!empty($rooms) && is_array($rooms)){
								foreach($rooms as $room):
					?>
						<div class="room_details">
								<p>
									<?php echo $room['name'];?>
								</p>
								<p>
									<?php echo Hotels::model()->getHotelName($room['hotel_id']);?>
								</p>
								<p>
									Price: <?php echo $room['price'];?>
								</p>
								<p>
									Number of rooms: <?php echo $room['no_rooms'];?>
								</p>
								<p>
									Status: <?php 
												if($room['status'] == 1){
												 	echo "Enabled";
												}else{
													echo "Disabled";
												}

											?>
								</p>
								<p>
									<a href="<?php echo $this->createUrl('hotels/updateroom/id/'.$room['id']);?>" class="btn btn-primary">Edit</a>
									<a href="<?php echo $this->createUrl('hotels/deleteroom/id/'.$room['id']);?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this room?');">Delete</a>
								</p>
						</div>

					<?php
						endforeach; 
						} 
					?>
				</div>
			</div>
			<!--/.bookin table end-->

	</div>	<!--/.main-->

	<div id="posts">

</div>
<?php 
	$this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
	    'contentSelector' => '.room_wrapper',
	    'itemSelector' => 'div.room_details',
	    'loadingText' => 'Loading... Please wait.',
	    'donetext' => 'All records are viewd',
	    'pages' => $pages,
	)); 
?>