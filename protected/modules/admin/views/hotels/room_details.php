<fieldset style="margin-top:40px;">
    <legend>Room Details</legend>
<?php 
    $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=> $data,
    'attributes'=>array(
        array('name'=>'name', 'label'=>'Name :'),
        array('name'=>'room_type', 'label'=>'Room Type :'),
        array('name'=>'description', 'label'=>'Description'),
        array('name'=>'price', 'label'=>'Price :'),
        array('name'=>'no_rooms', 'label'=>'No of Rooms:'),
        array('name'=>'minimum_stay', 'label'=>'Minimum Stay :'),
        array('name'=>'max_adults', 'label'=>'Max Adults:'),
        array('name'=>'max_children', 'label'=>'Max Children :'),
        array('name'=>'no_extrabed', 'label'=>'Number of extrabed:'),
        array('name'=>'bedcharges', 'label'=>'Bed charges:'),
        array('name'=>'facilities', 'label'=>'Facility :','value'=>Roomfacility::getAllRoomFacilities($data->id)),
        array('name'=>'status', 'label'=>'Status :','value' => getStatusName($data->status)),
        //array('name'=>'suspend', 'label'=>'Is suspended? :','value' => isSuspended($data->suspend)),
    ),
)); 

    function getStatusName($status){
    	if($status == 0)
    		return 'Not Approved';
    	if($status == 1)
    		return 'Approved';
    }

?>
<legend>Room Images</legend>
<div class="galleryimages">
    <?php $galleryimages = Roomgallery::model()->findAllByAttributes(array('room_id'=>$data->id,'status'=>1));

        if(!empty($galleryimages) && is_array($galleryimages)){
                foreach ($galleryimages as $key => $value) {
                    if($value['image']!='' && file_exists("images/rooms/".$value['image']))
                        $image =  Yii::app()->baseUrl."/images/rooms/".$value['image'];
                     else  
                        $image = Yii::app()->baseUrl."/images/imagenotfound.png";

                    echo CHtml::tag('img',array( "title"=>$data->name,"src"=>$image,"style"=>"height:150px;margin-right:5px;"));       
                }
            }else{
                echo 'No Image found';
            }
    ?>
</div>
</fieldset>
