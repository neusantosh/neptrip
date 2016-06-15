<fieldset style="margin-top:40px;">
    <legend>Hotels Details</legend>
<?php 
    if($data->hotel_image!='' && file_exists("images/hotels/".$data->hotel_image))
        $image =  Yii::app()->baseUrl."/images/hotels/".$data->hotel_image;
    else  
        $image = Yii::app()->baseUrl."/images/imagenotfound.png";

    $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=> $data,
    'attributes'=>array(
        array('name'=>'hotel_name', 'label'=>'Name :'),
        array('name'=>'hotel_image', 'label'=>'Image :', 'type'=>'html' ,'value' => CHtml::tag('img',
                            array(
                                    "title"=>$data->hotel_name,                                   
                                    "src"=>$image,
                                    "style"=>"height:150px"
                                )
            )),
        array('name'=>'hotel_type', 'label'=>'Hotel Type :'),
        array('name'=>'hotel_description', 'label'=>'Description'),
        array('name'=>'address_on_map', 'label'=>'Address :'),
        array('name'=>'city_village', 'label'=>'City/Village:'),
        array('name'=>'district', 'label'=>'District:', 'value' => Districts::model()->getName($data->district)),
        array('name'=>'zone', 'label'=>'Zone:', 'value' => Zones::model()->getZoneName($data->zone)),
        array('name'=>'things_to_do', 'label'=>'Things to do :'),
        array('name'=>'latitude', 'label'=>'Latitude:'),
        array('name'=>'longitude', 'label'=>'Longitude :'),
        array('name'=>'checkin_time', 'label'=>'Check in time :'),
        array('name'=>'checkout_time', 'label'=>'Check out Time :'),
        array('name'=>'phone1', 'label'=>'Phone 1 :'),
        array('name'=>'phone2', 'label'=>'Phone 2 :'),
        array('name'=>'fax_no', 'label'=>'Fax :'),
        array('name'=>'email', 'label'=>'Email :'),
        array('name'=>'facebook', 'label'=>'Facebook Link :'),
        array('name'=>'web_url', 'label'=>'Web Link :'),
        array('name'=>'contact_person', 'label'=>'Contact Person :'),
        array('name'=>'role', 'label'=>'Role :'),
        array('name'=>'mobile_number', 'label'=>'Mobile Number :'),
        array('name'=>'facilities', 'label'=>'Facility :','value'=>Hotelfacilities::getAllHotelFacilities($data->id)),
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
<legend>Hotels Images</legend>
    
<div class="galleryimages">
    <?php $galleryimages = Hotelgallery::model()->findAllByAttributes(array('hotel_id'=>$data->id,'status'=>1));
        if(!empty($galleryimages) && is_array($galleryimages)){
                foreach ($galleryimages as $key => $value) {
                    if($value['image']!='' && file_exists("images/hotels/gallery/".$value['image']))
                        $image =  Yii::app()->baseUrl."/images/hotels/gallery/".$value['image'];
                     else  
                        $image = Yii::app()->baseUrl."/images/imagenotfound.png";

                    echo CHtml::tag('img',array( "title"=>$data->hotel_name,"src"=>$image,"style"=>"height:150px;margin-right:5px;"));       
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

                echo CHtml::ajaxSubmitButton($text,Yii::app()->createUrl('admin/hotels/suspendrelease'),
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
