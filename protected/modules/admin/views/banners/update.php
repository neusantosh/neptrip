<fieldset style="margin-top:40px;">
    <legend>Update Banner</legend>
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
		    'id'=>'update_banner',
		    'htmlOptions'=>array('class'=>'well','enctype'=>'multipart/form-data'),
		    'enableClientValidation'=>true,
		    'clientOptions'=>array(
		        'validateOnSubmit'=>true,
		    ),
		));
	?>

	<?php echo $form->fileFieldRow($model, 'banner'); ?>

	<div class="banner_image">
		<?php
			if($record['banner']!='' && file_exists('images/banners/'.$record['banner'])){
				$imageurl = Yii::app()->baseUrl."/images/banners/".$record['banner'];
		?>
			<img src="<?php echo $imageurl;?>" width="150px">
			
			<?php /* <a href="javascript:void(0);" class="btn btn-danger remove_bannerimage" data-id="<?php echo $record['id'];?>" data-image="<?php echo $record['banner'];?>" data-url="<?php echo $this->createUrl('banner/removebanner');?>" onclick="return confirm('Are sure to delete this banner image?');">
				Remove
			</a> */?>				
		<?php	
			}
		?>
	</div>



	<?php echo $form->dropDownListRow($model,'status', array(
			''=>'--select--',
			1=>'Publish Now',
			0=>'Publish Later'
		),
		array('options' => array($record['status']=>array('selected'=>true))));
	?>

	<input type="hidden" name="old_image" value="<?php echo $record['banner'];?>">

	<div class="form-actions">
	    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Save')); ?>
	    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'type'=>'danger','label'=>'Reset')); ?>
	</div>
 
<?php $this->endWidget(); ?>

</fieldset>