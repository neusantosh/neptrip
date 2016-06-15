<fieldset style="margin-top:40px;">
    <legend>Add Banner</legend>

    <?php
      $this->widget('bootstrap.widgets.TbAlert', array(
          'block'=>true, 
          'fade'=>true, 
          'closeText'=>'&times;', 
          'alerts'=>array(
              'error' => array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
          ),
      ));

      Yii::app()->clientScript->registerScript(
         'myHideEffect',
         '$(".alert").animate({opacity: 1.0}, 3000).fadeOut("slow");',
         CClientScript::POS_READY
      );
    ?>

   <?php /** @var BootActiveForm $form */
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		    'id'=>'add_banner',
		    'htmlOptions'=>array('class'=>'well','enctype'=>'multipart/form-data'),
		    //'type'=>'inline',
		    'enableClientValidation'=>true,
		    'clientOptions'=>array(
		        'validateOnSubmit'=>true,
		    ),
		));
	?>

	<?php echo $form->fileFieldRow($model, 'banner'); ?>

	<?php echo $form->dropDownListRow($model,'status', array(''=>'--select--',1=>'Publish Now',0=>'Publish Later'));?>

	<div class="form-actions">
	    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Save')); ?>
	    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'type'=>'danger','label'=>'Reset')); ?>
	</div>
 
<?php $this->endWidget(); ?>

</fieldset>