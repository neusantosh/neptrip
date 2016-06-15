<fieldset style="margin-top:40px;">
    <legend>Venues</legend>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
    <div id="posts">
<?php foreach($venues as $venue): ?>
    <div class="post">
        <?php 
            if($venue->image!='' && file_exists('images/resturants/'.$venue->image)){
              $imageurl = Yii::app()->baseUrl.'/images/resturants/'.$venue->image;
            }else{
              $imageurl = Yii::app()->baseUrl.'/images/imagenotfound.png';
            }
        ?>
        <p>
            <img src="<?php echo $imageurl;?>" width="150px">
        </p>
        <p><?php echo $venue->name; ?></p>
        <p>Type:<?php echo $venue->venue_type; ?></p>
        <p>
          <a href="<?php echo Yii::app()->createUrl('admin/venues/view/id/'.$venue->id);?>" class="btn btn-primary">View</a>
            <?php
             if($venue->suspend == 1){
                $text = 'Release';
                $type = 1;
            }else{
                $text = 'Suspend';
                $type = 0;
            }

                echo CHtml::ajaxSubmitButton($text,Yii::app()->createUrl('admin/venues/suspendrelease'),
                                    array(
                                        'type'=>'POST',
                                        'data'=> 'js:{"id": '.$venue->id.', "type": '.$type.' }',                        
                                        'success'=>'js:function(string){ console.log(string);jQuery(".processing").hide();location.reload();}'           
                                ),array('class'=>'btn btn-danger myclass','onclick' => 'js:{showProcess('. $venue->id.')}' ));
            ?>
            <span class="processing" style="display:none" id="<?php echo $venue->id;?>">Please wait....</span>
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