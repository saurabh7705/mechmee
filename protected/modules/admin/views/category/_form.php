<div class="col-md-4">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'category-form',
		'enableAjaxValidation'=>false,
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
		
		<div class="buttons">
			<input type="submit" name="submit" value="Submit" class="btn btn-success" />
		</div>

	<?php $this->endWidget(); ?>
</div>
<br clear="all" />