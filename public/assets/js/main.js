/* List of References 
1. Form Script
2. Navbar Script
3. Init Script
*/


/* 1. Form Script */
$('select').each(function () {
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

$('form').submit(function () {
	Swal.fire({
		title: "Memuat",
		text: "Mengirim data formulir",
		showLoaderOnConfirm: true,
		showConfirmButton: false,
		showCloseButton: false,
		showCancelButton: false,
		allowOutsideClick: false,
		allowEscapeKey: false,
		onOpen: () => {
			swal.showLoading();
		},
	});
	return true;
});

/* 2. Navbar Script */
if ($('.navbar-sticky').length > 0) {
    var last_scroll_top = 0;
    $(window).bind('scroll', function() {
      if ($(window).scrollTop() > 70) {
        $('.navbar').removeClass('bg-transparent').addClass('bg-white').removeClass('navbar-dark').addClass('navbar-light').addClass('shadow');
        $('#btn-login').addClass('btn-primary').removeClass('btn-outline-secondary');
        $('.logo-putih').css('display', 'none');
        $('.logo-warna').removeAttr("style");
      } else {
        $('.navbar').addClass('bg-transparent').removeClass('bg-white').addClass('navbar-dark').removeClass('navbar-light').removeClass('shadow');
        $('#btn-login').addClass('btn-outline-secondary').removeClass('btn-primary');
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
      $('#searchBar').collapse('hide');
      $('#navbarNav').collapse('hide');
      last_scroll_top = scroll_top;
    });
}
  
/* 3. Init Script */
$('.numscroller').countUp();
$('.tooltips').tooltip();

