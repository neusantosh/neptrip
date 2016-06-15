<fieldset style="margin-top:40px">
	<legend>Update Page</legend>

	<?php /** @var BootActiveForm $form */
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		    'id'=>'update_page',
		    'htmlOptions'=>array('class'=>'well'),
		    'enableClientValidation'=>true,
		    'clientOptions'=>array(
		        'validateOnSubmit'=>true,
		    )
		));
	?>
 
	<?php echo $form->textFieldRow($model, 'page_title', array('class'=>'span3', 'value'=>$record['page_title'], 'readonly'=>'readonly'));?>
	
	<?php /* <?php echo $form->textAreaRow($model,  'page_description', array('class'=>'span10', 'rows'=>5, 'cols'=>60, 'value'=>$record['page_description'])); ?> */?>
	<div class="tinymce">
		<?php echo $form->labelEx($model, 'page_description');?>
		<?php 
			$this->widget('application.extensions.tinymce.ETinyMce',array(
				'model' => $model,
				'attribute' => 'page_description',
				'editorTemplate' => 'full',
				'htmlOptions' => array('rows'=>5, 'cols'=>60, 'class'=>'tinymce span10','value'=>$record['page_description'])
			));

			echo $form->error($model, 'page_description')
		?>

	</div>


	<?php echo $form->textFieldRow($model, 'page_seo_meta_keywords', array('class'=>'span3','value'=>$record['page_seo_meta_keywords'])); ?> (Note:Seperate keywords by comma.)
	<?php echo $form->textFieldRow($model, 'page_seo_meta_title', array('class'=>'span3','value'=>$record['page_seo_meta_title'])); ?>
	<?php echo $form->textAreaRow($model,  'page_seo_meta_description', array('class'=>'span10','rows'=>5, 'cols'=>60, 'value'=>$record['page_seo_meta_description'])); ?>
	<?php echo $form->dropDownListRow($model,'page_status', array(
			''=>'--select--',
			1=>'Publish Now',
			0=>'Publish Later'
		),
		array('options' => array($record['page_status']=>array('selected'=>true))));
	?>

	<br/>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save Changes', 'htmlOptions' => array('class'=>'btn btn-primary'))); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear', 'htmlOptions' => array('class'=>'btn btn-danger'))); ?> 
	<?php $this->endWidget(); ?>


</fieldset>