<?php
/* @var $this SiteController */
$this->pageTitle="Home";

?>


<?php
        $this->widget('ext.slider.slider', array(
            'container'=>'slideshow',
            'width'=>960, 
            'height'=>'auto', 
            'timeout'=>6000,
            'infos'=>false,
            'constrainImage'=>true,
            'images'=>$banners,
            //'alts'=>array('First description','Second description','Third description','Four description'),
            //'defaultUrl'=>Yii::app()->request->hostInfo
            )
        );
?>


<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs', // 'tabs' or 'pills'
    'tabs'=>array(
        array('label'=>'Hotels', 'content'=>$this->renderPartial('application.views.partials.__hotelsearchform', array('model'=>new Hotels,'model1'=>new Hotelrooms) ,true), 'active'=>true),
        array('label'=>'Venues', 'content'=>'Search Venue from here.'),
        array('label'=>'Vehicle','content'=>'Search Vehicle from here.'),
        array('label'=>'Tours',  'content'=>'Search Tours from here.'),
    ),
)); ?>


