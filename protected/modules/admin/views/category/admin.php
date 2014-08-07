<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'category_grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'ajaxUrl'=>array('/admin/category/admin'),
		'columns'=>array(
			'id',
			'name',
			array(
				'name' => 'type',
				'value' => 'Category::$types[$data->type]',
				'filter' => CHtml::dropDownList('Category[type]', $model->type, Category::$types, array('prompt' => 'All')),
			),
	        array(
	            'name'=>'created_at',
	            'value'=>'(!$data->created_at)?$data->created_at:SharedFunctions::lib()->showTime("$data->created_at")',
	        ),
			array(
				'class'=>'CButtonColumn',
				'template'=>'{update}',
				'updateButtonUrl' => 'Yii::app()->createUrl("/admin/category/index", array("id" => $data->id))',
			),
		),
	));
?>