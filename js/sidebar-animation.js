function sidebar() {
	var aside = $("#aside");
	var svg = $("#svg-sidebar");
	var form = $("#form-sidebar");
	var sidebar = $("#sidebar");

	aside.toggleClass("aside-active");
	svg.toggleClass("svg-active");
	form.toggleClass("form-active");
	sidebar.toggle(400);
}