 <?php /** @var BootActiveForm $form */
          $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id'=>'admin_seo_settings',
            'htmlOptions'=>array('class'=>'well'),
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            )
        ));
    ?>
 
  <?php echo $form->textFieldRow($model,'seo_meta_keywords', array('class'=>'span3','value'=>$record['seo_meta_keywords'])); ?>
  (Note:Seperate keywords by comma.)
  <?php echo $form->textFieldRow($model,'seo_meta_title', array('class'=>'span3','value'=>$record['seo_meta_title'])); ?>
  <?php echo $form->textAreaRow($model,'seo_meta_description', array('class'=>'span10', 'rows'=>5, 'cols'=>60,'value'=>$record['seo_meta_description'])); ?>
  <legend>Social Media</legend>
  <?php echo $form->textFieldRow($model,'fb_link', array('class'=>'span3','value'=>$record['fb_link'])); ?>
  <?php echo $form->textFieldRow($model,'google_link', array('class'=>'span3','value'=>$record['google_link'])); ?>
  <?php echo $form->textFieldRow($model,'twitter_link', array('class'=>'span3','value'=>$record['twitter_link'])); ?>

  <br/>
  <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Save Changes', 'htmlOptions' => array('class'=>'btn btn-primary'))); ?>
  <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Clear', 'htmlOptions' => array('class'=>'btn btn-danger'))); ?> 
  <?php $this->endWidget(); ?> 