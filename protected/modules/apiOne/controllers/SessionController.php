<?php 
class SessionController extends CController {
	
	public $_identity;
	public $_device_id;
	public $_device_type;
	
	public function filters() {
		return array(
			'setDeviceId',
		);
    }
	
    public function filterSetDeviceId($filterChain) {
		if(isset($_REQUEST['device_id'])) {
			$this->_device_id = $_REQUEST['device_id'];
			$this->_device_type = $_REQUEST['device_type'];
		} else {
			$this->_device_id = "########";
			$this->_device_type = "ANDROID";
		}		
		$filterChain->run();
	}
	
	public function actionLogout() {
		ApiToken::expireTokensForDeviceId($this->_device_id, $this->_device_type);		
	}	
	
	public function actionLogin() {
		if(isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
			$email = $_REQUEST['email'];
			$password = $_REQUEST['password'];
			$this->_identity = new UserIdentity($email,$password);
			if(!$this->_identity->authenticate()) {
				echo CJSON::encode(array('status'=>'ERROR', 'message'=>'Incorrect email or password. Please contact support@hitwicket.com in case of any queries.'));
			}
			else {
				$user = $this->_identity->user;
				$this->loginAndRenderOrReturnData($user, true);
			}
		}
		else {
			echo CJSON::encode(array('status'=>'ERROR', 'message'=>'Incomplete data, please provide email and password.'));
		}
	}
	
	public function actionFacebook() {
		if(isset($_POST['access_token'])) {
			$facebook_data = $this->getFacebookProfileFromAccessToken($_POST['access_token']);
			$response = $this->handleExistingFacebook($facebook_data['user_profile'], $facebook_data['facebook_object']);
			if($response) { //existing user found
				echo CJSON::encode($response);
			} else if(isset($_POST['User'])) { //existing user not found but consider signup
				$user = new User;
				$user->scenario = 'facebook';
				$user->attributes = $_POST['User'];
				$user->password = "";
				if($user->updateProfileFromFacebookAndSave($facebook_data['user_profile'], true, false)) {
					$user->saveFacebookAuthentication($facebook_data['user_profile']);
					$this->loginAndRenderOrReturnData($user, true);
				}
				else {
					echo CJSON::encode(array('status'=>'ERROR', 'errors'=>LoadDataHelper::getModelErrorsArray($user)));
				}
			}
			else {  //existing user not found and dont consider signup
				echo CJSON::encode(array("status"=>"SIGNUP_REQUIRED"));
			}
		}
		else {
			echo CJSON::encode(array('status'=>'ERROR', 'message'=>"Insufficient Data!"));
		}
	}
	
	public function handleExistingFacebook($user_profile, $facebook_object) {
		$response = NULL;
		$user = null;
		
		$prev_authentication = Authentication::model()->find("uid=:uid and provider='facebook'", array("uid"=>$user_profile['id']));
		if($prev_authentication) {
			$user = $prev_authentication->user;
		}
		else {
			if(!isset($user_profile['email'])) {
				return array("status"=>"ERROR", "message"=>"Please grant all permissions to the app!");
			}
			$user = User::model()->find("email= :email", array("email"=>$user_profile['email']));
			if($user && !$user->facebook_authentication) {
				$user->saveFacebookAuthentication($user_profile);
				$user->updateProfileFromFacebookAndSave($user_profile);
			}
		}		
        if($user) { //Already registered and accout connected, Login him
			$response = $this->loginAndRenderOrReturnData($user, false);
		}
		return $response;
	}
	
	public function getFacebookProfileFromAccessToken($access_token) {
		$facebook = new Facebook(array('appId'=>Yii::app()->params['facebook_appID'], 'secret'=>Yii::app()->params['facebook_appSecret']));
		$facebook->setAccessToken($access_token); 
		if($facebook->getUser()) {
			try {
				$user_profile = $facebook->api('/me');
				return array('user_profile'=>$user_profile, 'facebook_object'=>$facebook);
			}
			catch(FacebookApiException $e) {
				echo CJSON::encode(array('status'=>'ERROR', 'message'=>'Facebook session expired.'));
				Yii::app()->end();
			}
		} else {
			echo CJSON::encode(array('status'=>'ERROR', 'message'=>'Unable to login via Facebook. Please login via email and password.'));
			Yii::app()->end();
		}
	}
	
	public function loginAndRenderOrReturnData($user, $render=true) {
		$token = ApiToken::createTokenForUserAndDevice($user, $this->_device_id, $this->_device_type);
		$response = array('status'=>'SUCCESS', "auth_token"=>$token, 'username'=>$user->username, 'user_id'=>(int)$user->id);
		if($render)
			echo CJSON::encode($response);
		else
			return $response;
	}
}
?>