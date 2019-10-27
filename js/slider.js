/// <reference path="typings/globals/jquery/index.d.ts" />

$(document).ready(function () {
	var $slider = $('.slider');
	var $slides = $('.slides');
	var $slide = $('.slide');
	var $esq = $('.btn-esquerda');
	var $dir = $('.btn-direita');
	
	var qtddSlides = $slide.length;
	var larguraSlide = 100;
	var alturaSlide = 40;
	var larguraSlides = qtddSlides * larguraSlide;
	var pausa = 3000;
	var transicao = 450;
	var intervalo;

	$('.imagem-slide').css({ width: larguraSlide + 'vw', height: alturaSlide + 'vw' });

	$slides.css({ width: larguraSlides + 'vw', marginLeft: - larguraSlide + 'vw' });

	$('.slide:last-child').prependTo('.slides');

	function moveLeft() {
		$slides.animate({
			left: + larguraSlide + 'vw'
		}, transicao, function () {
			$('.slide:last-child').prependTo('.slides');
			$slides.css('left', '');
		});
	};

	function moveRight() {
		$slides.animate({
			left: - larguraSlide + 'vw'
		}, transicao, function () {
			$('.slide:first-child').appendTo('.slides');
			$slides.css('left', '');
		});
	};

	$esq.click(function () {
		moveLeft();
	});

	$dir.click(function () {
		moveRight();
	});

	$slider.on('mouseover', stopSlider).on('mouseout', startSlider);

	function stopSlider() {
		clearInterval(intervalo);
	}

	function startSlider() {
		intervalo = setInterval(function () {
			moveRight();
		}, pausa);
	}

	startSlider();
});