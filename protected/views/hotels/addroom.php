<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'hotel_addroom',
    'enableClientValidation'=>true,
    'enableAjaxValidation'=>false,
    //'action' => Yii::app()->createAbsoluteUrl('/hotels/test'),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'clientOptions'=>array(
    'validateOnSubmit'=>true,
  ),
)); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li>
          <a href="#"><svg class="glyph stroked home">
            <use xlink:href="#stroked-home"></use></svg>
         </a>
      </li>
				
			</ol>
		</div><!--/.row-->
		<section>
		<h3>Add Rooms</h3>

		<div class="row form-group">
                        <label class="col-md-2 control-label text-left">
                          Status
                        </label>
                        <div class="col-md-6">
                            <?php
                              echo $form->dropDownList($model,'status',array(
                                  ''=>'--select--',1=>'Enabled',2=>'Disabled'
                                  ), array('class'=>'form-control'));
                            ?>
                        </div>
                     </div>
                    <div class="row form-group">
                        <label class="col-md-2 control-label text-left">Room Name</label>
                        <div class="col-md-6">
                        <?php
                              echo $form->textField($model,'name', array('class'=>'form-control','placeholder'=> 'Room Name'));
                              echo $form->error($model,'name');
                        ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-2 control-label text-left">Room Description</label>
                        <div class="col-md-6">
                          <?php
                              echo $form->textArea($model,'description', array('class'=>'form-control', 'rows'=>'8','cols'=>'60', 'placeholder'=> 'Room Description'));
                              echo $form->error($model,'description');
                        ?>
                        </div>
                    </div>
                            
                	<div class="row form-group">
                		<label class="col-md-2 control-label text-left">Gallery Images</label>
                            <div class="col-md-6">
                                  <?php 
                                    $this->widget('CMultiFileUpload', array(
                                      'name' => 'images',
                                      'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                                      'duplicate' => 'Duplicate file!', // useful, i think
                                      'denied' => 'Invalid file type', // useful, i think
                                    ));
                                    ?>
                									<p class="help-block">Upload Images of your Rooms.</p>
                				</div>
                			</div>

                        
                    <div class="row form-group">
                        <label class="col-md-2 control-label text-left">Price</label>
                        <div class="col-md-6">
								        <?php
                              echo $form->textField($model,'price', array('class'=>'form-control','placeholder'=> 'Room Price'));
                              echo $form->error($model,'price');
                        ?>
                        </div>
                     </div>
                     <div class="row form-group">
                        <label class="col-md-2 control-label text-left">Number of Rooms</label>
                        <div class="col-md-6">
                             <?php
                              echo $form->textField($model,'no_rooms', array('class'=>'form-control','placeholder'=> 'Number of Rooms'));
                              echo $form->error($model,'no_rooms');
                            ?>
                        </div>
                     </div>

                     <div class="row form-group">
                        <label class="col-md-2 control-label text-left">Minimum Stay</label>
                        <div class="col-md-6">
                            <?php
                              echo $form->textField($model,'minimum_stay', array('class'=>'form-control','placeholder'=> 'Minimum Stay'));
                              echo $form->error($model,'minimum_stay');
                            ?>
                        </div>
                     </div>

                    <div class="row form-group">
                        <label class="col-md-2 control-label text-left">Room Type</label>
                        <div class="col-md-6">
                              <?php 
                                echo $form->dropDownList($model, 'room_type', CHtml::listData(Roomtypes::model()->findAll(),'id','room_type'),array('empty'=>'-- select --','class'=>'form-control'));
                                echo $form->error($model,'room_type');
                              ?>
                        </div>

                    </div>

                    <div class="row form-group">
                        <label class="col-md-2 control-label text-left">Max Adults</label>
                        <div class="col-md-6">
  					             <?php
                              echo $form->textField($model,'max_adults', array('class'=>'form-control','placeholder'=> 'Max Adults'));
                              echo $form->error($model,'max_adults');
                          ?>
                        </div>
                     </div>

                     <div class="row form-group">
                        <label class="col-md-2 control-label text-left">Max Children</label>
                        <div class="col-md-6">
					                 <?php
                              echo $form->textField($model,'max_children', array('class'=>'form-control','placeholder'=> 'Max Children'));
                              echo $form->error($model,'max_children');
                          ?>
                        </div>
                     </div>

                     <div class="row form-group">
                        <label class="col-md-2 control-label text-left">No. of Exrta Beds</label>
                        <div class="col-md-6">
                         <?php
                              echo $form->textField($model,'no_extrabed', array('class'=>'form-control','placeholder'=> 'Number extra bed'));
                              echo $form->error($model,'no_extrabed');
                          ?>
                        </div>
                     </div>

                     <div class="row form-group">
                        <label class="col-md-2 control-label text-left">Extra Bed Charges</label>
                        <div class="col-md-6">
					                 <?php
                              echo $form->textField($model,'bedcharges', array('class'=>'form-control','placeholder'=> 'Extra bed charge'));
                              echo $form->error($model,'bedcharges');
                          ?>
                        </div>
                     </div>

                     <div class="row form-group">
                        <label class="col-md-2 control-label text-left"></label>
                        <div class="col-md-6">
                           <?php
                              echo $form->hiddenField($model,'hotel_id', array('class'=>'form-control', 'value'=>$hotel_id));
                              echo $form->error($model,'hotel_id');
                          ?>
                        </div>
                     </div>


                     <div class="row form-group">
                     	<h4>Facilities</h4>
                        <div class="col-md-12">
                        <div class="col-md-4">
                        <label class="pointer">
                          <input class="all" type="checkbox" name="" value="" id="select_all" >
                          Select All
                        </label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="clearfix"></div>
                            <div class="col-md-4">
                                <label class="pointer">
                                    <?php 
                                    echo $form->checkBoxList($model1,'facility',CHtml::listData(Roomfacilities::model()->findAll(),'id','roomfacility'), array('class'=>'facility'));
                                    echo $form->error($model1,'facility');
                                    ?>
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class"row">
		 <div class="col-md-12">
		 <p>
        <?php echo CHtml::submitButton('Save', array('class'=>'btn btn-primary btn-md pull-right')); ?>
    </p>
		 </div>
		</div>


		</section>				
	
	</div>	<!--/.main-->
  <?php $this->endWidget(); ?>