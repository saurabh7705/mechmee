<?php 
class TestCommand extends CConsoleCommand {
	public function actionTest() {
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$_GET['lat'].','.$_GET['long'].'&rankby=distance';
		$json = file_get_contents($url);
		$data = json_decode($json);
		var_dump($data);
	} 
}
?>