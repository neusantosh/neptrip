<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'update_venue',
    'enableClientValidation'=>true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
  'clientOptions'=>array(
    'validateOnSubmit'=>true,
  ),
)); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg></a></li>
				
			</ol>
		</div><!--/.row-->
		<section>
		<div class="row">
		<h3>Add Your Venue</h3>
		</div>
		<div class="row">
			
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<div class="tab-content">
							<div id="tab1" class="tab-pane fade in active">
								<h4>General</h4>
									<div class="row form-group">						           
						            <?php echo $form->labelEx($model,'status', array('class'=>'col-md-2 control-label text-left')); ?>
						            <div class="col-md-4">
										<?php 
											echo $form->dropDownList($model,'status', 
													array(''=>'--select--',1=>'Enabled',2=>'Disabled'), 
													array(
														'options'=>array($record['status']=>array('selected'=>true)),
														'class'=>'form-control')
													);
											echo $form->error($model,'status');
										?>
									</div>
									

						          </div>

						          <div class="row form-group">
						            <?php echo $form->labelEx($model,'name', array('class'=>'col-md-2 control-label text-left')); ?>
						            <div class="col-md-4">
						              	<?php echo $form->textField($model,'name', array(
							              		'class'=>'form-control', 
							              		'placeholder'=>'Name of Venue',
							              		'value'	=> $record['name']
						              		));
						              		echo $form->error($model,'name');
						              	?>
						            </div>
						          </div>

					            <div class="row form-group">
						            <?php echo $form->labelEx($model,'booking_price', array('class'=>'col-md-2 control-label text-left')); ?>
						            <div class="col-md-4">
						               	<?php echo $form->textField($model,'booking_price', array(
							               		'class'=>'form-control', 
							               		'placeholder'=>'Booking Price',
							               		'value'	=> $record['booking_price']
						               		)); ?>
							           	<?php echo $form->error($model,'booking_price'); ?>
						            </div>
					          	</div>

					          	<div class="row form-group">
									 <?php echo $form->labelEx($model,'image', array('class'=>'col-md-2 control-label text-left')); ?>
						            <div class="col-md-6">
										<?php
         									echo $form->fileField($model,'image');
      									?>
										 <p class="help-block">Upload Main Venue Image.</p>
									</div>
								</div>

								<div class="row form-group">
									<label class="col-md-2 control-label text-left"></label>
						            <div class="col-md-6">
										<?php
													if($record['image']!='' && file_exists('images/venues/'.$record['image'])){
													$imageurl = Yii::app()->baseUrl.'/images/venues/'.$record['image'];
										?>
												<div class="venuelogo">
													<img src="<?php echo $imageurl;?>" width="150px">
													<br/>
													<a href="javascript:void(0);" class="btn btn-danger removevenuelogo" data-id="<?php echo $record['id'];?>" data-url="<?php echo Yii::app()->createUrl('venues/deletevenuelogo');?>" data-image="<?php echo $record['image'];?>">
														Remove
													</a>
												</div>
										<?php 
													}
										?>
									</div>
								</div>

								<div class="row form-group">
									<label class="col-md-2 control-label text-left">Gallery Images</label>
						            <div class="col-md-6">
										<?php
											  $this->widget('CMultiFileUpload', array(
											     'model'=>$model1,
											     'attribute'=>'image',
											     'accept'=>'jpg|gif|png',
											     'options'=>array(
											         //'onFileSelect'=>'function(e, v, m){ alert("onFileSelect - "+v) }',
											        // 'afterFileSelect'=>'function(e, v, m){ alert("afterFileSelect - "+v) }',
											        // 'onFileAppend'=>'function(e, v, m){ alert("onFileAppend - "+v) }',
											        // 'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
											        // 'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
											        // 'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
											     ),
											     'denied'=>'File is not allowed',
											     'max'=>10, // max 10 files
											  ));
										?>
										 <p class="help-block">Upload Images of your Venue.</p>
									</div>
								</div>

								<div class="row form-group">
									<label class="col-md-2 control-label text-left"></label>
						            <div class="col-md-6">
										<?php
											if(!empty($venuegallery) && is_array($venuegallery)){
												foreach($venuegallery as $image):
													if($image['image']!='' && file_exists('images/venues/gallery/'.$image['image'])){
													$imageurl = Yii::app()->baseUrl.'/images/venues/gallery/'.$image['image'];
										?>
												<div class="galleryimage">
													<img src="<?php echo $imageurl;?>" width="150px">
													<br/>
													<a href="javascript:void(0);" class="btn btn-danger removevenueimage" data-id="<?php echo $image['id'];?>" data-url="<?php echo Yii::app()->createUrl('venues/deletegalleryimage');?>" data-image="<?php echo $image['image'];?>">
														Remove
													</a>
												</div>
										<?php 
													}
												endforeach;	
											} 
										?>
									</div>
								</div>

					         	<div class="row form-group">
						            <?php echo $form->labelEx($model,'description', array('class'=>'col-md-2 control-label text-left')); ?>
						            <div class="col-md-10">
						              <?php 
						              	 echo $form->textArea($model,'description',array(
						              	 		"class"=>"form-control",
						              	 		"placeholder"=>"Venue Description",
						              	 		"rows"=>5,
						              	 		"cols"=>60,
						              	 		"value"	=> $record['description']
						              	 		));
						             	 echo $form->error($model,'description');
						             ?>
						            </div>
					          </div>

							  <div class="row form-group">
					            <?php echo $form->labelEx($model,'venue_type', array('class'=>'col-md-2 control-label text-left')); ?>
					            <div class="col-md-4">
					              <?php 
					              	echo $form->dropDownList($model,'venue_type', array(
					              			''						=> '--select--',
					              			'Hotel Venue'			=> 'Hotel Venue',
					              			'Confrence Venue'		=> 'Confrence Venue',
					              			'Thetre Style Venue'	=> 'Thetre Style Venue',
					              			'Sport Venue'			=> 'Sport Venue',
					              			'Resturant Venue'		=> 'Resturant Venue',
					              			'Banqueting Venue'		=> 'Banqueting Venue',
					              			'Outdoor Venue'			=> 'Outdoor Venue',
					              			'Others'				=> 'Others'
					              			),array(
					              				'options'	=> array($record['venue_type']=>array('selected'=>true)),
					              				'class'		=> 'form-control'
					              			));
					              	echo $form->error($model,'venue_type');
					              ?>
					            </div>
					          </div>

					           <div class="row form-group">
					            <?php echo $form->labelEx($model,'zone', array('class'=>'col-md-2 control-label text-left')); ?>
					            <div class="col-md-4">
					               	<?php 
					                  echo $form->dropDownList($model, 'zone', CHtml::listData(Zones::model()->findAll(),'id','zone'),array(
					                  		'options'=>array($record['zone']=>array('selected'=>true)),
					                  		'empty'=>'-- select --',
					                  		'class'=>'form-control'
					                  		));
					                  echo $form->error($model,'zone');
        							?>
					            </div>
					          </div>

					           <div class="row form-group">
					            <?php echo $form->labelEx($model,'district', array('class'=>'col-md-2 control-label text-left')); ?>
					            <div class="col-md-4">
					              	<?php 
					                  echo $form->dropDownList($model, 'district', CHtml::listData(Districts::model()->findAll(),'id','district'),array(
					                  		'options'=>array($record['district']=>array('selected'=>true)),
					                  		'empty'=>'-- select --',
					                  		'class'=>'form-control'
					                  		));
					                  echo $form->error($model,'district');
              						?>
					            </div>
					          </div>

					           <div class="row form-group">
					            <?php echo $form->labelEx($model,'city_village', array('class'=>'col-md-2 control-label text-left')); ?>
					            <div class="col-md-4">
					                <?php echo $form->textField($model,'city_village', array(
					                	'class'=>'form-control', 
					                	'placeholder'=>'Location',
					                	'value'	=> $record['city_village']
					                	)); ?>
							        <?php echo $form->error($model,'city_village'); ?>
					            </div>
					          </div>

							  <div class="row form-group">
					            <?php echo $form->labelEx($model,'things_todo', array('class'=>'col-md-2 control-label text-left')); ?>
					            <div class="col-md-10">
					                <?php 
						              	 echo $form->textArea($model, 'things_todo',array(
						              	 	"class"=>"form-control",
						              	 	"placeholder"=>"Things to do",
						              	 	"rows"=>5,
						              	 	"cols"=>60,
						              	 	'value'	=> $record['things_todo']
						              	 	));
						             	 echo $form->error($model,'things_todo');
						            ?>
					            </div>
          					  </div>

						      <!-- Address and Map -->
						        <div class="panel panel-default">
							        <div class="panel-heading">
							        	<strong>Map Address</strong>
							        </div>
							        <div style="margin-bottom: 0px;" class="well well-sm">
								        <div class="col-md-6 form-horizontal">
								        <table class="table">
									        <tbody>
									        	<tr>
										        <td>
										        	<?php echo $form->labelEx($model,'addressonmap'); ?>
										       	</td>
										        <td>
										       		<?php 
										       			  echo $form->textField($model,'addressonmap', array(
										       			  	'class'=>'form-control', 
										       			  	'placeholder'=>'Address on map',
										       			  	'value'	=> $record['addressonmap']
										       			  	));
							        					  echo $form->error($model,'addressonmap');
							        				?>
										        </td>
									        </tr>
									        <tr>
										        <td>
										        	<?php echo $form->labelEx($model,'latitude'); ?>
										        </td>
										        <td>
										        	<?php 
										       			  echo $form->textField($model,'latitude', array(
										       			  	'class'=>'form-control',
										       			  	'placeholder'=>'Latitude',
										       			  	'value'	=> $record['latitude']
										       			  	));
							        					  echo $form->error($model,'latitude');
							        				?>
										       </td>
									        </tr>
									        <tr>
										        <td>
										        	<?php echo $form->labelEx($model,'longitude'); ?>
										       	</td>
										        <td>
										        	<?php 
										       			  echo $form->textField($model,'longitude', array(
										       			  	'class'=>'form-control', 
										       			  	'placeholder'=>'Longitude',
										       			  	'value'	=> $record['longitude']
										       			  	));
							        					  echo $form->error($model,'longitude');
							        				?>
										        </td>
									        </tr>
									        </tbody>
								    	</table>

								        </div>
								        <div class="col-md-6">
									        <div class="thumbnail">
									        	<div style="height: 150px;" id="map-canvas"></div>
									        </div>
								        </div>
								        <div class="clearfix"></div>
							        </div>
						        </div>
						          <!-- Address and Map -->
		<div class="row">
			 <div class="col-md-12">

			 	<h3> Special For</h3>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<?php 
									$model3->specality = $venuespecality;
              						echo $form->checkBoxList($model3,'specality',CHtml::listData(Venuespecalities::model()->findAll(),'id','venuespecilaties')); 
              						echo $form->error($model3,'specality');
            					?>
							</div>
						</div>
					</div>

					<h4>Facilities</h4>
					<div class="row">
						<div class="col-md-4">
						<div class="form-group">
								<?php 
									$model2->facility = $venuefacility;
              						echo $form->checkBoxList($model2,'facility',CHtml::listData(Venuefacilities::model()->findAll(),'id','facility')); 
              						echo $form->error($model2,'facility');
        						?>
						</div>
					</div>
					</div>

					<h4>Policy</h4>
					<div class="row form-group">
			            <?php echo $form->labelEx($model,'terms_condition', array('class'=>'col-md-2 control-label text-left')); ?>
			            <div class="col-md-10">
			                <?php 
				              	 echo $form->textArea($model, 'terms_condition',array(
				              	 	"class"=>"form-control",
				              	 	"placeholder"=>"Terms and conditions",
				              	 	"rows"=>5,"cols"=>60,
				              	 	"value"	=> $record['terms_condition']
				              	 	));
				             	 echo $form->error($model,'terms_condition');
				            ?>
			            </div>
  					</div>

  					<h4>Contact Detalis</h4>
  					<div class="row form-group">
   						 <?php echo $form->labelEx($model,'phone1', array('class'=>'col-md-2 control-label text-left')); ?>
    					<div class="col-md-4">
   						   <?php 
   						   $this->widget("ext.maskedInput.MaskedInput", array(
	                          "model"         => $model,
	                          "name"          => "Venues[phone1]",
	                          "mask"          => '999-999-9999',
	                          "clientOptions" => array("autoUnmask"=> false), 
	                          "defaults"      => array("removeMaskOnSubmit"=>false),
	                          "value"         => $record["phone1"]
                    		));

				             	 echo $form->error($model,'phone1');
				            ?>
  						  </div>
					</div>

					<div class="row form-group">
   						 <?php echo $form->labelEx($model,'phone2', array('class'=>'col-md-2 control-label text-left')); ?>
    					<div class="col-md-4">
   						   <?php 
		   						   $this->widget("ext.maskedInput.MaskedInput", array(
			                          "model"         => $model,
			                          "name"          => "Venues[phone2]",
			                          "mask"          => '999-999-9999',
			                          "clientOptions" => array("autoUnmask"=> false), 
			                          "defaults"      => array("removeMaskOnSubmit"=>false),
			                          "value"         => $record["phone2"]
		                    		));

				             	 echo $form->error($model,'phone2');
				            ?>
  						  </div>
					</div>

					<div class="row form-group">
   						 <?php echo $form->labelEx($model,'fax', array('class'=>'col-md-2 control-label text-left')); ?>
    					<div class="col-md-4">
   						   <?php 
				              	 

   						    	$this->widget("ext.maskedInput.MaskedInput", array(
			                          "model"         => $model,
			                          "name"          => "Venues[fax]",
			                          "mask"          => '999-999-9999',
			                          "clientOptions" => array("autoUnmask"=> false), 
			                          "defaults"      => array("removeMaskOnSubmit"=>false),
			                          "value"         => $record["fax"]
		                    		));
   						   
				             	 echo $form->error($model,'fax');

				             	 echo $form->error($model,'fax');
				            ?>
  						  </div>
					</div>

        					
					<div class="row form-group">
   						 <?php echo $form->labelEx($model,'email', array('class'=>'col-md-2 control-label text-left')); ?>
    					<div class="col-md-4">
   						   <?php 
				              	

   						   $this->widget("ext.maskedInput.MaskedInput", array(
			                          "model"         => $model,
			                          "name"          => "Venues[email]",
			                          "clientOptions" => array("autoUnmask"=> false,"alias" =>  "email"), 
			                          "defaults"      => array("removeMaskOnSubmit"=>false),
			                          "value"         => $record["email"]
		                    		));
   						   
				             	 echo $form->error($model,'fax');


				             	 echo $form->error($model,'email');
				            ?>
  						  </div>
					</div>

					<div class="row form-group">
   						 <?php echo $form->labelEx($model,'fb_link', array('class'=>'col-md-2 control-label text-left')); ?>
    					<div class="col-md-4">
   						   <?php 
				              	 
   						   $this->widget("ext.maskedInput.MaskedInput", array(
			                          "model"         => $model,
			                          "name"          => "Venues[fb_link]",
			                          "clientOptions" => array("autoUnmask"=> false,"alias" =>  "url"), 
			                          "defaults"      => array("removeMaskOnSubmit"=>false),
			                          "value"         => $record["fb_link"]
		                    		));
				             	 echo $form->error($model,'fb_link');
				            ?>
  						  </div>
					</div>


					<div class="row form-group">
   						 <?php echo $form->labelEx($model,'weblink', array('class'=>'col-md-2 control-label text-left')); ?>
    					<div class="col-md-4">
   						   <?php 
				              	 $this->widget("ext.maskedInput.MaskedInput", array(
			                          "model"         => $model,
			                          "name"          => "Venues[weblink]",
			                          "clientOptions" => array("autoUnmask"=> false,"alias" =>  "url"), 
			                          "defaults"      => array("removeMaskOnSubmit"=>false),
			                          "value"         => $record["weblink"]
		                    		));
				             	 echo $form->error($model,'weblink');
				            ?>
  						  </div>
					</div>


					<div class="row form-group">
   						 <?php echo $form->labelEx($model,'contact_person', array('class'=>'col-md-2 control-label text-left')); ?>
    					<div class="col-md-4">
   						   <?php 
				              	 echo $form->textField($model, 'contact_person',array(
				              	 	"class"=>"form-control",
				              	 	"placeholder"=>"Contact Person",
				              	 	"value"	=> $record['contact_person']
				              	 	));
				             	 echo $form->error($model,'contact_person');
				            ?>
  						  </div>
					</div>

					<div class="row form-group">
   						 <?php echo $form->labelEx($model,'role', array('class'=>'col-md-2 control-label text-left')); ?>
    					<div class="col-md-4">
   						   <?php 
				              	 echo $form->textField($model, 'role',array(
				              	 	"class"=>"form-control",
				              	 	"placeholder"=>"Contact Person Role",
				              	 	"value"	=> $record['contact_person']
				              	 	));
				             	 echo $form->error($model,'role');
				            ?>
  						  </div>
					</div>

					<div class="row form-group">
   						 <?php echo $form->labelEx($model,'mobile_number', array('class'=>'col-md-2 control-label text-left')); ?>
    					<div class="col-md-4">
   						   <?php 
				              	
   						   		$this->widget("ext.maskedInput.MaskedInput", array(
			                          "model"         => $model,
			                          "name"          => "Venues[mobile_number]",
			                          "mask"          => '999-999-9999',
			                          "clientOptions" => array("autoUnmask"=> false), 
			                          "defaults"      => array("removeMaskOnSubmit"=>false),
			                          "value"         => $record["mobile_number"]
		                    	));

				             	 echo $form->error($model,'mobile_number');
				            ?>
  						  </div>
					</div>	

					<div class="row form-group">
    					<div class="col-md-4">
   						   <input type="hidden" name="old_image" value="<?php echo $record['image'];?>">
  						  </div>
					</div>


					 <p>
				 		<?php echo CHtml::submitButton('Save', array('id' => 'save'," class"=> "btn btn-primary btn-md pull-right")); ?>
					 </p>
			 </div>
		</div>
							</div>
							
						
							</div>
						</div>
					</div>
				</div><!--/.panel-->
			</div><!--/.col-->
		</div><!--/.row-->


		</section>
	</div>
	<?php $this->endWidget(); ?>

	<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: {lat: 27.7172, lng: 85.3240}, //default by Kathmandu
          zoom: 13
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('Venues_addressonmap'));

        var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
          }
           document.getElementById('Venues_latitude').value = place.geometry.location.lat();
           document.getElementById('Venues_longitude').value = place.geometry.location.lng();

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });
      }
    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKRk2kpaW-rI1Skd52q3HpSCq0QHbAx84&libraries=places&callback=initMap"
        async defer></script>