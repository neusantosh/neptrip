Slider - It YII extension for making slider in very handy way.

Author : Sarthak Dabhi
Email : dabhi.sarthak@gmail.com
Skype : sarthakdabhi
Twitter : SarthakDabhi
Mobile : +91 953 725 272

STEPS TO IMPLEMENT
1. Download extension from http://www.yiiframework.com/ or from my blog http://yiiphpdeveloper.blogspot.com/

2. Exract in your projects extensions folder. like : projectURL/protected/extensions/Slider/Slider.php

3. Go to view file where you want to put your slider and copy and paste the below code with your path to image and name to alt.

CODE - 
<?php $this->widget('application.extensions.slider.Slider',array(
    'items'=>array(
        array($src, $alt),
        array($src, $alt),
        array($src, $alt),
    ),
)); ?>

DEMO CODE - if your images in images folder 
<?php $this->widget('application.extensions.slider.Slider',array(
    'items'=>array(
        array(Yii::app()->getBaseUrl(true).'/images/img1.png', 'image1'),
        array(Yii::app()->getBaseUrl(true).'/images/img2.png', 'image2'),
        array(Yii::app()->getBaseUrl(true).'/images/img3.png', 'image3'),
        array(Yii::app()->getBaseUrl(true).'/images/img4.png', 'image4'),
    ),
)); ?> 


Enjoy your new liht weight slider.
Let me know if you've any query about any thing in YII.