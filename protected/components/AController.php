<?php
/**
 * Created by PhpStorm.
 * User: fredrsf
 * Date: 04.07.14
 * Time: 9:12
 */
class AController extends RController {
    public $layout='//layouts/content';

    public $menu=array();

    public $breadcrumbs=array();

    public function filters() {
        // return the filter configuration for this controller, e.g.:
        return array(
            'rights'
        );
    }

    public function setLayout(){
        $this->layout = '//layouts/content';
    }

    public function init() {
        Yii::app()->theme = 'admin';

        parent::init();
    }
}