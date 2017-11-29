var Public = function(){	
	var showMenu = function ($a,$b) {
		 $($a).hover(function () {
		 	  $(this).children($b).css('display','block');
		 },function () {
		 	  $(this).children($b).css('display', 'none');
		 }) 
	}
	var ChangeSideStyle = function () {
		  var url = window.location.href;
		  var myURL = url.split('/').pop();
		  var suffix = myURL.split('.')[0];
	      $('aside li').removeClass('active');
	      $("aside li[data-name='"+suffix+"']").addClass('active');
	}
	
	var showHideMenu = function () {
		 $(function(){	
		     var topBegin = $(document).scrollTop();
		     var header_height = $('.top').outerHeight();

		     $(window).scroll(function() {
		         var topResult = $(document).scrollTop();

		         if (topResult > header_height){
		         	$('.top').addClass('gizle');
		         }else {
		         	$('.top').removeClass('gizle');
		     	}

		         if (topResult > topBegin){
		         	$('.top').removeClass('sabit');
		         }else {
		         	$('.top').addClass('sabit');
		         }				

		         topBegin = $(document).scrollTop();	
		      }); 
		 });
	};
	return {
		init:function(){
			showMenu('.avatar','.menu');
			showMenu('.nav>ul>li','.nav>ul>li>ul');
			ChangeSideStyle();
			showHideMenu();
		}
	};
}();