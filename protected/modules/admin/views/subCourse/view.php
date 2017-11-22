<?php
/* @var $this SubCourseController */
/* @var $model SubCourse */

$this->breadcrumbs=array(
	'Sub Courses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SubCourse', 'url'=>array('index')),
	array('label'=>'Create SubCourse', 'url'=>array('create')),
	array('label'=>'Update SubCourse', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SubCourse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubCourse', 'url'=>array('admin')),
);
?>

<h1>View SubCourse #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'course_id',
		'status',
		'created_at',
		'updated_at',
	),
)); ?>
