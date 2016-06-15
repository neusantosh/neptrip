<fieldset style="margin-top:40px">
	<legend>Add Page</legend>

	<?php /** @var BootActiveForm $form */
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		    'id'=>'add_page',
		    'htmlOptions'=>array('class'=>'well'),
		    'enableClientValidation'=>true,
		    'clientOptions'=>array(
		        'validateOnSubmit'=>true,
		    )
		));
	?>
 
	<?php echo $form->textFieldRow($model, 'page_title', array('class'=>'span3'));?>

	<?php /* <?php echo $form->textAreaRow($model,  'page_description', array('class'=>'span10', 'rows'=>5, 'cols'=>60)); ?> */?>
	<div class="tinymce">
		<?php echo $form->labelEx($model, 'page_description');?>
		<?php 
			$this->widget('application.extensions.tinymce.ETinyMce',array(
				'model' => $model,
				'attribute' => 'page_description',
				'editorTemplate' => 'full',
				'htmlOptions' => array('rows'=>5, 'cols'=>60, 'class'=>'tinymce span10')
			));

			echo $form->error($model, 'page_description')
		?>

	</div>

	<?php echo $form->textFieldRow($model, 'page_seo_meta_keywords', array('class'=>'span3',)); ?> (Note:Seperate keywords by comma.)
	<?php echo $form->textFieldRow($model, 'page_seo_meta_title', array('class'=>'span3',)); ?>
	<?php echo $form->textAreaRow($model,  'page_seo_meta_description', array('class'=>'span10','rows'=>5, 'cols'=>60)); ?>
    <?php echo $form->dropDownListRow($model,'page_status', array(''=>'--select--',1=>'Publish Now',0=>'Publish Later'));?>
	<br/>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save Changes', 'htmlOptions' => array('class'=>'btn btn-primary'))); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear', 'htmlOptions' => array('class'=>'btn btn-danger'))); ?> 
	<?php $this->endWidget(); ?>


</fieldset>