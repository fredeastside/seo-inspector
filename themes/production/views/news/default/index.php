<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<div class="text-container">
    <h1>Новости</h1>
    <?php
    foreach ($model as $new) :
        ?>
        <div class="news__item">
            <p class="news__item__title"><?= $new->name; ?></p>
            <p class="text-container-date"><?= $new->created; ?></p>
            <p class=""><?= $new->short_content; ?></p>
            <p><a href="<?= $this->createUrl('/news', array('link'=>$new->link)) ?>">Подробнее</a></p>
        </div>
    <?php
    endforeach;
    ?>
    <?php
        $this->widget('CLinkPager', array(
            'pages' => $pages
        ));
    ?>
</div>