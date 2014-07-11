<html>
<head></head>
<body>
<div id="header_mail">
    <div id="logo"><a href="www.seo-inspector.ru">Your SEO Inspector</a></div>
</div>
<div>Hello</div>
<div>Заявка с формы <?php echo $ajax_type; ?></div>

<?php
    foreach ($form_data as $field):?>
        <div id="mail_<?php echo $field->name;?>">
<?php   if($field->name == 'form-name')
            continue;?>
            <label id="for_mail_<?php echo $field->name;?>"><?php echo $field->caption;?>:</label>
            <div>
                <?php echo trim($field->value); ?>
            </div>
        </div>
<?php
    endforeach;?>

</body>
</html>