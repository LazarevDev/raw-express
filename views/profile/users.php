<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?= $this->registerCssFile("/css/profile.css"); ?>

<section class="profile">
    <div class="container">
        <?=$this->render('_profile_top'); ?>
        <?=$this->render('_profile_menu'); ?>
        <div class="profileContent">
            <h2>Пользователи</h2>
            
        <? 
        if(Yii::$app->controller->action->id == 'user-update'){ ?>
            <div class="form">
                <? $form = ActiveForm::begin([
                    'id' => 'form-input-example',
                    'options' => [
                        'class' => 'form-horizontal col-lg-11',
                        'enctype' => 'multipart/form-data'
                    ],
                ]);?>
                    <div class="formTop">
                        <?=$form->field($model, 'username')->textInput(['maxlength' => 255, 'class' => 'input', 'placeholder' => "Введите login"])->label('');?>
                        <?=$form->field($model, 'email')->textInput(['maxlength' => 255, 'class' => 'input', 'placeholder' => "Введите email"])->label('');?>
                        <br>
                        <? $model->checkbox = $authAssignmentUser->item_name; ?>
                        <? echo $form->field($model, 'checkbox')->radioList([
                            'user' => 'user', 
                            'admin' => 'admin'
                        ])->label(''); ?>

                    </div>

                    <div class="formSubmit">
                        <?=Html::submitButton('Сохранить', ['class' => 'btn']);?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        <?php } ?>

            <div class="gridView">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'id',
                        'username',
                        'email',
                        [
                            'attribute' => 'AuthAssignment.item_name', 
                            'label' => 'Роли',
                            'filter' => Html::dropDownList('HistorySearch[raw_type_id]', null, $authAssignment, ['class' => 'form-control']),
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{tonnageUpdate} {tonnageDelete}',  // the default buttons + your custom button
                            'buttons' => [
                                'tonnageUpdate' => function($url, $model, $key) {     // render your custom button
                                    return Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>', 
                                    'user-update?id='.$model->id);
                                },

                                'tonnageDelete' => function($url, $model, $key) {     // render your custom button
                                    return Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"></path></svg>', 
                                    'user-delete?id='.$model->id);
                                },
                            ]
                        ]

                    ]
                ]) ?>
            </div>
        </div>
    </div>
</section>