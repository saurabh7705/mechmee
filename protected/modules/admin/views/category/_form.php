<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'category-form',
		'enableAjaxValidation'=>false,
	)); ?>
	    <?php echo $form->errorSummary($new_model); ?>

		<div>
			<?php echo $form->labelEx($new_model,'name'); ?>
			<?php echo $form->textField($new_model,'name'); ?>
		</div>
		
		<div>
			<?php echo $form->labelEx($new_model,'type'); ?>
			<?php echo $form->dropDownList($new_model,'type', Category::$types); ?>
		</div>
		
		<div class="buttons">
			<input type="submit" name="submit" value="Submit" class="btn btn-success" />
		</div>

	<?php $this->endWidget(); ?>
</div>