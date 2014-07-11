<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="fotorama" data-autoplay="true" data-width="100%">
    <img src="<?=Yii::app()->theme->baseUrl;?>/images/1.png">
    <img src="<?=Yii::app()->theme->baseUrl;?>/images/2.png">
</div>
<h1 class="clear-text section2-h1"><?php echo CHtml::encode(Yii::app()->name); ?></h1>
<div class="img-left left">
    <ul id="features-ul">
        <li><span></span>Fast, secure & 100% reliable</li>
        <li><span></span>No contract or set-up fee</li>
        <li><span></span>Free Driver App for iPhone &amp; Android</li>
        <li><span></span>No hardware, log in from anywhere</li>
        <li><span></span>Open Source Booking Apps</li>
    </ul>
</div>

<div class="img-right left">
    
</div>