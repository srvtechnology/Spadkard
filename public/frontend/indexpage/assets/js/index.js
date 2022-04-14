$(document).ready(function () {
	$(window).scroll(function () {
		var scroll = $(window).scrollTop();
		if (scroll >= 500) {
			$("header").addClass("fixed-top");
		} else {
			$("header").removeClass("fixed-top");
		}
	});

	var scroll = $(window).scrollTop();
	if (scroll >= 500) {
		$("header").addClass("fixed-top");
	} else {
		$("header").removeClass("fixed-top");
	}



	// slick carousal
	// responsive config for slick
	const responsive = [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
				dots: false
			}
		},
		{
			breakpoint: 770,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 500,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
	];
	
	$('#slick-slider-1').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		// dots: true,
		// centerMode: true,
		// centerPadding: '60px',
		responsive: responsive
	});

	$('#slick-slider-2').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		// dots: true,
		// prevArrow: $('.prev-2'),
		// nextArrow: $('.next-2'),
		responsive: responsive
	});

	setTimeout(() => {
		$('.slick-init').css('opacity', 1)
	}, 100);
});