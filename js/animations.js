$(function(){
	var animations = []
	var reset = []

	animations[0] = function(){
		heightTo = 70;
		numbersLen = $('#firstD .numbers').length
		numbersVal = [];
		for (var i = 0; i < numbersLen; i++) {
			numbersVal[i] = {}
			numbersVal[i].f =  parseInt($('#firstD .numbers:eq('+i+')').attr('female'))
			numbersVal[i].m =  parseInt($('#firstD .numbers:eq('+i+')').attr('male'))
		}
		console.log(numbersVal)
		pixelsto = $('#firstD .container').height()/100*heightTo
		$('#firstD .container .wrap').animate({'height':pixelsto},{duration:1000,step:function(now,fx){
			console.log(now/pixelsto)
			for (var i = 0; i <numbersLen; i++) {
				
				$('#firstD .numbers:eq('+i+') p:nth-child('+1+')').html(Math.round(now/pixelsto*numbersVal[i].f)+'%')
				$('#firstD .numbers:eq('+i+') p:nth-child('+2+')').html(Math.round(now/pixelsto*numbersVal[i].m)+'%')
			}
		}, complete: function(){alert('go')}})
		
	}

	animations[1] = function(){
		containerHeight =  $('#secondD .container').height()
		len = $('#secondD li').length
		timer = 1000
		console.log(len)
		for (var i = 0; i < len; i++) {
			that = $('#secondD .column:eq('+i+')')
			val = that.attr('val')
			height = (containerHeight/100)*val

		
			
			
			$('#secondD .column:eq('+i+')').animate({'height': height},{duration:timer, step:function(now,fx){
				$(this).siblings('.value').html(Math.round((now/containerHeight)*1000)/10 + '%')
					}
			})
			console.log($('#secondD .column:eq('+i+')'))

		}

	}

	animations[0]()

})