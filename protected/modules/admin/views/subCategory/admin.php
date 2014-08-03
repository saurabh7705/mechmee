<?php
	$categories = Category::model()->findAll();
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'sub_category_grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'ajaxUrl'=>array('/admin/subCategory/admin'),
		'columns'=>array(
			'id',
			'name',
			array(
				'name' => 'category_id',
				'value' => '$data->category->name',
				'filter' => CHtml::dropDownList('SubCategory[category_id]', $model->category_id, CHtml::listData($categories,'id','name'), array('prompt' => 'All')),
			),
	        array(
	            'name'=>'created_at',
	            'value'=>'(!$data->created_at)?$data->created_at:SharedFunctions::lib()->showTime("$data->created_at")',
	        ),
			array(
				'class'=>'CButtonColumn',
				'template'=>'{update}',
				'updateButtonUrl' => 'Yii::app()->createUrl("/admin/subCategory/index", array("id" => $data->id))',
			),
		),
	));
?>