<?php echo $this->renderPartial("_search_form", array("course_id"=>$course_id, "sub_course_id"=>$sub_course_id, "city_id"=>$city_id)); ?>
<div style="padding:10px 15px 20px;">
	<h3>Showing <?php echo count($colleges); ?> results</h3>
	<div class="m20">
		<?php foreach ($colleges as $key => $college) { ?>
		<div class="collegeBlock wow fadeInUp" style="box-shadow: 0 0 2px 1px #efefef;margin: 10px 0px;padding: 20px;">
			<div class="row-fluid clearfix">
				<div class="col-md-8">
					<h4 class="text-info"><?php echo CHtml::link($college->name, array("/college/show", "id"=>$college->id)); ?></h4>
					<p class="text-muted"><?php echo $college->description; ?></p>
					<br /><br />
					<h5><?php echo $college->location; ?></h5>
					<h5>Established in <?php echo $college->established_year; ?></h5>
					<h4 style="color: #ff8d00;"><span style="font-size:30px;"><?php echo $college->rating; ?></span> <span class="glyphicon glyphicon-star"></span></h4>
				</div>
				<div class="col-md-4">
					<img class="img-responsive" style="height: 200px;margin: 0 auto; width: 100%;" src="<?php echo $college->getFileUrl(); ?>" />
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>