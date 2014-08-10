<?php
class LoadDataHelper {

	public static function getCurrentUserData($user) {
		$current_user_data = array(
			'user_id'=>(int)$user->id, 'username'=>$user->username,
		);
		return $current_user_data;
	}

	public static function getProducts($products) {
		$data = array();
		foreach($products as $product) {
			$data[] = self::getProduct($product);
		}
		return $data;
	}

	public static function getProduct($product) {
		$quantities_data = array();
		foreach($product->quantities(array('scopes'=>array('viewable'))) as $product_quantity) {
			$quantities_data[] = array(
				'id'=>(int)$product_quantity->id, 'quantity'=>$product_quantity->quantity, 'vendor'=>$product_quantity->vendor,
				'price'=>$product_quantity->price
			);
		}
		$category_data = self::getCategory($product->category);
		return array(
			'id'=>(int)$product->id, 'name'=>$product->name, 'brand'=>$product->brand,
			'category'=>$category_data,
			'sub_category'=>self::getCategory($product->sub_category, $category_data),
			'quantities'=>$quantities_data
		);
	}

	public static function getCategories($categories) {
		$data = array();
		foreach($categories as $category)
			$data[] = self::getCategory($category);
		return $data;
	}

	public static function getCategory($category) {
		return array('id'=>(int)$category->id, 'name'=>$category->name, 'type'=>$category->type, 'type_name'=>Category::$types[$category->type]);
	}

	public static function getSubCategories($sub_categories, $category_data=NULL) {
		$data = array();
		foreach($sub_categories as $sub_category)
			$data[] = self::getProduct($sub_category, $category_data);
		return $data;
	}

	public static function getSubCategory($category, $category_data=NULL) {
		$data = array('id'=>(int)$product->sub_category_id, 'name'=>$product->sub_category->name, 'is_hot'=>$product->sub_category->is_hot ? true : false);
		if($category_data)
			$data['category'] = $category_data;
		else
			$data['category'] = self::getCategory($sub_category->category);
		return $data;
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