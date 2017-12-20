<?php
$this->pageTitle=$college->name." | Admission | ".Yii::app()->name;
?>
<div style="background: #1a2b50;padding: 40px;">
	<h1 style="color: #fff;" class="tac"><?php echo $college->name; ?></h1>
</div>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="background: #f3f3f3;">
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo $college->getFileUrl(); ?>" style="margin: 0 auto; width: 100%:">
    </div>
  </div>
</div>

<div style="padding:40px;">
	<p style="font-size: 18px;"><?php echo $college->description; ?></p>
	<br /><br />
	<h5> - <?php echo $college->location; ?></h5>
	<h5> - Established in <?php echo $college->established_year; ?></h5>
	<h4 style="color: #ff8d00;"><span style="font-size:30px;"><?php echo $college->rating; ?></span> <span class="glyphicon glyphicon-star"></span></h4>
</div>
