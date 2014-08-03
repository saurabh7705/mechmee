<?php
class CategoryController extends Controller
{
	public function actionIndex($id='') {
		if($id)
			$new_model = $this->loadModel($id);
		else
			$new_model = new Category;
		$grid_model = new Category('search');
		if(isset($_POST["Category"])) {
			$new_model->attributes = $_POST["Category"];
			if($new_model->save())
				$this->redirect(array('/admin/category/index'));
		}
		$this->render('index',array(
			'new_model'=>$new_model,
			'grid_model' => $grid_model
		));
	}
	
	public function actionAdmin() {
		$model=new Category('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Category']))
			$model->attributes=$_GET['Category'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function loadModel($id) {
		$model = Category::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
?>