<?php

/**
 * This is the model class for table "tbl_hotelrooms".
 *
 * The followings are the available columns in table 'tbl_hotelrooms':
 * @property integer $id
 * @property integer $hotel_id
 * @property integer $status
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $price
 * @property integer $no_rooms
 * @property integer $minimum_stay
 * @property integer $room_type
 * @property integer $max_adults
 * @property integer $max_children
 * @property integer $no_extrabed
 */
class Hotelrooms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_hotelrooms';
	}

	public function behaviors(){
	  return array(
	    'sluggable' => array(
	      'class'=>'ext.behaviors.SluggableBehavior',
	      'columns' => array('name'),
	      'unique' => true,
	      'update' => true,
	    ),
	  );
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hotel_id, name, description, price, no_rooms, minimum_stay, room_type, max_adults, max_children, no_extrabed,bedcharges', 'required'),
			array('hotel_id, status, no_rooms, minimum_stay, room_type, no_extrabed,bedcharges', 'numerical', 'integerOnly'=>true),
			array('max_adults, max_children', 'numerical'),
			array('name, slug, price', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, hotel_id, status, name, slug, description, price, no_rooms, minimum_stay, room_type, max_adults, max_children, no_extrabed,bedcharges', 'safe', 'on'=>'search'),
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
			'hotel_id' => 'from tbl_hotels',
			'status' => 'Status',
			'name' => 'Name',
			'slug' => 'Slug',
			'description' => 'Description',
			'price' => 'Price',
			'no_rooms' => 'No Rooms',
			'minimum_stay' => 'Minimum Stay',
			'room_type' => 'Room Type',
			'max_adults' => 'Max Adults',
			'max_children' => 'Max Children',
			'no_extrabed' => 'No Extrabed',
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
		$criteria->compare('status',$this->status);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('no_rooms',$this->no_rooms);
		$criteria->compare('minimum_stay',$this->minimum_stay);
		$criteria->compare('room_type',$this->room_type);
		$criteria->compare('max_adults',$this->max_adults);
		$criteria->compare('max_children',$this->max_children);
		$criteria->compare('no_extrabed',$this->no_extrabed);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hotelrooms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
