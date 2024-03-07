import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


/*Header Sticky
-----------------------------------*/
$(window).on('scroll', function (event) {
    var scroll = $(window).scrollTop();
    if (scroll <= 100) {
        $(".header-sticky").removeClass("sticky");
    } else {
        $(".header-sticky").addClass("sticky");
    }
});
