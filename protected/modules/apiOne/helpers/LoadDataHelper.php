<?php
class LoadDataHelper {
	
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