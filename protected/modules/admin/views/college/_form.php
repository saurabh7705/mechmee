<?php
/* @var $this CollegeController */
/* @var $model College */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'college-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php $cities = City::model()->findAll(); ?>
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php echo $form->dropDownList($model,'city_id', CHtml::listData($cities, 'id', function($model){return $model->name;}), array('class'=>'')); ?>
		<?php echo $form->error($model,'city_id'); ?>
	</div>

	<div class="row">
		<?php $sub_courses = SubCourse::model()->findAll(); ?>
		<?php echo $form->labelEx($model,'sub_course_id'); ?>
		<?php echo $form->dropDownList($model,'sub_course_id', CHtml::listData($sub_courses, 'id', function($model){return $model->course->name." - ".$model->name;}), array('class'=>'')); ?>
		<?php echo $form->error($model,'sub_course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'established_year'); ?>
		<?php echo $form->textField($model,'established_year'); ?>
		<?php echo $form->error($model,'established_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rating'); ?>
		<?php echo $form->textField($model,'rating'); ?>
		<?php echo $form->error($model,'rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->fileField($model,'file_name'); ?>
		<p class="hint">By uploading this file, you certify that you have the right to distribute this image and that it is not pornographic.</p>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php if($model->file_name && !$model->isNewRecord) { ?>
		<img src="<?php echo $model->getFileUrl(); ?>" style="max-width: 100%;" />
	<?php } ?>

<?php $this->endWidget(); ?>

</div><!-- form -->