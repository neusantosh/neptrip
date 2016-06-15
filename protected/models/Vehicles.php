<?php

/**
 * This is the model class for table "tbl_vehicles".
 *
 * The followings are the available columns in table 'tbl_vehicles':
 * @property integer $id
 * @property integer $business_user_id
 * @property string $car_name
 * @property string $slug
 * @property string $image
 * @property string $car_description
 * @property integer $passenger
 * @property integer $car_door
 * @property string $transmission
 * @property string $baggage
 * @property integer $airport_pickup
 * @property string $car_type
 * @property string $pick_up_location
 * @property string $drop_off_location
 * @property string $price
 * @property string $terms_and_condition
 * @property string $phone_1
 * @property string $phone_2
 * @property string $fax
 * @property string $email
 * @property string $facebook
 * @property string $web
 * @property string $contact_person
 * @property string $role
 * @property string $mobile_number
 * @property string $address_on_map
 * @property string $latitude
 * @property string $longitude
 */
class Vehicles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_vehicles';
	}


	public function behaviors(){
	  return array(
	    'sluggable' => array(
	      'class'=>'ext.behaviors.SluggableBehavior',
	      'columns' => array('car_name'),
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
			array('car_name, status, car_description, passenger, car_door, transmission, baggage, car_type, pick_up_location, drop_off_location, price, terms_and_condition, phone_1, email, facebook, web, contact_person, role, mobile_number, airport_pickup', 'required'),
			array('business_user_id, passenger, car_door, airport_pickup', 'numerical', 'integerOnly'=>true),
			array('car_name, slug, image, transmission, baggage, car_type, pick_up_location, drop_off_location, price, phone_1, phone_2, fax, email, facebook, web, contact_person, role, mobile_number, address_on_map, latitude, longitude', 'length', 'max'=>255),
			array('email','email'),
			array('facebook, web','url'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, business_user_id, status, car_name, slug, image, car_description, passenger, car_door, transmission, baggage, airport_pickup, car_type, pick_up_location, drop_off_location, price, terms_and_condition, phone_1, phone_2, fax, email, facebook, web, contact_person, role, mobile_number, suspend', 'safe', 'on'=>'search'),
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
			'business_user_id' => 'from tbl_business',
			'car_name' => 'Car Name',
			'slug' => 'Slug',
			'image' => 'Image',
			'car_description' => 'Car Description',
			'passenger' => 'Passenger',
			'car_door' => 'Car Door',
			'transmission' => 'Transmission',
			'baggage' => 'Baggage',
			'airport_pickup' => 'Airport Pickup',
			'car_type' => 'Car Type',
			'pick_up_location' => 'Pick Up Location',
			'drop_off_location' => 'Drop Off Location',
			'price' => 'Price',
			'terms_and_condition' => 'Terms And Condition',
			'phone_1' => 'Phone 1',
			'phone_2' => 'Phone 2',
			'fax' => 'Fax',
			'email' => 'Email',
			'facebook' => 'Facebook',
			'web' => 'Web',
			'contact_person' => 'Contact Person',
			'role' => 'Role',
			'mobile_number' => 'Mobile Number',
			'address_on_map' => 'Address On Map',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
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
		$criteria->compare('business_user_id',$this->business_user_id);
		$criteria->compare('car_name',$this->car_name,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('car_description',$this->car_description,true);
		$criteria->compare('passenger',$this->passenger);
		$criteria->compare('car_door',$this->car_door);
		$criteria->compare('transmission',$this->transmission,true);
		$criteria->compare('baggage',$this->baggage,true);
		$criteria->compare('airport_pickup',$this->airport_pickup);
		$criteria->compare('car_type',$this->car_type,true);
		$criteria->compare('pick_up_location',$this->pick_up_location,true);
		$criteria->compare('drop_off_location',$this->drop_off_location,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('terms_and_condition',$this->terms_and_condition,true);
		$criteria->compare('phone_1',$this->phone_1,true);
		$criteria->compare('phone_2',$this->phone_2,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('address_on_map',$this->address_on_map,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vehicles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
