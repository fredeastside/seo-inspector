<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<h2><?php echo UserModule::t("Registration"); ?></h2>
<?php if(Yii::app()->user->hasFlash('registration')): ?>
	<div class="contact-col1">
		<p class="leading"><?php echo Yii::app()->user->getFlash('registration'); ?></p>
	</div>
<?php else: ?>
<div class="contact-col1">
</div>
<div class="contact-col2">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>
	
	<div class="input-wrapper">
	<?php echo $form->labelEx($model,'username', array('class'=>'label')); ?>
	<?php echo $form->textField($model,'username'); ?>
	<?php echo $form->error($model,'username',array('class'=>'errors')); ?>
	</div>
	
	<div class="input-wrapper">
	<?php echo $form->labelEx($model,'password', array('class'=>'label')); ?>
	<?php echo $form->passwordField($model,'password'); ?>
	<?php echo $form->error($model,'password',array('class'=>'errors')); ?>
	</div>
	
	<div class="input-wrapper">
	<?php echo $form->labelEx($model,'verifyPassword', array('class'=>'label')); ?>
	<?php echo $form->passwordField($model,'verifyPassword'); ?>
	<?php echo $form->error($model,'verifyPassword',array('class'=>'errors')); ?>
	</div>
	
	<div class="input-wrapper">
	<?php echo $form->labelEx($model,'email', array('class'=>'label')); ?>
	<?php echo $form->textField($model,'email'); ?>
	<?php echo $form->error($model,'email',array('class'=>'errors')); ?>
	</div>
	
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="input-wrapper">
		<?php echo $form->labelEx($profile,$field->varname, array('class'=>'label')); ?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname,array('class'=>'errors')); ?>
	</div>	
			<?php
			}
		}
?>
	<?php if (UserModule::doCaptcha('registration')): ?>
	<div class="input-wrapper">
		<?php echo $form->labelEx($model,'verifyCode', array('class'=>'label')); ?>		
		<?php $this->widget('CCaptcha', array('buttonLabel'=>'refresh', 'buttonType'=>'button', 'buttonOptions'=>array('type'=>'image','src'=>Yii::app()->theme->baseUrl.'/images/refresh_yellow.png', 'style'=>'width:38px;border:none;'))); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		<?php echo $form->error($model,'verifyCode',array('class'=>'errors')); ?>
	</div>
	<?php endif; ?>
	
	<div class="submit">
		<?php echo CHtml::submitButton(UserModule::t("Register"), array('class'=>'button-style contact')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>