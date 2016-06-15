<?php

/**
 * This is the model class for table "tbl_tours".
 *
 * The followings are the available columns in table 'tbl_tours':
 * @property integer $id
 * @property integer $status
 * @property string $business_name
 * @property string $tour_name
 * @property string $slug
 * @property string $image
 * @property string $tour_description
 * @property string $type
 * @property integer $zone
 * @property integer $district
 * @property string $city_village
 * @property integer $package_price
 * @property string $things_to_do
 * @property string $terms_and_policy
 * @property integer $phone_1
 * @property integer $phone_2
 * @property integer $fax
 * @property string $email
 * @property string $facebook
 * @property string $web
 * @property string $contact_person
 * @property string $contact_person_role
 * @property integer $mobile_number
 * @property string $address_on_map
 * @property string $latitude
 * @property string $longitude
 */
class Tours extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_tours';
	}

	public function behaviors(){
	  return array(
	    'sluggable' => array(
	      'class'=>'ext.behaviors.SluggableBehavior',
	      'columns' => array('tour_name'),
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
			array('business_name, tour_name, tour_description, type, zone, district, city_village, package_price, things_to_do, terms_and_policy, phone_1, email, facebook, web, contact_person, contact_person_role, mobile_number, address_on_map, latitude, longitude', 'required'),
			array('status, package_price', 'numerical'),
			array('email','email'),
			array('facebook, web','url'),
			array('business_name, tour_name, slug, image, type, city_village, email, facebook, web, contact_person, contact_person_role, address_on_map, latitude, longitude, phone_1, phone_2, fax', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, status, business_name, tour_name, slug, image, tour_description, type, zone, district, city_village, package_price, things_to_do, terms_and_policy, phone_1, phone_2, fax, email, facebook, web, contact_person, contact_person_role, mobile_number, address_on_map, latitude, longitude,business_user_id,suspend', 'safe', 'on'=>'search'),
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
			'status' => 'Status',
			'business_name' => 'Business Name',
			'tour_name' => 'Tour Name',
			'slug' => 'Slug',
			'image' => 'Image',
			'tour_description' => 'Tour Description',
			'type' => 'Type',
			'zone' => 'Zone',
			'district' => 'District',
			'city_village' => 'City Village',
			'package_price' => 'Package Price',
			'things_to_do' => 'Things To Do',
			'terms_and_policy' => 'Terms And Policy',
			'phone_1' => 'Phone 1',
			'phone_2' => 'Phone 2',
			'fax' => 'Fax',
			'email' => 'Email',
			'facebook' => 'Facebook',
			'web' => 'Web',
			'contact_person' => 'Contact Person',
			'contact_person_role' => 'Contact Person Role',
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
		$criteria->compare('status',$this->status);
		$criteria->compare('business_name',$this->business_name,true);
		$criteria->compare('tour_name',$this->tour_name,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('tour_description',$this->tour_description,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('zone',$this->zone);
		$criteria->compare('district',$this->district);
		$criteria->compare('city_village',$this->city_village,true);
		$criteria->compare('package_price',$this->package_price);
		$criteria->compare('things_to_do',$this->things_to_do,true);
		$criteria->compare('terms_and_policy',$this->terms_and_policy,true);
		$criteria->compare('phone_1',$this->phone_1);
		$criteria->compare('phone_2',$this->phone_2);
		$criteria->compare('fax',$this->fax);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('contact_person_role',$this->contact_person_role,true);
		$criteria->compare('mobile_number',$this->mobile_number);
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
	 * @return Tours the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
