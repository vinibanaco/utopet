$(document).ready(function () {
	var phones = [{ "mask": "(##) ####-####" }, { "mask": "(##) #####-####" }];
	$('#tel').inputmask({
		mask: phones,
		greedy: false,
		definitions: { '#': { validator: "[0-9]", cardinality: 1 } }
	});
});