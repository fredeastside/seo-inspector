<?php

class AdminController extends AController
{
    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model=new News('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['News']))
            $model->attributes=$_GET['News'];

        $this->render('index',array(
            'model'=>$model,
        ));
    }

    public function actionCreate()
    {
        $model=new News;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['News']))
        {
            $model->attributes=$_POST['News'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    // Uncomment the following methods and override them if needed
    /*
    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'action1'=>'path.to.ActionClass',
            'action2'=>array(
                'class'=>'path.to.AnotherActionClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }
    */
}