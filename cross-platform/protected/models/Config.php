<?php

/**
 * This is the model class for table "epm_config".
 *
 * The followings are the available columns in table 'epm_config':
 * @property integer $coId
 * @property integer $workAccountIncrement
 * @property integer $lastSystemLoginId
 */
class Config extends CActiveRecord
{
    /**
     * FIXME: Set this into active configuration.
     * @var int Current table configuration ID
     */
    private $currentConfigId = 1;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'epm_config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('workAccountIncrement, lastSystemLoginId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('coId, workAccountIncrement, lastSystemLoginId', 'safe', 'on'=>'search'),
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
		);
	}

    /**
     * Updates configuration table and sets ID od the logined user
     *
     * @author Aleksandar Panic
     *
     * @param $userId int ID of the user that just got logged in
     */
    public function setLoginedByUserId($userId)
    {
        $this->updateByPk($this->currentConfigId,
        array(
           'lastSystemLoginId' => $userId,
        ));
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'coId' => 'Co',
			'workAccountIncrement' => 'Work Account Increment',
			'lastSystemLoginId' => 'Last System Login',
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

		$criteria->compare('coId',$this->coId);
		$criteria->compare('workAccountIncrement',$this->workAccountIncrement);
		$criteria->compare('lastSystemLoginId',$this->lastSystemLoginId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Config the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
