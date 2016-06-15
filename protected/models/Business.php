<?php

/**
 * This is the model class for table "tbl_business".
 *
 * The followings are the available columns in table 'tbl_business':
 * @property integer $id
 * @property string $business_name
 * @property string $slug
 * @property integer $business_type
 * @property string $address
 * @property string $street_address
 * @property string $postal_address
 * @property string $city
 * @property integer $ward_number
 * @property string $property_block_no
 * @property string $zone
 * @property string $district
 * @property string $phone1
 * @property string $phone2
 * @property string $fax
 * @property string $email
 * @property string $web
 * @property string $fb_link
 * @property string $contact_person
 * @property string $contact_person_role
 * @property string $mobile
 * @property string $image
 * @property string $comments
 * @property string $username
 * @property string $password
 */
class Business extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_business';
	}

	public function behaviors(){
	  return array(
	    'sluggable' => array(
	      'class'=>'ext.behaviors.SluggableBehavior',
	      'columns' => array('business_name'),
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
			array('business_name, business_type, address, street_address, postal_address, city, ward_number, property_block_no, zone, district, phone1, email, contact_person, contact_person_role, mobile', 'required', 'on'=>'register,update'),
			array('email','email', 'on'=>'register,update'),
			array('email', 'unique', 'on'=>'register', 'message'=>'Email already exists'),
			array('business_name', 'unique', 'on'=>'register', 'message'=>'Business Name already exists'),
			array('web, fb_link','url', 'on'=>'register,update'),
			array('postal_address,ward_number,phone1,phone2,fax,mobile','numerical','on'=>'register,update'),
			array('username, password', 'required','on'=>'createuserpass'),
			array('username, password', 'length', 'max'=>10, 'min'=>5,'on'=>'createuserpass'),
			array('ward_number,status', 'numerical', 'integerOnly'=>true),
			array('business_name, business_type, slug, address, street_address, postal_address, city, property_block_no, zone, district, phone1, phone2, fax, email, web, fb_link, contact_person, contact_person_role, mobile, image,orginal_password', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, business_name, slug, business_type, address, street_address, postal_address, city, ward_number, property_block_no, zone, district, phone1, phone2, fax, email, web, fb_link, contact_person, contact_person_role, mobile, image, comments, username, password, status,orginal_password', 'safe', 'on'=>'search'),
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
			'business_name' => 'Business Name',
			'slug' => 'Slug',
			'business_type' => 'Business Type',
			'address' => 'Address',
			'street_address' => 'Street Address',
			'postal_address' => 'Postal Code',
			'city' => 'City',
			'ward_number' => 'Ward Number',
			'property_block_no' => 'Property Block No',
			'zone' => 'Zone',
			'district' => 'District',
			'phone1' => 'Phone1',
			'phone2' => 'Phone2',
			'fax' => 'Fax',
			'email' => 'Email',
			'web' => 'Web',
			'fb_link' => 'Fb Link',
			'contact_person' => 'Contact Person',
			'contact_person_role' => 'Contact Person Role',
			'mobile' => 'Mobile',
			'image' => 'Image',
			'comments' => 'Comments',
			'username' => 'Username',
			'password' => 'Password',
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
		$criteria->compare('business_name',$this->business_name,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('business_type',$this->business_type);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('street_address',$this->street_address,true);
		$criteria->compare('postal_address',$this->postal_address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('ward_number',$this->ward_number);
		$criteria->compare('property_block_no',$this->property_block_no,true);
		$criteria->compare('zone',$this->zone,true);
		$criteria->compare('district',$this->district,true);
		$criteria->compare('phone1',$this->phone1,true);
		$criteria->compare('phone2',$this->phone2,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('fb_link',$this->fb_link,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('contact_person_role',$this->contact_person_role,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Business the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getUsername($uid){
		$res = self::model()->findByPk($uid);
		if($res)
			return $res['username'];
		else
			return false;
	}

	
    
}
