<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'vendor_grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'ajaxUrl'=>array('/admin/vendor/admin'),
		'columns'=>array(
			'id',
			'name',
			'email',
			'phone',
			array(
				'name' => 'address',
				'value' => '$data->display_address',
			),
			array(
				'name' => 'does_deliver',
				'value' => '$data->does_deliver ? "Yes" : "No"',
				'filter' => CHtml::dropDownList('Vendor[status]', $model->does_deliver, array('1'=>'Yes', '0'=>"No"), array('prompt' => 'All')),
			),
			array(
				'name' => 'status',
				'value' => 'Vendor::$statuses[$data->status]',
				'filter' => CHtml::dropDownList('Vendor[status]', $model->status, Vendor::$statuses, array('prompt' => 'All')),
			),
	        array(
	            'name'=>'created_at',
	            'value'=>'(!$data->created_at)?$data->created_at:SharedFunctions::lib()->showTime("$data->created_at")',
	        ),
			array(
				'class'=>'CButtonColumn',
				'template'=>'{update}',
				'updateButtonUrl' => 'Yii::app()->createUrl("/admin/vendor/index", array("id" => $data->id))',
			),
		),
	));
?>