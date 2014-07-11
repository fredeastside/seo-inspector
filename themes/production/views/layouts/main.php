<?php /* @var $this Controller */ ?>
<!doctype html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />
	<meta name="viewport" content="width=device-width">
	<!--link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=cyrillic-ext' rel='stylesheet' type='text/css'-->
	<link rel="shortcut icon" type="image/ico" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<link rel='stylesheet' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css' type='text/css' media='all' />
	<link rel='stylesheet' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.fancybox-1.3.4.css' type='text/css' />
    <!--link  href="//fotorama.s3.amazonaws.com/4.5.0/fotorama.css" rel="stylesheet">
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="//fotorama.s3.amazonaws.com/4.5.0/fotorama.js"></script-->
</head>

<body>
	<div id="container-nav">
		<nav class="container top-nav">
			<a class="logo" href="/">
	            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.jpg" alt="<?php echo CHtml::encode(Yii::app()->name); ?>" title="<?php echo CHtml::encode(Yii::app()->name); ?>" class="left "/>
	        </a>
	        <div class="right-header-container">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Главная', 'url'=>array('/site/index')),
						array('label'=>'Новости', 'url'=>array('/news')),
						array('label'=>'Помощь', 'url'=>array('/site/page', 'view'=>'about')),
						array('label'=>'Войти', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Мои проекты', 'url'=>array('/projects'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
					'htmlOptions'=>array('class'=>'left nav-ul'),
				)); ?>
			</div>
		</nav><!-- mainmenu -->
	</div>

	<?php echo $content; ?>

	<div class="footer-container gray-bg">
	    <div class="footer-content">
	        <div class="footer-links">
	            <div class="one-col-footer">
	                <h3>О нас</h3>
	                <ul>
	                    <li><a id="feedback_link" class="pseudo" href="#feedback">Обратная связь</a></li>
	    				<li><a href="/partners/">Партнеры</a></li>
	                </ul>
	            </div>
	            <div class="one-col-footer padding-left-40px">
	                <h3>О сервисе</h3>
	                <ul>
	                    <li><a href="/price/">Цены</a></li>
	    				<li><a href="/technology/">Технологии</a></li>
				        </ul>
	            </div>
	            <div class="one-col-footer padding-left-40px">
	                <h3>Новости</h3>
	                <ul>
	                    <li><a href="/reviews/">Отзывы</a></li>
	                </ul>
	            </div>
	            <div class="one-col-footer padding-left-40px">
	                <h3>Интеграция</h3>
	                <ul>
	                    <li><a href="/developers/">API</a></li>
	                </ul>
	            </div>
	            <div class="two-col-footer padding-left-40px social-icons">
	                <h3>Мы в социальных сетях</h3>
	                <a target="_blank" id="youtube" href="#"></a>
	                <a target="_blank" id="twitter" href="#"></a>
	                <a target="_blank" id="linkedin" href="#"></a>
	                <a target="_blank" id="facebook" href="#"></a>
	                <a target="_blank" id="google" href="#"></a>
	            </div>
	        </div>
	        <div class="terms">
	            <p>© <?php echo CHtml::encode(Yii::app()->name); ?> <?php echo date('Y'); ?><br><a href="http://webthrust.ru">Webthrust</a></p>
	        </div>
	    </div>
	</div>
</body>
</html>
