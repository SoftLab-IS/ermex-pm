<?php

/**
<<<<<<< HEAD
 * This is the model class for table "epm_materials".
 *
 * The followings are the available columns in table 'epm_materials':
 * @property integer $maId
 * @property string $name
 * @property string $description
 * @property double $amount
 * @property string $enterDate
 * @property string $dimensionUnit
=======
 * This is the model class for table "{{materials}}".
 *
 * The followings are the available columns in table '{{materials}}':
 * @property integer $maId
 * @property string $name
 * @property string $description
 * @property integer $amount
 * @property string $enterDate
>>>>>>> 44d3659f0c52dd7387bda5be17edd30d2ea69145
 *
 * The followings are the available model relations:
 * @property UsedMaterials[] $usedMaterials
 */
class Materials extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
<<<<<<< HEAD
		return 'epm_materials';
=======
		return '{{materials}}';
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
			array('name, description, amount, enterDate, dimensionUnit', 'required'),
			array('amount', 'numerical'),
			array('name', 'length', 'max'=>255),
			array('enterDate', 'length', 'max'=>21),
			array('dimensionUnit', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('maId, name, description, amount, enterDate, dimensionUnit', 'safe', 'on'=>'search'),
=======
			array('name, description, amount, enterDate', 'required'),
			array('amount', 'numerical', 'integerOnly'=>true),
			array('name, description', 'length', 'max'=>255),
			array('enterDate', 'length', 'max'=>21),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('maId, name, description, amount, enterDate', 'safe', 'on'=>'search'),
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
			'usedMaterials' => array(self::HAS_MANY, 'UsedMaterials', 'materialId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'maId' => 'Ma',
			'name' => 'Name',
			'description' => 'Description',
			'amount' => 'Amount',
			'enterDate' => 'Enter Date',
<<<<<<< HEAD
			'dimensionUnit' => 'Dimension Unit',
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

		$criteria->compare('maId',$this->maId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('enterDate',$this->enterDate,true);
<<<<<<< HEAD
		$criteria->compare('dimensionUnit',$this->dimensionUnit,true);
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
	 * @return Materials the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
