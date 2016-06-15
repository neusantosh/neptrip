<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'user_registration',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    )
)); 
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);
?>


<fieldset>
    <legend>Register your business with us</legend>

   <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success' => array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
    )); ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'error' => array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
    )); ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'info' => array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
    )); ?>

    <?php echo $form->errorSummary($model); ?>

  

    <?php if(Yii::app()->user->hasFlash('business_name')):?>
        <div class="errorMessage error">
            <?php echo Yii::app()->user->getFlash('business_name'); ?>
        </div>
    <?php endif; ?>

    <?php if(Yii::app()->user->hasFlash('email_error')):?>
        <div class="errorMessage error">
            <?php echo Yii::app()->user->getFlash('email_error'); ?>
        </div>
    <?php endif; ?>


    <?php 
        echo $form->textFieldRow($model, 'business_name'); 
    ?>
    
    <?php 
        echo $form->dropDownListRow($model, 'business_type', $businesstypes,
                array(
                        'prompt'=>'select',
                    ),
                    array(
                        'options' => array(
                            ''=>array('selected'=>true)
                        )
                )
            );
    ?>

    <?php 
        echo $form->textFieldRow($model, 'address'); 
    ?>


    <?php 
        echo $form->textFieldRow($model, 'street_address'); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'postal_address'); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'city'); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'ward_number'); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'property_block_no');
    ?>

    <?php 
        echo $form->dropDownListRow($model, 'zone', $zones, 
                    array(
                        'prompt'=>'select',
                        ),
                    array(
                        'options' => array(
                            ''=>array('selected'=>true))
                        )
                );
    ?>

    <?php 
        echo $form->dropDownListRow($model, 'district', $districts,
                    array(
                        'prompt'=>'select',
                    ),
                    array(
                        'options' => array(
                            ''=>array('selected'=>true))
                    )
            );
    ?>

    <?php 
        echo $form->textFieldRow($model, 'phone1',array('size'=>10,'maxlength'=>10)); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'phone2',array('size'=>10,'maxlength'=>10)); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'fax'); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'email'); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'web'); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'fb_link'); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'contact_person'); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'contact_person_role'); 
    ?>

    <?php 
        echo $form->textFieldRow($model, 'mobile'); 
    ?>

    <?php $this->widget('ext.EFineUploader.EFineUploader',
             array(
                   'id'=>'FineUploader',
                   'config'=>array(
                                   'autoUpload'=>true,
                                   'request'=>array(
                                      'endpoint'=>$this->createUrl('/register/upload'),
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
        echo $form->textAreaRow($model, 'comments', array('class'=>'span8', 'rows'=>5));
    ?>
    
</fieldset>
 
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
 
<?php $this->endWidget(); ?>