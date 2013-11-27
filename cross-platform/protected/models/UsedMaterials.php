<?php

/**
 * This is the model class for table "epm_used_materials".
 *
 * The followings are the available columns in table 'epm_used_materials':
 * @property integer $amount
 * @property integer $materialId
 * @property integer $workAccountId
 *
 * The followings are the available model relations:
 * @property Materials $material
 * @property WorkAccounts $workAccount
 */
class UsedMaterials extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'epm_used_materials';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, materialId, workAccountId', 'required'),
			array('amount, materialId, workAccountId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('amount, materialId, workAccountId', 'safe', 'on'=>'search'),
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
			'material' => array(self::BELONGS_TO, 'Materials', 'materialId'),
			'workAccount' => array(self::BELONGS_TO, 'WorkAccounts', 'workAccountId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'amount' => 'Količina',
			'materialId' => 'Materijal',
			'workAccountId' => 'Radni nalog',
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

		$criteria->compare('amount',$this->amount);
		$criteria->compare('materialId',$this->materialId);
		$criteria->compare('workAccountId',$this->workAccountId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsedMaterials the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
