<?php
class SubCategoryController extends Controller
{
	public function actionIndex($id='') {
		if($id)
			$new_model = $this->loadModel($id);
		else
			$new_model = new SubCategory;
		$grid_model = new SubCategory('search');
		if(isset($_POST["SubCategory"])) {
			$new_model->attributes = $_POST["SubCategory"];
			if($new_model->save()) {
				$new_model->updateTags();
				$this->redirect(array('/admin/subCategory/index'));
			}
		}
		$this->render('index',array(
			'new_model'=>$new_model,
			'grid_model' => $grid_model
		));
	}
	
	public function actionAdmin() {
		$model=new SubCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SubCategory']))
			$model->attributes=$_GET['SubCategory'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function loadModel($id) {
		$model = SubCategory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
?>