<?php

/**
 * This is the model class for table "tbl_resturantdiningstyle".
 *
 * The followings are the available columns in table 'tbl_resturantdiningstyle':
 * @property integer $id
 * @property integer $resturant_id
 * @property string $resturant_diningstyle
 */
class Resturantdiningstyle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_resturantdiningstyle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('resturant_id, resturant_diningstyle', 'required'),
			array('resturant_id', 'numerical', 'integerOnly'=>true),
			array('resturant_diningstyle', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, resturant_id, resturant_diningstyle', 'safe', 'on'=>'search'),
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
			'resturant_id' => 'from tbl_resturants',
			'resturant_diningstyle' => 'Resturant Diningstyle',
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
		$criteria->compare('resturant_id',$this->resturant_id);
		$criteria->compare('resturant_diningstyle',$this->resturant_diningstyle,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Resturantdiningstyle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function findDiningstyle($res_id){
		$dinningstyles = self::model()->findAllByAttributes(array('resturant_id'=>$res_id));
		if(!empty($dinningstyles) && is_array($dinningstyles)){
			foreach($dinningstyles as $dinningstyle):
				$criteria            = new CDbCriteria;
				$criteria->select 	 = 'diningstyle';
				$criteria->condition = 'id='.$dinningstyle['resturant_diningstyle'];
				$res_diningstyles[]  = Diningstyles::model()->findAll($criteria);
			endforeach;

			if(!empty($res_diningstyles) && is_array($res_diningstyles)){
				foreach($res_diningstyles as $res_diningstyle):
					$selected_styles[] = $res_diningstyle[0]['diningstyle'];
				endforeach;
			}

			if(!empty($selected_styles))
				return join(', ', $selected_styles);
			else
				return 'N/A';
		}
	}
}
