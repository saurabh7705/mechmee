<div class="col-md-4">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'product-form',
		'enableAjaxValidation'=>false,
	)); ?>
	    <?php echo $form->errorSummary($new_model); ?>

		<div class="form-group">
			<?php echo $form->labelEx($new_model,'name'); ?>
			<?php echo $form->textField($new_model,'name', array('class'=>'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($new_model,'brand'); ?>
			<?php echo $form->textField($new_model,'brand', array('class'=>'form-control')); ?>
		</div>
		
		<div class="form-group">
			<?php $sub_categories = SubCategory::model()->findAll(); ?>
			<?php echo $form->labelEx($new_model,'sub_category_id'); ?>
			<?php echo $form->dropDownList($new_model,'sub_category_id', CHtml::listData($sub_categories, 'id', function($model){return $model->category->name.' - '.$model->name;}), array('class'=>'form-control')); ?>
		</div>
		
		<div class="buttons">
			<input type="submit" name="submit" value="Submit" class="btn btn-success" />
		</div>

	<?php $this->endWidget(); ?>
</div>
<br clear="all" />