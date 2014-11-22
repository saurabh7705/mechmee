<?php 
class SiteController extends CController {
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
	
	public function actionIndex() {
		$token = ApiToken::createTokenForDevice($this->_device_id, $this->_device_type);
		$response = array('status'=>'SUCCESS', "auth_token"=>$token);
		echo CJSON::encode($response);
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			echo CJSON::encode(array('code'=>$code, 'message'=>$message));
		}
	}
}
?>