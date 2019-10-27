$(document).ready(function () {
	$(".card").on("click", function () {
		$(this).find("+ .popup-container").addClass("popup-container-active");
		$("body").addClass("overflow-hidden");
		$(".transp-popup").addClass("transp-popup-active");
	});

	$(".btn-close-popup").on("click", function () {
		$(".popup-container").removeClass("popup-container-active");
		$("body").removeClass("overflow-hidden");
		$(".transp-popup").removeClass("transp-popup-active");
	});

	$(".transp-popup").on("click", function () {
		$(".popup-container").removeClass("popup-container-active");
		$("body").removeClass("overflow-hidden");
		$(".transp-popup").removeClass("transp-popup-active");
	});

	$(document).on("keyup", function (e) {
		if (e.keyCode == 27) {
			$(".popup-container").removeClass("popup-container-active");
			$("body").removeClass("overflow-hidden");
			$(".transp-popup").removeClass("transp-popup-active");
		}
	});
});
