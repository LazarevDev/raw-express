let button = document.querySelector('#slideAdvantages');

let arrayAdvantagesNumber = ["02.", "03.", "01."];
let arrayAdvantagesTitle = ["Соблюдение технологии", "Индивидуальный подход", "Квалифицированный персонал"];
let arrayAdvantagesText = ["Производим и храним продукцию в соответствии с техологиями", "Прислушиваемся к каждому клиенту", "Постоянное повышение профессионального уровня сотрудников компании «RAW-EXPRESS»"];

let currentIndex = 0;
const delay = 12000;


function advantagesSlider(){
    if(currentIndex < arrayAdvantagesNumber.length){

        document.querySelector('.advantagesText h2').innerHTML = arrayAdvantagesTitle[currentIndex];
        document.querySelector('.advantagesText p').innerHTML = arrayAdvantagesText[currentIndex];
        document.querySelector('.advantagesNumber p').innerHTML = arrayAdvantagesNumber[currentIndex++];

        document.querySelector('.advantagesText h2').style.animation = "around "+ delay +"ms linear infinite"; 
        document.querySelector('.advantagesText p').style.animation = "around "+ delay +"ms linear infinite"; 
        document.querySelector('.advantagesNumber p').style.animation = "around "+ delay +"ms linear infinite";         
  
    }

    if(currentIndex == 3){
        currentIndex = 0;
    }
}

setInterval(advantagesSlider, delay);


