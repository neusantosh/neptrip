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
		 	<a role="button" href="<?php echo Yii::app()->createUrl('venues/add');?>" class="btn btn-primary btn-lg">
		 		Add Venue
		 	</a>
		</p>
		 </div>
		</div>		
		<!--/.Top Buttons Section-->

		<!--bookin table-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Your Venues</div>
					<?php /* <div class="panel-body">
						<div class="bootstrap-table">
							<div class="pull-right search">
								<input type="text" placeholder="Search" class="form-control">
							</div>
						</div>
					</div> */?>
					<div class="venues_wrapper">
						<?php 
							if(!empty($venues) && is_array($venues)){
								foreach($venues as $venue):
						?>

							<div class="user_venue">
								<div class="venue_image">
										<?php 
											if($venue['image']!='' && file_exists('images/venues/'.$venue['image'])){
												$imageurl = Yii::app()->baseUrl.'/images/venues/'.$venue['image'];
											}else{
												$imageurl = Yii::app()->baseUrl.'/images/imagenotfound.png';
											}
										?>

										<img src="<?php echo $imageurl;?>" width="150px">
									</div>

								<p>
									<?php echo ucfirst($venue['name']);?>
								</p>
								<p>
										Venue Type : <?php echo $venue['venue_type']?$venue['venue_type']:'N/A';?>
								</p>
								<p>
										Status: <?php 
													if($venue['status'] == 1){
													 	echo "Enabled";
													}else{
														echo "Disabled";
													}

												?>
								</p>
								<p>
									<a class="btn btn-primary" href="<?php echo $this->createUrl('venues/edit/id/'.$venue['id']);?>">Edit</a>
									<a class="btn btn-danger" href="<?php echo $this->createUrl('venues/delete/id/'.$venue['id']);?>" onclick="return confirm('Are you sure to delete this venue?')">Delete</a>
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
	    'contentSelector' => '.venues_wrapper',
	    'itemSelector' => 'div.user_venue',
	    'loadingText' => 'Loading... Please wait.',
	    'donetext' => 'All records are viewd',
	    'pages' => $pages,
	)); 		