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
		 		Manage Hotels 
		 </h2>

		 <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'block'=>true, // display a larger alert block?
	        'fade'=>true, // use transitions?
	        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
	        'alerts'=>array( // configurations per alert type
	            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
	        ),
    )); ?>

		 <p>
		 	<a class="btn btn-primary btn-lg pull-right" href="<?php echo Yii::app()->createUrl('hotels/add');?>" role="button">
		 		Add Hotels
		 	</a>
		 </p>
		 </div>
		 
		</div>		
		<!--/.Top Buttons Section-->

		<!--bookin table-->
		<div class="row">
			<div class="col-lg-12">
				<div class="hotel_wrapper">
					<?php if(!empty($hotels) && is_array($hotels)){?>
						<div class="user_hotels">
							<?php foreach ($hotels as $key => $hotel) { ?>
									<div class="hotel_image">
										<?php 
											if($hotel['hotel_image']!='' && file_exists('images/hotels/'.$hotel['hotel_image'])){
												$imageurl = Yii::app()->baseUrl.'/images/hotels/'.$hotel['hotel_image'];
											}else{
												$imageurl = Yii::app()->baseUrl.'/images/imagenotfound.png';
											}
										?>

										<img src="<?php echo $imageurl;?>" width="150px">
									</div>
									<p><?php echo $hotel['hotel_name'];?></p>
									<p>Star Rating: 
										<?php
											if($hotel['star_rating'] == 0){
												echo 'No Star Rating';
											}else{
												echo $hotel['star_rating'];
											}
										?>
									</p>
									<p>
										Hotel Type : <?php echo $hotel['hotel_type']?$hotel['hotel_type']:'N/A';?>
									</p>
									<p>
										Address: <?php 
													if($hotel['status'] == 1){
													 	echo "Enabled";
													}else{
														echo "Disabled";
													}

												?>
									</p>
									<p>
										Status: <?php 
													if($hotel['status'] == 1){
													 	echo "Enabled";
													}else{
														echo "Disabled";
													}

												?>
									</p>
									<p>
										<a class="btn btn-success" href="<?php echo $this->createUrl('hotels/addroom/id/'.$hotel['id']);?>">Add Room</a>
										<a class="btn btn-primary" href="<?php echo $this->createUrl('hotels/edit/id/'.$hotel['id']);?>">Edit</a>
										<a class="btn btn-danger" href="<?php echo $this->createUrl('hotels/delete/id/'.$hotel['id']);?>" onclick="return confirm('Are you sure to delete this hotel?')">Delete</a>
									</p>
									<hr/>

							<?php  } ?>
						</div>
					<?php }?>
				</div>

			</div>
			<!--/.bookin table end-->

	</div>	<!--/.main-->

<?php 
	$this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
	    'contentSelector' => '.hotel_wrapper',
	    'itemSelector' => 'div.user_hotels',
	    'loadingText' => 'Loading... Please wait.',
	    'donetext' => 'All records are viewd',
	    'pages' => $pages,
	)); 
?>