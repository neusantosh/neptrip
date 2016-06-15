<fieldset style="margin-top:40px;">
    <legend>Users</legend>
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
    <?php foreach($users as $user): ?>
        <div class="post">
            <?php 
                if($user->image!='' && file_exists('images/user/'.$user->image)){
                  $imageurl = Yii::app()->baseUrl.'/images/user/'.$user->image;
                }else{
                  $imageurl = Yii::app()->baseUrl.'/images/imagenotfound.png';
                }
            ?>
            <p>
                <img src="<?php echo $imageurl;?>" width="150px">
            </p>
            <p>Business Name :<?php echo $user->business_name; ?></p>
            <p>Business Type :<?php echo $user->business_type; ?></p>
            <p>Status        :<?php echo getStatusName($user->status); ?></p>
            <p>
              <a href="<?php echo Yii::app()->createUrl('admin/users/view/id/'.$user->id);?>" class="btn btn-primary">View</a>
              <a href="<?php echo Yii::app()->controller->createUrl("users/update/id/".$user->id);?>" class="btn btn-info">Update</a>
              <a href="<?php echo Yii::app()->controller->createUrl("users/createuserpassword/id/".$user->id);?>" class="btn btn-warning">Create username password</a>
              <a href="<?php echo Yii::app()->controller->createUrl("users/approve/id/".$user->id);?>" class="btn btn-success">Approve</a>
              <a href="<?php echo Yii::app()->controller->createUrl("users/reject/id/".$user->id);?>" class="btn btn-warning" onclick="return confirm('Are you sure to reject this user?');">Reject</a>
              <a href="<?php echo Yii::app()->controller->createUrl("users/delete/id/".$user->id);?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this user?');">Delete</a>
                                  
                                
              <span class="processing" style="display:none" id="<?php echo $user->id;?>">Please wait....</span>
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

  <?php 
  function getStatusName($status){
  if($status == 0)
    return 'Not Approved';
  if($status == 1)
    return 'Approved';
  if($status == 2)
    return "Rejected";
}
  ?>


