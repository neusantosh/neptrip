<fieldset style="margin-top:40px;">
   <?php
      $this->widget('bootstrap.widgets.TbAlert', array(
          'block'=>true, 
          'fade'=>true, 
          'closeText'=>'&times;', 
          'alerts'=>array(
              'success' => array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
          ),
      ));

      Yii::app()->clientScript->registerScript(
         'myHideEffect',
         '$(".alert").animate({opacity: 1.0}, 3000).fadeOut("slow");',
         CClientScript::POS_READY
      );
    ?>

    <legend>Site Configutation</legend>
      <?php $this->renderPartial('application.views.partials.__admin_seo_social_config', array(
      'model'   => new Siteconfig,
      'record'  => SiteConfig::model()->findByPk(1)
      ));?>
    
    <legend>Admin Settings</legend>
   
    <?php /** @var BootActiveForm $form */
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		    'id'=>'admin_settings',
		    'htmlOptions'=>array('class'=>'well'),
		    'enableClientValidation'=>true,
		    'clientOptions'=>array(
		        'validateOnSubmit'=>true,
		    )
		));
	?>
 
	<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3', 'value'=>$record['username'])); ?>
	<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3', 'value'=>'')); ?>

	<br/>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save Changes', 'htmlOptions' => array('class'=>'btn btn-primary'))); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear', 'htmlOptions' => array('class'=>'btn btn-danger'))); ?> 
	<?php $this->endWidget(); ?>

</fieldset>
