<?php

class FormController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $cache = Yii::app()->cache;

        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionFeedBack()
    {

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='feedback-form'){
            //$form_name = 'FeedbackFrom';
            $this->renderPartial('feedback-form', array('form_name'=> 'FeedbackFrom', 'form_unique' => 'fbf_'));

            /*Yii::app()->end();*/
        }

        // display the login form
        //$this->renderPartial('login',array('model'=>$model));
    }


}