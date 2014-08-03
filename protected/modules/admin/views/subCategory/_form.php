<div class="col-md-4">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'sub-category-form',
		'enableAjaxValidation'=>false,
	)); ?>
	    <?php echo $form->errorSummary($new_model); ?>

		<div class="form-group">
			<?php echo $form->labelEx($new_model,'name'); ?>
			<?php echo $form->textField($new_model,'name', array('class'=>'form-control')); ?>
		</div>
		
		<div class="form-group">
			<?php $categories = Category::model()->findAll(); ?>
			<?php echo $form->labelEx($new_model,'category_id'); ?>
			<?php echo $form->dropDownList($new_model,'category_id', CHtml::listData($categories,'id','name'), array('class'=>'form-control')); ?>
		</div>

		<div class="form-group">
			<label for="SubCategory_is_hot">
				<?php echo $form->checkBox($new_model,'is_hot', array('class'=>'')); ?> &nbsp;Is Hot ? (if not, will be considered as cold)
			</label>
		</div>
		
		<div class="buttons">
			<input type="submit" name="submit" value="Submit" class="btn btn-success" />
		</div>

	<?php $this->endWidget(); ?>
</div>
<br clear="all"/>