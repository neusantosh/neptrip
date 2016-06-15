<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'updatehotel_general',
    'enableClientValidation'=>true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
  'clientOptions'=>array(
    'validateOnSubmit'=>true,
  ),
)); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
    <div class="row">
      <ol class="breadcrumb">       <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg></a></li>
        
      </ol>
    </div><!--/.row-->
    <section>
    <div class="row">
    <h3>Add Your Hotel</h3>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body tabs">
            <div class="tab-content">
              <div id="tab1" class="tab-pane fade active in">
                <h4>General</h4>

      <div class="row form-group">
            <label class="col-md-2 control-label text-left">Status</label>
            <div class="col-md-4">
              <?php
                  echo $form->dropDownList($model,'status',array(
                  	''	=> '--select--',
                  	1 	=> 'Enabled',
                  	2 	=> 'Disabled'
                  ), array('options'=>array($record['status']=>array('selected'=>true)), 'class'=>'form-control'));
                  echo $form->error($model,'status');
              ?>
            </div>
          </div>

          <div class="row form-group">
            <label class="col-md-2 control-label text-left">Hotel Name</label>
            <div class="col-md-4">
              <?php 
                echo $form->textField($model,'hotel_name',array(
                	"class"=>"form-control",
                	"placeholder"=>"Hotel Name",
                	"value" => $record['hotel_name']
                	));
                echo $form->error($model,'hotel_name');
              ?>
            </div>
          </div>

           <div class="row form-group">
            <label class="col-md-2 control-label text-left">Stars</label>
            <div class="col-md-4">
               <?php
                  echo $form->dropDownList($model,'star_rating',array(
                      ''=>'--select--',
                      0 => 'No star Rating',
                      1=>'1',
                      2=>'2',
                      3=>'3',
                      4=>'4',
                      5=>'5',
                      ),array('options'=>array($record['star_rating']=>array('selected'=>true)), 'class'=>'form-control'));
                  echo $form->error($model,'star_rating');
              ?>
            </div>
          </div>

          	<div class="row form-group">
		    	<label class="col-md-2 control-label text-left">Image</label>
		        <div class="col-md-4">
				      <?php
				         echo $form->fileField($model,'hotel_image');
				      ?>
				      <p class="help-block">Upload Main Hotel Image.</p>
		        </div>
      		</div>


      		<div class="row form-group">
		    	<label class="col-md-2 control-label text-left"></label>
		        <div class="col-md-4">
				      <?php 
				      	if($record['hotel_image']!='' && file_exists('images/hotels/'.$record['hotel_image'])){
				      			$logourl = Yii::app()->baseUrl.'/images/hotels/'.$record['hotel_image'];
				      	}
                else{
				      		$logourl = '';
				      	}
                if($logourl !=''){
				      ?>
				      <div class="logoImageHolder">
				      	<image src="<?php echo $logourl;?>" width="150px" class="logo">
				      		<br/>
				      		<a href="javascript:void(0);" class="removelogo btn btn-danger" id="<?php echo $record['id'];?>" data-imagename="<?php echo $record['hotel_image'];?>" data-url="<?php echo Yii::app()->createUrl('hotels/removelogo');?>">
				      			Remove
				      		</a>

				      		<?php 
				      			echo $form->hiddenField($model,'hotel_image',array('class' => 'form-control', "value"=>$record['hotel_image']));
				      		?>
				      </div>
              <?php } ?>
		        </div>
      		</div>


		      <div class="row form-group">
		        <label class="col-md-2 control-label text-left">Gallery Images</label>
		                <div class="col-md-4">
		            <?php 
		            $this->widget('CMultiFileUpload', array(
		                      'name' => 'galleryimages',
		                      'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
		                      'duplicate' => 'Duplicate file!', // useful, i think
		                      'denied' => 'Invalid file type', // useful, i think
		                  ));
		                  ?>
		             <p class="help-block">Upload Images of your Hotel.</p>
		          </div>
		      </div>


          <div class="row form-group">
            <label class="col-md-2 control-label text-left"></label>
              <div class="col-md-10">
                <?php
                  if(!empty($hotel_images) && is_array($hotel_images)){
                    foreach($hotel_images as $hotel_image):
                      if($hotel_image['image']!='' && file_exists('images/hotels/gallery/'.$hotel_image['image'])){
                          $image = Yii::app()->baseUrl.'/images/hotels/gallery/'.$hotel_image['image'];
                      }else{
                          $image = '';
                      }
                        if($image!=''){
                ?>

                <div class="hotelimage_wrapper">
                  <img src="<?php echo $image;?>" width="150px" height="auto">
                  <br/>
                  <a href="javascript:void(0);" id="<?php echo $hotel_image['id'];?>" data-url="<?php echo Yii::app()->createUrl('hotels/removehotelgallery');?>" class="remove_hotelimage btn btn-danger">Remove</a>
                </div>
                <?php
                      }
                   endforeach;
                  }
                ?>
              </div>

          </div>



          <div class="row form-group">
            <label class="col-md-2 control-label text-left">Hotel Description</label>
            <div class="col-md-10">
              <?php 
              echo $form->textArea($model,'hotel_description',array("class"=>"form-control",'rows'=>5,'cols'=>60,"placeholder"=>"Hotel Description", "value"=>$record['hotel_description']));
              echo $form->error($model,'hotel_description');
              ?>
            </div>
          </div>


     <div class="row form-group">
            <label class="col-md-2 control-label text-left">Hotel Type</label>
            <div class="col-md-4">
		        <?php
		                echo $form->dropDownList($model,'hotel_type',array(
		                    ''        		=> '--select--',
		                    'Apartment'   	=> 'Apartment',
		                    'Hotel'     	=> 'Hotel',
		                    'Guest House' 	=> 'Guest House',
		                    'Motel'     	=> 'Motel',
		                    'Residence'   	=> 'Residence',
		                    'Resort'    	=> 'Resort',
		                    'Time Share'  	=> 'Time Share',
		                    'Extended Stay' => 'Extended Stay',
		                    'Villa'     	=> 'Villa',
		             ),array('options'=>array($record['hotel_type']=>array('selected'=>true)), 'class'=>'form-control'));
		             echo $form->error($model,'hotel_type');
		        ?>
            </div>
          </div>

           <div class="row form-group">
            <label class="col-md-2 control-label text-left">Zone</label>
            <div class="col-md-4">
                <?php 
                  echo $form->dropDownList($model, 'zone', CHtml::listData(Zones::model()->findAll(),'id','zone'),
                  	array(
                  			'options'=>array($record['zone']=>array('selected'=>true)),
                  			'empty'=>'-- select --',
                  			'class'=>'form-control'
                  	));
                  echo $form->error($model,'zone');
        ?>
            </div>
          </div>

           <div class="row form-group">
            <label class="col-md-2 control-label text-left">District</label>
            <div class="col-md-4">
             <?php 
                  echo $form->dropDownList($model, 'district', CHtml::listData(Districts::model()->findAll(),'id','district'),
                  	array(
                  		'options'=>array($record['district']=>array('selected'=>true)),
                  		'empty'=>'-- select --',
                  		'class'=>'form-control'
                  		));
                  echo $form->error($model,'district');
        ?>
            </div>
          </div>

           <div class="row form-group">
            <label class="col-md-2 control-label text-left">City/Village</label>
            <div class="col-md-4">
              <?php 
                echo $form->textField($model,'city_village',array("class"=>"form-control","placeholder"=>"City/village", "value"=>$record['city_village']));
              echo $form->error($model,'city_village');
              ?>
            </div>
          </div>

      <div class="row form-group">
            <label class="col-md-2 control-label text-left">Things to do</label>
            <div class="col-md-10">
              <?php 
                echo $form->textArea($model,'things_to_do',array(
                		"class"=>"form-control",
                		'rows'=>5,
                		'cols'=>60,
                		"placeholder"=>"Things to do",
                		"value"=>$record['things_to_do']
                		));
              echo $form->error($model,'things_to_do');
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
                    Address on Map
                  </td>
                  <td>
                    <?php 
                      echo $form->textField($model,'address_on_map',array('class' => 'form-control','placeholder'=>'Address on Map', "value"=>$record['address_on_map']));
                      echo $form->error($model,'address_on_map');
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    Latitude
                  </td>
                  <td>
                    <?php 
                      echo $form->textField($model,'latitude',array('class' => 'form-control','placeholder'=>'Latitude Coordinates',"value"=>$record['latitude']));
                      echo $form->error($model,'latitude');
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    Longitude
                  </td>
                  <td>
                    <?php 
                      echo $form->textField($model,'longitude',array('class' => 'form-control','placeholder'=>'Longitude Coordinates',"value"=>$record['longitude']));
                      echo $form->error($model,'longitude');
                    ?>
                  </td>
                </tr>
              </tbody>
          </table>
          </div>
          <div class="col-md-6">
            <div class="thumbnail">
              <div style="height: 250px;" id="map-canvas"></div>
            </div>
          </div>
          <div class="clearfix"></div>
          </div>
        </div>
      <!-- Address and Map -->

      <hr/>
        <h4>Facilities</h4>
        <hr/>
          <div class="facilities">
            <?php 
            $facilitiesmodel->facility = $hotel_facilities;
             echo $form->checkBoxList($facilitiesmodel,'facility',CHtml::listData(Facilities::model()->findAll(),'id','facility')); 
             echo $form->error($facilitiesmodel,'facility');
            ?>
          </div>

          <hr/>
             <h4>Policy</h4>
          <hr/>

          <div class="privacy_policy">
            <div class="row form-group">
                <label class="col-md-2 control-label text-left">Checkin Time</label>
                <div class="col-md-4">
                  <?php 
                  //echo $form->textField($model,'checkin_time',array("class"=>"form-control timepicker","placeholder"=>"Check in time","value"=>$record['checkin_time'])); 
                   $this->widget("ext.maskedInput.MaskedInput", array(
                                      "model" => $model,
                                      "name" => "Hotels[checkin_time]",
                                      "clientOptions" => array("autoUnmask"=> false,"alias" =>  "hh:mm"), 
                                      "defaults"=>array("removeMaskOnSubmit"=>false),
                                      "value" => $record['checkin_time']
                    ));
                  echo $form->error($model,'checkin_time');                
                ?>
                </div>
            </div>


             <div class="row form-group">
                <label class="col-md-2 control-label text-left">Checkout Time</label>
                <div class="col-md-4">
                  <?php 
                  //echo $form->textField($model,'checkout_time',array("class"=>"form-control","placeholder"=>"Check out time","value"=>$record['checkout_time']));
                   $this->widget("ext.maskedInput.MaskedInput", array(
                                      "model" => $model,
                                      "name" => "Hotels[checkout_time]",
                                      "clientOptions" => array("autoUnmask"=> false,"alias" =>  "hh:mm"), 
                                      "defaults"=>array("removeMaskOnSubmit"=>false),
                                      "value" => $record['checkout_time']
                    ));

                  echo $form->error($model,'checkout_time');
                  ?>
                </div>
            </div>
           

               <div class="row form-group">
                <label class="col-md-2 control-label text-left">Terms & Policy</label>
                <div class="col-md-10">
                  <?php 
                    echo $form->textArea($model,'terms_policy',array("class"=>"form-control",'rows'=>5,'cols'=>60, "placeholder"=>"Terms and condition","value"=>$record['terms_policy']));
                  echo $form->error($model,'terms_policy');
                  ?>
                </div>
            </div>
          </div>

          <hr/>
          <h4>Contact Details </h4>
          <hr/>

            <div class="row form-group">
                <label class="col-md-2 control-label text-left">Phone 1</label>
                <div class="col-md-4">
                  <?php 
                    //echo $form->textField($model,'phone1',array("class"=>"form-control","placeholder"=>"Phone Number","value"=>$record["phone1"]));
                  $this->widget("ext.maskedInput.MaskedInput", array(
                          "model"         => $model,
                          "name"          => "Hotels[phone1]",
                          "mask"          => '999-999-9999',
                          "clientOptions" => array("autoUnmask"=> false), 
                          "defaults"      =>array("removeMaskOnSubmit"=>false),
                          "value"=>$record["phone1"]
                          ));
                    echo $form->error($model,'phone1');
                  ?>
                </div>
            </div>


             <div class="row form-group">
                <label class="col-md-2 control-label text-left">Phone 2</label>
                <div class="col-md-4">
                  <?php 
                    //echo $form->textField($model,'phone2',array("class"=>"form-control","placeholder"=>"Alternative Phone Number","value"=>$record["phone2"]));
                    $this->widget("ext.maskedInput.MaskedInput", array(
                          "model"         => $model,
                          "name"          => "Hotels[phone2]",
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
                <label class="col-md-2 control-label text-left">Fax</label>
                <div class="col-md-4">
                  <?php 
                    //echo $form->textField($model,'fax_no',array("class"=>"form-control","placeholder"=>"Fax Number","value"=>$record["fax_no"]));
                  $this->widget("ext.maskedInput.MaskedInput", array(
                          "model"         => $model,
                          "name"          => "Hotels[fax_no]",
                          "mask"          => '999-999-9999',
                          "clientOptions" => array("autoUnmask"=> false), 
                          "defaults"      => array("removeMaskOnSubmit"=>false),
                          "value"         => $record["fax_no"]
                    ));

                    echo $form->error($model,'fax_no');
                  ?>
                </div>
            </div>


             <div class="row form-group">
                <label class="col-md-2 control-label text-left">Email</label>
                <div class="col-md-4">
                  <?php 
                    //echo $form->textField($model,'email',array("class"=>"form-control","placeholder"=>"Email Address","value"=>$record["email"]));
                    $this->widget("ext.maskedInput.MaskedInput", array(
                                      "model"         => $model,
                                      "name"          => "Hotels[email]",
                                      "clientOptions" => array("autoUnmask"=> false,"alias" =>  "email"), 
                                      "defaults"      =>array("removeMaskOnSubmit"=>false),
                                       "value"        => $record["email"]
                    ));

                    echo $form->error($model,'email');
                  ?>
                </div>
            </div>


            <div class="row form-group">
                <label class="col-md-2 control-label text-left">Facebook Url</label>
                <div class="col-md-4">
                  <?php 
                    //echo $form->textField($model,'facebook',array("class"=>"form-control","placeholder"=>"Facebook Url","value"=>$record["facebook"]));
                    $this->widget("ext.maskedInput.MaskedInput", array(
                                      "model"         => $model,
                                      "name"          => "Hotels[facebook]",
                                      "clientOptions" => array("autoUnmask"=> false,"alias" =>  "url"), 
                                      "defaults"      =>array("removeMaskOnSubmit"=>false),
                                       "value"        => $record["facebook"]
                    ));

                    echo $form->error($model,'facebook');
                  ?>
                </div>
            </div>


            <div class="row form-group">
                <label class="col-md-2 control-label text-left">Web</label>
                <div class="col-md-4">
                  <?php 
                    //echo $form->textField($model,'web_url',array("class"=>"form-control","placeholder"=>"Web Url","value"=>$record["web_url"]));
                      $this->widget("ext.maskedInput.MaskedInput", array(
                                      "model"         => $model,
                                      "name"          => "Hotels[web_url]",
                                      "clientOptions" => array("autoUnmask"=> false,"alias" =>  "url"), 
                                      "defaults"      =>array("removeMaskOnSubmit"=>false),
                                       "value"        => $record["web_url"]
                      ));
                    echo $form->error($model,'web_url');
                  ?>
                </div>
            </div>


            <div class="row form-group">
                <label class="col-md-2 control-label text-left">Contact Person</label>
                <div class="col-md-4">
                  <?php 
                    echo $form->textField($model,'contact_person',array("class"=>"form-control","placeholder"=>"Whom to contact","value"=>$record["contact_person"]));
                  echo $form->error($model,'contact_person');
                  ?>
                </div>
            </div>


             <div class="row form-group">
                <label class="col-md-2 control-label text-left">Contact Person Role</label>
                <div class="col-md-4">
                  <?php 
                    echo $form->textField($model,'role',array("class"=>"form-control","placeholder"=>"His Role in Company","value"=>$record["role"]));
                  echo $form->error($model,'role');
                  ?>
                </div>
            </div>


            <div class="row form-group">
                <label class="col-md-2 control-label text-left">Mobile Number</label>
                <div class="col-md-4">
                  <?php 
                    //echo $form->textField($model,'mobile_number',array("class"=>"form-control","placeholder"=>"Mobile no. of contact person","value"=>$record["mobile_number"]));
                    $this->widget("ext.maskedInput.MaskedInput", array(
                          "model"         => $model,
                          "name"          => "Hotels[mobile_number]",
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
                <label class="col-md-2 control-label text-left"></label>
                <div class="col-md-4">
                  <input type="hidden" name="old_image" value="<?php echo $record['hotel_image'];?>">
                </div>
            </div>


      <div class="row">
       <div class="col-md-12">
       <p>
          <?php echo CHtml::submitButton('Save', array('class'=>'btn btn-primary btn-md pull-right')); ?>

       </p>
       </div>
       <hr/>

      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
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
            document.getElementById('Hotels_address_on_map'));

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
           document.getElementById('Hotels_latitude').value = place.geometry.location.lat();
           document.getElementById('Hotels_longitude').value = place.geometry.location.lng();

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