<?php
/* @var $this CourseController */
/* @var $model Course */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-form',
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
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php $categories = Category::model()->findAll(); ?>
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id', CHtml::listData($categories, 'id', function($model){return $model->name;}), array('class'=>'')); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
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