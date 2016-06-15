<?php /** @var BootActiveForm $form */
  $form = $this->beginWidget('CActiveForm', array(
      'id'                      => 'end_tour',
      'enableClientValidation'  => true,
      'htmlOptions'             => array('enctype' => 'multipart/form-data'),
      'clientOptions'             => array(
        'validateOnSubmit'=>true,
      ),
  )); 
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg></a></li>
				
			</ol>
		</div><!--/.row-->
		<section>
		

		<div class="row">
		<h3>Edit Your Tour</h3>
		</div>
		
			<div class="row form-group">
            <?php echo $form->labelEx($model,'status', array('class'=>'col-md-2 control-label text-left')); ?>
            <div class="col-md-4">
             <?php 
                  echo $form->dropDownList($model,'status', array(''=>'--select--',1=>'Enabled',2=>'Disabled'), array(
                    'options' => array($record['status']=>array('selected'=>true)),
                    'class'=>'form-control'
                    ));
                  echo $form->error($model,'status');
              ?>
            </div>
          </div>
          <div class="row form-group">
              <?php echo $form->labelEx($model,'business_name', array('class'=>'col-md-2 control-label text-left')); ?>
            <div class="col-md-4">
               <?php 
                  echo $form->textField($model,'business_name', array(
                    'class'=>'form-control',
                    'placeholder'=>'Business Name',
                    'value'     => $record['business_name']
                    ));
                  echo $form->error($model,'business_name');
              ?>
            </div>
          </div>

           <div class="row form-group">
            <?php echo $form->labelEx($model,'tour_name', array('class'=>'col-md-2 control-label text-left')); ?>
            <div class="col-md-4">
               <?php 
                  echo $form->textField($model,'tour_name', array(
                    'class'       =>'form-control',
                    'placeholder' =>'Tour Name',
                    'value'       => $record['tour_name']
                    ));
                  echo $form->error($model,'tour_name');
              ?>
            </div>
          </div>

          
          <div class="row form-group">
        		<?php echo $form->labelEx($model,'image', array('class'=>'col-md-2 control-label text-left')); ?>
              <div class="col-md-6">
  									<?php
                        echo $form->fileField($model,'image');
                        echo $form->error($model,'image');
                      ?>
  									 <p class="help-block">Upload Main tour Image.</p>
  			     </div>
			    </div>

           <div class="row form-group">
            <div class="col-md-2 control-label text-left"></div>
              <div class="col-md-6">
                   <?php if($record['image']!='' && file_exists('images/tours/'.$record['image'])){
                      $image_url = Yii::app()->baseUrl.'/images/tours/'.$record['image'];
                    ?>
                      <div class="tourlogo">
                        <img src="<?php echo $image_url;?>" width="150px"/>
                        <br/>
                        <a href="javascript:void(0);" data-id="<?php echo $record['id'];?>" data-url="<?php echo Yii::app()->createUrl('tours/deletetourlogo');?>" data-imagename="<?php echo $record['image'];?>" class="btn btn-danger remove_tourlogo">
                          Remove
                        </a>
                      </div>
                  <?php } ?>
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
                                echo $form->error($model,'image');
                            ?>
        									 <p class="help-block">Upload Images of your tours.</p>
        				</div>
        			</div>

              <div class="row form-group">
                <div class="col-md-2 control-label text-left"></div>
                  <div class="col-md-6">
                       <?php 
                         if(!empty($galleryimages) && is_array($galleryimages)){
                            foreach($galleryimages as $galleryimage):
                              if($galleryimage['image']!='' && file_exists('images/tours/gallery/'.$galleryimage['image'])){
                                $image_url = Yii::app()->baseUrl.'/images/tours/gallery/'.$galleryimage['image'];
                        ?>
                          <div class="galleryimage">
                            <img src="<?php echo $image_url;?>" width="150px"/>
                            <br/>
                            <a href="javascript:void(0);" data-id="<?php echo $galleryimage['id'];?>" data-url="<?php echo Yii::app()->createUrl('tours/deletetourimage');?>" data-imagename="<?php echo $galleryimage['image'];?>" class="btn btn-danger remove_tourgallery">
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
            <?php echo $form->labelEx($model,'tour_description', array('class'=>'col-md-2 control-label text-left')); ?> 
            <div class="col-md-10">
               <?php 
                  echo $form->textArea($model,'tour_description', array(
                      'class'       => 'form-control',
                      'placeholder' => 'Tour Name',
                      "rows"        => 5,
                      "cols"        => 60,
                      'value'       => $record['tour_description']
                    ));
                  echo $form->error($model,'tour_description');
              ?>
            </div>
          </div>


		 <div class="row form-group">
            <?php echo $form->labelEx($model,'type', array('class'=>'col-md-2 control-label text-left')); ?>
            <div class="col-md-4">
              <?php 
                  echo $form->dropDownList($model,'type', array(''=>'--select--',
                    'Adventure'     => 'Adventure',
                    'Classic'       => 'Classic',
                    'Treaking'      => 'Treaking',
                    'Site Seeing'   => 'Site Seeing',
                    'Voluntourism'  => 'Voluntourism',
                    'Others'        => 'Others'
                    ), array(
                      'class'   =>'form-control',
                      'options' => array($record['type']=>array('selected'=>true))
                    ));
                  echo $form->error($model,'type');
              ?>
            </div>
          </div>

           <div class="row form-group">
                      <?php echo $form->labelEx($model,'zone', array('class'=>'col-md-2 control-label text-left')); ?>
                      <div class="col-md-4">
                          <?php 
                            echo $form->dropDownList($model, 'zone', CHtml::listData(Zones::model()->findAll(),'id','zone'),array(
                              'empty'   => '-- select --',
                              'class'   => 'form-control',
                              'options' => array($record['zone']=>array('selected'=>true))
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
                              'empty'   => '-- select --',
                              'class'   => 'form-control',
                              'options' => array($record['district']=>array('selected'=>true))
                              ));
                            echo $form->error($model,'district');
                          ?>
                      </div>
                    </div>

                    <div class="row form-group">
                      <?php echo $form->labelEx($model,'city_village', array('class'=>'col-md-2 control-label text-left')); ?>
                      <div class="col-md-4">
                          <?php echo $form->textField($model,'city_village', array(
                                'class'       => 'form-control',
                                'placeholder' => 'Location',
                                'value'       =>  $record['city_village']
                                )); ?>
                      <?php echo $form->error($model,'city_village'); ?>
                      </div>
                    </div>

                  <div class="row form-group">
                      <?php echo $form->labelEx($model,'package_price', array('class'=>'col-md-2 control-label text-left')); ?>
                      <div class="col-md-4">
                        <?php echo $form->textField($model,'package_price', array(
                          'class'       => 'form-control',
                          'placeholder' => 'Pacakage Price',
                          'value'       =>  $record['package_price']
                        )); ?>
                        <?php echo $form->error($model,'package_price'); ?>
                      </div>
                  </div>

                  <div class="row form-group">
                      <?php echo $form->labelEx($model,'things_to_do', array('class'=>'col-md-2 control-label text-left')); ?>
                      <div class="col-md-10">
                          <?php 
                             echo $form->textArea($model, 'things_to_do',array(
                                "class"       => "form-control",
                                "placeholder" => "Things to do",
                                "rows"        => 5,
                                "cols"        => 60,
                                'value'       =>  $record['things_to_do']
                              ));
                           echo $form->error($model,'things_to_do');
                        ?>
                      </div>
                  </div>

                <div class="row form-group">
                      <?php echo $form->labelEx($model,'terms_and_policy', array('class'=>'col-md-2 control-label text-left')); ?>
                      <div class="col-md-10">
                          <?php 
                             echo $form->textArea($model, 'terms_and_policy',array(
                                "class"       => "form-control",
                                "placeholder" => "Terms and condition",
                                "rows"        => 5,
                                "cols"        => 60,
                                'value'       => $record['terms_and_policy']
                              ));
                           echo $form->error($model,'terms_and_policy');
                        ?>
                      </div>
                </div>


          <h4>Contact Detalis</h4>
								<div class="row form-group">
           						 <?php echo $form->labelEx($model,'phone_1', array('class'=>'col-md-2 control-label text-left')); ?>
            					<div class="col-md-4">
           						   <?php 
                              $this->widget("ext.maskedInput.MaskedInput", array(
                                    "model" => $model,
                                    "name" => "Tours[phone_1]",
                                    "mask" => '999-999-9999',
                                    "clientOptions" => array("autoUnmask"=> false), 
                                    "defaults"=>array("removeMaskOnSubmit"=>false),
                                    "value"  => $record['phone_1']
                                    ));
                        ?>
                        <?php echo $form->error($model,'phone_1'); ?>
          						</div>
        				</div>

        					<div class="row form-group">
                       <?php echo $form->labelEx($model,'phone_2', array('class'=>'col-md-2 control-label text-left')); ?>
                      <div class="col-md-4">
                        <?php 
                              $this->widget("ext.maskedInput.MaskedInput", array(
                                    "model" => $model,
                                    "name" => "Tours[phone_2]",
                                    "mask" => '999-999-9999',
                                    "clientOptions" => array("autoUnmask"=> false), 
                                    "defaults"=>array("removeMaskOnSubmit"=>false),
                                    "value"  => $record['phone_2']
                                    ));
                        ?>
                        <?php echo $form->error($model,'phone_2'); ?>
                      </div>
                </div>

        					<div class="row form-group">
                     <?php echo $form->labelEx($model,'fax', array('class'=>'col-md-2 control-label text-left')); ?>
                      <div class="col-md-4">
                         <?php 
                              $this->widget("ext.maskedInput.MaskedInput", array(
                                    "model" => $model,
                                    "name" => "Tours[fax]",
                                    "mask" => '999-999-9999',
                                    "clientOptions" => array("autoUnmask"=> false), 
                                    "defaults"=>array("removeMaskOnSubmit"=>false),
                                    "value"  => $record['fax']
                                    ));
                              echo $form->error($model,'fax');
                            ?>
                    </div>
                  </div>

        					<div class="row form-group">
                     <?php echo $form->labelEx($model,'email', array('class'=>'col-md-2 control-label text-left')); ?>
                      <div class="col-md-4">
                         <?php 
                             $this->widget("ext.maskedInput.MaskedInput", array(
                                "model" => $model,
                                "name" => "Tours[email]",
                                "clientOptions" => array("alias" =>  "email","autoUnmask"=> false),
                                "defaults"=>array("removeMaskOnSubmit"=>false),
                                "value"  => $record['email']
                            ));
                              echo $form->error($model,'email');
                            ?>
                    </div>
                  </div>


        					<div class="row form-group">
                     <?php echo $form->labelEx($model,'facebook', array('class'=>'col-md-2 control-label text-left')); ?>
                      <div class="col-md-4">
                         <?php 
                               $this->widget("ext.maskedInput.MaskedInput", array(
                                "model" => $model,
                                "name" => "Tours[facebook]",
                                "clientOptions" => array("alias" =>  "url","autoUnmask"=> true),
                                "value"  => $record['facebook'],
                                 "defaults"=>array("removeMaskOnSubmit"=>false),
                              ));
                              echo $form->error($model,'facebook');
                            ?>
                    </div>
                  </div>


        					<div class="row form-group">
                     <?php echo $form->labelEx($model,'web', array('class'=>'col-md-2 control-label text-left')); ?>
                      <div class="col-md-4">
                         <?php 
                              $this->widget("ext.maskedInput.MaskedInput", array(
                                "model" => $model,
                                "name" => "Tours[web]",
                                "clientOptions" => array("alias" =>  "url","autoUnmask"=> true),
                                "defaults"=>array("removeMaskOnSubmit"=>false),
                                "value"  => $record['web']
                              ));
                              echo $form->error($model,'web');
                            ?>
                    </div>
                  </div>

        					<div class="row form-group">
           						  <?php echo $form->labelEx($model,'contact_person', array('class'=>'col-md-2 control-label text-left')); ?>
            					<div class="col-md-4">
           						   <?php 
                              echo $form->textField($model, 'contact_person',array(
                                  "class"       => "form-control",
                                  "placeholder" => "Contact Person",
                                  "value"       => $record['contact_person']
                                ));
                              echo $form->error($model,'contact_person');
                            ?>
          						  </div>
        					</div>

        					<div class="row form-group">
           						 <?php echo $form->labelEx($model,'contact_person_role', array('class'=>'col-md-2 control-label text-left')); ?>
            					<div class="col-md-4">
           						   <?php 
                              echo $form->textField($model, 'contact_person_role',array(
                                "class"       => "form-control",
                                "placeholder" => "Contact Person Role",
                                "value"       => $record['contact_person_role']
                                ));
                              echo $form->error($model,'contact_person_role');
                          ?>
          						  </div>
        					</div>

        					<div class="row form-group">
           						  <?php echo $form->labelEx($model,'mobile_number', array('class'=>'col-md-2 control-label text-left')); ?>
            					<div class="col-md-4">
           						    <?php 
                              $this->widget("ext.maskedInput.MaskedInput", array(
                                    "model" => $model,
                                    "name" => "Tours[mobile_number]",
                                    "mask" => '999-999-9999',
                                    "clientOptions" => array("autoUnmask"=> false), 
                                    "defaults"=>array("removeMaskOnSubmit"=>false),
                                    "value"  => $record['mobile_number']
                                    ));
                              echo $form->error($model,'mobile_number');
                          ?>
          						  </div>
        					</div>

                  <div class="row form-group">
                      <div class="col-md-4">
                           <input type="hidden" class="form-controls" name="old_image" value="<?php echo $record['image'];?>">
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
                        <?php echo $form->labelEx($model,'address_on_map', array('class'=>'col-md-2 control-label text-left')); ?>
                      </td>
                      <td>
                           <?php 
                              echo $form->textField($model, 'address_on_map',array(
                                  "class"       => "form-control",
                                  "placeholder" => "Address on Map",
                                  "value"       => $record['address_on_map']
                                  ));
                              echo $form->error($model,'address_on_map');
                          ?>
                      </td>
                  </tr>
                  
                  <tr>
                      <td>
                        <?php echo $form->labelEx($model,'latitude', array('class'=>'col-md-2 control-label text-left')); ?>
                      </td>
                      <td>
                        <?php 
                              echo $form->textField($model, 'latitude',array(
                                "class"       =>"form-control",
                                "placeholder" =>"Latitude",
                                "value"       => $record['latitude']
                                ));
                              echo $form->error($model,'latitude');
                        ?>
                      </td>
                  </tr>
                  <tr>
                    <td>
                      <?php echo $form->labelEx($model,'longitude', array('class'=>'col-md-2 control-label text-left')); ?>
                    </td>
                    <td>
                      <?php 
                            echo $form->textField($model, 'longitude',array(
                              "class"         => "form-control",
                              "placeholder"   => "Longitude",
                              "value"       => $record['longitude']
                              ));
                            echo $form->error($model,'longitude');
                      ?>
                    </td>
                  </tr>
                  </tbody></table>

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
      		 <p>
              <?php echo CHtml::submitButton('Save', array('id' => 'save'," class"=> "btn btn-primary btn-md pull-right")); ?>
            </p>
      		</div>
      </div>
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
            document.getElementById('Tours_address_on_map'));

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
           document.getElementById('Tours_latitude').value = place.geometry.location.lat();
           document.getElementById('Tours_longitude').value = place.geometry.location.lng();

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