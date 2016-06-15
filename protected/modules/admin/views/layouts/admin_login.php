<?php $this->renderPartial('application.views.partials.header',false);?>
<div class="container" id="page">
	<div id="header">
		<div id="logo">
				<?php echo CHtml::encode(Yii::app()->name); ?>
		</div>
	</div><!-- header -->
<?php echo $content; ?>
<?php $this->renderPartial('application.views.partials.footer',false);?>
