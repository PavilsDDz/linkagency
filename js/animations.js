$(function(){
	var animations = []
	var reset = []
	var timer = 1300
	var ww = $(window).width()

	reset[0] = function(){
	
		$('#firstD .container .wrap').css({'height':'0',})
		$('#firstD .numbers p').html('')
		$('.fe').css({'width':'0%','opacity':0,'right':'78%'})
		$('.ma').css({'width':'0%','opacity':0,'right':'95%'})


	}
	reset[1] = function(){
		$('#secondD .column').css({'height':'0'})
		$('#secondD .value').html('')
	}
	reset[2] = function(){
		$('#thirdD .middle .right p:eq('+0+')').css('width','0vw').html('0%')
		$('#thirdD .middle .right p:eq('+1+')').css('width','0vw').html('0%')
	}

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
		$('#firstD .container .wrap').animate(
			{'height':pixelsto}
			,{	duration:timer,
				step:function(now,fx){
		//			console.log(now/pixelsto)
					for (var i = 0; i <numbersLen; i++) {
						$('#firstD .numbers:eq('+i+') p:nth-child('+1+')').html(Math.round(now/pixelsto*numbersVal[i].f)+'%')
						$('#firstD .numbers:eq('+i+') p:nth-child('+2+')').html(Math.round(now/pixelsto*numbersVal[i].m)+'%')
				}},
				complete: function(){
					to_fe = ww<900? 110 : 83
					to_ma = ww<900? 110 : 100
					$('.fe').animate({'width':15+'%','opacity':1,'right':to_fe+'%'})
					$('.ma').animate({'width':15+'%','opacity':1,'right':to_ma+'%'})
				}
			})
		
	}

	animations[1] = function(){
		containerHeight =  $('#secondD .container').height()
		len = $('#secondD li').length
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
	animations[2] = function(){
		val = [];
		val[0] = parseInt($('#thirdD .middle .right p:eq('+0+')').attr('val'))
		val[1] = parseInt($('#thirdD .middle .right p:eq('+1+')').attr('val'))

		$('#thirdD .middle .right p:eq('+0+')').animate({'width':20+'vw'},{duration:timer,
			step:function(now, fx){
				$(this).html(Math.round(val[0]*now/20)/10+'%')
				//console.log($(this),val[0],now,(ww*0.02)/10)
			},
		})
		$('#thirdD .middle .right p:eq('+1+')').animate({'width':8+'vw'},{duration:timer,
			step:function(now, fx){
				$(this).html(Math.round(val[1]*now/8)/10+'%')
				//console.log($(this),val[0],now,(ww*0.02)/10)
			},
		})

	}
	animations[3] = function(){
		valC = []
		valR = []
		wrapLw = $('#diagram .L').width() 
		for (var i = 0; i < $('#diagram .contry').length; i++) {
			val = parseInt($('#diagram .contry:eq('+i+')').attr('val'))
			//console.log($('#diagram .contry:eq('+i+')'))
			valC.push(val)
			$('#diagram .contry:eq('+i+')').animate({'width':(valC[i]+2)+'%'},{duration: timer,
				step: function(now, fx){
					thisval = parseInt($(this).attr('val'))
					$(this).children('p').children('.val').html(Math.round(now-(2*(now/(thisval+2))))+'%')
					//console.log(now,(2*(now/(thisval+2))),$(this).children('p').children('.val'))
				},
				complete: function(){

				}
			})

		}
		console.log($('#diagram .region'))
		

		if (ww>900) {
				setTimeout(function(){animations[4]()},timer)
		}
		//console.log(valR)
	}
	animations[4] = function(){
			for (var i = 0; i < $('#diagram .region').length; i++) {
				val = parseInt($('#diagram .region:eq('+i+')').attr('val'))
				valR.push(val)

				$('#diagram .region:eq('+i+')').animate({'width':(valR[i]/10+1)+'%'},{duration: timer,
				step: function(now, fx){
					thisval = parseInt($(this).attr('val'))/10
					$(this).children('p').children('.val').html(((Math.round((now-(1*(now/(thisval+1))))*10)/10).toFixed(1)+'%'))
					//console.log(now,(2*(now/(thisval+2))),$(this).children('p').children('.val'))
				},
				complete: function(){

				}
			})
			}
			console.log(valR)
		}
	//animations[3]()

	//animations[0]()

	ind_old = 0;
	$('#graphical_diagram .nav div').click(function(){
		$('#graphical_diagram .nav div').removeClass('current')
		$(this).addClass('current')
		ind = $(this).index()
		len = $('#graphical_diagram .diagram').length
		console.log(len)
		for (var i = len - 1; i >= 0; i--) {
			$('#graphical_diagram .diagram:eq('+i+')').animate({'left':(i - ind)*100+'%'},600)
			console.log($('#graphical_diagram .diagram:eq('+i+')'))
		}
			$('#diagram_bg').animate({'left': - ind/4*100+'%'},600,function(){
				animations[ind]()
				reset[ind_old]()
				ind_old = ind
			})
		text = ['Мужчины, Женщины','Структура переходов на страницы сайта:','Структура переходов на страницы сайта:']
		$('#graphical_diagram .aud .num span').html(ind+1+'.')
		$('#graphical_diagram .aud .info').html(text[ind])
		//alert(ind)
	})

	var animated = false
	var animated2 = false
	var animated3 = false
	var offset = $('#graphical_diagram').offset()
	var gdh = $('#graphical_diagram').height()
	var dh = $('#diagram').height()
	var diagO = $('#diagram').offset()
	var diag2O = $('#diagram2').offset()

	$(document).scroll(function(){
		sct = $(document).scrollTop()
		//console.log(sct)
		//console.log(sct,offset.top,gdh*0.8,!animated)
		if(sct>offset.top-gdh*0.3&&!animated){
			animated=true;
			animations[0]()
		}
		if (sct>diagO.top-dh*0.3&&!animated2) {
			animated2 = true
			animations[3]()
		}
		if (ww<900) {
			if (sct>diag2O.top-dh*0.3&&!animated3) {
					animated3 = true
					animations[4]()
			}
		}
	}) 

})