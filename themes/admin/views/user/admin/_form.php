<div class="form">
<?php /*
$this->widget('ext.yiiuserimg.YiiUserImg', array(
    'htmlOptions'=>array(
        'title'=>'User image',
        'alt'=>'User Image Directory Cant Be Found',
        'style' => 'width: 95px; height: 95px;',
    )
)); */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'superuser'); ?>
		<?php echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus')); ?>
		<?php echo $form->error($model,'superuser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
<?php
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
                //if($field['varname'] != 'userpic'):?>
                    <div class="row">
                        <?php echo $form->labelEx($profile,$field->varname); ?>
                        <?php
                        if ($widgetEdit = $field->widgetEdit($profile)) {
                            echo $widgetEdit;
                        } elseif ($field->range) {
                            echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
                        }
                        elseif($field->varname == 'filename'){
                                // выводим аватар,
                                // а если он не установлен,
                                // то будет использовано изображение по умолчанию
                                echo '<img src="/'.$profile->attachment.'" /><br>';
                                // поле для загрузки изображения
                                echo $form->fileField($profile,'filename').'<br>';
                                // ссылка для удаления изображения 
                                echo CHtml::link('Удалить аватар',array('deleteimage'));
                        } elseif ($field->field_type=="TEXT") {
                            echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
                        } else {
                            echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
                        }
                         ?>
                        <?php echo $form->error($profile,$field->varname); ?>
                    </div>
                <?php /*else:  ?>
                    <div class="row">
                        <?php echo CHtml::activeLabelEx($profile,'userpic'); ?>
                        <?php echo CHtml::activefileField($profile,'userpic'); ?>
                        <?php echo CHtml::error($profile,'userpic'); ?>
                    </div>
                <?php
                    endif;*/
			}
		}
?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->