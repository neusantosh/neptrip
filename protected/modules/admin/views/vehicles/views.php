<fieldset style="margin-top:40px;">
    <legend>Tours Details</legend>
<?php 
 if($data->image!='' && file_exists("images/vehicles/".$data->image))
        $image =  Yii::app()->baseUrl."/images/vehicles/".$data->image;
    else  
        $image = Yii::app()->baseUrl."/images/imagenotfound.png";

    $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=> $data,
    'attributes'=>array(
        array('name'=>'car_name', 'label'=>'Name :'),
        array('name'=>'image', 'label'=>'Image :', 'type'=>'html' ,'value' => CHtml::tag('img',
                            array(
                                    "title" => $data->car_name,
                                    "src"   => $image,
                                    "style" => "height:150px"
                                )
            )),
        array('name'=>'car_type', 'label'=>'Type :'),
        array('name'=>'price', 'label'=>'Price'),
        array('name'=>'car_description', 'label'=>'Description'),
        array('name'=>'passenger', 'label'=>'Number of passenger'),
        array('name'=>'car_door', 'label'=>'Car Door:'),
        array('name'=>'transmission', 'label'=>'Transmission:'),
        array('name'=>'airport_pickup', 'label'=>'Airport pickup:', 'value' => getPickupStatus($data->airport_pickup)),
        array('name'=>'pick_up_location', 'label'=>'Pick up location:'),
        array('name'=>'drop_off_location', 'label'=>'Drop off location:'),
        array('name'=>'terms_and_condition', 'label'=>'Terms and conditions:'),
        array('name'=>'phone_1', 'label'=>'Phone 1 :'),
        array('name'=>'phone_2', 'label'=>'Phone 2 :'),
        array('name'=>'fax', 'label'=>'Fax :'),
        array('name'=>'email', 'label'=>'Email :'),
        array('name'=>'facebook', 'label'=>'Facebook Link :'),
        array('name'=>'web', 'label'=>'Web Link :'),
        array('name'=>'contact_person', 'label'=>'Contact Person :'),
        array('name'=>'role', 'label'=>'Role :'),
        array('name'=>'mobile_number', 'label'=>'Mobile number :'),
        array('name'=>'status', 'label'=>'Status :','value' => getStatusName($data->status)),
        array('name'=>'suspend', 'label'=>'Is suspended? :','value' => isSuspended($data->suspend)),
    ),
)); 

    function getStatusName($status){
    	if($status == 0)
    		return 'Not Approved';
    	if($status == 1)
    		return 'Approved';
    }

     function isSuspended($data){
        if($data == 0)
            return 'Not Suspended';
        if($data == 1)
            return 'Suspended';
        
    }

    function getPickupStatus($airport_pickup){
        if($airport_pickup == 0)
            return 'No';
        if($airport_pickup == 1)
            return 'Yes';
    }

?>
<div class="row-fluid">
    <div class="span12">
        <div class="action_label inline">Actions</div>
        <div class="action_button inline">
<?php
             if($data->suspend == 1){
                $text = 'Release';
                $type = 1;
            }else{
                $text = 'Suspend';
                $type = 0;
            }

                echo CHtml::ajaxSubmitButton($text,Yii::app()->createUrl('admin/vehicles/suspendrelease'),
                                    array(
                                        'type'=>'POST',
                                        'data'=> 'js:{"id": '.$data->id.', "type": '.$type.' }',                        
                                        'success'=>'js:function(string){ console.log(string);jQuery(".processing").hide();location.reload();}'           
                                ),array('class'=>'btn btn-danger myclass','onclick' => 'js:{jQuery(".processing").show();}' ));
            ?>
            <span class="processing" style="display:none">Please wait....</span>
             </div>
    </div>
</div>

</fieldset>