<?php
Class SharedFunctions{
    
	public static function lib($timezone='Asia/Kolkata') {
		date_default_timezone_set($timezone);
        return new SharedFunctions;
    }

    public function showTime($timestamp){
        return date("H:i D d-m-Y",$timestamp);
    }
}
?>