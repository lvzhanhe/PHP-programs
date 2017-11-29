// $('.article li').each(function(index, el) {
// 	var $column = index%3;
// 	var $left = $column*405;
// 	var $line = index;
// 	// console.log((index+1)/4);
// 	for(var k = 0; k < (index+1)/3-1; k++){
// 		var $height = 0;
// 		$line = $line - 3;
// 		if ($line+1) {
// 			$height += ($('.article li:eq('+$line+')').height()+56);
// 		}	
// 		console.log($height);
// 	}
// 	$(this).css({
// 		left: $left,
// 		top: $height,
// 	});
// });