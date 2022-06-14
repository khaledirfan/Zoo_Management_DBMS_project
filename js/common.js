(function ($) {

	'use strict'

	$(window).on('load resize', function () {

		// map

		function map() {

			const map = $('#map')

			if (map.length > 0) {

				let apiKey = map.attr('data-api-key'),
					apiURL

				if (apiKey) {
					apiURL = 'https://maps.google.com/maps/api/js?key=' + apiKey + '&sensor=false'
				}

				else {
					apiURL = 'https://maps.google.com/maps/api/js?sensor=false'
				}

				$.getScript(apiURL, function (data, textStatus, jqxhr) {
					map.each(function () {

						const current_map = $(this),

							latlng = new google.maps.LatLng(current_map.attr('data-longitude'),

								current_map.attr('data-latitude')),

							point = current_map.attr('data-marker'),

							center = {
								lat: 40.730610,
								lng: -73.935242,
							},

							markerPos = {
								lat: 40.730610,
								lng: -73.935242,
							},

							myOptions = {
								zoom: 13,
								center: center,
								disableDefaultUI: true,
								mapTypeId: google.maps.MapTypeId.ROADMAP,
								mapTypeControl: false,
								scrollwheel: false,
								draggable: true,
								panControl: false,
								zoomControl: false,
								disableDefaultUI: true,
								styles: [
									{
										"featureType": "administrative",
										"elementType": "labels.text.fill",
										"stylers": [
											{
												"color": "#212326",
											}
										]
									},
									{
										"featureType": "administrative.locality",
										"elementType": "labels.text.fill",
										"stylers": [
											{
												"color": "#464646",
											}
										]
									},
									{
										"featureType": "landscape",
										"elementType": "all",
										"stylers": [
											{
												"color": "#F8F8F9",
											}
										]
									},
									{
										"featureType": "poi",
										"elementType": "all",
										"stylers": [
											{
												"visibility": "off",
											}
										]
									},
									{
										"featureType": "road",
										"elementType": "all",
										"stylers": [
											{
												"saturation": -100,
											},
											{
												"lightness": 45,
											}
										]
									},
									{
										"featureType": "road",
										"elementType": "labels",
										"stylers": [
											{
												"visibility": "on",
											}
										]
									},
									{
										"featureType": "road",
										"elementType": "labels.icon",
										"stylers": [
											{
												"visibility": "on",
											}
										]
									},
									{
										"featureType": "transit",
										"elementType": "all",
										"stylers": [
											{
												"visibility": "on",
											}
										]
									},
									{
										"featureType": "road.highway",
										"elementType": "all",
										"stylers": [
											{
												"visibility": "on",
											}
										]
									},
									{
										"featureType": "road.arterial",
										"elementType": "labels.icon",
										"stylers": [
											{
												"visibility": "on",
											}
										]
									},
									{
										"featureType": "transit",
										"elementType": "all",
										"stylers": [
											{
												"visibility": "on",
											}
										]
									},
									{
										"featureType": "water",
										"elementType": "all",
										"stylers": [
											{
												"color": "#E2E3E7",
											},
											{
												"visibility": "on",
											}
										]
									}
								]
							}

						const map = new google.maps.Map(current_map[0], myOptions)

						const marker = new google.maps.Marker({
							map: map,
							icon: {
								size: new google.maps.Size(59, 69),
								origin: new google.maps.Point(0, 0),
								anchor: new google.maps.Point(0, 69),
								url: point,
							},
							position: markerPos
						})

						google.maps.event.addDomListener(window, "resize", function () {
							const center = map.getCenter()
							google.maps.event.trigger(map, "resize")
							map.setCenter(center)
						})
					})
				})
			}
		}

		map()

		// text box

		function textBox() {

			const textBox = $('.text-box')

			if (!textBox.length) return

			textBox.each(function () {

				const $this = $(this)
				const eachHeight = parseInt($this.find('.text-box__text').css('height'))
				const slideBlock = $this.find('.text-box__details')

				slideBlock.css({'transform':'translateY(' + eachHeight + 'px)'})

			})

		}

		textBox()

	})

	$(window).on('scroll', function () {

		// header front-1

		function headerFrontOne () {

			const header = $('.header-common')

			if (!header.length) return

			const lower = $('.header-common .header__lower')
			const scroll = $(window).scrollTop()
	
			if (scroll >= 1) {
				lower.addClass('header__lower--fixed')
			}
	
			else {
				lower.removeClass('header__lower--fixed')
			}

		}

		headerFrontOne ()

		// header front-2

		function headerFrontTwo () {

			const header = $('.header-f2')

			if (!header.length) return

			const topSize = parseInt(header.find('.header__lower').css('height'))
			const lower = $('.header-f2 .header__top')
			const scroll = $(window).scrollTop()

			if (scroll >= 1) {
				header.css({'transform':'translate(-50%, -' + topSize + 'px)'})
				lower.addClass('lower--fixed')
			}

			else {
				header.css({'transform':'translate(-50%, -' + 0 + 'px)'})
				lower.removeClass('lower--fixed')
			}

		}

		headerFrontTwo()

		// header front-3

		function headerFrontThree () {

			const header = $('.header-f3')

			if (!header.length) return

			const topSize = parseInt(header.find('.header__lower').css('height'))
			const lower = $('.header-f3 .header__top')
			const scroll = $(window).scrollTop()

			if (scroll >= 1) {
				header.css({'transform':'translate(-50%, -' + topSize + 'px)'})
				lower.addClass('lower--fixed')
			}

			else {
				header.css({'transform':'translate(-50%, -' + 0 + 'px)'})
				lower.removeClass('lower--fixed')
			}

		}

		headerFrontThree()

		// header intro

		function headerIntro () {

			const header = $('.header-intro')

			if (!header.length) return

			const scroll = $(window).scrollTop()

			if (scroll >= 1) {
				header.addClass('header--fixed')
			}

			else {
				header.removeClass('header--fixed')
			}

		}

		headerIntro()

	})

	$(document).ready(function () {

		// object fit

		objectFitImages()

		// menu trigger

		function menuTrigger() {

			const trigger = $('.hamburger')

			if (!trigger.length) return

			$('.hamburger').on('click', function() {

				$('body').toggleClass('body--static')
				$('.menu-dropdown').toggleClass('menu-dropdown--active')
	
			})
			
		}

		menuTrigger()

		// mobile menu

		function mobileMenu() {

			$('.screen--trigger').on('click', function() {

				const triggerValue = $(this).data('category')

				$('.screen--start').addClass('screen--inactive')

				$('.menu-dropdown__inner').each(function() {

					if ($(this).data('value') === triggerValue) {

						$(this).addClass('menu-dropdown__inner--active')

					}

				})

			})

			$('.screen__back').on('click', function() {

				$('.menu-dropdown__inner').removeClass('menu-dropdown__inner--active')
				$('.screen--start').removeClass('screen--inactive')

			})

			$('.screen__link').on('click', function () {

				$('body').removeClass('body--static')
				$('.menu-dropdown').removeClass('menu-dropdown--active')

			})

			$('.aside-menu .main-menu__item .main-menu__link').on('click', function () {

				$('body').removeClass('body--static')
				$('.menu-dropdown').removeClass('menu-dropdown--active')

			})

		}

		mobileMenu()

		// scroll to id

		function scrollToId() {

			var scroll = $('a.main-menu__link--scroll')

			if(!scroll.length) return

			scroll.mPageScroll2id({
				highlightClass: 'main-menu__link--highlighted',
			})

		}

		scrollToId()

		// header bar

		$(window).on('scroll', function () {

			const lower = $('.header-common .header__lower')
			const scroll = $(window).scrollTop()

			if (scroll >= 1) {
				lower.addClass('header__lower--fixed')
			}

			else {
				lower.removeClass('header__lower--fixed')
			}

		})

		// alert close

		$('.alert__close').on('click', function () {

			$(this).parent('.alert').fadeOut(300)

		})

		// scroll to id

		function scrollTo () {

			const scrollTo = $('a.anchor[href^="#"]')

			if (!scrollTo.length) return

			scrollTo.on("click", function (e) {

				const anchor = $(this)

				$('html, body').stop().animate({
					scrollTop: $(anchor.attr('href')).offset().top
				}, 600)

				e.preventDefault()
				
			})

		}

		scrollTo()

		// accordion

		function accordion() {

			const accordion = $('.accordion')

			if (!accordion.length) return

			const close = $('.accordion .accordion__close')

			close.on('click', function () {

				$(this).toggleClass('accordion__close--active').parents().children('.accordion__text-block').stop().slideToggle(300)

			})

		}

		accordion()

		// counter

		function counter() {

			const counter = $('.js-counter')

			if (!counter.length) return

			counter.counterUp({

				delay: 10,
				time: 1500,

			})

		}

		counter()

		// bar chart

		function barChart() {

			const barChart = $('#bar-chart')

			if (!barChart.length) return

			const ctx = barChart[0].getContext('2d')
			
			const myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
					datasets: [{
						label: '# of Votes',
						data: [12, 19, 3, 5, 2, 3],
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)',
							'rgba(255, 159, 64, 0.2)',
						],
						borderColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)',
							'rgba(255, 159, 64, 1)',
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
							}
						}]
					}
				}
			})

		}

		barChart()

		// line chart

		function lineChart() {

			const lineChart = $('#line-chart')

			if (!lineChart.length) return

			const ctx = lineChart[0].getContext('2d')

			const myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
					datasets: [{
						label: 'Red',
						data: [330, 250, 480, 120, 220, 130, 255],
						backgroundColor: 'rgba(255, 99, 132, 0.2)',
						borderColor: 'rgba(255, 99, 132, 1)',
						borderWidth: 1,
					}, {
						label: 'Blue',
						data: [230, 350, 120, 240, 360, 180, 295],
						backgroundColor: 'rgba(105, 195, 255, 0.2)',
						borderColor: 'rgba(105, 195, 255, 1)',
						borderWidth: 1,
					}, {
						label: 'Yellow',
						data: [450, 290, 123, 332, 439, 222, 340],
						backgroundColor: 'rgba(255, 209, 94, 0.2)',
						borderColor: 'rgba(255, 209, 94, 1)',
						borderWidth: 1,
					}, {
						label: 'Green',
						data: [400, 450, 380, 250, 450, 320, 210],
						backgroundColor: 'rgba(155, 220, 220, 0.2)',
						borderColor: 'rgba(155, 220, 220, 1)',
						borderWidth: 1,
					}, {
						label: 'Purple',
						data: [500, 220, 110, 50, 430, 310, 410],
						backgroundColor: 'rgba(154, 104, 255, 0.2)',
						borderColor: 'rgba(154, 104, 255, 1)',
						borderWidth: 1,
					}, {
						label: 'Orange',
						data: [0, 100, 200, 300, 400, 320, 222],
						backgroundColor: 'rgba(255, 159, 64, 0.2)',
						borderColor: 'rgba(255, 159, 64, 1)',
						borderWidth: 1,
					}]
				}
			})

		}

		lineChart()

		// radar chart

		function radarChart() {

			const radarChart = $('#radar-chart')

			if (!radarChart.length) return

			const ctx = radarChart[0].getContext('2d')

			const myChart = new Chart(ctx, {
				type: 'radar',
				data: {
					labels: ['Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running'],
					datasets: [
						{
							label: 'First',
							data: [100, 44, 55, 90, 55, 80, 100],
							backgroundColor: 'rgba(154, 104, 255, 0.2)',
							borderColor: 'rgba(154, 104, 255, 1)',
							borderWidth: 1,

						}, {
							label: 'Second',
							data: [30, 80, 60, 20, 40, 100, 50],
							backgroundColor: 'rgba(255, 99, 132, 0.2)',
							borderColor: 'rgba(255, 99, 132, 1)',
							borderWidth: 1,
						}]
				}
			})

		}

		radarChart()

		// doughnut chart

		function doughnutChart() {

			const doughnutChart = $('#doughnut-chart')

			if (!doughnutChart.length) return

			const ctx = doughnutChart[0].getContext('2d')

			const myChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: ['Red', 'Blue', 'Yellow'],
					datasets: [{
						data: [70, 20, 10],
						backgroundColor: [
							'rgba(255, 99, 132, 1)',
							'rgba(105, 195, 255, 1)',
							'rgba(255, 209, 94, 1)',
						],
					}]
				}
			})

		}

		doughnutChart()

		// tabs

		function tabs() {

			const tabs = $('.tabs')

			if (!tabs.length) return

			tabs.responsiveTabs({

				startCollapsed: 'false',

			})

		}

		tabs()

		// video trigger

		function videoTrigger() {

			const trigger = $('.video-trigger')

			if (!trigger.length) return

			trigger.fancybox()

		}

		videoTrigger()

		// video trigger

		function photoTrigger() {

			const trigger = $('.photo-trigger')

			if (!trigger.length) return

			trigger.fancybox()

		}

		photoTrigger()

		// masonry gallery

		function masonryGallery() {

			const masonryGallery = $('.gallery-masonry')

			if (!masonryGallery.length) return

			masonryGallery.isotope({
				itemSelector: '.gallery-masonry__item',
				percentPosition: true,
			})

			const filter = $('.filter-panel__item')

			filter.on('click', function () {

				const filterValue = $(this).attr('data-filter')

				masonryGallery.isotope({ 
					filter: filterValue ,
				})

			})

			filter.on('click', function () {

				filter.removeClass('filter-panel__item--active')
				$(this).addClass('filter-panel__item--active')

			})

		}

		masonryGallery()

		// quantity

		function quantity() {

			const count = $('.cart-item__count')

			if (!count.length) return

			const minus = $('.cart-item__minus')
			const plus = $('.cart-item__plus')

			minus.on('click', function () {

				const $input = $(this).parent().find('input')
				let count = parseInt($input.val()) - 1
				count = count < 1 ? 1 : count
				$input.val(count)
				$input.change()
				return false

			})

			plus.on('click', function () {

				const $input = $(this).parent().find('input')
				$input.val(parseInt($input.val()) + 1)
				$input.change()
				return false

			})

		}

		quantity()

		// form quantity

		function formQuantity() {

			const count = $('.form__count')

			if (!count.length) return

			const minus = $('.form__minus')
			const plus = $('.form__plus')

			minus.on('click', function () {

				const $input = $(this).parent().find('input')
				let count = parseInt($input.val()) - 1
				count = count < 1 ? 1 : count
				$input.val(count)
				$input.change()
				return false

			})

			plus.on('click', function () {

				const $input = $(this).parent().find('input')
				$input.val(parseInt($input.val()) + 1)
				$input.change()
				return false

			})

		}

		formQuantity()

		// range slider

		function rangeSlider() {

			const rangeSlider = $('.range-slider .range-slider__bar')

			if (!rangeSlider.length) return

			const min = $('.range-slider__min')
			const max = $('.range-slider__max')

			rangeSlider.ionRangeSlider({

				type: 'double',
				min: 0,
				max: 5000,
				from: 0,
				to: 3000,
				skin: 'round',
				step: 10,
				onChange: function (data) {

					min.val(data.from)
					max.val(data.to)

				},

			})

		}

		rangeSlider()

		// nice select

		function select() {

			const select = $('.form__select')

			if (!select.length) return

			select.niceSelect()

		}

		select()

		// aside trigger

		function asideTrigger() {

			const trigger = $('.shop__aside-trigger')

			if (!trigger.length) return

			trigger.on('click', function () {

				$('body').find('.aside-holder').toggleClass('aside-holder--visible')
				$('body').find('.shop__backdrop').toggleClass('shop__backdrop--visible')

			})

			const close = $('.shop__aside-close')

			close.on('click', function () {

				$('body').find('.aside-holder').removeClass('aside-holder--visible')
				$('body').find('.shop__backdrop').removeClass('shop__backdrop--visible')

			})

			const backdrop = $('.shop__backdrop')

			backdrop.on('click', function () {
				$(this).removeClass('shop__backdrop--visible')
				$('body').find('.aside-holder').removeClass('aside-holder--visible')
			})

		}

		asideTrigger()

		// SLIDERS

		// promo slider

		function promoSlider() {

			const slider = $('.promo-slider')

			if (!slider.length) return

			const status = $('.promo-slider__count')

			$('.promo-slider--style-2').on('init afterChange', function (event, slick, currentSlide, nextSlide) {

				let i = (currentSlide ? currentSlide : 0) + 1
				status.text(i + '/' + slick.slideCount)

			})

			slider.slick({

				fade: true,
				adaptiveHeight: true,
				infinite: true,
				speed: 1200,
				arrows: false,
				dots: true,
				appendDots: $('.promo-slider__nav'),

			})

		}

		promoSlider()

		// testimonials-1

		function testimonialsSlider() {

			const testimonials = $('.testimonials-slider')

			if (!testimonials.length) return

			const testimonialsOne = $('.testimonials-slider--style-1')

			testimonialsOne.slick({

				arrows: false,
				dots: true,
				appendDots: $('.testimonials--style-1__dots'),
				adaptiveHeight: true,

			})

			const testimonialsTwo = $('.testimonials-slider--style-2')

			testimonialsTwo.slick({

				arrows: false,
				dots: true,
				fade: true,
				appendDots: $('.testimonials--style-2__dots'),
				adaptiveHeight: true,

			})

			const testimonialsThree = $('.testimonials-slider--style-3')

			testimonialsThree.slick({

				arrows: false,
				dots: true,
				fade: true,
				appendDots: $('.testimonials--style-3__dots'),
				adaptiveHeight: true,

			})

		}

		testimonialsSlider()

		// logos slider

		function logosSlider() {

			const slider = $('.logos-slider')

			if (!slider.length) return

			slider.slick({

				arrows: false,
				dots: true,
				appendDots: $('.logos-slider__dots'),
				slidesToShow: 5,
				slidesToScroll: 4,
				responsive: [{
					breakpoint: 992,
					settings: {
						slidesToShow: 4,
					}
				},{
					breakpoint: 768,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				}, {
					breakpoint: 576,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
					}
				}]

			})

		}

		logosSlider()

		// dual slider

		function dualSlider() {

			const slider = $('.main-slider')

			if (!slider.length) return

			slider.slick({

				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				asNavFor: '.nav-slider',
				fade: true,

			})

			const navSlider = $('.nav-slider')

			navSlider.slick({

				slidesToShow: 4,
				slidesToScroll: 1,
				asNavFor: '.main-slider',
				focusOnSelect: true,
				arrows: false,

			})

		}

		dualSlider()

		// related slider

		function relatedSlider() {

			const relatedSlider = $('.related-slider')

			if (!relatedSlider.length) return

			relatedSlider.slick({

				slidesToShow: 4,
				slidesToScroll: 2,
				arrows: false,
				dots: true,
				appendDots: $('.related-slider__dots'),

				responsive: [{
					breakpoint: 1200,
					settings: {
						slidesToShow: 3,
					}
				}, {
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
					}
				}, {
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
					}
				}]

			})

		}

		relatedSlider()

		// tours slider

		function toursSlider() {

			const slider = $('.tours-slider')

			if (!slider.length) return

			slider.slick({

				arrows: false,
				dots: true,
				appendDots: $('.tours-slider__dots'),
				slidesToShow: 3,
				responsive: [{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
					}
				}, {
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
					}
				}]

			})

		}

		toursSlider()

		// donations slider

		function donationSlider() {

			const slider = $('.donation-slider')

			if (!slider.length) return
			
			slider.slick({

				slidesToShow: 2,
				arrows: false,
				dots: true,
				appendDots: $('.donation-slider__dots'),

				responsive: [{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
					}
				}]

			})

		}

		donationSlider()

		// instagram slider

		function instagramSlider() {

			const slider = $('.instagram-slider')

			if (!slider.length) return

			slider.slick({

				arrows: false,
				dots: false,
				slidesToShow: 6,
				responsive: [{
					breakpoint: 1600,
					settings: {
						slidesToShow: 5,
					}
				}, {
					breakpoint: 1200,
					settings: {
						slidesToShow: 4,
					}
				}, {
					breakpoint: 992,
					settings: {
						slidesToShow: 3,
					}
				}, {
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
					}
				}]

			})

		}

		instagramSlider()

		// destination slider

		function destSlider() {

			const slider = $('.destination-slider')

			if (!slider.length) return

			slider.slick({

				arrows: false,
				dots: true,
				appendDots: $('.destination-slider__dots'),
				slidesToShow: 4,
				slidesToScroll: 2,

				responsive: [{
					breakpoint: 992,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 2,
					}
				}, {
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				}, {
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
					}
				}]

			})

		}

		destSlider()

		// blogs slider

		function blogsSlider() {

			const slider = $('.blogs-slider')

			if (!slider.length) return

			slider.slick({

				arrows: false,
				dots: true,
				appendDots: $('.blogs-slider__dots'),
				slidesToShow: 2,
				slidesToScroll: 1,

				responsive: [{

					breakpoint: 768,
					settings: {
						slidesToShow: 1,
					}

				}]

			})

		}

		blogsSlider()

		// fishes slider

		function fishesSlider() {

			const slider = $('.fishes-slider')

			if (!slider.length) return

			slider.slick({

				arrows: false,
				dots: true,
				appendDots: $('.fishes-slider__dots'),
				slidesToShow: 5,
				slidesToScroll: 2,

				responsive: [{
					breakpoint: 1830,
					settings: {
						slidesToShow: 4,
					}
				}, {
					breakpoint: 992,
					settings: {
						slidesToShow: 3,
					}
				}, {
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
					}
				}, {
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
					}
				}]

			})

		}

		fishesSlider()

		// pages slider

		function pagesSlider() {

			const slider = $('.pages-slider')

			if (!slider.length) return

			const dots  = $('.pages-slider__dots')

			slider.slick({

				slidesToShow: 2,
				arrows: false,
				dots: true,
				appendDots: dots,
				adaptiveHeight: true,
				responsive: [{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
					}
				}, {
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
					}
				}]

			})

		}

		pagesSlider()

		// contact form

		function form() {

			const jsform = $('#ajax-form')

			if (!jsform.length) return

			$('#ajax-form').validate({

				rules: {
					name: {
						required: true,
						minlength: 2
					},
					email: {
						required: true,
						email: true
					},
					phone: {
						required: true,
					},
					message: {
						required: true,
					}
				},

				messages: {
					name: {
						required: "Please enter your name",
						minlength: "Your name must consist of at least 2 characters"
					},
					email: {
						required: "Please enter your email"
					},
					phone: {
						required: "Please enter your phone number"
					},
					message: {
						required: "Please enter your message"
					}
				},

				submitHandler: function(form) {

					$(form).ajaxSubmit({

						type:"POST",
						data: $(form).serialize(),
						url:"form.php",

						success: function() {

							$('.alert--success').fadeIn()
							$('#ajax-form').each(function(){

								this.reset()

							})

						},

						error: function() {

							$('.alert--error').fadeIn()

						}
					})
				}
			})

		}

		form()

	})

}(jQuery))