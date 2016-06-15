<?php

/**
 * Slider extension –
 * It’s very lightweight and efficient with user friendly code.
 * Users haven’t worry about backend part; 
 * Just put code in your view and path to images and alt name.
 * And your slider ready to use.
 * *************************************************************
 * Author : Sarthak Dabhi
 * Email : dabhi.sarthak@gmail.com
 * Skype : sarthakdabhi
 * Twitter : SarthakDabhi
 * Mobile : +91 953 725 2723
 */

class Slider extends CWidget{
    public $items; // for items which are you gave for slides for slider.
    public $options;
    /**
     * init() - run this function when slider widget loads.
     * At initial level, We've to load all css and javascript. 
     */
    public function init() {

        $assetUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('ext.Slider')); // path to Slider extension and cache it in assets.
        Yii::app()->clientScript->registerScriptFile($assetUrl.'/js/jquery.js'); // register jquery-1.11.0.min.js 
        Yii::app()->clientScript->registerScriptFile($assetUrl.'/js/slider.js'); // register slider.js
        Yii::app()->clientScript->registerCssFile($assetUrl.'/css/slider.css');  // register slider.css

        return parent::init();
    }
    

    /**
     * run() - run this function when widget ends.
     * At last level, We've to just render view for slider with all items you gave in widget. 
     */
    public function run() {
        $this->render('_slider',array('items'=>$this->items, 'options'=>$this->options)); // render view file which is in "views/_slider.php"
        return parent::run();
    }
}
?>
