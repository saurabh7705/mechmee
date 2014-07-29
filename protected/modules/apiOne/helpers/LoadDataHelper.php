<?php
class LoadDataHelper {

	public static function getCurrentUserData($user) {
		$current_user_data = array(
			'user_id'=>(int)$user->id, 'username'=>$user->username,
		);
		return $current_user_data;
	}
	
	public static function getModelErrorsArray($model) {
		$error_arr = array();
		foreach($model->getErrors() as $errors) {
			foreach($errors as $error) {
				$error_arr[] = $error;
			}
		}
		return $error_arr;
	}	
}
?>