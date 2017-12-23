<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!--<link rel="shortcut icon" href="favicon.png">-->
    <meta property="og:title" content="<?php echo CHtml::encode($this->pageTitle); ?>" />
    <title data-title="<?php echo CHtml::encode($this->pageTitle); ?>"><?php echo CHtml::encode($this->pageTitle); ?></title>
 	<meta name="description" content="MechMee">
	<meta name="author" content="MechMee Pvt Ltd.">
	<?php $baseurl=Yii::app()->baseUrl; ?>
	<?php $this->renderPartial("application.views.shared.stylesheets"); ?>
	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
	
	<?php $this->renderPartial("application.views.shared.scripts"); ?>
</head>

<body>

<div class="" id="page">
	<nav class="navbar navbar-default navbar-fixed-top navbar-custom" role="navigation" id="navbar">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <?php echo  CHtml::link('MechMee',array('/'), array("class"=>"navbar-brand logoFont")); ?>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	      	<li><?php echo  CHtml::link('Home', array('/')); ?></li>
	      	<li><?php echo  CHtml::link('About', '#about', array("class"=>"links", "data-target"=>"#about")); ?></li>
	      	<li><?php echo  CHtml::link('News', "#news", array("class"=>"links", "data-target"=>"#news")); ?></li>
	      	<li><?php echo  CHtml::link('Colleges', array('/college/index'), array("class"=>"links", "data-target"=>"#colleges")); ?></li>
	      	<li><?php echo  CHtml::link('Test Preparation', array('/site/admission'), array("class"=>"links", "data-target"=>"#test")); ?></li>
	      	<li><?php echo  CHtml::link('Contact Us', '#contact', array("class"=>"links", "data-target"=>"#contact")); ?></li>
	      	<?php if(Yii::app()->user->isGuest) { ?>
	      		<li><?php echo  CHtml::link('Login',array('/admin/session/login'), array("class"=>"")); ?></li>
	      	<?php } else { ?>
	      		<li><?php echo  CHtml::link('Logout',array('/admin/session/logout')); ?></li>
	      	<?php } ?>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div>
		<div class="" id="main">                    
	        <article>
				<?php foreach(Yii::app()->user->getFlashes() as $key => $message) { ?>
				    <div class="alert alert-<?php echo $key; ?>"><?php echo $message; ?><a class="close" data-dismiss="alert" href="#">&times;</a></div>
				<?php } ?>
	            <?php echo $content; ?>
	        </article>

	        <footer class="footer tac">
	        	<p style="font-size: 16px;line-height: 50px;letter-spacing: 2px;">COPYRIGHTS &#169; <?php echo date("Y"); ?> MechMee</p>
	        	<ul class="footer-socials clearfix">
			        <li><a href="#" class="foo_social"><i class="fa fa-facebook"></i></a></li>
			        <li><a href="#" class="foo_social"><i class="fa fa-twitter"></i></a></li>
			        <li><a href="#" class="foo_social"><i class="fa fa-google-plus"></i></a></li>
			        <li><a href="#" class="foo_social"><i class="fa fa-behance"></i></a></li>
			        <li><a href="#" class="foo_social"><i class="fa fa-pinterest"></i></a></li>
		      	</ul>
			</footer>

		</div><!--end #main -->
	</div>
</div>
<script src="https://use.fontawesome.com/24bd8d6a39.js"></script>
<script>
	$(document).ready(function(){
	    new WOW().init();
		$(".links").click(function(e) {
			e.preventDefault();
			var href = $(this).attr("data-target");
			var target = $(href);
			if(!target || target == undefined || target == "undefined" || target.length == 0) {
				window.location.href = "<?php echo Yii::app()->baseUrl; ?>/"+href;
			} else {
				$('html, body').animate({
		          scrollTop: target.offset().top
		        }, 1500);
			}
		});
	});

	$(window).on("scroll", function() {
		if($(window).scrollTop() > $(window).height()) {
			if(!$("#navbar").hasClass("fillColor")) {
	     		$("#navbar").addClass("fillColor");
	     	}
	    } else {
	    	$("#navbar").removeClass("fillColor");
	    }	
	});

</script>
</body>
</html>
