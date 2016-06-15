<?php

/**
 * This is the model class for table "tbl_venuespecality".
 *
 * The followings are the available columns in table 'tbl_venuespecality':
 * @property integer $id
 * @property integer $venue_id
 * @property integer $specality
 */
class Venuespecality extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_venuespecality';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('venue_id, specality', 'required'),
			array('venue_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, venue_id, specality', 'safe', 'on'=>'search'),
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
			'venue_id' => 'from tbl_venue',
			'specality' => 'Specality',
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
		$criteria->compare('venue_id',$this->venue_id);
		$criteria->compare('specality',$this->specality);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Venuespecality the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public static function getSpecalities($vid){
		$venuespecalities = self::model()->findAllByAttributes(array('venue_id'=>$vid));
		if(!empty($venuespecalities) && is_array($venuespecalities)){
			foreach($venuespecalities as $venuespecality):
				$criteria = new CDbCriteria;
				$criteria->select = "venuespecilaties" ;
				$criteria->condition = "id=".$venuespecality['specality'];
				$specalities[] = Venuespecalities::model()->findAll($criteria);
			endforeach;
			
			if(!empty($specalities) && is_array($specalities)){
				foreach($specalities as $specality):
					$f_specalities[] = $specality[0]['venuespecilaties'];
				endforeach;
			}

			if(!empty($f_specalities))
				return join(', ', $f_specalities);
			else
				return 'N/A';
		}
	}
}
