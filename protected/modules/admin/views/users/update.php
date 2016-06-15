<fieldset style="margin-top:40px;">
    <legend>Update User</legend>
</fieldset>
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'user_registration',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    )
)); ?>
<?php 
        echo $form->textFieldRow($model, 'business_name',array('value'=>$userdetails['business_name']?$userdetails['business_name']:'')); 
    ?>
  
    <?php
		echo $form->dropDownListRow($model,'business_type', $businesstypes, array('prompt'=>'select','options'=>array($userdetails['business_type']=>array('selected'=>'selected'))
	));
	?>

    <?php 
        echo $form->textFieldRow($model, 'address',array('value'=>$userdetails['address']?$userdetails['address']:'')); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'street_address',array('value'=>$userdetails['street_address']?$userdetails['street_address']:'')); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'postal_address',array('value'=>$userdetails['postal_address']?$userdetails['postal_address']:'')); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'city', array('value'=>$userdetails['city']?$userdetails['city']:'')); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'ward_number', array('value'=>$userdetails['ward_number']?$userdetails['ward_number']:'')); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'property_block_no',array('value'=>$userdetails['property_block_no']?$userdetails['property_block_no']:''));
    ?>

     <?php
		echo $form->dropDownListRow($model,'zone', $zones, array('prompt'=>'select','options'=>array($userdetails['zone']=>array('selected'=>'selected'))
	));
	?>

     <?php
		echo $form->dropDownListRow($model,'district', $districts, array('prompt'=>'select','options'=>array($userdetails['district']=>array('selected'=>'selected'))
	));
	?>
    <?php 
        echo $form->textFieldRow($model, 'phone1',array('value'=>$userdetails['phone1']?$userdetails['phone1']:''),array('size'=>10,'maxlength'=>10)); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'phone2',array('value'=>$userdetails['phone2']?$userdetails['phone2']:''),array('size'=>10,'maxlength'=>10)); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'fax',array('value'=>$userdetails['fax']?$userdetails['fax']:'')); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'email',array('value'=>$userdetails['email']?$userdetails['email']:'')); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'web',array('value'=>$userdetails['web']?$userdetails['web']:'')); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'fb_link',array('value'=>$userdetails['fb_link']?$userdetails['fb_link']:'')); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'contact_person',array('value'=>$userdetails['contact_person']?$userdetails['contact_person']:'')); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'contact_person_role',array('value'=>$userdetails['contact_person_role']?$userdetails['contact_person_role']:'')); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'mobile',array('value'=>$userdetails['mobile']?$userdetails['mobile']:'')); 
    ?>

    <?php $this->widget('ext.EFineUploader.EFineUploader',
             array(
                   'id'=>'FineUploader',
                   'config'=>array(
                                   'autoUpload'=>true,
                                   'request'=>array(
                                      'endpoint'=>$this->createUrl('users/upload'),
                                      'params'=>array('YII_CSRF_TOKEN'=>Yii::app()->request->csrfToken),
                                                   ),
                                   'retry'=>array('enableAuto'=>true,'preventRetryResponseProperty'=>true),
                                   'chunking'=>array('enable'=>true,'partSize'=>100),//bytes
                                   'callbacks'=>array(
                                          'onComplete'=>"js:function(id, name, response){ // for test purpose
                                             // alert(id + '/' + name + '/' + response.success + '/' + response.folder + '/' + response.filename);
                                            $('#Business_image').val(response.filename);
                                            $('#efine_name').text(response.filename);
                                           }",
                                           //'onError'=>"js:function(id, name, errorReason){ }",
                                          'onValidateBatch' => "js:function(fileOrBlobData) {}", // because of crash
                                    ),
                                   'validation'=>array(
                                             'allowedExtensions'=>array('jpg','jpeg','png'),
                                             'sizeLimit'=>2 * 1024 * 1024,//maximum file size in bytes
                                             'minSizeLimit'=>0*1024*1024,// minimum file size in bytes
                                                      ),
                                  )
                  ));
 
?>


    <?php 
        echo $form->hiddenField($model, 'image', array('type'=>'hidden'));
    ?>

    <?php 
        echo $form->textAreaRow($model, 'comments', array('class'=>'span8', 'rows'=>5, 'value'=>$userdetails['comments']?$userdetails['comments']:''));
    ?>
    
</fieldset>
 
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
 
<?php $this->endWidget(); ?>