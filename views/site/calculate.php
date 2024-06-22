<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
?>

<?= $this->registerCssFile("/css/calculate.css"); ?>

<section class="calculate">
    <div class="container">
    <?php Pjax::begin() ?>
    <?php $form = ActiveForm::begin([
        'id' => 'test-form',
        'options' => [
            'class' => 'form-horizontal',
            'data-pjax' => true,
        ],
        'fieldConfig' => [
            'template' => '<div class="col-md-1">{label}</div><div class="col-md-5">{input}</div><div class="col-md-6">{error}</div>',
        ],
    ]); ?>
            <div class="calculatorContainer">
                <div class="calculateBlock">
                    <div class="calculateText">
                        <h2>Расчет доставки</h2>

                        <p>Сделайте вашу жизнь проще и доверьте нам расчет доставки. Мы готовы помочь вам доставить ваши товары или грузы вовремя и с минимальными затратами.</p>
                    </div>
                        <?= $form->field($model, 'month_id', ['options' => ['class' => 'formLabel']])
                                ->dropDownList($model->allMonths(), 
                                ['prompt' => 'Выберите месяц...', 'id' => 'monthInput']); ?>

                            <?= $form->field($model, 'raw_type_id', ['options' => ['class' => 'formLabel']])
                                    ->dropDownList($model->allRaws(), 
                                    ['prompt' => 'Выберите тип...', 'id' => 'typeInput']); ?>

                            <?= $form->field($model, 'tonnage_id', ['options' => ['class' => 'formLabel']])
                                    ->dropDownList($model->allTonnages(), 
                                    ['prompt' => 'Выберите тоннаж...', 'id' => 'tonnageInput']); ?>

                </div>
    
                <div class="calcDisplay">
                    <?php if(!empty($calculation)): ?>
                        <div class="displayText">
                            <h2>Итого</h2>
                            <p>Расчеты доставки</p>
                        </div>

                        <div class="displayContainer">
                            <div class="displayBlock displayBlockMin">
                                <p>Тип сырья</p>
                                <h3 id="type"><?=$model->rawSelect($model->raw_type_id) ?></h3>
                            </div>

                            <div class="displayBlock displayBlockMin">
                                <p>Тоннаж</p>
                                <h3 id="tonnage"><?=$model->tonnageSelect($model->tonnage_id) ?></h3>
                            </div>

                            <div class="displayBlock">
                                <p>Выбранный месяц</p>
                                <h3 id="month"><?=$model->monthSelect($model->month_id) ?></h3>
                            </div>
                        </div>

                        <div class="displayFooter">
                            <p>Итого</p>
                            <h3><?=$calculation->price?> руб.</h3>

                            <a href="" class="footerBtn">Рассчитать повторно</a>
                            <a href="" class="footerClear">Сбросить</a>
                        </div>
                    <? else: ?>
                        <div class="displayContent">
                            <p>
                                Мы предлагаем современное решение для расчета стоимости наших услуг доставки.
                            </p>

                            <p>
                                Теперь любой клиент с договором или без него, может в течение всего 1 минуты узнать стоимость доставки по любому региону России
                            </p>
                        </div>

                        <div class="displayFooter">
                            <?= Html::submitButton('Рассчитать', ['class' => 'footerBtn']) ?>
                        </div>
                    <? endif; ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

        <?php Pjax::end() ?>
    </div>
</section>


<script type="text/javascript">
    document.getElementById("monthInput").addEventListener("change", function() {
        let selectedValue = this.value;

        console.log(selectedValue);
        const arr = new Map([
            ['Январь', 'Январь'],
            ['Февраль', 'Февраль'],
            ['Март', 'Март'],
            ['Апрель', 'Апрель'],
            ['Март', 'Март'],
            ['Июнь', 'Июнь'],
            ['Июль', 'Июль'],
            ['Август', 'Август'],
            ['Сентябрь', 'Сентябрь'],
            ['Октябрь', 'Октябрь'],
            ['Ноябрь', 'Ноябрь'],
            ['Декабрь', 'Декабрь'],
        ]);

        for (let pair of arr.entries()) {
            if(pair[0] == selectedValue){
                selectedValue = pair[1];
            }
        }
        document.getElementById("month").innerText = selectedValue;
    });

    document.getElementById("typeInput").addEventListener("change", function() {
        let selectedValue = this.value;
        document.getElementById("type").innerText = selectedValue;
    });

    document.getElementById("tonnageInput").addEventListener("change", function() {
        let selectedValue = this.value;
        document.getElementById("tonnage").innerText = selectedValue;
    });
</script>
