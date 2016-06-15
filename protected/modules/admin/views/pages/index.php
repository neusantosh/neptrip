<fieldset style="margin-top:40px;">
    <legend>Pages</legend>
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

    <div class="addpages pull-right">
    	<a href="<?php echo $this->createUrl('pages/add');?>" class="btn btn-primary">
    		Add Page
    	</a>
    </div>

    <div id="posts">
<?php foreach($records as $record): ?>
    <div class="post">
        <p><?php echo $record->page_title; ?></p>
        <p>
          <a href="<?php echo Yii::app()->createUrl('admin/pages/update/id/'.$record->id);?>" class="btn btn-primary">Update</a>
          <a href="<?php echo Yii::app()->createUrl('admin/pages/delete/id/'.$record->id);?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this page?');">Delete</a>
            <?php
             if($record->page_status == 1){
                $text = 'Published';
                $type = 1;
            }else{
                $text = 'Publish Later';
                $type = 0;
            }

                echo CHtml::ajaxSubmitButton($text,Yii::app()->createUrl('admin/pages/suspendrelease'),
                                    array(
                                        'type'=>'POST',
                                        'data'=> 'js:{"id": '.$record->id.', "type": '.$type.' }',                        
                                        'success'=>'js:function(string){ console.log(string);jQuery(".processing").hide();location.reload();}'           
                                ),array('class'=>'btn btn-success myclass','onclick' => 'js:{showProcess('. $record->id.')}' ));
            ?>
            <span class="processing" style="display:none" id="<?php echo $record->id;?>">Please wait....</span>
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