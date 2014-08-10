<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {
	
	public $_user;

	public function filters() {
		return array(
			'authenticate',
		);
    }
	
	public function filterAuthenticate($filterChain) {
		if(isset($_GET['auth_token'])) {
			$token = ApiToken::model()->active()->find("token=:token", array(":token"=>$_GET['auth_token']));
			if($token) {
				if($token->user_id)
					$this->setUser($token->user_id);
			}
			else
				$this->renderData(array('status'=>'AUTH_ERROR', 'errors'=>array("Authentication Failed.")), false);
		}
		else {
			$this->renderData(array('status'=>'AUTH_ERROR', 'errors'=>array("Authentication Failed.")), false);
		}
		$filterChain->run();
	}

	public function setUser($user_id) {
		$this->_user = User::model()->findByPk($user_id);
	}
	
	public function getAppType() {
		if(isset($_GET['app_type'])) {
			return $_GET['app_type'];
		}
		else {
			return "ANDROID";
		}
	}
	
	public function renderData($data, $set_user_data=true) {
		if($set_user_data && $this->_user)
			$data['current_user_data'] = LoadDataHelper::getCurrentUserData($this->_user);
		echo CJSON::encode($data);
		Yii::app()->end(); // required to stop after output 
	}
}