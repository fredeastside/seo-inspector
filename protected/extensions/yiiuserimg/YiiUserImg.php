<?php
/** YiiUserImg class file.
 * @author Skworden (Sean Worden)
 * You are free to do whatever you like with this code.
 */

Yii::import('system.web.widgets.CWidget');

/**
To be used with Yii-User Module

THIS IS NOT AN IMAGE UPLOADING WIDGET. YOU MUST HAVE A WAY TO UPLOAD IMAGES ALREADY.
THIS WIDGET WILL JUST RENDER THE IMAGE SITE WIDE IN ANY VIEW FILE.  IT DOESN'T MATTER
WHAT FILE UPLOADER YOU USE JUST MAKE SURE IT STORES IN ABSOLUTE PATHS.

I.E. images/user/uploads/img.png

This won't work if it is not in absolute paths.

To use this widget, you may insert the following code in a view:

$this->widget('ext.yiiuserimg.YiiUserImg', array(
   'htmlOptions'=>array(
        'title'=>'User image',
        'alt'=>'User Image Directory Cant Be Found',
        'style' => 'width: 95px; height: 95px;',
   )
 ));
*/
class YiiUserImg extends CWidget
{
    /* Renders HTML attributes */
/*
    public $htmlOptions = array();
    
    public function run()
    {
        $altText = isset($this->htmlOptions['alt']) ? $this->htmlOptions['alt'] : '';
        $imageTag = CHtml::image($this->getImageUrl(), $altText, $this->htmlOptions);
        echo $imageTag;
    }

    /* Renders User Image and Default Image url */
/*
    public function getImageUrl()
    {
        $userObject = Yii::app()->getModule('user')->user(); //Renders the current user's id
        $defaultimgbaseurl = Yii::app()->baseUrl.'/images/users/User/default.png'; //Path to your default image location and image name!
        $imgbaseurl = Yii::app()->baseUrl.'/'; 
        $userimg = Yii::app()->baseUrl.'/' .$userObject->userpic;  //Renders the current user's image path.  Filename is what I call my file path in my Users Model.  It can be called anything just make sure you chage it everywhere.
        $userimgalt = $defaultimgbaseurl;//default image
        $imagelink = $imgbaseurl.''.$userObject->userpic; //user image
        
        if (empty($userObject->userpic)) //if image column in your database is empty
        {
        return $userimgalt; //render the default image 
        }
        else //if it's not empty 
        {
        return $imagelink; //render the user image
        }
    }*/
}