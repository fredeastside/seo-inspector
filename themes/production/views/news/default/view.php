<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<div class="text-container">
    <h1><?=$model->name;?></h1>
    <div class="text-container-date"><?=date('d.m.y H:m', strtotime($model->created));?></div>
    <div class="text-container-text"><?= $model->content; ?></div>
    <p class="text-container-back_link"><a href="<?= $this->createUrl('/news') ?>">Назад</a></p>
</div>