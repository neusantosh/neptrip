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
		 	<a role="button" href="<?php echo Yii::app()->createUrl('tours/add');?>" class="btn btn-primary btn-lg">
		 		Add Tour
		 	</a>
		</p>
		 </div>
		</div>		
		<!--/.Top Buttons Section-->

		<!--bookin table-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Your Tours</div>
					<?php /* <div class="panel-body">
						<div class="bootstrap-table">
							<div class="pull-right search">
								<input type="text" placeholder="Search" class="form-control">
							</div>
						</div>
					</div> */?>
					<div class="tours_wrapper">
						<?php 
							if(!empty($tours) && is_array($tours)){
								foreach($tours as $tour):
						?>

							<div class="user_tour">
								<div class="tour_image">
										<?php 
											if($tour['image']!='' && file_exists('images/tours/'.$tour['image'])){
												$imageurl = Yii::app()->baseUrl.'/images/tours/'.$tour['image'];
											}else{
												$imageurl = Yii::app()->baseUrl.'/images/imagenotfound.png';
											}
										?>

										<img src="<?php echo $imageurl;?>" width="150px">
									</div>

								<p>
									<?php echo ucfirst($tour['tour_name']);?>
								</p>
								<p>
										Tour Type : <?php echo $tour['type']?$tour['type']:'N/A';?>
								</p>
								<p>
										Status: <?php 
													if($tour['status'] == 1){
													 	echo "Enabled";
													}else{
														echo "Disabled";
													}

												?>
								</p>
								<p>
									<a class="btn btn-primary" href="<?php echo $this->createUrl('tours/edit/id/'.$tour['id']);?>">Edit</a>
									<a class="btn btn-danger" href="<?php echo $this->createUrl('tours/delete/id/'.$tour['id']);?>" onclick="return confirm('Are you sure to delete this tour?')">Delete</a>
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