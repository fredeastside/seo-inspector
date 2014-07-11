<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'verticalForm',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'class'=>'well'
    ),
)); ?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->textFieldRow($model,'name',array('class'=>'form-control','maxlength'=>255)); ?>
</div>

<div class="form-group">
    <?php echo $form->textFieldRow($model,'link',array('class'=>'form-control','maxlength'=>255)); ?>
</div>


<div class="form-group">
    <?php echo $form->textFieldRow($model,'title',array('class'=>'form-control','maxlength'=>255)); ?>
</div>

<div class="form-group">
    <?php echo $form->textFieldRow($model,'description',array('class'=>'form-control','maxlength'=>255)); ?>
</div>

<div class="form-group">
    <?php echo $form->textFieldRow($model,'keywords',array('class'=>'form-control','maxlength'=>255)); ?>
</div>

<div class="form-group">
    <?php echo CHtml::activeLabel($model, 'short_content', array())?>
    <?php
    $this->widget('ext.redactor.ERedactorWidget',array(
        'model'=>$model,
        'attribute'=>'short_content',
        // Redactor options
        'options'=>array(
            'lang'=>'ru',
        ),
        'htmlOptions'=>array(
            'class'=>'empty'
        )
    ));
    ?>
</div>

<div class="form-group">
    <?php echo CHtml::activeLabel($model, 'content', array())?>
    <?php
    $this->widget('ext.redactor.ERedactorWidget',array(
        'model'=>$model,
        'attribute'=>'content',
        // Redactor options
        'options'=>array(
            'lang'=>'ru',
        ),
        'htmlOptions'=>array(
            'class'=>'empty_short'
        )
    ));
    ?>
</div>

<?php echo $form->checkboxRow($model, 'public'); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>$model->isNewRecord ? 'Create' : 'Save',
    )); ?>
</div>

<?php $this->endWidget(); ?>