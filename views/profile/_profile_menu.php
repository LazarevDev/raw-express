<?php 

if(Yii::$app->user->can('admin')){

    $arrMenu = [
        'index' => 'История заказов',
        'tonnage' => 'Тоннаж',
        'type' => 'Тип сырья',
        'price' => 'Прайс',
        'users' => 'Пользователи',
    ];
    ?>

    <ul class="profileMenu">
        <?php 
        foreach($arrMenu as $key => $value): ?>
            <li>
                <a class="<?php 
                    if($key == Yii::$app->controller->action->id) echo "btnMenuActive"; ?>"
                    href='../profile/<?=$key?>'>
                    <?=$value?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

<?
}
?>