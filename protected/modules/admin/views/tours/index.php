<fieldset style="margin-top:40px;">
    <legend>Restaurants</legend>
<?php
      $this->widget('bootstrap.widgets.TbAlert', array(
          'block'=>true, 
          'fade'=>true, 
          'closeText'=>'&times;', 
          'alerts'=>array(
              'success' => array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
          ),
      ));

      Yii::app()->clientScript->registerScript(
         'myHideEffect',
         '$(".alert").animate({opacity: 1.0}, 3000).fadeOut("slow");',
         CClientScript::POS_READY
      );
    ?>

    <div id="posts">
<?php foreach($tours as $tour): ?>
    <div class="post">
        <?php 
            if($tour->image!='' && file_exists('images/tours/'.$tour->image)){
              $imageurl = Yii::app()->baseUrl.'/images/tours/'.$tour->image;
            }else{
              $imageurl = Yii::app()->baseUrl.'/images/imagenotfound.png';
            }
        ?>
        <p>
            <img src="<?php echo $imageurl;?>" width="150px">
        </p>
        <p><?php echo $tour->tour_name; ?></p>
        <p>Type:<?php echo $tour->type; ?></p>
        <p>
          <a href="<?php echo Yii::app()->createUrl('admin/tours/view/id/'.$tour->id);?>" class="btn btn-primary">View</a>
            <?php
             if($tour->suspend == 1){
                $text = 'Release';
                $type = 1;
            }else{
                $text = 'Suspend';
                $type = 0;
            }

                echo CHtml::ajaxSubmitButton($text,Yii::app()->createUrl('admin/tours/suspendrelease'),
                                    array(
                                        'type'=>'POST',
                                        'data'=> 'js:{"id": '.$tour->id.', "type": '.$type.' }',                        
                                        'success'=>'js:function(string){ console.log(string);jQuery(".processing").hide();location.reload();}'           
                                ),array('class'=>'btn btn-danger myclass','onclick' => 'js:{showProcess('. $tour->id.')}' ));
            ?>
            <span class="processing" style="display:none" id="<?php echo $tour->id;?>">Please wait....</span>
        </p>
    </div>
    <hr/>
<?php endforeach; ?>
</div>
<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#posts',
    'itemSelector' => 'div.post',
    'loadingText' => 'Loading...',
    'donetext' => 'This is the end... my only friend, the end',
    'pages' => $pages,
)); ?>
  </fieldset>

<script type="text/javascript">
function showProcess(did){
    $('#'+did).show();
}
</script>