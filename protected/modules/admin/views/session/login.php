<?php $this->pageTitle = 'User Login | DrinKKing Club'; ?>
<div class="padit">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
	        'action'=>array("/admin/session/create"),
			'htmlOptions' => array('class'=>"m20", 'role'=>'form'),
	)); ?>
        
	<div class="row-fluid">
		<div class="col-md-4 col-md-offset-4">
	    	<h1 clas="tac">Login</h1>
	        <?php if($form->errorSummary($model) != "") { ?>
	        	<div class="alert alert-danger">
	                <a class="close close-position-fix" data-dismiss="alert" href="#">&times;</a>
	                <?php echo $form->errorSummary(array($model), '<p>Oops, there are errors in your form!</p>'); ?>
	            </div><br /><br />
	        <?php } ?>
	    	<div class="form-group">
		    	<?php echo $form->labelEx($model,'email',array('class'=>'')); ?>
		    	<?php echo $form->textField($model,'email', array('class'=>'form-control')); ?>
		    </div>
		    <div class="form-group">
		    	<?php echo $form->labelEx($model,'password',array('class'=>'')); ?>
		    	<?php echo $form->passwordField($model,'password', array('class'=>'form-control')); ?>
		    </div>
	    	<div class="m20">
	    		<?php echo CHtml::submitButton('Login',array('id'=>'login','class'=>'btn btn-md btn-warning')); ?>
	    	</div>
	    </div>
    </div>
	<?php $this->endWidget(); ?>
</div>
<script>
    $("login").click(function(){
        $(this).off("click"); 
    });
</script>