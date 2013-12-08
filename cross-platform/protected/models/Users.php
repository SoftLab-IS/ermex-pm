<?php

/**
 * This is the model class for table "epm_users".
 *
 * The followings are the available columns in table 'epm_users':
 * @property integer $usId
 * @property string $username
 * @property string $password
 * @property string $realName
 * @property string $realSurname
 * @property string $registerDate
 * @property integer $privilegeLevel
 *
 * The followings are the available model relations:
 * @property Deliveries[] $deliveries
 * @property WorkAccounts[] $workAccounts
 * @property WorkAccounts[] $workAccounts1
 * @property Workers[] $workers
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'epm_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, realName, realSurname, registerDate', 'required', 'on' => 'register'),
			array('privilegeLevel', 'numerical', 'integerOnly' => true),
			array('username, password, realName, realSurname', 'length', 'max' => 45),
			array('registerDate', 'length', 'max' => 21),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usId, username, password, realName, realSurname, registerDate, privilegeLevel', 'safe', 'on'=>'search'),
		);
	}


	/**
	 * @return array of current scope configuration
	**/
	public function scopes()
	{
		return array(
			'exceptNonActive' =>
			array(
				'condition' => $this->tableAlias . '.privilegeLevel > 0',
			),
			'onlyWorkers' =>
			array(
				'condition' => $this->tableAlias . '.privilegeLevel = 1',
			)
		);
	}

    /**
     * getUser($userId)
     *
     * Adds criteria to get user specified by username and password.
     *
     * @author Aleksandar Panic
     *
     * @param string $username Username to be searched
     * @param string $password Password to be searched (will be MD5-ed)
     *
     * @return Users Reference to this model with found user or null if the user doesn't exist
     */
    public function getUser($username, $password)
    {
        return $this->findByAttributes(
        array(
           "username" => $username,
           "password" => md5($password),
        ));
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'deliveries' => array(self::HAS_MANY, 'Deliveries', 'authorId'),
			'workAccounts' => array(self::HAS_MANY, 'WorkAccounts', 'reconciledId'),
			'workAccounts1' => array(self::HAS_MANY, 'WorkAccounts', 'authorId'),
			'workers' => array(self::HAS_MANY, 'Workers', 'userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Korisničko ime',
			'password' => 'Šifra',
			'newPassword' => 'Nova Šifra',
			'realName' => 'Ime',
			'realSurname' => 'Prezime',
			'registerDate' => 'Datum registracije',
			'privilegeLevel' => 'Nivo privilegije',
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

		$criteria->compare('usId',$this->usId);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('realName',$this->realName,true);
		$criteria->compare('realSurname',$this->realSurname,true);
		$criteria->compare('registerDate',$this->registerDate,true);
		$criteria->compare('privilegeLevel',$this->privilegeLevel);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
