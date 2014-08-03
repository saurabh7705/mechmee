<!doctype html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" xmlns:fb="http://www.facebook.com/2008/fbml"> <!--<![endif]-->
<head>    
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--<link rel="shortcut icon" href="favicon.png">-->
    <meta property="og:title" content="<?php echo CHtml::encode($this->pageTitle); ?>" />
    <title data-title="<?php echo CHtml::encode($this->pageTitle); ?>"><?php echo CHtml::encode($this->pageTitle); ?></title>
 	<meta name="description" content="Drink King">
	<meta name="author" content="Drink King Pvt Ltd.">
	<?php $baseurl=Yii::app()->baseUrl; ?>
	<?php $this->renderPartial("application.views.shared.stylesheets"); ?>
	
	<?php $this->renderPartial("application.views.shared.scripts"); ?>
</head>

<body>
<div class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container">
		<div class="">
			<a href="#menu_navbar_wrapper" class="navbar-toggle pull-left">
            	<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
		</div>
        
        <a href="<?php echo Yii::app()->createUrl("/site/index"); ?>" >DrinkKing Club</a>
        
		<div class="navbar-collapse collapse navbar-left">
			<ul class="nav navbar-nav">
				<li class="ropdown">
					<a class="dropdown-toggle main" data-toggle="dropdown" href="#">Admin Actions <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo  CHtml::link('Products',array('/admin/product/index')); ?></li>
						<li><?php echo  CHtml::link('Sub Categories',array('/admin/subCategory/index')); ?></li>
						<li><?php echo  CHtml::link('Categories',array('/admin/category/index')); ?></li>
					</ul> 
				</li>
			</ul>
		</div>
		<ul class="pull-right settings">
			<li><?php echo CHtml::link('Logout',array('/session/logout')); ?></li>
		</ul>
	</div>
</div>

<div>
	<div class="" id="main">                    
        <article>
			<?php foreach(Yii::app()->user->getFlashes() as $key => $message) { ?>
			    <div class="alert alert-<?php echo $key; ?>"><?php echo $message; ?><a class="close" data-dismiss="alert" href="#">&times;</a></div>
			<?php } ?>
            <?php echo $content; ?>
        </article>

        <footer class="footer">
        	<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-7 tar">
				    <p>&#169; <?php echo date("Y"); ?>, DrinkKing.club&nbsp;&nbsp;&nbsp;&nbsp;</p>
				</div>
			</div>
		</footer>

	</div><!--end #main -->
</div>
</body>
</html>