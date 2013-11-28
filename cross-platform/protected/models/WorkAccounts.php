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
 * @property Payees $payee
 * @property Users $reconciled0
 * @property Users $author
 * @property Workers[] $workers
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
			array('name, description, payeeName, payeeContactInfo, creationDate, deadlineDate, amount', 'required'),
			array('amount, invalid, reconciled, payeeId, authorId, reconciledId', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('workAccountSerial', 'length', 'max'=>90),
			array('name', 'length', 'max'=>255),
			array('payeeName, payeeContactPerson', 'length', 'max'=>45),
			array('creationDate, deadlineDate', 'length', 'max'=>21),
			array('note, additional', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('woId, workAccountSerial, name, description, payeeName, payeeContactPerson, payeeContactInfo, creationDate, deadlineDate, amount, price, note, additional, invalid, reconciled, payeeId, authorId, reconciledId', 'safe', 'on'=>'search'),
			);
	}

	public function scopes()
	{
		return array(
			'proizvodi' => array(
				'condition' => $this->tableAlias . '.reconciled = 1',
				),
			);
	}

    /**
     * forUser($userId)
     *
     * Finds all work accounts which that user needs to do.
     *
     * @author Aleksandar Panic
     *
     * @param integer $id Id of the user
     *
     * @return WorkAccounts Reference to this model with set criteria
     */
    public function forUser($id)
    {
    	$id = (int)$id;

    	$this->getDbCriteria()->mergeWith(array(
    		'together' => true,
    		'with' =>
    		array(
    			'workers' => 
    			array(
    				'with' => array('user'),
    				'alias' => 'wrk',
    				'condition' => "wrk.userId = $id AND (
    					wrk.position = (
    						SELECT MAX(position) + 1 FROM epm_workers 
    						WHERE done = 1 AND workAccountId = wrk.workAccountId
    						)
		    			OR wrk.position = (
		    				SELECT position FROM epm_workers 
		    				WHERE done = 1 AND workAccountId = wrk.workAccountId AND position = wrk.position
		    				)
    					OR wrk.position = 1)",
    				'joinType' => 'JOIN',
    			),
    		),
    		'alias' => 'wau',
    		'condition' => "wau.reconciled = 0",
    	));

    	return $this;
    }


    /**
     * forAllUsers()
     *
     * Finds all work accounts which that user needs to do.
     *
     * @author Aleksandar Panic
     *
     * @return WorkAccounts Reference to this model with set criteria
     */
    public function forAllUsers()
    {
    	$this->getDbCriteria()->mergeWith(array(
    		'together' => true,
    		'with' =>
    		array(
    			'workers' => 
    			array(
    				'with' => array('user'),
    				'alias' => 'wrk',
    				'condition' => "(
    					wrk.position = (
    						SELECT position FROM epm_workers 
    						WHERE done = 0 AND workAccountId = wrk.workAccountId LIMIT 1)
    				OR	wrk.position = (
    						SELECT MAX(position) FROM epm_workers 
    						WHERE done = 1 AND workAccountId = wrk.workAccountId)
    			        )",
    				'joinType' => 'JOIN',
    			),
    		),
    		'alias' => 'wau',
    		'condition' => "wau.reconciled = 0",
    	));

    	return $this;
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
			'reconciled0' => array(self::BELONGS_TO, 'Users', 'reconciledId'),
			'author' => array(self::BELONGS_TO, 'Users', 'authorId'),
			'workers' => array(self::HAS_MANY, 'Workers', 'workAccountId'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'woId' =>'Br.',
			'workAccountSerial' => 'Serijski Broj',
			'name' => 'Naziv',
			'description' => 'Opis',
			'payeeName' => 'Naručilac',
			'payeeContactPerson' => 'Kontakt Osoba',
			'payeeContactInfo' => 'Kontakt Informacije',
			'creationDate' => 'Datum Kreiranja',
			'deadlineDate' => 'Datum Roka',
			'amount' => 'Količina',
			'price' => 'Cijena',
			'note' => 'Napomena',
			'additional' => 'Dodatne Informacije',
			'invalid' => 'Stornirano',
			'reconciled' => 'Zaključeno',
			'authorId' => 'Nalog sastavio',
			'reconciledId' => 'Nalog zaključio'
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
		$criteria->compare('payeeId',$this->payeeId);
		$criteria->compare('authorId',$this->authorId);
		$criteria->compare('reconciledId',$this->reconciledId);

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
