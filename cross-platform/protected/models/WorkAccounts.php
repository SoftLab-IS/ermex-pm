<?php

/**
 * This is the model class for table "{{work_accounts}}".
 *
 * The followings are the available columns in table '{{work_accounts}}':
 * @property integer $woId
 * @property string $workAccountSerial
 * @property string $name
 * @property string $description
 * @property string $payeeName
 * @property string $payeeAddress
 * @property string $payeeContactPerson
 * @property string $payeeContactInfo
 * @property string $creationDate
 * @property string $deadlineDate
 * @property integer $amount
 * @property double $price
 * @property string $note
 * @property integer $invalid
 * @property integer $reconciled
 * @property integer $payeeId
 * @property integer $authorId
 *
 * The followings are the available model relations:
 * @property Deliveries[] $deliveries
 * @property UsedMaterials[] $usedMaterials
 * @property Payees $payee
 * @property Users $author
 * @property WorkAccountsExtra[] $workAccountsExtras
 */
class WorkAccounts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{work_accounts}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('workAccountSerial, name, description, payeeName, payeeAddress, payeeContactPerson, payeeContactInfo, creationDate, deadlineDate, amount, invalid, reconciled, payeeId, authorId', 'required'),
			array('amount, invalid, reconciled, payeeId, authorId', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('workAccountSerial', 'length', 'max'=>90),
			array('name', 'length', 'max'=>255),
			array('payeeName, payeeAddress, payeeContactPerson, payeeContactInfo', 'length', 'max'=>45),
			array('creationDate, deadlineDate', 'length', 'max'=>21),
			array('note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('woId, workAccountSerial, name, description, payeeName, payeeAddress, payeeContactPerson, payeeContactInfo, creationDate, deadlineDate, amount, price, note, invalid, reconciled, payeeId, authorId', 'safe', 'on'=>'search'),
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
			'deliveries' => array(self::HAS_MANY, 'Deliveries', 'workAccountId'),
			'usedMaterials' => array(self::HAS_MANY, 'UsedMaterials', 'workAccountId'),
			'payee' => array(self::BELONGS_TO, 'Payees', 'payeeId'),
			'author' => array(self::BELONGS_TO, 'Users', 'authorId'),
			'workAccountsExtras' => array(self::HAS_MANY, 'WorkAccountsExtra', 'workAccountId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'woId' => 'Wo',
			'workAccountSerial' => 'Work Account Serial',
			'name' => 'Name',
			'description' => 'Description',
			'payeeName' => 'Payee Name',
			'payeeAddress' => 'Payee Address',
			'payeeContactPerson' => 'Payee Contact Person',
			'payeeContactInfo' => 'Payee Contact Info',
			'creationDate' => 'Creation Date',
			'deadlineDate' => 'Deadline Date',
			'amount' => 'Amount',
			'price' => 'Price',
			'note' => 'Note',
			'invalid' => 'Invalid',
			'reconciled' => 'Reconciled',
			'payeeId' => 'Payee',
			'authorId' => 'Author',
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
		$criteria->compare('workAccountSerial',$this->workAccountSerial,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('payeeName',$this->payeeName,true);
		$criteria->compare('payeeAddress',$this->payeeAddress,true);
		$criteria->compare('payeeContactPerson',$this->payeeContactPerson,true);
		$criteria->compare('payeeContactInfo',$this->payeeContactInfo,true);
		$criteria->compare('creationDate',$this->creationDate,true);
		$criteria->compare('deadlineDate',$this->deadlineDate,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('price',$this->price);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('invalid',$this->invalid);
		$criteria->compare('reconciled',$this->reconciled);
		$criteria->compare('payeeId',$this->payeeId);
		$criteria->compare('authorId',$this->authorId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WorkAccounts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
