<div class="padit">
	<h1>Edit Quantities - '<?php echo $product->name; ?>'</h1>
	<br />
	<div class="row-fluid">
		<?php echo CHtml::beginForm(array("/admin/product/editQuantities", 'id'=>$product->id), 'post'); ?>
		<?php foreach($product->quantities as $product_quantity) { ?>
			<div class="col-md-4">
				<div class="form-group">
					<label>Quantity</label>
					<?php echo CHtml::textField("ProductQuantities[$product_quantity->id][quantity]", $product_quantity->quantity, array('class'=>'form-control')); ?>
				</div>

				<div class="form-group">
					<label>Price</label>
					<?php echo CHtml::textField("ProductQuantities[$product_quantity->id][price]", $product_quantity->price, array('class'=>'form-control')); ?>
				</div>

				<div class="form-group">
					<label>Stock</label>
					<?php echo CHtml::textField("ProductQuantities[$product_quantity->id][stock_left]", $product_quantity->stock_left, array('class'=>'form-control')); ?>
				</div>

				<div class="form-group">
					<?php $vendors = Vendor::model()->findAll(); ?>
					<label>Vendor</label>
					<?php echo CHtml::dropDownList("ProductQuantities[$product_quantity->id][vendor_id]", $product_quantity->vendor_id, CHtml::listData($vendors, 'id', 'name'), array('class'=>'form-control')); ?>
				</div>
				
				<div class="form-group">
					<label>Status</label>
					<?php echo CHtml::dropDownList("ProductQuantities[$product_quantity->id][status]", $product_quantity->status, ProductQuantity::$statuses, array('class'=>'form-control')); ?>
				</div>
				<hr />
			</div>
		<?php } ?>
		<br clear="all" />
		<div class="buttons">
			<input type="submit" name="submit" value="Submit" class="btn btn-success" />
		</div>
		<?php echo CHtml::endForm(); ?>
	</div>
	<br clear="all" />
	<br />
</div>