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
	
	<?php $this->renderPartial("application.views.shared.scripts"); ?>
</head>

<body>

<div class="container" id="page">
	<nav class="navbar navbar-default" role="navigation" style="background: #00123a;">
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
	      	<li><?php echo  CHtml::link('Test Preparation', array('/site/admission')); ?></li>
	      	<li><?php echo  CHtml::link('Colleges', array('/college/index')); ?></li>
	      	<li><?php echo  CHtml::link('Contact Us', '#contact', array('id'=>"contact_link")); ?></li>
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

	            <div class="row-fluid clearfix" style="background: #c5c7cc;" id="contact">
					<div class="col-md-8 col-md-offset-2">
						<div style="padding: 10px 0px 20px;">
							<?php $new_model = new Contact; ?>
							<?php $form=$this->beginWidget('CActiveForm', array(
								'id'=>'sub-category-form',
								'enableAjaxValidation'=>false,
								'action'=>Yii::app()->createUrl('/site/contact')
							)); ?>
								<?php echo $form->errorSummary($new_model); ?>
						  
							    <h3>Contact Us</h3>
							    <div class="row">
							      <div class="col-md-6">
							        <div class="form-group">
										<?php echo $form->textField($new_model,'name', array('class'=>'form-control', 'placeholder'=>"Name")); ?>
							        </div>
							      </div>
							      <!--  col-md-6   -->

							      <div class="col-md-6">
							        <div class="form-group">
							        	<?php echo $form->textField($new_model,'email', array('class'=>'form-control', 'placeholder'=>"Email")); ?>
							        </div>
							      </div>
							      <!--  col-md-6   -->
							    </div>

							    <div class="row">
							      <div class="col-md-6">
							        <div class="form-group">
							        	<?php echo $form->textField($new_model,'email', array('class'=>'form-control', 'placeholder'=>"Mobile")); ?>
							        </div>
							      </div>
							     
							      <div class="col-md-6">
							        <div class="form-group">
							        	<?php $courses = Course::model()->findAll(); ?>
							        	<?php echo $form->dropDownList($new_model,'course_id', CHtml::listData($courses,'id','name'), array('class'=>'form-control', 'prompt'=>"Course")); ?>
							        </div>
							      </div>

							    </div>
							   
							    <div class="row">
							      <div class="col-md-6">
							        <div class="form-group">
							        	<?php $cities = City::model()->findAll(); ?>
							        	<?php echo $form->dropDownList($new_model,'city_id', CHtml::listData($cities,'id','name'), array('class'=>'form-control', 'prompt'=>"City")); ?>
							        </div>
							      </div>
							    </div>

							    <div class="checkbox">
							      <label>
							        <input type="checkbox" value="Sure!" id="newsletter">I authorize to contact me. This will override registry on DND / NDNC
							      </label>
							    </div>

							    <input type="submit" name="submit" value="Submit" class="btn btn-primary" />

						  	<?php $this->endWidget(); ?>
						</div>
					</div>
				</div>

	        </article>

	        <footer class="footer">
	        	<div class="row">
					<div class="col-md-4">
					</div>
					<div class="col-md-7 tar">
					    <p>&#169; <?php echo date("Y"); ?>, MechMee&nbsp;&nbsp;&nbsp;&nbsp;</p>
					</div>
				</div>
			</footer>

			<div class="floatingForm">
				<div class="" id="contact-form">
					<div>
						<?php $new_model1 = new Contact; ?>
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'contact-form',
							'enableAjaxValidation'=>false,
							'action'=>Yii::app()->createUrl('/site/contact')
						)); ?>
						    <h4 class="tac">Enquiry / Contact Us</h4>
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

						    <input type="submit" name="submit" value="Submit" class="btn btn-primary" />

					  	<?php $this->endWidget(); ?>
					</div>
				</div>
			</div>

		</div><!--end #main -->
	</div>
</div>
</body>
</html>
