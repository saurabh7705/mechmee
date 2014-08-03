<?php $this->pageTitle = 'User Login | DrinKKing Club'; ?>
<div class="padit login_form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
	        'action'=>array("/admin/session/create"),
			'htmlOptions' => array('class'=>"m20"),
	)); ?>
        
	<fieldset>
    	<h1>Login</h1>
        <?php if($form->errorSummary($model) != "") { ?>
        	<div class="alert alert-danger">
                <a class="close close-position-fix" data-dismiss="alert" href="#">&times;</a>
                <?php echo $form->errorSummary(array($model), '<p>Oops, there are errors in your form!</p>'); ?>
            </div><br /><br />
        <?php } ?>
    	<div class="form-group">
	    	<?php echo $form->labelEx($model,'email',array('class'=>'')); ?>
	    	<div class="controls">
	    	<?php echo $form->textField($model,'email'); ?>
	    	</div>
	    </div>
	    <div class="form-group">
	    	<?php echo $form->labelEx($model,'password',array('class'=>'')); ?>
	    	<div class="controls">
	    	<?php echo $form->passwordField($model,'password'); ?>
	    	</div>
	    </div>
    	<div class="m20">
    		<?php echo CHtml::submitButton('Login',array('id'=>'login','class'=>'btn btn-md btn-warning')); ?>
    	</div>
    </fieldset>
	<?php $this->endWidget(); ?>
</div>
<script>
    $("login").click(function(){
        $(this).off("click"); 
    });
</script>