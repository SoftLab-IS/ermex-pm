<?php

/**
 * This is the model class for table "{{order}}".
 *
 * The followings are the available columns in table '{{order}}':
 * @property integer $orderId
 * @property string $title
 * @property string $description
 * @property double $price
 * @property string $amount
 * @property integer $woId
 * @property integer $deId
 * @property string $measurementUnit
 * @property double $totalePrice
 * @property string $pdv
 * @property integer $done
 *
 * The followings are the available model relations:
 * @property WorkAccounts $wo
 * @property Deliveries $de
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'epm_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('woId', 'required'),
			array('woId, deId, done', 'numerical', 'integerOnly'=>true),
			array('price, totalePrice', 'numerical'),
			array('title', 'length', 'max'=>255),
			array('amount, measurementUnit, pdv', 'length', 'max'=>45),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('orderId, title, description, price, amount, woId, deId, measurementUnit, totalePrice, pdv, done', 'safe', 'on'=>'search'),
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
			'wo' => array(self::BELONGS_TO, 'WorkAccounts', 'woId'),
			'de' => array(self::BELONGS_TO, 'Deliveries', 'deId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'orderId' => 'Order',
			'title' => 'Title',
			'description' => 'Description',
			'price' => 'Price',
			'amount' => 'Amount',
			'woId' => 'Wo',
			'deId' => 'De',
			'measurementUnit' => 'Measurement Unit',
			'totalePrice' => 'Totale Price',
			'pdv' => 'Pdv',
			'done' => 'Done',
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

		$criteria->compare('orderId',$this->orderId);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('woId',$this->woId);
		$criteria->compare('deId',$this->deId);
		$criteria->compare('measurementUnit',$this->measurementUnit,true);
		$criteria->compare('totalePrice',$this->totalePrice);
		$criteria->compare('pdv',$this->pdv,true);
		$criteria->compare('done',$this->done);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}