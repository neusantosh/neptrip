<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg></a>
				</li>
				
			</ol>
		</div><!--/.row-->
		

		<!--Top Buttons Section-->
		<div class="row">
		 <div class="col-md-12">
		 	<?php $this->widget('bootstrap.widgets.TbAlert', array(
				        'block'=>true, // display a larger alert block?
				        'fade'=>true, // use transitions?
				        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
				        'alerts'=>array( // configurations per alert type
				            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
				        ),
    			)); ?>
    			
		 <p>
		 	<a role="button" href="<?php echo Yii::app()->createUrl('vehicles/add');?>" class="btn btn-primary btn-lg">
		 		Add Vehicle
		 	</a>
		</p>
		 </div>
		</div>		
		<!--/.Top Buttons Section-->

		<!--bookin table-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Your Vehicles</div>
					<?php /* <div class="panel-body">
						<div class="bootstrap-table">
							<div class="pull-right search">
								<input type="text" placeholder="Search" class="form-control">
							</div>
						</div>
					</div> */?>
					<div class="vehicles_wrapper">
						<?php 
							if(!empty($vehicles) && is_array($vehicles)){
								foreach($vehicles as $vehicle):
						?>

							<div class="user_vehicle">
								<div class="vehicle_image">
										<?php 
											if($vehicle['image']!='' && file_exists('images/vehicles/'.$vehicle['image'])){
												$imageurl = Yii::app()->baseUrl.'/images/vehicles/'.$vehicle['image'];
											}else{
												$imageurl = Yii::app()->baseUrl.'/images/imagenotfound.png';
											}
										?>

										<img src="<?php echo $imageurl;?>" width="150px">
									</div>

								<p>
									<?php echo ucfirst($vehicle['car_name']);?>
								</p>
								<p>
										Car Type : <?php echo $vehicle['car_type']?$vehicle['car_type']:'N/A';?>
								</p>
								<p>
										Status: <?php 
													if($vehicle['status'] == 1){
													 	echo "Enabled";
													}else{
														echo "Disabled";
													}

												?>
								</p>
								<p>
									<a class="btn btn-primary" href="<?php echo $this->createUrl('vehicles/edit/id/'.$vehicle['id']);?>">Edit</a>
									<a class="btn btn-danger" href="<?php echo $this->createUrl('vehicles/delete/id/'.$vehicle['id']);?>" onclick="return confirm('Are you sure to delete this vehicle?')">Delete</a>
								</p>
								<hr/>
							</div>
						<?php 
							endforeach;
							} 
						?>
					</div>
					<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!--/.bookin table end-->

	</div>	<!--/.main-->		
</div>	

<?php 
	$this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
	    'contentSelector' => '.tours_wrapper',
	    'itemSelector' => 'div.user_tour',
	    'loadingText' => 'Loading... Please wait.',
	    'donetext' => 'All records are viewd',
	    'pages' => $pages,
	)); 		