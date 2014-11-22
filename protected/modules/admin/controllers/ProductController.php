<?php
class ProductController extends Controller
{
	public function actionIndex($id='') {
		if($id)
			$new_model = $this->loadModel($id);
		else
			$new_model = new Product;
		$grid_model = new Product('search');
		if(isset($_POST["Product"])) {
			$new_model->attributes = $_POST["Product"];
			$new_model->category_id = $new_model->sub_category->category_id;
			$new_model->file_name = CUploadedFile::getInstance($new_model, 'file_name');
			if($new_model->save()) {
				if($new_model->file_name) {
					$extension = $new_model->file_name->getExtensionName();            
					$new_model->extension = $extension;
					$path = Yii::app()->basePath."/../product/$new_model->id.$extension";
					$new_model->file_name->saveAs($path);
					$new_model->save();
				}
				$new_model->updateTags();
				$this->redirect(array('/admin/product/index'));
			}
		}
		$grid_model->in_stock = '';
		$this->render('index',array(
			'new_model'=>$new_model,
			'grid_model' => $grid_model
		));
	}

	public function actionToggleActive($id) {
		$model = $this->loadModel($id);
		if(!$model->isActive()) {
			$model->markActive();
			$model->in_stock = 1;
			$model->save();
		}
		else
			$model->markInactive();
		$this->redirect(array('/admin/product/index'));
	}
	
	public function actionAdmin() {
		$model=new Product('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Product']))
			$model->attributes=$_GET['Product'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAddQuantity($id) {
		$product = $this->loadModel($id);
		$new_model = new ProductQuantity;
		if(isset($_POST["ProductQuantity"])) {
			$new_model->attributes = $_POST["ProductQuantity"];
			$new_model->product_id = $product->id;
			if($new_model->save())
				$this->redirect(array('/admin/product/editQuantities', 'id'=>$product->id));
		}
		$this->render('add_quantity',array(
			'new_model'=>$new_model, 'product'=>$product
		));
	}

	public function actionEditQuantities($id) {
		$product = $this->loadModel($id);
		if(isset($_POST["ProductQuantities"])) {
			foreach($_POST["ProductQuantities"] as $quantity_id=>$product_quantity_attributes) {
				$new_model = ProductQuantity::model()->findByPk($quantity_id);
				$new_model->attributes = $product_quantity_attributes;
				$new_model->save();
			}
		}
		$this->render('edit_quantities',array('product'=>$product));
	}
	
	public function loadModel($id) {
		$model = Product::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
?>