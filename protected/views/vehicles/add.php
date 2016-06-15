  <?php /** @var BootActiveForm $form */
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'add_vehicle',
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
			<h3>Add Your Vehicle</h3>

		</div>

		  <div class="row form-group">
            <?php echo $form->labelEx($model,'status', array('class'=>'col-md-2 control-label text-left')); ?>
            <div class="col-md-4">
              <?php 
                  echo $form->dropDownList($model,'status', array(''=>'--select--',1=>'Enabled',2=>'Disabled'), array('class'=>'form-control'));
                  echo $form->error($model,'status');
              ?>
            </div>
          </div>
          <div class="row form-group">
            <?php echo $form->labelEx($model,'car_name', array('class'=>'col-md-2 control-label text-left')); ?>
            <div class="col-md-4">
             <?php 
                  echo $form->textField($model,'car_name', array('class'=>'form-control','placeholder'=>'Car Name'));
                  echo $form->error($model,'car_name');
              ?>
            </div>
          </div>

          <div class="row form-group">
            <?php echo $form->labelEx($model,'car_description', array('class'=>'col-md-2 control-label text-left')); ?>
            <div class="col-md-10">
              <?php 
                  echo $form->textArea($model, 'car_description',array("class"=>"form-control","placeholder"=>"Car Description","rows"=>5,"cols"=>60));
                  echo $form->error($model,'car_description');
              ?>
            </div>
          </div>

          <div class="row form-group">
            <?php echo $form->labelEx($model,'image', array('class'=>'col-md-2 control-label text-left')); ?>
            <div class="col-md-10">
              <div class="col-md-6">
                      <?php
                          echo $form->fileField($model,'image');
                          echo $form->error($model,'image');
                        ?>
                       <p class="help-block">Upload Main tour Image.</p>
               </div>
            </div>
          </div>


          <div class="row form-group">
             <?php echo $form->labelEx($model,'passenger', array('class'=>'col-md-2 control-label text-left')); ?>
              <div class="col-md-4">
              <?php 
                  echo $form->dropDownList($model,'passenger', array(
                    ''  => '--select--',
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,
                    8 => 8,
                    9 => 9,
                    10 => 10,
                    ), array('class'=>'form-control'));
                  echo $form->error($model,'passenger');
              ?>
              </div>
            </div>

          <div class="row form-group">
               <?php echo $form->labelEx($model,'car_door', array('class'=>'col-md-2 control-label text-left')); ?>
                <div class="col-md-4">
                  <?php 
                  echo $form->dropDownList($model,'car_door', array(
                    ''  => '--select--',
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    ), array('class'=>'form-control'));
                  echo $form->error($model,'car_door');
              ?>
                </div>
          </div>


              <div class="row form-group">
              <?php echo $form->labelEx($model,'transmission', array('class'=>'col-md-2 control-label text-left')); ?>
            <div class="col-md-4">
                 <?php 
                  echo $form->dropDownList($model,'transmission', array(
                    ''      => '--select--',
                    'Auto'  => 'Auto',
                    'Manual'  => 'Manual',
                    'Other'  => 'Other'
                    ), array('class'=>'form-control'));
                  echo $form->error($model,'transmission');
              ?>
            </div>
            </div>

             <div class="row form-group">
              <?php echo $form->labelEx($model,'baggage', array('class'=>'col-md-2 control-label text-left')); ?>
                <div class="col-md-4">
                    <?php 
                      echo $form->dropDownList($model,'baggage', array(
                        ''  => '--select--',
                        'x1'=> 'x1',
                        'x2'=> 'x2',
                        'x3'=> 'x3',
                        'x4'=> 'x4',
                        'x5'=> 'x5',
                        'x6'=> 'x6'
                        ), array('class'=>'form-control'));
                      echo $form->error($model,'baggage');
                    ?>
                </div>
            </div>

            <div class="row form-group">
             <?php echo $form->labelEx($model,'airport_pickup', array('class'=>'col-md-2 control-label text-left')); ?>
            <div class="col-md-4">
              <?php 
                      echo $form->dropDownList($model,'airport_pickup', array(
                        ''  => '--select--',
                        1 => 'Yes',
                        0 => 'No'
                        ), array('class'=>'form-control'));
                      echo $form->error($model,'airport_pickup');
                    ?>
            </div>

              <div class="row form-group">
                 <?php echo $form->labelEx($model,'car_type', array('class'=>'col-md-2 control-label text-left')); ?>
                <div class="col-md-4">
                  <?php 
                          echo $form->dropDownList($model,'car_type', array(
                            ''  => '--select--',
                            'Van' => 'Van',
                            'Luxury' => 'Luxury',
                            'Fullsize' => 'Fullsize',
                            'Standard' => 'Standard',
                            'Compact' => 'Compact',
                            'Economy' => 'Economy',
                            'Mini' => 'Mini'
                            ), array('class'=>'form-control'));
                          echo $form->error($model,'car_type');
                        ?>
                </div>
              </div>

            <div class="row form-group">
                <?php echo $form->labelEx($model,'pick_up_location', array('class'=>'col-md-2 control-label text-left')); ?>
                <div class="col-md-4">
                  <?php 
                    echo $form->textField($model,'pick_up_location', array('class'=>'form-control','placeholder'=>'Pickup Location'));
                    echo $form->error($model,'pick_up_location');
                  ?>
                </div>

                <?php echo $form->labelEx($model,'drop_off_location', array('class'=>'col-md-2 control-label text-left')); ?>
                <div class="col-md-4">
                  <?php 
                      echo $form->textField($model,'drop_off_location', array('class'=>'form-control','placeholder'=>'Dropoff Location'));
                      echo $form->error($model,'drop_off_location');
                  ?>
                </div>
            </div>

            <div class="row form-group">

              <?php echo $form->labelEx($model,'price', array('class'=>'col-md-2 control-label text-left')); ?>
                <div class="col-md-4">
                  <?php 
                      echo $form->textField($model,'price', array('class'=>'form-control','placeholder'=>'Price'));
                      echo $form->error($model,'price');
                  ?>
                </div>

            </div>
     		
         		 <div class="row form-group">
               <?php echo $form->labelEx($model,'terms_and_condition  ', array('class'=>'col-md-2 control-label text-left')); ?>
                <div class="col-md-10">
                  <?php 
                  echo $form->textArea($model, 'terms_and_condition',array("class"=>"form-control","placeholder"=>"Terms and condition","rows"=>5,"cols"=>60));
                  echo $form->error($model,'terms_and_condition');
              ?>
                </div>
              </div>

           <h4>Contact Detalis</h4>
								 <div class="row form-group">
                    <?php echo $form->labelEx($model,'phone_1  ', array('class'=>'col-md-2 control-label text-left')); ?>
                    <div class="col-md-4">
                      <?php 
                            $this->widget("ext.maskedInput.MaskedInput", array(
                                      "model" => $model,
                                      "attribute" => "phone_1",
                                      "mask" => '999-999-9999',
                                      "clientOptions" => array("autoUnmask"=> false), 
                                      "defaults"=>array("removeMaskOnSubmit"=>false),
                            ));
                          echo $form->error($model,'phone_1');
                      ?>
                    </div>
                  </div>

        				<div class="row form-group">
                    <?php echo $form->labelEx($model,'phone_2  ', array('class'=>'col-md-2 control-label text-left')); ?>
                    <div class="col-md-4">
                      <?php 
                      $this->widget("ext.maskedInput.MaskedInput", array(
                                      "model" => $model,
                                      "attribute" => "phone_2",
                                      "mask" => '999-999-9999',
                                      "clientOptions" => array("autoUnmask"=> false), 
                                      "defaults"=>array("removeMaskOnSubmit"=>false),
                            ));
                          echo $form->error($model,'phone_2');
                      ?>
                    </div>
                  </div>


        					<div class="row form-group">
                    <?php echo $form->labelEx($model,'fax  ', array('class'=>'col-md-2 control-label text-left')); ?>
                    <div class="col-md-4">
                      <?php 
                          //echo $form->textField($model,'fax', array('class'=>'form-control','placeholder'=>'Fax'));
                            $this->widget("ext.maskedInput.MaskedInput", array(
                                      "model" => $model,
                                      "attribute" => "fax",
                                      "mask" => '999-999-9999',
                                      "clientOptions" => array("autoUnmask"=> false), 
                                      "defaults"=>array("removeMaskOnSubmit"=>false),
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
                                      "attribute" => "email",
                                      "clientOptions" => array("autoUnmask"=> false, "alias" =>  "email"), 
                                      "defaults"=>array("removeMaskOnSubmit"=>false),
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
                                      "attribute" => "facebook",
                                      "clientOptions" => array("autoUnmask"=> false, "alias" =>  "url"), 
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
                                      "attribute" => "web",
                                      "clientOptions" => array("autoUnmask"=> false, "alias" =>  "url"), 
                                      "defaults"=>array("removeMaskOnSubmit"=>false),
                                ));
                          echo $form->error($model,'web');
                      ?>
                    </div>
                  </div>


        					<div class="row form-group">
                    <?php echo $form->labelEx($model,'contact_person', array('class'=>'col-md-2 control-label text-left')); ?>
                    <div class="col-md-4">
                      <?php 
                          echo $form->textField($model,'contact_person', array('class'=>'form-control','placeholder'=>'Contact Person'));
                          echo $form->error($model,'contact_person');
                      ?>
                    </div>
                  </div>

                  <div class="row form-group">
                    <?php echo $form->labelEx($model,'role', array('class'=>'col-md-2 control-label text-left')); ?>
                    <div class="col-md-4">
                      <?php 
                          echo $form->textField($model,'role', array('class'=>'form-control','placeholder'=>'Contact Person Role'));
                          echo $form->error($model,'role');
                      ?>
                    </div>
                  </div>

        					<div class="row form-group">
                    <?php echo $form->labelEx($model,'mobile_number', array('class'=>'col-md-2 control-label text-left')); ?>
                    <div class="col-md-4">
                      <?php 
                          //echo $form->textField($model,'mobile_number', array('class'=>'form-control','placeholder'=>'Mobile Number'));
                           $this->widget("ext.maskedInput.MaskedInput", array(
                                "model"         => $model,
                                "attribute"     => "mobile_number",
                                "mask"          => '999-999-9999',
                                "clientOptions" => array("autoUnmask"=> false), 
                                "defaults"      => array("removeMaskOnSubmit"=>false),
                                
                            ));
                          echo $form->error($model,'mobile_number');
                      ?>
                    </div>
                  </div>

        					<!-- Address and Map -->

        <?php /* <div class="panel panel-default">
        <div class="panel-heading"><strong>Map Address</strong></div>
        <div style="margin-bottom: 0px;" class="well well-sm">
        <div class="col-md-6 form-horizontal">
        <table class="table">
        <tbody><tr>
        <td>Address on Map</td>
        <td>
       <input type="text" placeholder="location" value="" name="hotelmapaddress" id="mapaddress" class="form-control Places">
        </td>
        </tr>
        <tr>
        
        </tr>
        <tr>
        <td>Latitude</td>
        <td><input type="text" placeholder="latitude points" name="latitude" value="" id="latitude" class="form-control"></td>
        </tr>
        <tr>
        <td>Longitude</td>
        <td><input type="text" placeholder="longitude points" name="longitude" value="" id="longitude" class="form-control"></td>
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
          <!-- Address and Map --> */?>

        						<div class="row">
                  		 <div class="col-md-12">
                  		 <p>
                         <?php echo CHtml::submitButton('Save', array('id' => 'save'," class"=> "btn btn-primary btn-md pull-right")); ?>
                      </p>
                  		</div>
                    </div>
              </div>
            </section>				
	
	</div>
<?php $this->endWidget(); ?>

 <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function init() {
        var autocomplete  = new google.maps.places.Autocomplete(document.getElementById('Vehicles_pick_up_location'));
        var autocomplete1 = new google.maps.places.Autocomplete(document.getElementById('Vehicles_drop_off_location'));
      }
    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKRk2kpaW-rI1Skd52q3HpSCq0QHbAx84&libraries=places&callback=init"
        async defer></script>
