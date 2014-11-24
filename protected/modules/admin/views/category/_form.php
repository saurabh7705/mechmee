<div class="col-md-4">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'category-form',
		'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); ?>
	    <?php echo $form->errorSummary($new_model); ?>

		<div class="form-group">
			<?php echo $form->labelEx($new_model,'name'); ?>
			<?php echo $form->textField($new_model,'name', array('class'=>'form-control')); ?>
		</div>
		
		<div class="form-group">
			<?php echo $form->labelEx($new_model,'type'); ?>
			<?php echo $form->dropDownList($new_model,'type', Category::$types, array('class'=>'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->fileField($new_model,'file_name'); ?>
			<p class="hint">By uploading this file, you certify that you have the right to distribute this image and that it is not pornographic.</p>
		</div>
		
		<div class="buttons">
			<input type="submit" name="submit" value="Submit" class="btn btn-success" />
		</div>

	<?php $this->endWidget(); ?>
</div>
<div class="col-md-4 col-md-offset-1">
	<?php if($new_model->file_name) { ?>
		<img src="<?php echo $new_model->getFileUrl(); ?>" style="max-width: 100%;" />
	<?php } ?>
</div>
<br clear="all" />