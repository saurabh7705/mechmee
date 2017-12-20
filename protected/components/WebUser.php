<?php
class WebUser extends CWebUser{
	private $_user;
	
	//is the user an administrator ?
	function getIsAdmin(){
		return ( $this->user && $this->user->access_level >= User::LEVEL_ADMIN );
	}
	
	function getIsUser() {
		return ( $this->user && $this->user->access_level == User::LEVEL_USER );
	}
	
	//get the logged user
	function getUser(){
		if( $this->isGuest )
			return;
		if( $this->_user === null ){
			$this->_user = User::model()->findByPk( $this->id );
		}
		return $this->_user;
	}

	function setFlashFromModelErrors($errors, $implode_by='<br />') {
		foreach($errors as $error)
			$message[] = $error[0];
		$this->setFlash('danger', implode("<br />", $message));
	}
}
?>