<?php 
class ProductController extends Controller {

	public function actionIndex($category_id) {
		$category = Category::model()->findByPk($category_id);
		$category_data = LoadDataHelper::getCategory($category);
		$products = Product::model()->viewable()->findAll('category_id = :category_id', array('category_id'=>$category_id));
		$sub_categories = LoadDataHelper::getSubCategories($category->sub_categories, $category_data);
		$this->renderData(array('status'=>'SUCCESS', 'products'=>LoadDataHelper::getProducts($products), 'category'=>$category_data, 'sub_categories'=>$sub_categories));
	}

	public function actionSubCategoryIndex($sub_category_id) {
		$sub_category = SubCategory::model()->findByPk($sub_category_id);
		$category_data = LoadDataHelper::getCategory($sub_category->category);
		$products = Product::model()->viewable()->findAll('sub_category_id = :sub_category_id', array('sub_category_id'=>$sub_category_id));
		$sub_category = LoadDataHelper::getSubCategory($sub_category, $category_data);
		$this->renderData(array('status'=>'SUCCESS', 'products'=>LoadDataHelper::getProducts($products), 'category'=>$category_data, 'sub_category'=>$sub_category));
	}

	public function actionSnacks() {
		$products = Product::model()->viewable()->with('category')->findAll('category.type = :snacks', array('snacks'=>Category::TYPE_SNACKS));
		$category_ids = $sub_category_ids = $categories = $sub_categories = array();
		foreach($products as $product) {
			if(!in_array($product->category_id, $category_ids)) {
				$categories[] = $product->category;
				$category_ids[] = $product->category_id;
			}
			if(!in_array($product->sub_category_id, $sub_category_ids)) {
				$sub_categories[] = $product->sub_category;
				$sub_category_ids[] = $product->sub_category_id;
			}
		}
		$this->renderData(array('status'=>'SUCCESS', 'products'=>LoadDataHelper::getProducts($products), 'categories'=>LoadDataHelper::getCategories($categories), 'sub_categories'=>LoadDataHelper::getSubCategories($sub_categories)));
	}

	public function actionSearch($term) {
		$criteria = $this->getSearchCriteria(array('term'=>$term));
		$products = Product::model()->findAll($criteria);
		$category_ids = $sub_category_ids = $categories = $sub_categories = array();
		foreach($products as $product) {
			if(!in_array($product->category_id, $category_ids)) {
				$categories[] = $product->category;
				$category_ids[] = $product->category_id;
			}
			if(!in_array($product->sub_category_id, $sub_category_ids)) {
				$sub_categories[] = $product->sub_category;
				$sub_category_ids[] = $product->sub_category_id;
			}
		}
		$this->renderData(array('status'=>'SUCCESS', 'products'=>LoadDataHelper::getProducts($products), 'categories'=>LoadDataHelper::getCategories($categories), 'sub_categories'=>LoadDataHelper::getSubCategories($sub_categories)));
	}

	public function actionApplyFilters() {
		$criteria = $this->getSearchCriteria($_GET['search']);
		$products = Product::model()->findAll($criteria);
		$this->renderData(array('status'=>'SUCCESS', 'products'=>LoadDataHelper::getProducts($products)));
	}

	public function getSearchCriteria($params) {
		$tags = SharedFunctions::lib()->getSearchTagsString($params['term']);
		$criteria = new CDbCriteria;
		$criteria->scopes = array('viewable');
		$criteria->addCondition("MATCH(tags) AGAINST ($tags)");
		if(isset($params['category_ids']))
			$criteria->addInCondition('category_id', explode(',', $params['category_ids']));
		if(isset($params['sub_category_ids']))
			$criteria->addInCondition('sub_category_id', explode(',', $params['sub_category_ids']));
		if(isset($params['hot']) && $params['hot'] != '') {
			$criteria->with[] = 'sub_category';
			$criteria->addCondition("sub_category.is_hot = ".$params['hot']);
		}
		return $criteria;
	}
}
?>