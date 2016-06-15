<?php

/**
 * This is the model class for table "tbl_hotelfacilities".
 *
 * The followings are the available columns in table 'tbl_hotelfacilities':
 * @property integer $id
 * @property integer $hotel_id
 * @property integer $facility
 */
class Hotelfacilities extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_hotelfacilities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hotel_id, facility', 'required'),
			array('hotel_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hotel_id, facility', 'safe', 'on'=>'search'),
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
			'hotel_id' => 'fromtbl_hotels',
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
		$criteria->compare('hotel_id',$this->hotel_id);
		$criteria->compare('facility',$this->facility);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hotelfacilities the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getAllHotelFacilities($hotel_id){
		$results = Hotelfacilities::model()->findAllByAttributes(array('hotel_id'=>$hotel_id));
		$facilities = array();
		if(!empty($results) && is_array($results)){
			foreach($results as $result):
				$criteria 			= new CDbCriteria;
				$criteria->select 	= "facility";
				$criteria->condition = "id=".$result['facility'];
				$facilities[] 				 = Facilities::model()->findAll($criteria);
			endforeach;

			if(!empty($facilities) && is_array($facilities)){
				foreach($facilities as $key => $facility):
					$f_facility[] = $facility[0]['facility'];
				endforeach;

				if(!empty($f_facility) && is_array($f_facility))
					return join(', ', $f_facility);
				else
					return 'N/A';
			}
		}
	}
}
