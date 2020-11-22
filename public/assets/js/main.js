$('select').each(function() {
   $(this).select2({
      theme: 'bootstrap4',
      width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
      placeholder: $(this).data('placeholder'),
      allowClear: Boolean($(this).data('allow-clear')),
   });
});

$('.datepicker').datepicker({
   clearBtn: true,
   format: "dd/mm/yyyy"
});

if ($('.navbar-sticky').length > 0) {
    var last_scroll_top = 0;
    $(window).bind('scroll', function() {
      if ($(window).scrollTop() > 70) {
        $('.navbar-sticky').removeClass('bg-transparent').addClass('bg-white').removeClass('navbar-dark').addClass('navbar-light').addClass('shadow');
        $('.logo-putih').css('display', 'none');
        $('.logo-warna').removeAttr("style");
      } else {
        $('.navbar-sticky').addClass('bg-transparent').removeClass('bg-white').addClass('navbar-dark').removeClass('navbar-light').removeClass('shadow');
        $('.logo-putih').removeAttr("style");
        $('.logo-warna').css('display', 'none');
      }
    })
    $(window).on('scroll', function() {
      scroll_top = $(this).scrollTop();
      if (scroll_top < last_scroll_top) {
        $('.navbar-sticky').removeClass('navbar-scroll-down').addClass('navbar-scroll-up');
      } else {
        $('.navbar-sticky').removeClass('navbar-scroll-up').addClass('navbar-scroll-down');
      }
      last_scroll_top = scroll_top;
    });
  }

$('.numscroller').countUp();