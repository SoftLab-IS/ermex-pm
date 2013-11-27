<?php

/**
 * This is the model class for table "epm_deliveries".
 *
 * The followings are the available columns in table 'epm_deliveries':
 * @property integer $deId
 * @property string $deliveryDate
 * @property double $price
 * @property string $note
 * @property integer $payType
 * @property integer $reconciled
 * @property integer $invalid
 * @property integer $authorId
 * @property integer $workAccountId
 *
 * The followings are the available model relations:
 * @property WorkAccounts $workAccount
 * @property Users $author
 */
class Deliveries extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'epm_deliveries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deliveryDate, price, note, payType, authorId, workAccountId', 'required'),
			array('payType, reconciled, invalid, authorId, workAccountId', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('deliveryDate', 'length', 'max'=>21),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('deId, deliveryDate, price, note, payType, reconciled, invalid, authorId, workAccountId', 'safe', 'on'=>'search'),
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
			'author' => array(self::BELONGS_TO, 'Users', 'authorId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'deId' => 'De',
			'deliveryDate' => 'Datum dostave',
			'price' => 'Cijena',
			'note' => 'Napomena',
			'payType' => 'Način plaćanja',
			'reconciled' => 'Zaključen',
			'invalid' => 'Nevažeći',
			'authorId' => 'Autor',
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

		$criteria->compare('deId',$this->deId);
		$criteria->compare('deliveryDate',$this->deliveryDate,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('payType',$this->payType);
		$criteria->compare('reconciled',$this->reconciled);
		$criteria->compare('invalid',$this->invalid);
		$criteria->compare('authorId',$this->authorId);
		$criteria->compare('workAccountId',$this->workAccountId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Deliveries the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
