<?php

/**
<<<<<<< HEAD
 * This is the model class for table "epm_config".
 *
 * The followings are the available columns in table 'epm_config':
 * @property integer $coId
 * @property integer $workAccountIncrement
 * @property integer $lastSystemLoginId
=======
 * This is the model class for table "{{config}}".
 *
 * The followings are the available columns in table '{{config}}':
 * @property integer $coId
 * @property integer $workAccountIncrement
>>>>>>> 44d3659f0c52dd7387bda5be17edd30d2ea69145
 */
class Config extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
<<<<<<< HEAD
		return 'epm_config';
=======
		return '{{config}}';
>>>>>>> 44d3659f0c52dd7387bda5be17edd30d2ea69145
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
<<<<<<< HEAD
			array('workAccountIncrement, lastSystemLoginId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('coId, workAccountIncrement, lastSystemLoginId', 'safe', 'on'=>'search'),
=======
			array('workAccountIncrement', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('coId, workAccountIncrement', 'safe', 'on'=>'search'),
>>>>>>> 44d3659f0c52dd7387bda5be17edd30d2ea69145
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
			'coId' => 'Co',
			'workAccountIncrement' => 'Work Account Increment',
<<<<<<< HEAD
			'lastSystemLoginId' => 'Last System Login',
=======
>>>>>>> 44d3659f0c52dd7387bda5be17edd30d2ea69145
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

		$criteria->compare('coId',$this->coId);
		$criteria->compare('workAccountIncrement',$this->workAccountIncrement);
<<<<<<< HEAD
		$criteria->compare('lastSystemLoginId',$this->lastSystemLoginId);
=======
>>>>>>> 44d3659f0c52dd7387bda5be17edd30d2ea69145

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Config the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
