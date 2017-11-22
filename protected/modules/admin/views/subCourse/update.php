<?php
/* @var $this SubCourseController */
/* @var $model SubCourse */

$this->breadcrumbs=array(
	'Sub Courses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubCourse', 'url'=>array('index')),
	array('label'=>'Create SubCourse', 'url'=>array('create')),
	array('label'=>'View SubCourse', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SubCourse', 'url'=>array('admin')),
);
?>

<h1>Update SubCourse <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>