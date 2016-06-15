<?php

/**
 * This is the model class for table "tbl_pages".
 *
 * The followings are the available columns in table 'tbl_pages':
 * @property integer $id
 * @property string $page_title
 * @property string $page_description
 * @property string $page_seo_meta_keywords
 * @property string $page_seo_meta_title
 * @property string $page_seo_meta_description
 */
class Pages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_pages';
	}

	public function behaviors(){
	  return array(
	    'sluggable' => array(
	      'class'=>'ext.behaviors.SluggableBehavior',
	      'columns' => array('page_title'),
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
			array('page_title, page_description,page_status', 'required'),
			array('page_title, page_seo_meta_keywords, page_seo_meta_title,	slug', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, page_title, page_description, page_seo_meta_keywords, page_seo_meta_title, page_seo_meta_description, slug, page_status', 'safe', 'on'=>'search'),
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
			'page_title' => 'Page Title',
			'page_description' => 'Page Description',
			'page_seo_meta_keywords' => 'Page Seo Meta Keywords',
			'page_seo_meta_title' => 'Page Seo Meta Title',
			'page_seo_meta_description' => 'Page Seo Meta Description',
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
		$criteria->compare('page_title',$this->page_title,true);
		$criteria->compare('page_description',$this->page_description,true);
		$criteria->compare('page_seo_meta_keywords',$this->page_seo_meta_keywords,true);
		$criteria->compare('page_seo_meta_title',$this->page_seo_meta_title,true);
		$criteria->compare('page_seo_meta_description',$this->page_seo_meta_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
