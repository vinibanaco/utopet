function menu() {
	var transp = $("#transp-menu");
	var nav = $("#nav");
	var hamburgers = $("#hamburger");
	var body = $("body");
	var popup = $(".popup-container");

	if (transp.hasClass("transp-menu-active")) {
		transp.removeClass("transp-menu-active");
	} else {
		transp.addClass("transp-menu-active");
	}

	if (nav.hasClass("menu-active")) {
		nav.removeClass("menu-active");
	} else {
		nav.addClass("menu-active");
	}

	if (hamburgers.hasClass("is-active")) {
		hamburgers.removeClass("is-active");
	} else {
		hamburgers.addClass("is-active");
	}

	if (body.hasClass("overflow-hidden")) {
		if (popup.hasClass("popup-container-active") == false) {
			body.removeClass("overflow-hidden");
		}
	} else {
		body.addClass("overflow-hidden");
	}
}