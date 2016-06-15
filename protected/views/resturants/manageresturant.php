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
		 	<a role="button" href="<?php echo Yii::app()->createUrl('resturants/add');?>" class="btn btn-primary btn-lg">
		 		Add Restaurant
		 	</a>
		</p>
		 </div>
		</div>		
		<!--/.Top Buttons Section-->

		<!--bookin table-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Your Restaurants</div>
					<?php /* <div class="panel-body">
						<div class="bootstrap-table">
							<div class="pull-right search">
								<input type="text" placeholder="Search" class="form-control">
							</div>
						</div>
					</div> */?>
					<div class="resturants_wrapper">
						<?php 
							if(!empty($resturants) && is_array($resturants)){
								foreach($resturants as $resturant):
						?>

							<div class="user_resturant">
								<div class="resturant_image">
										<?php 
											if($resturant['image']!='' && file_exists('images/resturants/'.$resturant['image'])){
												$imageurl = Yii::app()->baseUrl.'/images/resturants/'.$resturant['image'];
											}else{
												$imageurl = Yii::app()->baseUrl.'/images/imagenotfound.png';
											}
										?>

										<img src="<?php echo $imageurl;?>" width="150px">
									</div>

								<p>
									<?php echo ucfirst($resturant['name']);?>
								</p>
								<p>
										Restaurant Type : <?php echo $resturant['resturant_type']?$resturant['resturant_type']:'N/A';?>
								</p>
								<p>
										Status: <?php 
													if($resturant['status'] == 1){
													 	echo "Enabled";
													}else{
														echo "Disabled";
													}

												?>
								</p>
								<p>
									<a class="btn btn-primary" href="<?php echo $this->createUrl('resturants/edit/id/'.$resturant['id']);?>">Edit</a>
									<a class="btn btn-danger" href="<?php echo $this->createUrl('resturants/delete/id/'.$resturant['id']);?>" onclick="return confirm('Are you sure to delete this restaurant?')">Delete</a>
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
	    'contentSelector' => '.resturants_wrapper',
	    'itemSelector' => 'div.user_resturant',
	    'loadingText' => 'Loading... Please wait.',
	    'donetext' => 'All records are viewd',
	    'pages' => $pages,
	)); 		