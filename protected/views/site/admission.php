<?php
$this->pageTitle="Test Preparation | Admission | ".Yii::app()->name;
?>
<div style="background: #1a2b50;padding: 40px;">
	<h1 style="color: #fff;" class="tac">Test Preparation</h1>
</div>
<div style="padding:10px 15px 40px;">
	<div class="row-fluid clearfix" style="padding-top: 40px;">
		<?php $categories = Category::model()->findAll(array("limit"=>3)); ?>
		<?php $colors = array("success", "danger", "primary"); ?>
		<?php foreach($categories as $key=>$category) { ?>
				<?php $course = Course::model()->find(array("condition"=>"category_id = :category_id", "params"=>array("category_id"=>$category->id))); ?>
				<div class="col-md-4">
					<div class="">
						<img src="<?php echo Yii::app()->baseUrl;?>/images/mbbsadmission1.jpg" alt="" style="width: 100%;">
						<h4 style="font-size: 16px;margin: 20px 0px;">
							<?php echo CHtml::link($course->name." Admission", array("/college/search", "course_id"=>$course->id)); ?>
						</h4>
						<p style="margin-bottom: 10px;"><?php echo $course->description; ?></p>
						<a class="btn btn-<?php echo $colors[$key]; ?>" href="#!"><?php echo $category->name; ?></a>
					</div>
				</div>
		<?php } ?>
	</div>
</div>