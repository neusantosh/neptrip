<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php 
					if(Yii::app()->user->hasState('user_id'))
     					$userid=Yii::app()->user->getState('user_id',NULL);

				?>
				<a class="navbar-brand" href="#"><span>Business</span>User</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use>
							</svg> 
									<?php 
										echo Business::model()->getUsername($userid);
									?>
							<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="#">
										<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile
									</a>
								</li>
								<li>
									<a href="#">
										<svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings
									</a>
								</li>
								<li>
									<a href="<?php echo $this->createUrl('users/logout');?>">
										<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout
									</a>
								</li>
							</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="<?php if(Yii::app()->controller->getAction()->getId() =='dashboard'){?> active <?php }?>">
				<a href="<?php echo Yii::app()->createUrl('dashboard');?>">
					<svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard
				</a>
				</li>
						<!--Menu with subitem-->
			<li class="parent <?php if(Yii::app()->controller->id=='hotels'){?> active <?php }?>">
				<a data-toggle="collapse" href="#sub-item-1">
					<span data-toggle="collapse" href="#sub-item-1">
						<svg class="glyph stroked chevron-down">
							<use xlink:href="#stroked-chevron-down"></use></svg></span> Hotels
				</a>
				<ul class="children collapse <?php if(Yii::app()->controller->id=='hotels'){?> in <?php }?>" id="sub-item-1">
					<li>
						<a class="" href="<?php echo Yii::app()->createUrl('hotels/managehotels');?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Manage Hotels
						</a>
					</li>
					<li>
						<a class="" href="<?php echo Yii::app()->createUrl('hotels/managerooms');?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Manage Rooms
						</a>
					</li>
				</ul>
			</li>

			<li class="parent <?php if(Yii::app()->controller->id=='venues'){?> active <?php }?>">
				<a data-toggle="collapse" href="#sub-item-2">
					<span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Venues 
				</a>
				<ul class="children collapse <?php if(Yii::app()->controller->id=='venues'){?> in <?php }?>" id="sub-item-2">
					<li>
						<a class="" href="<?php echo Yii::app()->createUrl('venues/managevenues');?>">
							<svg class="glyph stroked chevron-right">
								<use xlink:href="#stroked-chevron-right"></use></svg> Manage Venues
						</a>
					</li>
					
				</ul>
			</li>

			<li class="parent <?php if(Yii::app()->controller->id=='resturants'){?> active <?php }?>">
				<a data-toggle="collapse" href="#sub-item-3">
					<span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Restaurant 
				</a>
				<ul class="children collapse <?php if(Yii::app()->controller->id=='resturants'){?> in <?php }?>" id="sub-item-3">
					<li>
						<a class="" href="<?php echo Yii::app()->createUrl('resturants/manageresturants');?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Manage Restaurant
						</a>
					</li>
				</ul>
			</li>

			<li class="parent <?php if(Yii::app()->controller->id=='tours'){?> active <?php }?>">
				<a data-toggle="collapse" href="#sub-item-4">
					<span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Tour & Experienced 
				</a>
				<ul class="children collapse <?php if(Yii::app()->controller->id=='tours'){?> in <?php }?>" id="sub-item-4">
					<li>
						<a class="" href="<?php echo Yii::app()->createUrl('tours/managetours');?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Tour/Experienced
						</a>
					</li>
				</ul>
			</li>

			<li class="parent <?php if(Yii::app()->controller->id=='vehicles'){?> active <?php }?>">
				<a data-toggle="collapse" href="#sub-item-5">
					<span data-toggle="collapse" href="#sub-item-5"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Vehicle 
				</a>
				<ul class="children collapse <?php if(Yii::app()->controller->id=='vehicles'){?> in <?php }?>" id="sub-item-5">
					<li>
						<a class="" href="<?php echo Yii::app()->createUrl('vehicles/managevehicles');?>">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Manage Vehicle
						</a>
					</li>
				</ul>
			</li>

			<li><a href="#"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Bookings</a></li>
			<!--/.Menu with sub item End-->
			<li role="presentation" class="divider"></li>
			
		</ul>

	</div><!--/.sidebar-->