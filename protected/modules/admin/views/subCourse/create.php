<?php
/* @var $this SubCourseController */
/* @var $model SubCourse */

$this->breadcrumbs=array(
	'Sub Courses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubCourse', 'url'=>array('index')),
	array('label'=>'Manage SubCourse', 'url'=>array('admin')),
);
?>

<h1>Create SubCourse</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>