<?php
/* @var $this CollegeController */
/* @var $model College */

$this->breadcrumbs=array(
	'Colleges'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List College', 'url'=>array('index')),
	array('label'=>'Create College', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#college-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Colleges</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php 
$sub_courses = SubCourse::model()->findAll();
$cities = City::model()->findAll();
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'college-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		array(
			'name' => 'city_id',
			'value' => '$data->city->name',
			'filter' => CHtml::dropDownList('College[city_id]', $model->city_id, CHtml::listData($cities,'id','name'), array('prompt' => 'All')),
		),
		array(
			'name' => 'sub_course_id',
			'value' => '$data->sub_course->name',
			'filter' => CHtml::dropDownList('College[sub_course_id]', $model->sub_course_id, CHtml::listData($sub_courses,'id','name'), array('prompt' => 'All')),
		),
		'established_year',
		'location',
		'rating',
		array(
            'name'=>'created_at',
            'value'=>'(!$data->created_at)?$data->created_at:SharedFunctions::lib()->showTime("$data->created_at")',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
