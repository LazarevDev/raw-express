<?php

/** @var yii\web\View $this */

$this->title = 'RAW-EXPRESS - Производство и доставка сырьевой продукции';
?>
<header id="home">
    <div class="container">
        <div class="headerContent">
            <div class="headerTitle"  data-aos="fade-right">
                <img src="img/svg/ziLines.svg" alt="">
                <h1>Производство и доставка  <br class="mediaBr"> сырьевой продукции</h1>
                <h2>Наша команда профессионалов стремится предоставить <br class="mediaBr"> высококачественные решения и удовлетворить потребности <br class="mediaBr"> наших клиентов.</h2>
            </div>

            <div class="headerBtnContainer" data-aos="fade">
                <a href="../calculate" class="application">Рассчитать доставку</a>
                <a href="#slideAdvantages" class="more">Подробнее</a>
            </div>
        </div>
    </div>


    <div class="advantages"  data-aos="fade" onclick="advantagesSlider()" id="slideAdvantages">
        <div class="advantagesContent">
            <div class="advantagesWhiteCircles"><img src="img/svg/whiteСircles.svg" alt=""></div>
            
            <div class="advantagesNumber"><p>01.</p></div>
        
            <div class="advantagesText">
                <h2>Квалифицированный персонал </h2>
                <p>Постоянное повышение профессионального уровня сотрудников компании «RAW-EXPRESS»</p>
            </div>
        </div>
    </div>
</header>

<section class="qualityAssurance">
    <div class="container">
        <div class="sectionTitle" data-aos="fade-right"><h2>Гарантия качества</h2></div>
        
        <div class="qualityAssuranceContent"  data-aos="fade">
            <div class="qualityAssuranceBlock">
                <div class="qualityAssuranceBlockImg">
                    <img src="img/icons/warranty.png" alt="">
                </div>

                <div class="qualityAssuranceBlockText">
                    <h3>Контроль качества</h3>
                    <p>Продукция проходит многоэтапную проверку качества.</p>
                </div>
            </div>

            <div class="qualityAssuranceVerticalHr"></div>

            <div class="qualityAssuranceBlock">
                <div class="qualityAssuranceBlockImg">
                    <img src="img/icons/timeMachine.png" alt="">
                </div>

                <div class="qualityAssuranceBlockText">
                    <h3>Закупки без потерь времени</h3>
                    <p>Вы получаете весь необходимый ассортимент от одной компании-поставщика</p>
                </div>
            </div>

            <div class="qualityAssuranceVerticalHr"></div>

            <div class="qualityAssuranceBlock">
                <div class="qualityAssuranceBlockImg">
                    <img src="img/icons/naturalFood.png" alt="">
                </div>

                <div class="qualityAssuranceBlockText">
                    <h3>100% натуральное</h3>
                    <p>Продукты не подвергаются химической обработке.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about" id="about">
    <div class="container">
        <div class="aboutContainer">
            <div class="aboutContent">
                
                <div class="sectionTitle" data-aos="fade-right"><h2>О нас</h2></div>

                <div class="aboutText" data-aos="fade-right">
                    <p>Vix paulo sanctus scripserit ex, te iriure insolens voluptatum qui. Nisl omittam complectitur pro an, quem omnes munere id vix. Tation delenit percipitur at vix. Sale liber et vel. Sale liber et vel. Ceteros assentior omittantur cum ad. Per in illud petentium iudicabit, integre</p>
                    <p>Vix paulo sanctus scripserit ex, te iriure insolens voluptatum qui. Nisl omittam complectitur pro an, quem omnes munere id vix. Tation delenit percipitur at vix. Sale liber et vel. Sale liber et vel. Ceteros assentior omittantur cum ad. Per in illud petentium iudicabit, integre</p>
                </div>

                <div class="aboutInformation" data-aos="fade-right">
                    <div class="aboutInformationBlock">
                        <h2 class="counter" data-max="518"></h2>
                        <p>Оптовых поставок</p>
                    </div>

                    <div class="aboutInformationBlock">
                        <h2 class="counter" data-max="218"></h2>
                        <p>Довольных клиентов</p>
                    </div>
                </div>

                <div class="aboutContainerBtn" data-aos="fade-up">
                    <a href="" class="certificates">Сертификаты</a>
                    <a href="" class="documents">Документы</a>
                </div>
            </div>

            <div class="aboutImage" data-aos="fade"><img src="img/image/aboutImage.png" alt=""></div>
        </div>
    </div>
</section>

<section class="calc">
    <div class="container">
        <div class="calcText">
            <h2>Расчет доставки</h2>
            <p>Сделайте вашу жизнь проще и доверьте нам расчет доставки. Мы готовы помочь вам доставить ваши товары или грузы вовремя и с минимальными затратами.</p>

            <a href="calculate" class="calcBtn">Рассчитать доставку</a>
        
        </div>
    </div>
</section>

<section class="ourProducts" id="products">
    <div class="container">
        <div class="sectionTitle" data-aos="fade-right">
            <h2>Наша продукция </h2>
            <p>Высококачественные ингредиенты <br> для вашего производства</p>
        </div>

        <div class="productContainer">
            <div class="productContent">
                <div class="product" data-aos="fade" data-filter="">
                    <div class="poductImage"><img src="img/cover/" alt=""></div>    
                    
                    <div class="productDesc">
                        <div class="productText">
                            <h2>Название</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
