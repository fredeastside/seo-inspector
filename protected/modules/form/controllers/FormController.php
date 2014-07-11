<?php

class FormController extends Controller
{

    protected function SendEmail($form_data, $ajax_type){
        try{

            $message = new YiiMailMessage;

            $message->view = 'main-mail-form';

            //userModel is passed to the view
            //$formModel = Form::model();//$this->loadModel();

            $message->setBody(array('form_data'=>$form_data, 'ajax_type'=>$ajax_type), 'text/html');

            $message->subject = 'Заявка с вормы '.$ajax_type;
            $message->addTo('ipcasique@gmail.com');//$formModel->email);
            $message->from = 'reporter@seo-inspector.ru';//$formModel->email;// Yii::app()->params['adminEmail'];
            //$message->from = $form->email;//$formModel->email;// Yii::app()->params['adminEmail'];
            //$message->from = 'ipcasique@gmail.com';//$formModel->email;// Yii::app()->params['adminEmail'];
            //$message->setSender($formModel->email);// >from = $formModel->email;// Yii::app()->params['adminEmail'];
            //$message->setSender('ipcasique@gmail.com');// >from = $formModel->email;// Yii::app()->params['adminEmail'];

            Yii::app()->mail->send($message);
        }
        catch(Exception $e){
            throw new Exception($e);
        }
    }

    /**
     * @return array action filters
     */
    public function filters()
    {
        return CMap::mergeArray(parent::filters(),array(
            'accessControl', // perform access control for CRUD operations
        ));
    }
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules(){
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','feedback', 'submit'),
                'users'=>array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex() {
        $this->render('index');
    }

    /**
     */
    public function actionFeedBack(){
        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='feedback-form'){
            $this->renderPartial('feedback-form', array('form_name'=> 'FeedbackForm', 'form_unique' => 'fbf_'));
        }
    }

    /**
     */
    public function actionSubmit(){
        // if it is ajax validation request
        if(isset($_POST['ajax'])){
            $messageResponse = '';

            if(!isset($_POST['data']) || empty($_POST['data']))
                $messageResponse = 'невозможно считать данные формы';
            else{
                $form_data = json_decode($_POST['data']);
                $arrData = [];
                foreach($form_data as $value)
                    $arrData[$value->name] = $value->value;

                if(!isset($arrData['form-name']) || empty($arrData['form-name']))
                    $messageResponse = 'невозможно считать данные формы';
                else{
                    $form_name = $arrData['form-name'];
                    $form = new Form();

                    $form->name = $arrData[$form_name .'_name'];
                    $form->email = $arrData[$form_name .'_email'];
                    $form->text = $arrData[$form_name .'_text'];
                    $form->date = time();
                    $form->type = $_POST['ajax'];
                    try{
                        if ($form->save()){
                            $messageResponse = 'Форма успешно отправлена';
                            $this->SendEmail($form_data, $_POST['ajax']);
                        }
                        else
                            throw new Exception('Form can\'t be saved.');
                    }
                    catch(Exception $e){
                        $messageResponse = 'Ошибка сохранения формы';
                    }
                }
            }
            $messageCaption = 'info';
            $this->renderPartial('response-message', array('messageCaption'=> $messageCaption, 'messageResponse'=> $messageResponse));
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
/*    public function loadModel()
    {
        if($this->_model===null)
        {
            if(isset($_GET['id']))
                $this->_model=Form::model()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }
*/
}