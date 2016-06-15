<?php

/**
 * This is the model class for table "tbl_hotels".
 *
 * The followings are the available columns in table 'tbl_hotels':
 * @property integer $id
 * @property integer $business_user_id
 * @property string $hotel_name
 * @property integer $star_rating
 * @property string $hotel_image
 * @property string $hotel_description
 * @property string $zone
 * @property string $district
 * @property string $city_village
 * @property string $things_to_do
 * @property string $address_on_map
 * @property string $latitude
 * @property string $longitude
 * @property string $checkin_time
 * @property string $checkout_time
 * @property string $terms_policy
 * @property string $phone1
 * @property string $phone2
 * @property string $fax_no
 * @property string $email
 * @property string $facebook
 * @property string $web_url
 * @property string $contact_person
 * @property string $role
 * @property string $mobile_number
 * @property integer $status
 */
class Hotels extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_hotels';
	}

	public function behaviors(){
	  return array(
	    'sluggable' => array(
	      'class'=>'ext.behaviors.SluggableBehavior',
	      'columns' => array('hotel_name'),
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
			array('hotel_name, star_rating, hotel_description, zone, district, city_village, things_to_do, address_on_map, latitude, longitude, checkin_time, checkout_time, terms_policy, phone1, email, facebook, web_url, contact_person, role, mobile_number, status','required'),
			array('business_user_id, star_rating, status', 'numerical', 'integerOnly'=>true),
			array('hotel_name, hotel_image, zone, district, city_village, address_on_map, latitude, longitude, phone1, phone2, fax_no, email, facebook, web_url, contact_person, role, mobile_number', 'length', 'max'=>255),
			array('checkin_time, checkout_time,hotel_type', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, business_user_id, hotel_name, hotel_type, slug, star_rating, hotel_image, hotel_description, zone, district, city_village, things_to_do, address_on_map, latitude, longitude, checkin_time, checkout_time, terms_policy, phone1, phone2, fax_no, email, facebook, web_url, contact_person, role, mobile_number, status', 'safe', 'on'=>'search'),
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
			'hotel_name' => 'Hotel Name',
			'star_rating' => 'Star Rating',
			'hotel_image' => 'Hotel Image',
			'hotel_description' => 'Hotel Description',
			'zone' => 'Zone',
			'district' => 'District',
			'city_village' => 'City Village',
			'things_to_do' => 'Things To Do',
			'address_on_map' => 'Address On Map',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'checkin_time' => 'Checkin Time',
			'checkout_time' => 'Checkout Time',
			'terms_policy' => 'Terms Policy',
			'phone1' => 'Phone1',
			'phone2' => 'Phone2',
			'fax_no' => 'Fax No',
			'email' => 'Email',
			'facebook' => 'Facebook',
			'web_url' => 'Web Url',
			'contact_person' => 'Contact Person',
			'role' => 'Role',
			'mobile_number' => 'Mobile Number',
			'status' => 'Status',
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
		$criteria->compare('hotel_name',$this->hotel_name,true);
		$criteria->compare('star_rating',$this->star_rating);
		$criteria->compare('hotel_image',$this->hotel_image,true);
		$criteria->compare('hotel_description',$this->hotel_description,true);
		$criteria->compare('zone',$this->zone,true);
		$criteria->compare('district',$this->district,true);
		$criteria->compare('city_village',$this->city_village,true);
		$criteria->compare('things_to_do',$this->things_to_do,true);
		$criteria->compare('address_on_map',$this->address_on_map,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('checkin_time',$this->checkin_time,true);
		$criteria->compare('checkout_time',$this->checkout_time,true);
		$criteria->compare('terms_policy',$this->terms_policy,true);
		$criteria->compare('phone1',$this->phone1,true);
		$criteria->compare('phone2',$this->phone2,true);
		$criteria->compare('fax_no',$this->fax_no,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('web_url',$this->web_url,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hotels the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getHotelName($id){
		$criteria = new CDbCriteria;
		$criteria->select = 'hotel_name';
		$criteria->condition = 'id='.$id;
		$record = Hotels::model()->findAll($criteria);
		if(!empty($record) && is_array($record)){
			return $record[0]['hotel_name'];
		}else{
			return 'N/A';
		}

	}
}
