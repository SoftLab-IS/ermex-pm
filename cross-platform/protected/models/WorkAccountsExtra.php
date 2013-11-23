<?php

/**
 * This is the model class for table "{{work_accounts_extra}}".
 *
 * The followings are the available columns in table '{{work_accounts_extra}}':
 * @property integer $woId
 * @property string $name
 * @property string $description
 * @property integer $workAccountId
 *
 * The followings are the available model relations:
 * @property WorkAccounts $workAccount
 */
class WorkAccountsExtra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{work_accounts_extra}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, workAccountId', 'required'),
			array('workAccountId', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('woId, name, description, workAccountId', 'safe', 'on'=>'search'),
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
			'workAccount' => array(self::BELONGS_TO, 'WorkAccounts', 'workAccountId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'woId' => 'Wo',
			'name' => 'Name',
			'description' => 'Description',
			'workAccountId' => 'Work Account',
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

		$criteria->compare('woId',$this->woId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('workAccountId',$this->workAccountId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WorkAccountsExtra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
