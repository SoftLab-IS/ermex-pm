<?php

/**
 * This is the model class for table "epm_work_accounts".
 *
 * The followings are the available columns in table 'epm_work_accounts':
 * @property integer $woId
 * @property string $workAccountSerial
 * @property string $payeeName
 * @property string $payeeContactInfo
 * @property string $creationDate
 * @property string $deadlineDate
 * @property string $note
 * @property string $additional
 * @property integer $invalid
 * @property integer $reconciled
 * @property integer $authorId
 * @property integer $reconciledId
 * @property string $usersList
 * @property integer $reviewdId
 * @property integer $currentUser
 * The followings are the available model relations:
 * @property Deliveries[] $deliveries
 * @property UsedMaterials[] $usedMaterials
 * @property Users $reconciled0
 * @property Users $author
 * @property Users $reviewer
 * @property Users $currentWorker
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
			array('payeeName, payeeContactInfo, creationDate, deadlineDate, workAccountSerial', 'required'),
			array('invalid, reconciled, authorId, reconciledId, reviewdId, currentUser', 'numerical', 'integerOnly'=>true),
			array('workAccountSerial, usersList', 'length', 'max'=>90),
			array('payeeName', 'length', 'max'=>45),
			array('creationDate, deadlineDate', 'length', 'max'=>21),
			array('note, additional', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('woId, workAccountSerial, payeeName, payeeContactInfo, creationDate, deadlineDate, note, additional, invalid, reconciled, authorId, reconciledId, usersList, reviewdId, currentUser', 'safe', 'on'=>'search'),
			);
	}

	public function scopes()
	{
        return array(
            'proizvodi' => array
            (
                'condition' => $this->tableAlias . '.reconciled = 1',
            ),
            'lastSerial' => array
            (
                'select' => 'workAccountSerial',
                'order' => 'woId DESC',
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

    	$this->getDbCriteria()->mergeWith(
    	array(
    		'with' => array('order'),
    		'condition' => "{$this->tableAlias}.currentUser = :user AND {$this->tableAlias}.invalid = 0 AND {$this->tableAlias}.reconciled = 0",
    		'params' =>
    		array(
    			':user' => $id
    		),
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
			'reconciled0' => array(self::BELONGS_TO, 'Users', 'reconciledId'),
			'author' => array(self::BELONGS_TO, 'Users', 'authorId'),
			'workers' => array(self::HAS_MANY, 'Workers', 'workAccountId'),
            'reviewer' => array(self::BELONGS_TO, 'Users', 'reviewdId'),
            'currentWorker' => array(self::BELONGS_TO, 'Users', 'currentUser'),
            'order' => array(self::HAS_MANY, 'Order', 'woId'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'woId' =>'Br.',
			'workAccountSerial' => 'Broj radnog naloga',
			'payeeName' => 'Naručilac',
			'payeeContactInfo' => 'Kontakt informacije',
			'creationDate' => 'Datum kreiranja',
			'deadlineDate' => 'Datum isporuke',
			'note' => 'Napomena',
			'additional' => 'Dodatne informacije',
			'invalid' => 'Stornirano',
			'reconciled' => 'Zaključeno',
			'authorId' => 'Nalog napravio',
			'reconciledId' => 'Nalog zaključio',
            'usersList' => 'Lista radnika',
            'reviewdId' => 'Kontrolor',
            'currentUser' => 'Trenutni radnik',
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

		$criteria->compare('woId', $this->woId);
		$criteria->compare('workAccountSerial', $this->workAccountSerial, true);
		$criteria->compare('payeeName', $this->payeeName, true);
		$criteria->compare('payeeContactInfo', $this->payeeContactInfo, true);
		$criteria->compare('creationDate >=', $this->creationDate, false);
		$criteria->compare('deadlineDate <=', $this->deadlineDate, false);
		$criteria->compare('note', $this->note, true);
		$criteria->compare('additional', $this->additional, true);
		$criteria->compare('invalid', $this->invalid);
		$criteria->compare('reconciled', $this->reconciled);
		$criteria->compare('authorId', $this->authorId);
		$criteria->compare('reconciledId', $this->reconciledId);
        $criteria->compare('usersList', $this->usersList);
        $criteria->compare('reviewdId', $this->reviewdId);
        $criteria->compare('currentUser', $this->currentUser);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 25,
            ),
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

    public function getFullName()
    {
        return $this->currentWorker->realName . ' ' . $this->currentWorker->realSurname;
    }

    public function getNextWorker($userId)
    {
        $workers = explode(',', $this->usersList);
        $nextWorkerKey = array_search($this->currentUser, $workers)+1;

        //TODO ne radi ako ima ponavljanje usera u listi, krene svaki put od prvog

        if(isset($workers[$nextWorkerKey]))
        {
            return $workers[$nextWorkerKey];
        }
        return false;
    }
}
