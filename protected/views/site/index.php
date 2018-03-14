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
      <img src="<?php echo Yii::app()->baseUrl;?>/images/banner1.jpg" style="height: 100vh; width: 100%;" alt="...">
    </div>
    <div class="item">
      <img src="<?php echo Yii::app()->baseUrl;?>/images/banner2.jpg" style="height: 100vh; width: 100%;" alt="...">
    </div>
    <div class="item">
      <img src="<?php echo Yii::app()->baseUrl;?>/images/banner3.jpg" style="height: 100vh; width: 100%;" alt="...">
    </div>
  </div>

  	<div class="typewriter">
		<p>Find about 25,000 colleges & 5,000 exams.</p>
	</div>
</div>

<div style="padding: 100px 25px;"  id="about">
	<div class="row-fluid clearfix">
		<div class="col-md-6 tac">
			<img src="<?php echo Yii::app()->baseUrl;?>/images/about.png" style="width: 100%;" alt="..." class="wow slideInLeft">
		</div>
		<div class="col-md-6">
			<br />
			<br />
			<br />
			<br />
			<h2 class="mainHeading">About Us</h2>
		    <p class="data wow slideInRight">
		    Mechmee is one of the best educational portal in India with information on over 30,000 institutes ,&nbsp;5000 courses, 300 exams and a database of 10,00,000 queries , Mechmee is well&shy; recognized&nbsp;among the education aspirant community who use the portal for information, preparatory material&nbsp;and guidance for studying in India and abroad.
		    </p>
		</div>
	</div>
</div>

<div style="padding: 100px 25px; background: #f1f1f1;" class="tac" id="news">
	<h2 class="mainHeading tac">News</h2>
	<br /><br />
	<?php $items = News::model()->findAll(array("limit"=>6, "order"=>"created_at DESC")); ?>
	<?php $news_items_arr = array_chunk($items, 3); ?>
	<?php foreach($news_items_arr as $news_items) { ?>
		<div class="row-fluid clearfix wow fadeInUp">
		<?php foreach ($news_items as $key => $news) { ?>
			<div class="col-md-4" style="padding-left: <?php echo $key == 0 ? '0px' : '15px'; ?>">
				<div class="newsItem">
					<div class="img_block">
						<img class="img-responsive" src="<?php echo $news->getFileUrl(); ?>" />
					</div>
					<div class="data_block">
						<h4><?php echo $news->title; ?></h4>
						<p class="data"><?php echo $news->description; ?></p>
						<!--<p class="tar" style="margin-bottom: 0px;"><span class="text-muted"><?php //echo SharedFunctions::lib()->showTime($news->created_at); ?></span></p>-->
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	<?php } ?>
</div>

<div style="padding: 50px 25px; background: #FFF;" class="tac" id="colleges">
	<h2 class="mainHeading tac">Colleges</h2>
	<div class="row-fluid clearfix">
		<div class="col-md-8 col-md-offset-2" style="text-align: center;">
			<Br />
			<?php echo CHtml::beginForm(array('/college/search'), 'get', array('class'=>'form-inline')); ?>
				<div class="form-group mr10">
					<?php $courses = Course::model()->findAll(); ?>
					<?php echo CHtml::dropDownList('course_id', "", CHtml::listData($courses,'id','name'), array('class'=>'form-control', 'prompt'=>"Select Main Course")); ?>
				</div>
				<div class="form-group mr10">
					<?php $sub_courses = SubCourse::model()->findAll(); ?>
					<?php echo CHtml::dropDownList('sub_course_id', "", CHtml::listData($sub_courses,'id','name'), array('class'=>'form-control', 'prompt'=>"Select Sub Course")); ?>
				</div>
				<div class="form-group mr10">
					<?php $cities = City::model()->findAll(); ?>
					<?php echo CHtml::dropDownList('city_id', "", CHtml::listData($cities,'id','name'), array('class'=>'form-control', 'prompt'=>"Select City")); ?>
				</div>
				<div class="form-group mr10">
					<input type="submit" name="search" value="Browse Colleges" class="btn btn-info" style="margin-bottom: 8px;" />
				</div>
			<?php echo CHtml::endForm(); ?>
		</div>
	</div>
	<div class="row-fluid clearfix m20">
		<?php $colleges = College::model()->findAll(array("limit"=>3, "order"=>"updated_at DESC")); ?>
	    <?php foreach ($colleges as $key => $college) { ?>
	    	<div class="col-md-4">
		    	<div class="newsBlock wow fadeInUp" style="box-shadow: 0 0 2px 1px #efefef;">
		    		<div style="background: #eee">
		    			<img class="img-responsive" style="height: 200px;margin: 0 auto; width: 100%;" src="<?php echo $college->getFileUrl(); ?>" />
		    		</div>
		    		<div style="padding: 10px;">
			    		<h4><?php echo CHtml::link($college->name, array("/college/show", "id"=>$college->id), array("style"=>"color: #222;")); ?></h4>
			    		<span class="text-muted"><?php echo $college->description; ?></span>
			    	</div>
		    	</div>
	    	</div>
	    <?php } ?>
	</div>
</div>

<div style="padding: 100px 25px; background: #f1f1f1;" class="tac" id="test">
	<h2 class="mainHeading tac">Test Preparation</h2>
	<br /><br />
	<?php $category_items = Category::model()->findAll(array("limit"=>6)); ?>
	<?php $categories_arr = array_chunk($category_items, 3); ?>
	<?php $colors = array("success", "danger", "primary"); ?>
	<?php foreach($categories_arr as $categories) { ?>
		<div class="row-fluid clearfix wow fadeInUp">
		<?php foreach($categories as $key=>$category) { ?>
			<?php $course = Course::model()->find(array("condition"=>"category_id = :category_id", "params"=>array("category_id"=>$category->id))); ?>
			<?php if($course) { ?>
				<div class="col-md-4" style="padding-left: <?php echo $key == 0 ? '0px' : '15px'; ?>">
					<div class="newsItem">
						<div class="img_block">
							<img class="img-responsive" src="<?php echo $course->getFileUrl(); ?>" />
							<a style="position: absolute; bottom:10px;right: 10px;" class="btn btn-sm btn-<?php echo $colors[$key]; ?>" href="#!"><?php echo $category->name; ?></a>
						</div>
						<div class="data_block">
							<h4><?php echo CHtml::link($course->name." Admission", array("/college/search", "course_id"=>$course->id), array("class"=>"text-primary")); ?></h4>
							<p class="data"><?php echo $course->description; ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
		</div>
	<?php } ?>
</div>

<div id="contact" style="background: #FFF;">
	<div class="row-fluid clearfix" style="padding:0px;">
		<div class="col-md-6" style="padding:0px;">
			<div class="padder">
				<h2 class="mainHeading">Contact</h2>
			    <p class="data wow slideInLeft">
			    	We are Mechmee Private Limited.
			    </p>
			    <p class="data wow slideInLeft">
			    	BTM Layout Stage 2, Bangalore, Karnataka - 560076
			    </p>
			    <p class="data wow slideInLeft">
			    	Contact us: <a href="tel:8050624407">+91 8050624407</a>
			    	<br />
			    	Mail: <a href="mailto:mechmee2k18@gmail.com" target="_top">mechmee2k18@gmail.com</a>
			    </p>
			</div>
		</div>
		<div class="col-md-6" style="padding:0px;">
			<div style="background: url(<?php echo Yii::app()->baseUrl;?>/images/contact.jpg) no-repeat center center;">
				<div class="contactFormWrap">
					<div class="contactForm tac wow fadeInRight" id="contact-form">
						<div>
							<?php $new_model1 = new Contact; ?>
							<?php $form=$this->beginWidget('CActiveForm', array(
								'id'=>'contact-form',
								'enableAjaxValidation'=>false,
								'action'=>Yii::app()->createUrl('/site/contact')
							)); ?>
							    <br />
							    <div class="form-group">
									<?php echo $form->textField($new_model1,'name', array('class'=>'form-control', 'placeholder'=>"Name")); ?>
						        </div>
						        <div class="form-group">
						        	<?php echo $form->textField($new_model1,'email', array('class'=>'form-control', 'placeholder'=>"Email")); ?>
						        </div>
						        <div class="form-group">
						        	<?php echo $form->textField($new_model1,'email', array('class'=>'form-control', 'placeholder'=>"Mobile")); ?>
						        </div>
						        <div class="form-group">
						        	<?php $courses = Course::model()->findAll(); ?>
						        	<?php echo $form->dropDownList($new_model1,'course_id', CHtml::listData($courses,'id','name'), array('class'=>'form-control', 'prompt'=>"Course")); ?>
						        </div>
						        <div class="form-group">
						        	<?php $cities = City::model()->findAll(); ?>
						        	<?php echo $form->dropDownList($new_model1,'city_id', CHtml::listData($cities,'id','name'), array('class'=>'form-control', 'prompt'=>"City")); ?>
						        </div>

							    <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-info" />

						  	<?php $this->endWidget(); ?>
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