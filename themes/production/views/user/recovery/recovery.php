<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Restore"),
);
?>

<h2><?php echo UserModule::t("Restore"); ?></h2>
<div class="contact-col1">
	<p class="leading"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>
</div>
<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
	<div class="success">
		<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
	</div>
<?php else: ?>

<div class="contact-col2">
<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($form); ?>
	
	<div class="input-wrapper">
		<?php echo CHtml::activeLabel($form,'login_or_email', array('class'=>'label')); ?>
		<?php echo CHtml::activeTextField($form,'login_or_email') ?>
	</div>
	
	<div class="submit">
		<?php echo CHtml::submitButton(UserModule::t("Restore"), array('class'=>'button-style contact')); ?>
	</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php endif; ?>