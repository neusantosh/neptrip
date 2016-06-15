<?php
/** 
 * 
 * @author Amamba Israel <i.amamba@yahoo.com>
 * @package 
 */
class UploadModel extends CFormModel
{		
	public $ImageFile;

	public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }	
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		/*
		* file size is 1MB(1048576)
		*/
		return array(
			array('ImageFile', 'required'),
			array('ImageFile','file', 'types'=>'jpg,jpeg,png,gif','maxSize'=>1048576,'tooLarge'=>'Image size cannot exceed 1MB','allowEmpty'=>true),
		);
	}
	
	
		
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ImageFile' => 'Upload',
		);
	}

}
