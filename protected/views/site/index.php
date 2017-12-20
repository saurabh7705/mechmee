<?php
$this->pageTitle=Yii::app()->name;
?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo Yii::app()->baseUrl;?>/images/banner1.jpg" style="height: 350px; width: 100%;" alt="...">
    </div>
    <div class="item">
      <img src="<?php echo Yii::app()->baseUrl;?>/images/banner2.jpg" style="height: 350px; width: 100%;" alt="...">
    </div>
    <div class="item">
      <img src="<?php echo Yii::app()->baseUrl;?>/images/banner3.jpg" style="height: 350px; width: 100%;" alt="...">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

<div class="">
	<div class="row-fluid clearfix">
		<div class="col-md-3 tac">
		</div>
		<div class="col-md-9">
			<div class="row-fluid clearfix" style="padding-top: 40px;">
				<?php $categories = Category::model()->findAll(array("limit"=>3)); ?>
				<?php $colors = array("success", "danger", "primary"); ?>
				<?php foreach($categories as $key=>$category) { ?>
						<?php $course = Course::model()->find(array("condition"=>"category_id = :category_id", "params"=>array("category_id"=>$category->id))); ?>
						<div class="col-md-4">
							<div class="">
								<img src="<?php echo Yii::app()->baseUrl;?>/images/mbbsadmission1.jpg" alt="" width="220" height="110">
								<h4 style="font-size: 16px;"><?php echo CHtml::link($course->name." Admission", array("/college/search", "course_id"=>$course->id), array("class"=>"text-primary")); ?></h4>
								<p><?php echo $course->description; ?></p>
								<a class="btn btn-<?php echo $colors[$key]; ?>" href="#!"><?php echo $category->name; ?></a>
							</div>
						</div>
				<?php } ?>
			</div>

			<div style="border-top: 1px solid #eeeeee;height:1px;margin:40px 0px;"></div>

			<div style="text-align:center;">
				<h3>Know us ...</h3>
			    <p>Dewmate is one of the best educational portal in India with information on over 30,000 institutes ,&nbsp;5000 courses, 300 exams and a database of 10,00,000 queries , Dewmate is well&shy; recognized&nbsp;among the education aspirant community who use the portal for information, preparatory material&nbsp;and guidance for studying in India and abroad.
			    </p>
		    </div>

			<div class="row-fluid clearfix" style="padding-top: 40px;">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title" style="text-align:center;">News</h3>
					  </div>
					  <div class="panel-body" style="padding:0px;">
					  	<?php $news_items = News::model()->findAll(array("limit"=>3, "order"=>"created_at DESC")); ?>
					    <?php foreach ($news_items as $key => $news) { ?>
					    	<div class="newsItem">
					    		<div class="row-fluid clearfix">
					    			<div class="col-md-3" style="background: #eee;">
					    				<img class="img-responsive" style="max-height: 50px;margin: 0 auto;" src="<?php echo $news->getFileUrl(); ?>" />
					    			</div>
					    			<div class="col-md-9">
					    				<p class="text-primary"><?php echo $news->title; ?></p>
					    				<span class="text-muted"><?php echo SharedFunctions::lib()->showTime($news->created_at); ?></span>
					    			</div>
					    		</div>
					    	</div>
					    <?php } ?>
					  </div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.carousel').carousel();
	})
</script>