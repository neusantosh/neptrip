<?php

/**
 * This is the model class for table "tbl_newsletters".
 *
 * The followings are the available columns in table 'tbl_newsletters':
 * @property integer $id
 * @property string $newsletter_title
 * @property string $newsletter_slug
 * @property string $newsletter_content
 * @property integer $status
 */
class Newsletters extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_newsletters';
	}

	public function behaviors(){
	  return array(
	    'sluggable' => array(
	      'class'=>'ext.behaviors.SluggableBehavior',
	      'columns' => array('newsletter_title'),
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
			array('newsletter_title,newsletter_content,status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('newsletter_title, slug', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, newsletter_title, slug, newsletter_content, status', 'safe', 'on'=>'search'),
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
			'newsletter_title' => 'Newsletter Title',
			'newsletter_slug' => 'Newsletter Slug',
			'newsletter_content' => 'Newsletter Content',
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
		$criteria->compare('newsletter_title',$this->newsletter_title,true);
		$criteria->compare('newsletter_slug',$this->newsletter_slug,true);
		$criteria->compare('newsletter_content',$this->newsletter_content,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Newsletters the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
