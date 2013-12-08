<?php

/**
 * This is the model class for table "epm_materials".
 *
 * The followings are the available columns in table 'epm_materials':
 * @property integer $maId
 * @property string $name
 * @property string $description
 * @property double $amount
 * @property string $enterDate
 * @property string $dimensionUnit
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
		return 'epm_materials';
	}

	/**
	 * @author Aleksandar Panic
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('name, description, amount, enterDate, dimensionUnit', 'required'),
			array('amount', 'numerical'),
			array('name', 'length', 'max'=>255),
			array('enterDate', 'length', 'max'=>21),
			array('dimensionUnit', 'length', 'max'=>45),
			array('maId, name, description, amount, enterDate, dimensionUnit', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @author Aleksandar Panic
	 *
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'usedMaterials' => array(self::HAS_MANY, 'UsedMaterials', 'materialId'),
		);
	}
	
	/**
	 * Name Search
	 * 
	 * @author Milan Krunic
	 * 
	 * @param string $name Name which will be searched.
	 * @return Materials
	 */
	public function nameSearch($name)
	{
		$this->getDbCriteria()->mergeWith(array(
			'condition' => $this->tableAlias . ".name LIKE '%:match%'",
			'params' => array(':match' => $name)			
		));
		
		return $this;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'moId' => 'ID',
			'name' => 'Naziv',
			'description' => 'Opis',
			'amount' => 'Količina',
			'enterDate' => 'Datum Unosa',
			'dimensionUnit' => 'Mjerna jedinica',
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
		$criteria->compare('dimensionUnit',$this->dimensionUnit,true);

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
