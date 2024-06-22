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
            <h2>История заказов</h2>

            <div class="gridView">
                <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'attribute' => 'user.username',
                        'label' => 'Пользователь',
                        'value' => function ($model) {
                            return $model->user ? $model->user->username : '(not set)';
                        },
                    ],
                    [
                        'attribute' => 'month.name', 
                        'label' => 'Месяц',
                        'filter' => Html::dropDownList('HistorySearch[month_id]', null, $months, ['class' => 'form-control']),
                    ],
                    [
                        'attribute' => 'tonnage.value', 
                        'label' => 'Тоннаж',
                        'filter' => Html::dropDownList('HistorySearch[tonnage_id]', null, $tonnages, ['class' => 'form-control']),
                    ],
                    [
                        'attribute' => 'rawType.name', 
                        'label' => 'Тип сырья',
                        'filter' => Html::dropDownList('HistorySearch[raw_type_id]', null, $rawTypes, ['class' => 'form-control']),
                    ],
                    'price',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{historyDelete}',  
                        'buttons' => [
                            'historyDelete' => function($url, $model, $key) {
                                if(array_key_exists("admin", Yii::$app->authManager->getRolesByUser(Yii::$app->user->id)) == true){
                                    return Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"></path></svg>', 
                                    'profile/index-delete?id='.$model->id);
                                }
                            },
                        ]
                    ]
                    ],
                ]); ?>
        </div>
    </div>
</section>