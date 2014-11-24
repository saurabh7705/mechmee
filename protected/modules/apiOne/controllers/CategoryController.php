<?php 
class CategoryController extends Controller {

	public function actionIndex() {
		$categories = Category::model()->findAll();
		$this->renderData(array('status'=>'SUCCESS', 'categories'=>LoadDataHelper::getCategories($categories)));
	}

	public function actionSubcategory($id) {
		$category = Category::model()->findByPk($id);
		$this->renderData(array('status'=>'SUCCESS', 'sub_categories'=>LoadDataHelper::getSubCategories($category->sub_categories)));
	}
}
?>