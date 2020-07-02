$('.page-scroll').on('click', function (e) {
	var tujuan = $(this).attr('href');
	var elemetntujuan = $(tujuan);
	$('html,body').animate({
		scrollTop: elemetntujuan.offset().top - 30
	}, 1000, 'easeInOutExpo');

	e.preventDefault();
});
