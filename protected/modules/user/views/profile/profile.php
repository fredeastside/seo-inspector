<script type="text/javascript" src="/themes/production/js/script_profile.js"></script>
<link rel='stylesheet' href='/themes/production/css/style_profile.css' type='text/css' />

<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?><h1><?php echo UserModule::t('Your profile'); ?></h1>

<?php /* if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; */ ?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form-update',
    'action'=>'/user/profile/edit',//Yii::app()->createUrl('//newsletter/create'),
    'enableAjaxValidation'=>true,
    'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>
    <div class="user_profile_main_container">
        <div class="up_pic">
            <?php /* <img src="/themes/production/images/userpic.png"> */ ?>
            <?php /*echo '<img src="'.$profile->attachment.'" />'; */ ?>
            <?php echo '<img src="/'.Yii::app()->request->baseUrl.$profile->attachment.'" />'; ?>
            <input id="Profile_filename" type="file" name="Profile[filename]" style="display: none;">
        </div>
        <div class="up_main_data">
            <div class="up_login_container">
                <div class="up_login">
                    <?php echo CHtml::encode($model->username); ?>
                </div>
                <div class="up_visited">
                    <?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?>: <?php echo $model->lastvisit_at; ?>
                </div>
            </div>
            <div class="up_name">
                <?php
                $profileFields=ProfileField::model()->forOwner()->sort()->findAll();
                if ($profileFields) {
                    foreach($profileFields as $field) {
                        //echo "<pre>"; print_r($profile); die();
                        ?>
                        <?php if($field->varname != 'filename'):?>
                            <span class="val_captions">
                                <?php echo (($field->widgetView($profile)) ? $field->widgetView($profile):
                                    CHtml::encode((($field->range) ? Profile::range($field->range,$profile->getAttribute($field->varname)):
                                        $profile->getAttribute($field->varname)))); ?>
                            </span>

                                <?php echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>128, 'style'=>'display: none;')); ?>
                        <?php endif; ?>
                    <?php
                    }//$profile->getAttribute($field->varname)
                }
                ?>
            </div>
        </div>
    </div>

    <div class="user_profile_action_bar">
        <a id="userpic_action" href="#" onclick="ChangeUserPic(); return false;">
            <div id="userpic_edit"></div>
            <div id="userpic_save" style="display: none;"></div>
            <?php /* <img id="userpic_edit" src="/themes/production/images/pencil_edit_img.png">
            <img id="userpic_save" src="/themes/production/images/userpic_save_img.png" style="display: none;"> */ ?>
            <span>change userpic</span>
        </a>
        <a id="prifile_action" href="#" onclick="ChangeProfile(); return false;">
            <div id="profile_edit"></div>
            <span>change profile</span>
        </a>
    </div>
    <div class="user_profile_additional_info">
        <div class="up_ai_row">
            <div class="up_ai_name">

                <?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:
            </div>
            <div class="up_ai_value">
                <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128, 'style'=>'display: none;')); ?>
                <span class="val_captions">
                    <?php echo CHtml::encode($model->email); ?>
                </span>
            </div>
        </div>
        <div class="up_ai_row">
            <div class="up_ai_name">
                <?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?>:
            </div>
            <div class="up_ai_value">
                <?php echo $model->create_at; ?>
            </div>
        </div>
        <div class="up_ai_row">
            <div class="up_ai_name">
                <?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:
            </div>
            <div class="up_ai_value">
                <?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?>
            </div>
        </div>
    </div>

<div style="display: none;" class="submit_cover">
    <?php //echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus')); ?>
    <?php //echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
    <?php //echo $form->dropDownList($model,'status',User::itemAlias('UserStatus')); ?>
    <?php  ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
</div>

<?php $this->endWidget(); ?>

