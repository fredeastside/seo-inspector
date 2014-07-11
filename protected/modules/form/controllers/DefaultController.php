<?php

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    /**
     * Displays the login page
     */
    public function actionFeedBack()
    {

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='feedback-form'){
            //$this->renderPartial('feedback-form', array('form_name'=> 'FeedbackFrom', 'form_unique' => 'fbf_'));
            echo 'QQQ';
        }

    }
}