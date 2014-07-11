<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'News',
);

$this->menu=array(
    array('label'=>'Create News', 'url'=>array('create')),
    array('label'=>'Manage News', 'url'=>array('admin')),
);
?>
<div class="row">
    <div class="col-lg-12">
        <h1><?php echo NewsModule::t("Manage News"); ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?=$this->createUrl('/news/admin/create')?>"><?php echo NewsModule::t("Create item"); ?></a></li>
        </ol>
    </div>
</div><!-- /.row -->

<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
    'News'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'List News', 'url'=>array('index')),
    array('label'=>'Create News', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#news-grid').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");
?>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search',array(
            'model'=>$model,
        )); ?>
    </div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'news-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
        'name',
        'title',
        'description',
        'keywords',
        'content',
        /*
        'created',
        */
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>