<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	public $user;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function getId()
	{
		return $this->_id;
	}

	public function authenticate() {
		$user = User::model()->find(array('condition'=>"email=:email", 'params'=>array('email'=>$this->username)));
		if($user) {
			if(md5($this->password) == $user->password) {
				$this->_id = $user->id;
				$this->username = $user->username;
				$this->user = $user;
				$this->errorCode = self::ERROR_NONE;
			}
			else 
				$this->errorCode=self::ERROR_PASSWORD_INVALID;  
		}
		else {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		return !$this->errorCode;
	}

	static public function auto_login($email,$password) {
		$identity = new UserIdentity($email,$password);
		$identity->auto_authenticate();
		if($identity->errorCode === UserIdentity::ERROR_NONE) {
			$duration = 3600*24*15;
			Yii::app()->user->login($identity, $duration);
			return true;
		}
		else
			return false;
	}

	public function auto_authenticate()
	{
		$user=User::model()->find("email='$this->username'");
		if($user===null) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else {
            $this->_id = $user->id;
			$this->user = $user;
            $this->username = $user->username;
            $this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}