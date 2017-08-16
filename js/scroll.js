
$(function(){
	var fo; //footer offset
	var ww; //window width
	var wh; //window height
	var ch; //#c height
	var st; //scrolltop
	var bh; //#b heigh

	
	function setnumbers(){
		fo = $('#footer').offset()	
		ww = $(window).width()
		wh = $(window).height()
		ch = $('#c').height();
		bh = $('#b').height();
	}
	setnumbers()
	
	$(document).scroll(function() {
    	st = $(document).scrollTop()
    	
    	//console.log(fo.top,(wh*0.38)+st+(ch+0.07*ww))


    	if(fo.top<(wh*0.38)+st+ch+bh){ // if footer offset from top is les than 38vw + pixels scrolled from top + div#c height + div#b height 

    	}else{
    		$('#float_block').css('top', (wh*0.38)+st) // #float_block top: 38vw + pixels scrolled from top
    	}
	})

	$(window).resize(function(){
		setnumbers()
	})
})