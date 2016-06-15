<?php 
$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'inverse', // null or 'inverse'
    'brand'=>'Neptrip Admin',
    'brandUrl'=> Yii::app()->baseUrl.'/admin/dashboard',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>Yii::app()->baseUrl.'/admin/dashboard', 'active'=>Yii::app()->controller->id=='dashboard'),
                array('label'=>'Users', 'url'=>Yii::app()->baseUrl.'/admin/users', 'active'=>Yii::app()->controller->id=='users'),
                array('label'=>'Hotels', 'url'=>Yii::app()->baseUrl.'/admin/hotels','active'=>Yii::app()->controller->id=='hotels'),
                array('label'=>'Venues', 'url'=>Yii::app()->baseUrl.'/admin/venues','active'=>Yii::app()->controller->id=='venues'),
                array('label'=>'Restaurants', 'url'=>Yii::app()->baseUrl.'/admin/resturants','active'=>Yii::app()->controller->id=='resturants'),
                array('label'=>'Tours', 'url'=>Yii::app()->baseUrl.'/admin/tours','active'=>Yii::app()->controller->id=='tours'),
                array('label'=>'Vehicles', 'url'=>Yii::app()->baseUrl.'/admin/vehicles','active'=>Yii::app()->controller->id=='vehicles'),
                array('label'=>'Site Contents', 'url'=>'#', 'items'=>array(
                    array('label'=>'Pages', 'url'=>Yii::app()->baseUrl.'/admin/pages','active'=>Yii::app()->controller->id=='pages'),
                    array('label'=>'Banners', 'url'=>Yii::app()->baseUrl.'/admin/banners','active'=>Yii::app()->controller->id=='banners'),
                    array('label'=>'Subscribers', 'url'=>Yii::app()->baseUrl.'/admin/subscribers','active'=>Yii::app()->controller->id=='subscribers'),
                    array('label'=>'NewsLetter', 'url'=>Yii::app()->baseUrl.'/admin/newsletter','active'=>Yii::app()->controller->id=='newsletter'),
                )),
            ),
        ),
        //'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                //array('label'=>'Link', 'url'=>'#'),
                array('label'=>'Profile', 'url'=>'#', 'items'=>array(
                    array('label'=>'Admin Settings', 'url'=>Yii::app()->baseUrl.'/admin/settings'),
                    '---',
                    array('label'=>'Logout', 'url'=>Yii::app()->baseUrl.'/admin/default/logout'),
                )),
            ),
        ),
    ),
)); 
?>

