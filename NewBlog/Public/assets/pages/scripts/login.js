/**
 * 
 */
var i = 0;
$(".register-btn").on('click',function(){
	i++;
	$('.flipper, .flip-container.hover .flipper').css({
		"transform": "rotateY("+180*i+"deg)",
	});
});