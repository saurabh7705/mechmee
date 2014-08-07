<style>th#product_grid_c8 {width: 100px !important;}</style>
<?php
	$categories = Category::model()->findAll();
	$sub_categories = SubCategory::model()->findAll();
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'product_grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'ajaxUrl'=>array('/admin/product/admin'),
		'columns'=>array(
			'id',
			'name',
			'brand',
			array(
				'name' => 'sub_category_id',
				'value' => '$data->sub_category->name',
				'filter' => CHtml::dropDownList('Product[sub_category_id]', $model->sub_category_id, CHtml::listData($sub_categories,'id','name'), array('prompt' => 'All')),
			),
			array(
				'name' => 'category_id',
				'value' => '$data->category->name',
				'filter' => CHtml::dropDownList('Product[category_id]', $model->category_id, CHtml::listData($categories,'id','name'), array('prompt' => 'All')),
			),
			array(
				'name' => 'status',
				'value' => '$data->status == 1 ? "Active" : "Inacitve"',
				'filter' => CHtml::dropDownList('Product[status]', $model->status, array(Product::STATUS_ACTIVE=>'Active', Product::STATUS_INACTIVE=>'Inactive'), array('prompt' => 'All')),
			),
			array(
				'name' => 'in_stock',
				'value' => '$data->in_stock == 1 ? "Yes" : "No"',
				'filter' => CHtml::dropDownList('Product[in_stock]', $model->in_stock, array(0=>'No', 1=>'Yes'), array('prompt' => 'All')),
			),
	        array(
	            'name'=>'created_at',
	            'value'=>'(!$data->created_at)?$data->created_at:SharedFunctions::lib()->showTime("$data->created_at")',
	        ),
	        array(
			    'class'=>'CButtonColumn',
			    'template'=>'{add_quantity} {edit_quantities} {mark_active} {mark_inactive}',
			    'buttons'=>array
			    (
			        'add_quantity' => array
			        (
			            'label'=>'Add Quantity',
			            'url'=>'Yii::app()->createUrl("/admin/product/addQuantity", array("id"=>$data->id))',
			        ),
					'edit_quantities' => array(
			            'label'=>'Edit Quantities',
			            'url'=>'Yii::app()->createUrl("/admin/product/editQuantities", array("id"=>$data->id))',
			        ),
					'mark_active' => array(
			            'label'=>'Mark Active',
			            'url'=>'Yii::app()->createUrl("/admin/product/toggleActive", array("id"=>$data->id))',
						'visible' => '(!$data->isActive())',
						'options' => array(
							'confirm' => 'Sure you want to Mark Active this product?',
						),
			        ),
					'mark_inactive' => array(
			            'label'=>'Mark Inactive',
			            'url'=>'Yii::app()->createUrl("/admin/product/toggleActive", array("id"=>$data->id))',
						'visible' => '($data->isActive())',
						'options' => array(
							'confirm' => 'Sure you want to Mark Inactive this product?',
						),
			        ),
			    ),
			),
			array(
				'class'=>'CButtonColumn',
				'template'=>'{update}',
				'updateButtonUrl' => 'Yii::app()->createUrl("/admin/product/index", array("id" => $data->id))',
			),
		),
	));
?>