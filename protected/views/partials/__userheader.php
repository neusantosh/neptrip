<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $this->pageTitle;?>::User - Neptrip</title>

<link href="<?php echo Yii::app()->baseUrl;?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->baseUrl;?>/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo Yii::app()->baseUrl;?>/css/styles.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/plugins/timepicker/jquery-ui-timepicker-addon.min.css">

<?php 
	Yii::app()->clientScript->registerCoreScript('jquery');     
	Yii::app()->clientScript->registerCoreScript('jquery.ui');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/lumino.glyphs.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/site.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/timepicker/jquery-ui-sliderAccess.js');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/plugins/timepicker/jquery-ui-timepicker-addon.min.js');
	
?>

<!--[if lt IE 9]>
<script src="<?php echo Yii::app()->baseUrl;?>/js/html5shiv.js"></script>
<script src="<?php echo Yii::app()->baseUrl;?>/js/respond.min.js"></script>
<![endif]-->
</head>

<body>
<?php $this->renderPartial('application.views.partials.__usermenu',true);?>