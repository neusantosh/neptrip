<fieldset style="margin-top:40px;">
    <legend>User Business Details</legend>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=> $data,
    'attributes'=>array(
        array('name'=>'business_name', 'label'=>'Business Name :'),
        array('name'=>'business_type', 'label'=>'Business Type :'),
        array('name'=>'address', 'label'=>'Address :'),
        array('name'=>'street_address', 'label'=>'Street Address :'),
        array('name'=>'property_block_no', 'label'=>'Property Block Number :'),
        array('name'=>'postal_address', 'label'=>'Postal Code :'),
        array('name'=>'ward_number', 'label'=>'Ward Number :'),
        array('name'=>'city', 'label'=>'City :'),
        array('name'=>'district', 'label'=>'District :'),
		array('name'=>'zone', 'label'=>'Zone :'),
		array('name'=>'phone1', 'label'=>'Phone Number :'),
		array('name'=>'phone2', 'label'=>'Phone Number :'),
		array('name'=>'fax', 'label'=>'Fax :'),
		array('name'=>'email', 'label'=>'Email :'),
		array('name'=>'web', 'label'=>'Web :'),
		array('name'=>'fb_link', 'label'=>'Facebok Link :'),
		array('name'=>'contact_person', 'label'=>'Contact Person :'),
		array('name'=>'contact_person_role', 'label'=>'Contact Person Role :'),
		array('name'=>'mobile', 'label'=>'Mobile :'),
		array('name'=>'image', 'label'=>'Image :', 'type'=>'html' ,'value' => CHtml::tag('img',
                			array(
                					"title"=>$data->business_name,
                					"src"=>Yii::app()->baseUrl."/images/business/".$data->image?Yii::app()->baseUrl."/images/business/".$data->image:Yii::app()->baseUrl."/images/imagenotfound.png",
                					"style"=>"height:70px"
                				)
            )),
		array('name'=>'username', 'label'=>'Username :'),
		array('name'=>'orginal_password', 'label'=>'Password :'),
        array('name'=>'status', 'label'=>'Status :','value' => getStatusName($data->status)),
    ),
)); 

function getStatusName($status){
	if($status == 0)
		return 'Not Approved';
	if($status == 1)
		return 'Approved';
	if($status == 2)
		return "Rejected";
}

?>

</fieldset>