<?php

/**
 * This is the model class for table "vendor".
 *
 * The followings are the available columns in table 'vendor':
 * @property string $id
 * @property string $name
 * @property integer $address_id
 * @property integer $does_deliver
 * @property integer $status
 * @property string $email
 * @property string $phone
 * @property integer $created_at
 * @property integer $updated_at
 */
class Vendor extends CActiveRecord
{
	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;
	const STATUS_BLACKLIST = 2;
	public static $statuses = array(self::STATUS_ACTIVE=>'Active', self::STATUS_INACTIVE=>'Inactive', self::STATUS_BLACKLIST=>'Blacklisted');

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vendor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('address_id, does_deliver, status, created_at, updated_at', 'numerical', 'integerOnly'=>true),
			array('name, email, phone, lat, long', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, address_id, does_deliver, status, email, phone, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'address' => array(self::BELONGS_TO, 'Address', 'address_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'address_id' => 'Address',
			'does_deliver' => 'Does Deliver',
			'status' => 'Status',
			'email' => 'Email',
			'phone' => 'Phone',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	public function beforeSave() {
		if($this->isNewRecord) {
			$this->created_at = time();
			$this->status = self::STATUS_ACTIVE;
		}
		$this->updated_at = time();
		return parent::beforeSave();
	}

	public static function create($attributes) {
		$model = new Vendor;
		$model->attributes = $attributes;
		$model->save();
		return $model;
	}

	public function getDisplay_address() {
		$address = $this->address;
		return "$address->street, $address->locality, $address->city, $address->state - $address->pincode";
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('does_deliver',$this->does_deliver);
		$criteria->compare('status',$this->status);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vendor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
