$('.productMenu a').on('click', function() {
    $('.productMenu li a').removeClass('active');
    $(this).addClass('active'); // выделяем выбранную категорию
  
    var product = $(this).attr('data-filter'); // определяем категорию
  
    if (product == 'all') { // если all
      $('.product').show(); // отображаем все позиции
    } else { // если не all
      $('.product').hide(); // скрываем все позиции
      $('.product[data-filter="' + product + '"]').show(); // и отображаем позиции из соответствующей категории
    }
});