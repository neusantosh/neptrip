<?php $this->renderPartial('application.views.partials.admin_menu',false);?>

<fieldset style="margin-top:40px;">
	<legend>Dashboard</legend>
	<?php 
	$this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
   		 'heading'=>'Neptrip',
	)); ?>
 
    <p>
    	Welcome to Neptrip Dashboard.
    </p>
</fieldset>
 
<?php $this->endWidget(); ?>