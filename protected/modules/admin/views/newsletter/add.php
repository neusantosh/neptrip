<fieldset style="margin-top:40px">
	<legend>Add Newsletter</legend>

	<?php /** @var BootActiveForm $form */
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		    'id'=>'add_newsletter',
		    'htmlOptions'=>array('class'=>'well'),
		    'enableClientValidation'=>true,
		    'clientOptions'=>array(
		        'validateOnSubmit'=>true,
		    )
		));
	?>
 
	<?php echo $form->textFieldRow($model, 'newsletter_title', array('class'=>'span3'));?>
	
	<div class="tinymce">
		<?php echo $form->labelEx($model, 'newsletter_content');?>
		<?php 
			$this->widget('application.extensions.tinymce.ETinyMce',array(
				'model' => $model,
				'attribute' => 'newsletter_content',
				'editorTemplate' => 'full',
				'htmlOptions' => array('rows'=>5, 'cols'=>60, 'class'=>'tinymce')
			));

			echo $form->error($model, 'newsletter_content')
		?>

	</div>


    <?php echo $form->dropDownListRow($model,'status', array(''=>'--select--',1=>'Publish Now',0=>'Publish Later'));?>
	<br/>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save Changes', 'htmlOptions' => array('class'=>'btn btn-primary'))); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear', 'htmlOptions' => array('class'=>'btn btn-danger'))); ?> 
	<?php $this->endWidget(); ?>


</fieldset>