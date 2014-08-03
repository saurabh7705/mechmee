<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'sub-category-form',
		'enableAjaxValidation'=>false,
	)); ?>
	    <?php echo $form->errorSummary($new_model); ?>

		<div>
			<?php echo $form->labelEx($new_model,'name'); ?>
			<?php echo $form->textField($new_model,'name'); ?>
		</div>
		
		<div>
			<?php $categories = Category::model()->findAll(); ?>
			<?php echo $form->labelEx($new_model,'category_id'); ?>
			<?php echo $form->dropDownList($new_model,'category_id', CHtml::listData($categories,'id','name')); ?>
		</div>

		<div>
			<?php echo $form->labelEx($new_model,'is_hot'); ?>
			<?php echo $form->checkBox($new_model,'is_hot'); ?>
		</div>
		
		<div class="buttons">
			<input type="submit" name="submit" value="Submit" class="btn btn-success" />
		</div>

	<?php $this->endWidget(); ?>
</div>