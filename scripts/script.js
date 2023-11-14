//кнопка "В корзину"
document.querySelectorAll(".add-to-cart").forEach(function(element) {
    element.addEventListener("click", function(event) {
        event.preventDefault();
        // Находим ближайший родительский элемент-форму и отправляем его 
        event.target.closest("form").submit();
    });
});

// кнопка удаление в корзине
document.querySelectorAll(".blubtn").forEach(function(element) {
    element.addEventListener("click", function(event) {
        event.preventDefault();
        // Находим ближайший родительский элемент-форму и отправляем его 
        event.target.closest("form").submit();
    });
});

// кнопка оформить заказ
document.querySelectorAll(".glo").forEach(function(element) {
    element.addEventListener("click", function(event) {
        event.preventDefault();
        // Находим ближайший родительский элемент-форму и отправляем его 
        event.target.closest("form").submit();
    });
});





