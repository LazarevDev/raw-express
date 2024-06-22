<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?= $this->registerCssFile("/css/auth.css"); ?>


<section class="auth">
    <div class="container">
        <?php $form = ActiveForm::begin(['id' => 'form', 'class' => 'form']); ?>
        <h2>Регистрация</h2>
        <div class="formTop">
            <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'class' => 'input', 'placeholder' => "Введите имя"])->label('') ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'class' => 'input', 'placeholder' => "Введите Email"])->label('') ?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'class' => 'input', 'placeholder' => "Введи пароль"])->label('') ?>
            <?= $form->field($model, 'password_confirmation')->passwordInput(['maxlength' => 255, 'class' => 'input', 'placeholder' => 'Повторите пароль'])->label('') ?>
        </div>

        <div class="formGroup">
            <?= Html::submitButton('Регистрация', ['class' => 'btn']) ?>
            
            <p>Есть аккаунт? <a href="login">Авторизация</a></p>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</section>