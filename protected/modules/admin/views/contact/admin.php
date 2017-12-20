<?php
/* @var $this ContactController */
/* @var $model Contact */

$this->breadcrumbs=array(
	'Contacts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Contact', 'url'=>array('index')),
	array('label'=>'Create Contact', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#contact-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Contacts</h1>

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
$courses = Course::model()->findAll();
$cities = City::model()->findAll();
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contact-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'email',
		'mobile',
		array(
			'name' => 'course_id',
			'value' => '$data->course->name',
			'filter' => CHtml::dropDownList('College[course_id]', $model->course_id, CHtml::listData($courses,'id','name'), array('prompt' => 'All')),
		),
		array(
			'name' => 'city_id',
			'value' => '$data->city->name',
			'filter' => CHtml::dropDownList('Contact[city_id]', $model->city_id, CHtml::listData($cities,'id','name'), array('prompt' => 'All')),
		),
		array(
            'name'=>'created_at',
            'value'=>'(!$data->created_at)?$data->created_at:SharedFunctions::lib()->showTime("$data->created_at")',
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
