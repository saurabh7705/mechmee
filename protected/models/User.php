<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $username
 * @property integer $status
 * @property integer $superuser
 * @property integer $access_level
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends CActiveRecord
{
	const LEVEL_USER=1, LEVEL_ADMIN=2;
	const STATUS_ACTIVE = 1;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'filter', 'filter'=>array($this, 'removeInvalidChars')),
			array('email','email'),
			array('email', 'required'),
			array('status, superuser, access_level, created_at, updated_at, is_guest', 'numerical', 'integerOnly'=>true),
			array('email, password, username, lat, long', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, password, username, status, superuser, access_level, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}
	
	public function removeInvalidChars($value) {
		$value = preg_replace("/&/","",$value);
		$value = trim(strip_tags($value));
		return preg_replace('/\s+/', ' ', $value);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'facebook_authentication' => array(self::HAS_ONE, 'Authentication', 'user_id', 'condition'=>'provider="facebook"'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'password' => 'Password',
			'username' => 'Username',
			'status' => 'Status',
			'superuser' => 'Superuser',
			'access_level' => 'Access Level',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	public function updateProfileFromFacebook($user_profile) {
		$this->email = $user_profile['email'];
		$this->username = $user_profile['first_name'].' '.$user_profile['last_name'];
	}
	
	public function updateProfileFromFacebookAndSave($user_profile) { 
		$this->updateProfileFromFacebook($user_profile);
		$saved = $this->save();
		return $saved;
	}

	public function saveFacebookAuthentication($user_profile) {		
        $auth = new Authentication;
        $auth->user_id = $this->id;
        $auth->provider = 'facebook';
        $auth->uid = $user_profile['id'];
        if(isset($user_profile['email']))
        	$auth->email = $user_profile['email'];
        $auth->save();
		$this->refresh();
	}

	public function beforeSave(){
        if($this->isNewRecord){
            $this->superuser = 0;
            $this->access_level = self::LEVEL_USER;
            $this->status = self::STATUS_ACTIVE;
            $this->username = trim($this->username);
            $this->created_at = time();
        }
        $this->updated_at = time();
        return parent::beforeSave();
    }

    public static function createGuestUser() {
    	$user = new User;
		$user->scenario = 'guest';
		$user->password = "";
		$user->is_guest = 1;
		$user->email = 'user@drinkking.temp';
		$user->save();
		$user->email = "user+$user->id@drinkking.temp";
		$user->save();
		return $user;
    }

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('superuser',$this->superuser);
		$criteria->compare('access_level',$this->access_level);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}