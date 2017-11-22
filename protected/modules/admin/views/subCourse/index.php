<?php
/* @var $this SubCourseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sub Courses',
);

$this->menu=array(
	array('label'=>'Create SubCourse', 'url'=>array('create')),
	array('label'=>'Manage SubCourse', 'url'=>array('admin')),
);
?>

<h1>Sub Courses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
