<fieldset style="margin-top:40px;">
    <legend>Tours Details</legend>
<?php 
 if($data->image!='' && file_exists("images/tours/".$data->image))
        $image =  Yii::app()->baseUrl."/images/tours/".$data->image;
    else  
        $image = Yii::app()->baseUrl."/images/imagenotfound.png";

    $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=> $data,
    'attributes'=>array(
        array('name'=>'tour_name', 'label'=>'Name :'),
        array('name'=>'image', 'label'=>'Image :', 'type'=>'html' ,'value' => CHtml::tag('img',
                            array(
                                    "title" => $data->tour_name,
                                    "src"   => $image,
                                    "style" => "width:150px"
                                )
            )),
        array('name'=>'type', 'label'=>'Type :'),
        array('name'=>'package_price', 'label'=>'Package Price'),
        array('name'=>'tour_description', 'label'=>'Tour Description'),
        array('name'=>'address_on_map', 'label'=>'Address :'),
        array('name'=>'city_village', 'label'=>'City/Village:'),
        array('name'=>'district', 'label'=>'District:', 'value' => Districts::model()->getName($data->district)),
        array('name'=>'zone', 'label'=>'Zone:', 'value' => Zones::model()->getZoneName($data->zone)),
        array('name'=>'things_to_do', 'label'=>'Things to do :'),
        array('name'=>'latitude', 'label'=>'Latitude:'),
        array('name'=>'longitude', 'label'=>'Longitude :'),
        array('name'=>'phone_1', 'label'=>'Phone 1 :'),
        array('name'=>'phone_2', 'label'=>'Phone 2 :'),
        array('name'=>'fax', 'label'=>'Fax :'),
        array('name'=>'email', 'label'=>'Email :'),
        array('name'=>'facebook', 'label'=>'Facebook Link :'),
        array('name'=>'web', 'label'=>'Web Link :'),
        array('name'=>'contact_person', 'label'=>'Contact Person :'),
        array('name'=>'contact_person_role', 'label'=>'Role :'),
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

?>

<legend>Tours Images</legend>
    
<div class="galleryimages">
    <?php $galleryimages = Toursgallery::model()->findAllByAttributes(array('tour_id'=>$data->id));
        if(!empty($galleryimages) && is_array($galleryimages)){
                foreach ($galleryimages as $key => $value) {
                    if($value['image']!='' && file_exists("images/tours/gallery/".$value['image']))
                        $image =  Yii::app()->baseUrl."/images/tours/gallery/".$value['image'];
                     else  
                        $image = Yii::app()->baseUrl."/images/imagenotfound.png";

                    echo CHtml::tag('img',array( "title"=>$data->tour_name,"src"=>$image,"style"=>"height:150px;margin-right:5px;"));       
                }
            }else{
                echo 'No Image found';
            }
    ?>
</div>
<hr/>

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

                echo CHtml::ajaxSubmitButton($text,Yii::app()->createUrl('admin/venues/suspendrelease'),
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