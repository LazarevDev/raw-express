<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- библиотека для анимаций -->

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="../img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<section class="menu">
    <div class="container">
        <div class="menuContainer">
            <a href="/" class="menuLogo"><img src="../img/icons/logo.svg" alt=""></a>
            
            <div class="menuBurger">
                <span></span>
                <span></span>
            </div>

            <nav class="menuNav">
                <ul class="menuList">
                    <li><a href="/#home" class="menuLink">Главная</a></li>
                    <li><a href="/#about" class="menuLink">О нас</a></li>
                    <li><a href="/#products" class="menuLink">Наша продукция</a></li>
                    <li><a href="/#contacts" class="menuLink">Контакты</a></li>
                    
                    <?php if(Yii::$app->user->isGuest): ?>
                        <a href="../signup" class="menuBtnSignup">Регистрация</a>
                        <a href="../login" class="menuBtnLogin">Вход</a>
                    <?php else: ?>
                        <a href="../profile" class="menuBtnLogin">Профиль (<?=Yii::$app->user->identity->username?>)</a>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</section>

<?php if(!empty(Yii::$app->user->identity->success) == 1){ ?>
    
    <form id="my-form" method="post">
        <button name="msg" id="submit-btn" class="msg">
            <div class="msgLeftHr"></div>

            <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>

            <div class="msgText">
                <p>Регистрация прошла успешно! <a href="site/calculate">Калькулятор</a> Теперь все ваши расчеты сохраняются в вашем профиле. 
                Спасибо за регистрацию!</p>
            </div>
        </button>
    </form>
<? } ?>

<?php
$js = <<<JS
$('.msg').on('click', function() {
    $.ajax({
        url: '/site/success',
        type: 'POST',
        success: function(data) {
            $('#my-form').remove(); // Удаление формы с идентификатором "my-form"
        }
    });
});
JS;
$this->registerJs($js);

?>

<?= $content ?>

<section class="contacts" id="contacts">
    <div class="container">
        <div class="sectionTitle" data-aos="fade-right">
            <h2>Оставить заявку</h2>
            <p>Есть вопросы? Мы поможем!</p>
        </div>

        <form action="mail.php" method="post" class="contactsForm" data-aos="fade-right">
            <div class="contactsInputContent">
                <input class="contactsInput" type="text" name="name" placeholder="Ваше имя" required> <input class="contactsInput" type="text" name="city"  placeholder="Город">
                <input class="contactsInput" type="text" name="telephone" required placeholder="Контактный телефон*" req> <input class="contactsInput" name="mail"  type="text" placeholder="Электронная почта">
            </div>

            <textarea class="contactsTextarea" name="description" placeholder="Текст сообщения"></textarea>

            <div class="contactsSubmitPrivacy">
                <input type="submit" class="contactsSubmit" name="submit" value="Отправить">
                <p>Нажимая кнопку отправить вы соглашаетесь с <a target="_blank" href="../documents/politica.html">политикой конфиденциальности</a></p>
            </div>
        </form>
    </div>
</section>

<footer>
    <div class="container">
        <div class="footerContainer">
            <div class="footerBlock footerLeft">
                <h3>©<?php echo date('Y'); ?> ООО «RAW-EXPRESS»</h3>
                <p>Перепечатка, а равно использование материалов с данного сайта, разрешена только по согласию с владельцем.</p>
            </div>

            <div class="footerBlock footerCenter">
                <h3>Наш адрес:</h3>
                <p>Воронежская обл., г.Воронеж</p>
                <p>Пн-Пт: с 9:00 до 17:00 <br>Сб-Вс: выходные дни</p>
            </div>

            <div class="footerBlock footerRight">
                <h3>Контактная информация:</h3>
                <p>Тел: 8(910) 900 90-90</p>
                <p>Тел: 8(910) 900 90-90</p>
                <p>e-mail: raw-express@yandex.ru</p>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
