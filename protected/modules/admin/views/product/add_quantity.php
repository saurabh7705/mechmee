<div class="padit">
	<h1>Add Quantity - '<?php echo $product->name; ?>'</h1>
	<br />
	<div class="col-md-4">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'product-quantity-form',
			'enableAjaxValidation'=>false,
			'action'=>Yii::app()->createUrl("/admin/product/addQuantity", array('id'=>$product->id)),
		)); ?>
		    <?php echo $form->errorSummary($new_model); ?>

			<div class="form-group">
				<?php echo $form->labelEx($new_model,'quantity'); ?>
				<?php echo $form->textField($new_model,'quantity', array('class'=>'form-control')); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($new_model,'price'); ?>
				<?php echo $form->textField($new_model,'price', array('class'=>'form-control')); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($new_model,'stock_left'); ?>
				<?php echo $form->textField($new_model,'stock_left', array('class'=>'form-control')); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($new_model,'vendor'); ?>
				<?php echo $form->textField($new_model,'vendor', array('class'=>'form-control')); ?>
			</div>
			
			<div class="form-group">
				<?php echo $form->labelEx($new_model,'status'); ?>
				<?php echo $form->dropDownList($new_model,'status', ProductQuantity::$statuses, array('class'=>'form-control')); ?>
			</div>
			
			<div class="buttons">
				<input type="submit" name="submit" value="Submit" class="btn btn-success" />
			</div>

		<?php $this->endWidget(); ?>
	</div>
	<br clear="all" />
	<br />
</div>