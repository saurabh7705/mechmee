<?php
class VendorController extends Controller
{
	public function actionIndex($id='') {
		if($id)
			$new_model = $this->loadModel($id);
		else
			$new_model = new Vendor;
		$grid_model = new Vendor('search');
		if(isset($_POST["Vendor"]) && isset($_POST["Address"])) {
			$new_model->attributes = $_POST["Vendor"];
			if($new_model->save()) {
				if(!$new_model->address)
					$address = new Address;
				$address->attributes = $_POST['Address'];
				$address->save();
				$new_model->address_id = $address->id;
				$new_model->save();
				$this->redirect(array('/admin/vendor/index'));
			}
		}
		$this->render('index',array(
			'new_model'=>$new_model,
			'grid_model' => $grid_model
		));
	}
	
	public function actionAdmin() {
		$model=new Vendor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vendor']))
			$model->attributes=$_GET['Vendor'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function loadModel($id) {
		$model = Vendor::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
?>