<div class="hotel_searchform">
	<?php /** @var BootActiveForm $form */
		$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		    'id'=>'search_hotel',
		    'enableClientValidation'=>true,
			'clientOptions'=>array(
		    	'validateOnSubmit'=>true,
		  	),
		  	'action' => $this->createUrl('search/hotels'),
		  	'method'=>'get'
		)); 
	?>
 
		<?php echo $form->textFieldRow($model, 'city_village', array('placeholder'=>'Enter City')); ?>
		<?php 
		//echo $form->textFieldRow($model, 'checkin_time', array('placeholder'=>'Check-in'));
		Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
		    $this->widget('CJuiDateTimePicker',array(
		        'model'=>$model, //Model object
		        'attribute'=>'checkin_time', //attribute name
		        'mode'=>'date',//use "time","date" or "datetime" (default)
		        'language'=>'en', // default to english,
		        'htmlOptions' => array('placeholder'=>'Check-in')				 
		    ));
		     echo $form->error($model,'checkin_time');
		?>
		<?php 
			//echo $form->textFieldRow($model, 'checkout_time', array('placeholder'=>'Check-out'));
			Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			$this->widget('CJuiDateTimePicker',array(
		        'model'=>$model, //Model object
		        'attribute'=>'checkout_time', //attribute name
		        'mode'=>'date', //use "time","date" or "datetime" (default)
		        'language'=>'en', // default to english   
		        'htmlOptions' => array('placeholder'=>'Check-out')		
		    ));
		    echo $form->error($model,'checkout_time');

		?>
		<?php echo $form->dropDownListRow($model1, 'room_type', CHtml::listData(Roomtypes::model()->findAll(),'id','room_type'),array('empty'=>'Room Type')); ?>
		<br/>
		<?php echo $form->textFieldRow($model1, 'max_adults', array('value'=>2, 'placeholder'=>'Number of Adults')); ?>
		<?php echo $form->textFieldRow($model1, 'max_children', array('value'=>1, 'placeholder'=> 'Number of children')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Search','htmlOptions'=>array('class'=>'btn btn-primary'))); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset Search','htmlOptions'=>array('class'=>'btn btn-danger'))); ?>
	<?php $this->endWidget(); ?>
</div>

<style type="text/css">
	label{
		display: none;
	}
</style>