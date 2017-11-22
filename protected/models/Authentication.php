<?php

/**
 * This is the model class for table "authentication".
 *
 * The followings are the available columns in table 'authentication':
 * @property string $id
 * @property integer $user_id
 * @property string $provider
 * @property string $uid
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 */
class Authentication extends CActiveRecord
{
	const PROPERTY = 'fb_connect';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'authentication';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('user_id, created_at, updated_at', 'numerical', 'integerOnly'=>true),
			array('provider, uid, email', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, provider, uid, email, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'user'=>array(self::BELONGS_TO,'User','user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'provider' => 'Provider',
			'uid' => 'Uid',
			'email' => 'Email',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	public function create($attributes) {
		$authentication = new Authentication;
		$authentication->attributes = $attributes;
		return $authentication->save();
	}

	public function beforeSave(){
        if($this->isNewRecord){
            $this->created_at = time();
        }
        $this->updated_at = time();
        return parent::beforeSave();
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('provider',$this->provider,true);
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('email',$this->email,true);
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
	 * @return Authentication the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
