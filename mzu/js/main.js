$(document).ready(function() {
	// Инициализация слайдера
	$('.slider').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 3000,
		arrows: false,
		adaptiveHeight: true,
		centerMode: true,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});

	// Плавная прокрутка к якорям
	const anchors = document.querySelectorAll('a[href^="#"]');
	
	anchors.forEach(anchor => {
		anchor.addEventListener("click", function(e) {
			e.preventDefault();
			
			const href = this.getAttribute('href');
			const target = href === '#' ? document.body : document.querySelector(href);
			
			if (target) {
				target.scrollIntoView({
					behavior: "smooth",
					block: "start"
				});
			}
		});
	});
});
