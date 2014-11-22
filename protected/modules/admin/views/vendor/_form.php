<div class="col-md-8">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'vendor-form',
		'enableAjaxValidation'=>false,
	)); ?>
	    <?php echo $form->errorSummary($new_model); ?>

	    <div class="row-fluid">
	    	<div class="col-md-6">
				<div class="form-group">
					<?php echo $form->labelEx($new_model,'name'); ?>
					<?php echo $form->textField($new_model,'name', array('class'=>'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($new_model,'email'); ?>
					<?php echo $form->textField($new_model,'email', array('class'=>'form-control')); ?>
				</div>

				<div class="form-group">
					<?php echo $form->labelEx($new_model,'phone'); ?>
					<?php echo $form->textField($new_model,'phone', array('class'=>'form-control')); ?>
				</div>
				
				<div class="form-group">
					<?php echo $form->labelEx($new_model,'status'); ?>
					<?php echo $form->dropDownList($new_model,'status', Vendor::$statuses, array('class'=>'form-control')); ?>
				</div>

				<div class="form-group">
					<label for="Vendor_does_deliver">
						<?php echo $form->checkBox($new_model,'does_deliver', array('uncheckValue'=>0)); ?> &nbsp;Does Deliver?
					</label>
				</div>
			</div>
			<?php
			$address = new Address;
			if($new_model->address)
				$address = $new_model->address;
			?>
			<div class="col-md-6">
				<div class="form-group">
					<label>Street</label>
					<?php echo CHtml::textField('Address[street]', $address->street, array('class'=>'form-control')); ?>
				</div>

				<div class="form-group">
					<label>Locality</label>
					<?php echo CHtml::textField('Address[locality]', $address->locality, array('class'=>'form-control')); ?>
				</div>

				<div class="form-group">
					<label>City</label>
					<?php echo CHtml::textField('Address[city]', $address->city, array('class'=>'form-control')); ?>
				</div>

				<div class="form-group">
					<label>State</label>
					<?php echo CHtml::textField('Address[state]', $address->state, array('class'=>'form-control')); ?>
				</div>

				<div class="form-group">
					<label>Country</label>
					<?php echo CHtml::textField('Address[country]', $address->country, array('class'=>'form-control')); ?>
				</div>

				<div class="form-group">
					<label>Pincode</label>
					<?php echo CHtml::textField('Address[pincode]', $address->pincode, array('class'=>'form-control')); ?>
				</div>
			</div>
			<br clear="all" />
		</div>
		
		<div class="buttons">
			<input type="submit" name="submit" value="Submit" class="btn btn-success" />
		</div>

	<?php $this->endWidget(); ?>
</div>
<br clear="all" />