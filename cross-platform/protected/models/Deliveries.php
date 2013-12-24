<?php

/**
 * This is the model class for table "epm_deliveries".
 *
 * The followings are the available columns in table 'epm_deliveries':
 * @property integer $deId
 * @property string $deliverySerial
 * @property string $deliveryDate
 * @property double $price
 * @property string $note
 * @property integer $payType
 * @property integer $reconciled
 * @property integer $invalid
 * @property integer $archived
 * @property integer $authorId
 * @property integer $reconciledId
 * @property string $peyeeName
 * @property string $peyeeContactInfo
 * @property integer $deliveryPlace
 *
 * The followings are the available model relations:
 * @property Users $author
 * @property Users $reconciled0
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
			array('deliveryDate, payType, authorId, deliverySerial', 'required'),
			array('payType, reconciled, invalid, authorId, reconciledId, archived, deliveryPlace', 'numerical', 'integerOnly'=>true),
            array('note, peyeeContactInfo', 'safe'),
			array('price', 'numerical'),
            array('peyeeName', 'length', 'max'=>255),
			array('deliveryDate', 'length', 'max'=>21),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('deId, deliveryDate, price, note, payType, reconciled, invalid, archived, authorId, reconciledId, peyeeName, peyeeContactInfo, deliverySerial, deliveryPlace', 'safe', 'on'=>'search'),
		);
	}

    public function scopes()
    {
        return array(
            'lastSerial' => array
            (
                'select' => 'deliverySerial',
                'order' => 'deId DESC',
            ),
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
			'author' => array(self::BELONGS_TO, 'Users', 'authorId'),
            'reconciled0' => array(self::BELONGS_TO, 'Users', 'reconciledId'),
            'order' => array(self::HAS_MANY, 'Order', 'deId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'deId' => 'De',
			'deliveryDate' => 'Datum kreiranja',
			'price' => 'Cijena',
			'note' => 'Napomena',
			'payType' => 'Način plaćanja',
			'reconciled' => 'Zaključen',
			'invalid' => 'Nevažeći',
            'archived' => 'Arhiviran',
			'authorId' => 'Autor',
            'reconciledId' => 'Zaključio',
            'peyeeName' => 'Naručilac',
            'peyeeContactInfo' => 'Podaci o naručiocu',
            'deliverySerial' => 'Broj otpremnice',
            'deliveryPlace' => 'Mjesto isporuke',
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

		$criteria->compare('deId', $this->deId);
		$criteria->compare('deliveryDate', $this->deliveryDate, true);
		$criteria->compare('price', $this->price);
		$criteria->compare('note', $this->note, true);
		$criteria->compare('payType', $this->payType);
		$criteria->compare('reconciled', $this->reconciled);
		$criteria->compare('invalid', $this->invalid);
        $criteria->compare('archived', $this->archived);
		$criteria->compare('authorId', $this->authorId);
        $criteria->compare('reconciledId', $this->reconciledId);
        $criteria->compare('peyeeName', $this->peyeeName);
        $criteria->compare('peyeeContactInfo', $this->peyeeContactInfo);
        $criteria->compare('deliverySerial', $this->deliverySerial);
        $criteria->compare('deliveryPlace', $this->deliveryPlace);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array(
                'pageSize' => 25,
            ),
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

    public function getFullName()
    {
        return $this->author->realName . ' ' . $this->author->realSurname;
    }


}

