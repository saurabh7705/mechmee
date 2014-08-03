<div class="padit">
	<h1>Categories</h1>
	<br />
	<?php $this->renderPartial('_form',array('new_model' => $new_model)); ?>
	<br />
	<?php $this->renderPartial('admin',array('model' => $grid_model)); ?>
	<br />
</div>