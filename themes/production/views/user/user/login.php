<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>
<h2><?php echo UserModule::t("Login"); ?></h2>
<div class="contact-col1">
	<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>
		<div class="success">
			<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
		</div>
	<?php endif; ?>
	<p class="leading"><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>
</div>
<div class="contact-col2">
	<?php echo CHtml::beginForm(); ?>

		<div class="input-wrapper">
			<?php echo CHtml::activeLabelEx($model,'username', array('class'=>'label')); ?>
			<?php echo CHtml::activeTextField($model,'username') ?>
		</div>
		
		<div class="input-wrapper">
			<?php echo CHtml::activeLabelEx($model,'password', array('class'=>'label')); ?>
			<?php echo CHtml::activePasswordField($model,'password') ?>
		</div>
		
		<div class="input-wrapper" style="text-align:center;">
			<?php echo CHtml::activeCheckBox($model,'rememberMe', array('style'=>'width:15px;vertical-align:-2px;')); ?>
			<?php echo CHtml::activeLabelEx($model,'rememberMe', array('class'=>'label','style'=>'width:auto;')); ?>
		</div>

		<?php echo CHtml::errorSummary($model, '', '', array('class'=>'errors', 'style'=>'margin: 10px 0 10px 40px;')); ?>

		<div class="submit" style="margin-top:20px;">
			<?php echo CHtml::submitButton(UserModule::t("Login"), array('class'=>'button-style contact')); ?>
		</div>

		<div class="input-wrapper" style="text-align:center;margin-top:10px;">
			<p class="hint">
			<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
			</p>
		</div>
		
	<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>