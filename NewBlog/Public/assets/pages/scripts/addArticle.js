var addArticle = function () {
		var summernoteInit = function () {
			 $('.summernote').summernote({
			   height: 300,                 // set editor height
			   minHeight: null,             // set minimum height of editor
			   maxHeight: null,             // set maximum height of editor
			   focus: true,                 // set focus to editable area after initializing summernote
			   lang: 'zh-CN',
			   backColor: 'red',
			   foreColor:  'red',
			   placeholder: '文章内容',
			 });
			 $('.note-icon-font.note-recent-color').css('backgroundColor', '#DEDEDE');
			 $('.note-current-color-button').hover(function () {
			 	  $('.note-icon-font.note-recent-color').css('backgroundColor', '#555555');
			 },function () {
			 	  $('.note-icon-font.note-recent-color').css('backgroundColor', '#DEDEDE')
			 }); 
		}

		var this_submit = function () {
			  var markupStr = $('.summernote').summernote('code');
			  console.log(markupStr);
		}





	return {
		init: function () {
			  summernoteInit();
			  this_submit();
		}
	} 
}();