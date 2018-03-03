<?php
$this->pageTitle=$college->name." | Admission | ".Yii::app()->name;
?>
<div style="background: #1a2b507a;padding: 120px 20px 80px;">
	<h1 style="color: #fff;" class="tac"><?php echo $college->name; ?></h1>
</div>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="background: #f3f3f3; height: 500px;max-height:500px;">
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo $college->getFileUrl(); ?>" style="margin: 0 auto; max-width: 100%;max-height:500px;">
    </div>
  </div>
</div>

<div style="padding:40px;">
	<p style="font-size: 18px;"><?php echo $college->description; ?></p>
	<hr />
	<div class="row-fluid clearfix">
		<div class="col-md-4 tac">
			<h3>Location: <span style="color: #ff8d00;"><?php echo $college->location; ?></span></h3>
		</div>
		<div class="col-md-4 tac">
			<h3>Established: <span style="color: #ff8d00;"><?php echo $college->established_year; ?></span></h3>
		</div>
		<div class="col-md-4 tac">
			<h3 style="color: #ff8d00;"><span style="font-size:30px;"><?php echo $college->rating; ?></span> <span class="glyphicon glyphicon-star"></span></h3>
		</div>
	</div>
</div>
