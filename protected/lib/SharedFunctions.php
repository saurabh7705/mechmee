<?php
Class SharedFunctions{
    
	public static function lib($timezone='Asia/Kolkata') {
		date_default_timezone_set($timezone);
        return new SharedFunctions;
    }

    public function showTime($timestamp){
        return date("H:i D d-m-Y",$timestamp);
    }

    public function getSearchTagsString($term) {
    	$tags = explode(' ', $term);
    	//if(count($tags) == 1)
    	//	return "'".$tags[0]."'";

    	//$tags_string = "'".implode("' , '", $tags)."'";
    	//return $tags_string;
        return $tags;
    }
}
?>