<?php echo $this->renderPartial("_search_form", array("course_id"=>"", "sub_course_id"=>"", "city_id"=>"")); ?>

<div style="padding:10px 15px 20px;">
	<h3 style="color: #1a2b50;">Recent News</h3>
	<div class="row clearfix m20">
		<?php $news_items = News::model()->findAll(array("limit"=>3, "order"=>"created_at DESC")); ?>
	    <?php foreach ($news_items as $key => $news) { ?>
	    	<div class="col-md-4">
		    	<div class="newsBlock" style="box-shadow: 0 0 2px 1px #efefef;">
		    		<img class="img-responsive" style="height: 200px;margin: 0 auto; width: 100%;" src="<?php echo $news->getFileUrl(); ?>" />
		    		<div style="padding: 10px;">
			    		<h4 style="color: #222;"><?php echo $news->title; ?></h4>
			    		<span class="text-muted"><?php echo SharedFunctions::lib()->showTime($news->created_at); ?></span>
			    	</div>
		    	</div>
	    	</div>
	    <?php } ?>
	</div>
</div>

<div style="padding:10px 15px 20px;">
	<h3 style="color: #1a2b50;">Top Colleges</h3>
	<div class="row clearfix m20">
		<?php $colleges = College::model()->findAll(array("limit"=>3, "order"=>"updated_at DESC")); ?>
	    <?php foreach ($colleges as $key => $college) { ?>
	    	<div class="col-md-4">
		    	<div class="newsBlock" style="box-shadow: 0 0 2px 1px #efefef;">
		    		<img class="img-responsive" style="height: 200px;margin: 0 auto; width: 100%;" src="<?php echo $college->getFileUrl(); ?>" />
		    		<div style="padding: 10px;">
			    		<h4 style="color: #222;"><?php echo $college->name; ?></h4>
			    		<span class="text-muted"><?php echo $college->description; ?></span>
			    	</div>
		    	</div>
	    	</div>
	    <?php } ?>
	</div>
</div>