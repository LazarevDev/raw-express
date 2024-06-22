<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?= $this->registerCssFile("/css/auth.css"); ?>

<section class="auth">
    <div class="container">
        <?php $form = ActiveForm::begin(['id' => 'form', 'class' => 'form']); ?>
        <h2>Авторизация</h2>
        <div class="formTop">
            <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'class' => 'input', 'placeholder' => "Введите Email"])->label('') ?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'class' => 'input', 'placeholder' => "Введи пароль"])->label('') ?>
        </div>

        <div class="formGroup">
            <?= Html::submitButton('Войти', ['class' => 'btn']) ?>
            
            <p>Нет аккаунта? <a href="signup">Зарегистрироваться</a></p>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</section>