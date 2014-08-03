<div class="padit">
	<h1>Categories</h1>
	<?php $this->renderPartial('_form',array('new_model' => $new_model)); ?>
	<?php $this->renderPartial('admin',array('model' => $grid_model)); ?>
	<br />
</div>