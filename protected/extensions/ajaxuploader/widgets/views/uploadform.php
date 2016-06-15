<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'upload',
	'fade'=>false,  //don't need transitions
	'htmlOptions'=>array('padding-bottom:0;')
	)); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>upload image</h4> 
</div>


<div class="modal-body ajaxuploader">

<?php  $form = $this->beginWidget('CActiveForm', 
array(
	'action'=>CHtml::normalizeUrl(array('ajaxuploader/upload/process')),
	'method'=>'post',
	'htmlOptions'=>array('id'=>'MyUploadForm','enctype'=>'multipart/form-data','onSubmit'=>'return false')	
));
	
?>

  <?php echo $form->fileField($model,'ImageFile',array('id'=>'imageInput')); ?>
  
  <?php //echo CHtml::submitButton('Upload',array('id'=>'submit-btn')); ?>
  <?php $this->widget('TbButton', array(
        'label'=>'Upload',
		'type'=>'danger',
		'buttonType'=>'submit',
		'icon'=>'upload',
        'htmlOptions'=>array('id'=>'submit-btn'),
    )); ?>

<?php  $this->endWidget(); ?>

<?php  echo '<div id="progressbox" style="display:none;">'; ?>

	<?php $this->widget('bootstrap.widgets.TbProgress', array(
    'type'=>'info', // 'info', 'success' or 'danger'
    'percent'=>0, // the progress
    'striped'=>true,
    'animated'=>true,
	'htmlOptions'=>array('id'=>'progressbar'),
)); ?>

 <?php echo'<div id="statustxt">0%</div></div>'?>
 
 <!---<div id="output"></div>  --uncomment this line to get the output on the modal or name another DOM element to have an id of #output>   -->
<div id="alerter"></div>
</div>
<div class="modal-footer" style="background-color:inherit;">
    
    <?php $this->widget('TbButton', array(
        'label'=>'Cancel',
		'type'=>'success',
		'icon'=>'remove',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
<?php $this->endWidget(); ?>