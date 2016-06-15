<?php

/**
 * This is the model class for table "tbl_siteconfig".
 *
 * The followings are the available columns in table 'tbl_siteconfig':
 * @property integer $id
 * @property string $seo_meta_keywords
 * @property string $seo_meta_title
 * @property string $seo_meta_description
 * @property string $fb_link
 * @property string $google_link
 * @property string $twitter_link
 */
class Siteconfig extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_siteconfig';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('seo_meta_keywords, seo_meta_title, seo_meta_description', 'required'),
			array('fb_link, google_link, twitter_link', 'url'),
			array('seo_meta_keywords, seo_meta_title, fb_link, google_link, twitter_link', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, seo_meta_keywords, seo_meta_title, seo_meta_description, fb_link, google_link, twitter_link', 'safe', 'on'=>'search'),
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
			'seo_meta_keywords' => 'Seo Meta Keywords',
			'seo_meta_title' => 'Seo Meta Title',
			'seo_meta_description' => 'Seo Meta Description',
			'fb_link' => 'Fb Link',
			'google_link' => 'Google Link',
			'twitter_link' => 'Twitter Link',
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
		$criteria->compare('seo_meta_keywords',$this->seo_meta_keywords,true);
		$criteria->compare('seo_meta_title',$this->seo_meta_title,true);
		$criteria->compare('seo_meta_description',$this->seo_meta_description,true);
		$criteria->compare('fb_link',$this->fb_link,true);
		$criteria->compare('google_link',$this->google_link,true);
		$criteria->compare('twitter_link',$this->twitter_link,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Siteconfig the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
