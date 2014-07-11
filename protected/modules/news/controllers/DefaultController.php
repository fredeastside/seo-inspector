<?php

class DefaultController extends Controller
{
    private $page_size = 2;

	public function actionIndex($link = false)
	{
        if(!empty($link)) {
            $this->view($link);
            die;
        }
        $criteria = new CDbCriteria();
        $total = News::model()->count();
        $criteria->compare('public', 1);
        $criteria->order = 'created DESC';

        $pages = new CPagination($total);
        $pages->pageSize = $this->page_size;
        $pages->applyLimit($criteria);

        $news = News::model()->findAll($criteria);

		$this->render('index', array('model' => $news, 'pages' => $pages));
	}

    private function view($link) {
        $criteria = new CDbCriteria();
        $criteria->compare('public', 1);
        $criteria->compare('link', $link);
        $new = News::model()->find($criteria);

        $this->render('view', array('model' => $new));
    }
}