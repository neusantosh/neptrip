<?php 
	$model = new Business('createuserpass');
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	    'id'=>'createuserpass',
	    'type'=>'horizontal',
	    'enableAjaxValidation'=>false,
	    'enableClientValidation'=> true,
	    'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
	));
?>
 <fieldset style="margin-top:40px;">
    <legend>Update username and password for <?php echo ucwords($userdetails[0]['business_name']);?></legend>
<?php echo $form->textFieldRow($model, 'username', array('value'=>$userdetails[0]["username"]?$userdetails[0]["username"]:""));?>

<?php echo $form->passwordFieldRow($model, 'password', array('value'=>$userdetails[0]["orginal_password"]?$userdetails[0]["orginal_password"]:""));?>

<?php echo CHtml::tag('a', array('class' => 'createpassword', 'herf'=>'javascript:void(0);'),'Create Password');?>

</fieldset>

<div class="form-actions">
<?php 
	$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'	=> 'submit', 
			'label'			=> 'Save',
			'type'			=> 'primary',
	));

	$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'	=> 'reset', 
			'label'			=> 'Reset',
			'type'			=> 'danger'
	));
?>
 
<?php $this->endWidget(); ?>
</div>