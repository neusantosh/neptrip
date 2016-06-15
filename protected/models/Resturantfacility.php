<?php

/**
 * This is the model class for table "tbl_resturantfacility".
 *
 * The followings are the available columns in table 'tbl_resturantfacility':
 * @property integer $id
 * @property integer $resturant_id
 * @property integer $facility
 */
class Resturantfacility extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_resturantfacility';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('resturant_id, facility', 'required'),
			array('resturant_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, resturant_id, facility', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'resturant_id' => 'from tbl_resturants',
			'facility' => 'Facility',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('resturant_id',$this->resturant_id);
		$criteria->compare('facility',$this->facility);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Resturantfacility the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function findFacility($rid){
		$facilities = self::model()->findAllByAttributes(array('resturant_id'=>$rid));
		if(!empty($facilities) && is_array($facilities)){
			foreach($facilities as $facility):
				$criteria         		= new CDbCriteria;
				$criteria->select 		= 'facility';	
				$criteria->condition 	= "id=".$facility['facility'];
				$res_facilities[] 		= Resturantfacilities::model()->findAll($criteria);
			endforeach;
			if(!empty($res_facilities) && is_array($res_facilities)){
				foreach($res_facilities as $res_facility):
					$res_userfacilities[] = $res_facility[0]['facility'];
				endforeach;
			}


			if(!empty($res_userfacilities))
				return join(', ', $res_userfacilities);
			else
				return 'N/A';
		}
	}
}
