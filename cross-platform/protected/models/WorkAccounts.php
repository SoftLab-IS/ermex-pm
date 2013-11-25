<?php

/**
 * This is the model class for table "epm_work_accounts".
 *
 * The followings are the available columns in table 'epm_work_accounts':
 * @property integer $woId
 * @property string $workAccountSerial
 * @property string $name
 * @property string $description
 * @property string $payeeName
 * @property string $payeeContactPerson
 * @property string $payeeContactInfo
 * @property string $creationDate
 * @property string $deadlineDate
 * @property integer $amount
 * @property double $price
 * @property string $note
 * @property string $additional
 * @property integer $invalid
 * @property integer $reconciled
 * @property integer $payeeId
 * @property integer $authorId
 * @property integer $reconciledId
 *
 * The followings are the available model relations:
 * @property Deliveries[] $deliveries
 * @property UsedMaterials[] $usedMaterials
 * @property Users $reconciled0
 * @property Payees $payee
 * @property Users $author
 */
class WorkAccounts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'epm_work_accounts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('workAccountSerial, name, description, payeeName, payeeContactPerson, payeeContactInfo, creationDate, deadlineDate, amount, invalid, reconciled, payeeId, authorId, reconciledId', 'required'),
			array('amount, invalid, reconciled, payeeId, authorId, reconciledId', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('workAccountSerial', 'length', 'max'=>90),
			array('name', 'length', 'max'=>255),
			array('payeeName, payeeContactPerson, payeeContactInfo', 'length', 'max'=>45),
			array('creationDate, deadlineDate', 'length', 'max'=>21),
			array('note, additional', 'safe'),

			array('workAccountSerial, name, description, payeeName, payeeContactPerson, payeeContactInfo, creationDate, deadlineDate, amount, price, note, additional, invalid, reconciled, payeeId, authorId, reconciledId', 'safe', 'on'=>'search'),
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
			'reconciled0' => array(self::BELONGS_TO, 'Users', 'reconciledId'),
			'payee' => array(self::BELONGS_TO, 'Payees', 'payeeId'),
			'author' => array(self::BELONGS_TO, 'Users', 'authorId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'workAccountSerial' => 'Broj Naloga',
			'name' => 'Naziv',
			'description' => 'Opis',
			'payeeName' => 'Naručilac',
			'payeeContactPerson' => 'Kontakt Osoba',
			'payeeContactInfo' => 'Kontakt Informacije',
			'creationDate' => 'Datum kreiranja',
			'deadlineDate' => 'Rok',
			'amount' => 'Količina',
			'price' => 'Cijena',
			'note' => 'Napomena',
			'additional' => 'Dodatne Informacije',
			'invalid' => 'Stornirano',
			'reconciled' => 'Zaključeno',
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

		$criteria->compare('workAccountSerial',$this->workAccountSerial,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('payeeName',$this->payeeName,true);
		$criteria->compare('payeeContactPerson',$this->payeeContactPerson,true);
		$criteria->compare('payeeContactInfo',$this->payeeContactInfo,true);
		$criteria->compare('creationDate',$this->creationDate,true);
		$criteria->compare('deadlineDate',$this->deadlineDate,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('price',$this->price);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('additional',$this->additional,true);
		$criteria->compare('invalid',$this->invalid);
		$criteria->compare('reconciled',$this->reconciled);

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
