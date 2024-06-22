<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\RawTypes;
use app\models\Tonnages;
use app\models\Prices;

?>

<?= $this->registerCssFile("/css/profile.css"); ?>

<section class="profile">
    <div class="container">
        <?=$this->render('_profile_top'); ?>
        <?=$this->render('_profile_menu'); ?>

        <div class="profileContent">
            <h2>Прайс</h2>

            <div class="gridView">
                <?php 

                foreach($months as $month): ?>
                    <details>
                        <summary><?=$month->name?></summary>
                        <?php 
                        $prices = new Prices;
                        $prices->month_id = $month['id'];
                        ?>

                        <? $form = ActiveForm::begin([
                            'id' => 'form-input-example',
                            'options' => [
                                'class' => 'form-horizontal col-lg-11',
                                'enctype' => 'multipart/form-data'
                            ],
                        ]);?>

                        <input type="hidden" name="month" value="<?=$prices->month_id?>">
                        
                        <table class="table text-center">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="text-muted small" style="border: 1px solid #ddd; padding: 10px 0;">
                                        т\м     
                                    </th>

                                    <?php foreach ($tonnages as $tonnage) : ?>
                                        <input type="hidden" name="tonnage_id[]" value="<?=$tonnage['id']?>">
                                        <th scope="col" style="border: 1px solid #ddd; padding: 10px 0;"><?= $tonnage['value'] ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($rawTypes as $rawType) : ?>
                                    <tr>
                                        <th scope="row" style="border: 1px solid #ddd;">
                                            <input name="raw_id[]" type="hidden" value="<?=$rawType['id']?>">
                                            <?= $rawType['name'] ?>
                                        </th>

                                        <?php 
                                        $prices->raw_type_id = $rawType['id'];
                                        $priceTable = $prices->priceTable();
                                        
                                        foreach ($priceTable as $table) : ?>
                                            <td>
                                                <input name="price[]" type="text" value="<?=$table['price']?>">
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <div class="formSubmit">
                            <?=Html::submitButton('Сохранить', ['class' => 'btn']);?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </details>
                <? endforeach; ?>
            </div>
    </div>
</section>