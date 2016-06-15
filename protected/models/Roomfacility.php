<?php

/**
 * This is the model class for table "tbl_roomfacility".
 *
 * The followings are the available columns in table 'tbl_roomfacility':
 * @property integer $id
 * @property integer $room_id
 * @property integer $facility
 */
class Roomfacility extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_roomfacility';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_id, facility', 'required'),
			array('room_id', 'numerical', 'integerOnly'=>true),
			array('facility', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, room_id, facility', 'safe', 'on'=>'search'),
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
			'room_id' => 'from tbl_room',
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
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('facility',$this->facility);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Roomfacility the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getAllRoomFacilities($room_id){
		$results = self::model()->findAllByAttributes(array('room_id'=>$room_id));
		$facilities = array();
		if(!empty($results) && is_array($results)){
			foreach($results as $result):
				$criteria 			= new CDbCriteria;
				$criteria->select 	= "roomfacility";
				$criteria->condition = "id=".$result['facility'];
				$facilities[] 				 = Roomfacilities::model()->findAll($criteria);
			endforeach;

			if(!empty($facilities) && is_array($facilities)){
				foreach($facilities as $key => $facility):
					$f_facility[] = $facility[0]['roomfacility'];
				endforeach;

				if(!empty($f_facility) && is_array($f_facility))
					return join(', ', $f_facility);
				else
					return 'N/A';
			}
		}
	}
}
