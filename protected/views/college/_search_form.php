<?php
$this->pageTitle="Colleges | Admission | ".Yii::app()->name;
?>

<div class="row-fluid clearfix" style="background: #1a2b507a;padding-top: 60px;">
	<div class="col-md-8 col-md-offset-2" style="text-align: center;padding: 80px;">
		<h3 style="color: #FFF;">Search Colleges/Courses</h3>
		<Br />
		<?php echo CHtml::beginForm(array('/college/search'), 'get', array('class'=>'form-inline')); ?>
			<div class="form-group mr10">
				<?php $courses = Course::model()->findAll(); ?>
				<?php echo CHtml::dropDownList('course_id', $course_id, CHtml::listData($courses,'id','name'), array('class'=>'form-control', 'prompt'=>"Select Main Course")); ?>
			</div>
			<div class="form-group mr10">
				<?php $sub_courses = SubCourse::model()->findAll(); ?>
				<?php echo CHtml::dropDownList('sub_course_id', $sub_course_id, CHtml::listData($sub_courses,'id','name'), array('class'=>'form-control', 'prompt'=>"Select Sub Course")); ?>
			</div>
			<div class="form-group mr10">
				<?php $cities = City::model()->findAll(); ?>
				<?php echo CHtml::dropDownList('city_id', $city_id, CHtml::listData($cities,'id','name'), array('class'=>'form-control', 'prompt'=>"Select City")); ?>
			</div>
			<div class="form-group mr10">
				<input type="submit" name="search" value="Browse Colleges" class="btn btn-primary" style="margin-bottom: 8px;" />
			</div>
		<?php echo CHtml::endForm(); ?>
	</div>
</div>