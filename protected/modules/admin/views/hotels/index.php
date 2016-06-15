<fieldset style="margin-top:40px;">
    <legend>Hotels</legend>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
    <div id="posts">
<?php foreach($hotels as $hotel): ?>
    <div class="post">
        <?php 
            if($hotel->hotel_image!='' && file_exists('images/hotels/'.$hotel->hotel_image)){
              $imageurl = Yii::app()->baseUrl.'/images/hotels/'.$hotel->hotel_image;
            }else{
              $imageurl = Yii::app()->baseUrl.'/images/imagenotfound.png';
            }
        ?>
        <p>
            <img src="<?php echo $imageurl;?>" width="150px">
        </p>
        <p><?php echo $hotel->hotel_name; ?></p>
        <p>Type:<?php echo $hotel->hotel_type; ?></p>
        <p>
          <a href="<?php echo Yii::app()->createUrl('admin/hotels/view/id/'.$hotel->id);?>" class="btn btn-primary">View</a>
          <?php 
                echo CHtml::ajaxSubmitButton('View Rooms',Yii::app()->createUrl('admin/hotels/viewrooms'),
                                    array(
                                        'type'=>'POST',
                                        'data'=> 'js:{"id": '.$hotel->id.',}',                        
                                        'success'=>'js:function(string){ jQuery("#hotel_rooms_'.$hotel->id.'").html(string).slideToggle();console.log(string);}'           
                                ),array('class'=>'btn btn-info viewroom'));
            ?>
            <?php
             if($hotel->suspend == 1){
                $text = 'Release';
                $type = 1;
            }else{
                $text = 'Suspend';
                $type = 0;
            }

                echo CHtml::ajaxSubmitButton($text,Yii::app()->createUrl('admin/hotels/suspendrelease'),
                                    array(
                                        'type'=>'POST',
                                        'data'=> 'js:{"id": '.$hotel->id.', "type": '.$type.' }',                        
                                        'success'=>'js:function(string){ console.log(string);jQuery(".processing").hide();location.reload();}'           
                                ),array('class'=>'btn btn-danger myclass','onclick' => 'js:{showProcess('. $hotel->id.')}' ));
            ?>
            <span class="processing" style="display:none" id="<?php echo $hotel->id;?>">Please wait....</span>

            <div id="hotel_rooms_<?php echo $hotel->id;?>">
            </div>
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