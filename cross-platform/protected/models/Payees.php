<?php

/**
<<<<<<< HEAD
 * This is the model class for table "epm_payees".
 *
 * The followings are the available columns in table 'epm_payees':
 * @property integer $paId
 * @property string $name
=======
 * This is the model class for table "{{payees}}".
 *
 * The followings are the available columns in table '{{payees}}':
 * @property integer $paId
 * @property string $name
 * @property string $address
 * @property string $contactPerson
>>>>>>> 44d3659f0c52dd7387bda5be17edd30d2ea69145
 * @property string $contactInfo
 *
 * The followings are the available model relations:
 * @property WorkAccounts[] $workAccounts
 */
class Payees extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
<<<<<<< HEAD
		return 'epm_payees';
=======
		return '{{payees}}';
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
			array('name, contactInfo', 'required'),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('paId, name, contactInfo', 'safe', 'on'=>'search'),
=======
			array('name, address, contactPerson, contactInfo', 'required'),
			array('name, address, contactPerson, contactInfo', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('paId, name, address, contactPerson, contactInfo', 'safe', 'on'=>'search'),
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
			'workAccounts' => array(self::HAS_MANY, 'WorkAccounts', 'payeeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'paId' => 'Pa',
			'name' => 'Name',
<<<<<<< HEAD
=======
			'address' => 'Address',
			'contactPerson' => 'Contact Person',
>>>>>>> 44d3659f0c52dd7387bda5be17edd30d2ea69145
			'contactInfo' => 'Contact Info',
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

		$criteria->compare('paId',$this->paId);
		$criteria->compare('name',$this->name,true);
<<<<<<< HEAD
=======
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contactPerson',$this->contactPerson,true);
>>>>>>> 44d3659f0c52dd7387bda5be17edd30d2ea69145
		$criteria->compare('contactInfo',$this->contactInfo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Payees the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
