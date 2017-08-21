<?php
// hi!!!!!

	if(isset($_POST['submit'])) 
{
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "roman@link.agency"; 
	//my.worktest94@gmail.com

    $email_subject = "Your email subject line";
 
    function died($error) {
        // your error code can go here
        echo "<script>alert('Mail not sent !');</script>";
		die();
		
    }
 
 
    // validation expected data exists
    if(!isset($_POST['email']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    $email_from = $_POST['email']; // required
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'Enter email.<br />';
    }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
    if(strlen($comments) < 2) {
        $error_message .= 'Enter text.<br />';
    }
 
    if(strlen($error_message) > 0) {
        died($error_message);
    }
 
  
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
	
    
    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
	@mail($email_to, $email_subject, $email_message, $headers);  

	// try {

		if(@mail($email_to, $email_subject, $email_message, $headers))
		{
		echo "<script>alert('Mail was sent !');</script>";
		echo "<script>document.location.href='index.php'</script>";
		}
		else
		{
		echo "<script>alert('Mail was not sent. Please try again later');</script>";
		}
	// }
    
}

?>

 
<?php
	include ('assets/connect.php');
	include ('assets/function.php');

    if(isset($_POST['sent']))
    {

        $email = $_POST['email'];

        $row = getDataFromDatabase("SELECT email FROM emails WHERE email=:email", [ 
            'email' => $email,
        ]);

        $emailErr = '';

        if($row['email']==$email) {
            $emailError = "EMAIL exist! ".$row['email'];
            $trueError = true;
            $emailErr = 'emailErr'.$row['email'];

        }else{

            $sql = "INSERT INTO emails (email) VALUES(:email)";
    
            $row = insertDataInToDataBase($sql, [
            'email' => $email
            ]);
        }
						
			if(isset($errsuc)){
				alert ($errsuc);
			}
						

    }else{

	}
?>

<?php

	if(isset($_POST['sentemail'])) {
		$mailto = 'roman@link.agency';

		$nal = $_POST["name_and_last"];
		$conemail = $_POST["conemail"];

		$subjects = 'the subjects';
		$message = "Name, Lastname:" . " " . $nal . "\r\n" . "Email:" . " " . $conemail;

		'Reply-To:' . " " . $mail . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		@mail($mailto, $subjects, $message, $headers);

		if(@mail($mailto, $subjects, $message, $headers))
		{
		echo "<script>alert('Mail was sent !');</script>";
		echo "<script>document.location.href='index.php'</script>";
		}
		else
		{
		echo "<script>alert('Mail was not sent. Please try again later');</script>";
		}
	}
?>



<!DOCTYPE html> 
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
		<link rel="stylesheet" type="text/css" href="linkagency.css">
    	<title>link agency</title>

    	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&amp;subset=cyrillic-ext" rel="stylesheet">
		<script src="js/jquery-3.2.1.js"></script>
		<!-- <script src="js/jquery-3.2.1.min.js"></script> -->
		<script src = "js/animations.js"></script>

		<!--for first gallery-->
		<script>
			$(document).ready(function(){
				$("#flip_1").click(function () {
					$(".block_2").css("display","none");
					$(".block_3").css("display","none");
					$(".block_1").fadeIn(400);
					$(".block_1").css("display","flex");
				});
				$("#flip_2").click(function () {
					$(".block_1").css("display","none");
					$(".block_3").css("display","none");
					$(".block_2").fadeIn(400);
					$(".block_2").css("display","flex");
				});
				$("#flip_3").click(function () {
					$(".block_1").css("display","none");
					$(".block_2").css("display","none");
					$(".block_3").fadeIn(400);
					$(".block_3").css("display","flex");
				});
			});
		</script>

		<!--block navigation-->

		<script>
    		$(document).ready(function(){
			$('a[href^="#"]').bind('click.smoothscroll',function (e) {
 			e.preventDefault();
 
			var target = this.hash,
 			$target = $(target);
 
			$('html, body').stop().animate({
 				'scrollTop': $target.offset().top
 			}, 500, 'swing', function () {

 			window.location.hash = target;
			});
			});
			});
		</script>

		<!--FROM INTERNET-->
		<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="js/Carousel.js"></script> 

		<script>
			$(function(){
				Carousel.init($("#carousel"));
				$("#carousel").init();
			});
		</script> 

		<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-36251023-1']);
		_gaq.push(['_setDomainName', 'jqueryscript.net']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		</script>

		<script>
		$(document).ready(function(){
			$("#toggler1").click(function () {
				$("#box2").css("display","none");
				$("#box3").css("display","none");
				$( "#box1" ).slideToggle( "slow", function() {
			});
		});
		
			$("#toggler2").click(function () {
				$("#box1").css("display","none");
				$("#box3").css("display","none");
				$( "#box2" ).slideToggle( "slow", function() {
			});
		});
		
			$("#toggler3").click(function () {
				$("#box1").css("display","none");
				$("#box2").css("display","none");
				$( "#box3" ).slideToggle( "slow", function() {
			});
		});
		
		});
		</script>
		

		<script>
		jQuery(function(f){
			var element = f('#float_block_blue');
			f(window).scroll(function(){
				element['fade'+ (f(this).scrollTop() >= $(".header").offset().top ? 'In': 'Out')](300);           
			});
		}); 
		</script>
		<script>
		jQuery(function(f){
			var element = f('#float_block_white');
			f(window).scroll(function(){
				element['fade'+ (f(this).scrollTop() >= $("#graphical_diagram").offset().top-100 ? 'In': 'Out')](300);           
			});
		}); 
		</script>
		<script>
		jQuery(function(f){
			var element = f('#float_block_blue2');
			f(window).scroll(function(){
				element['fade'+ (f(this).scrollTop() >= $("#contact_us").offset().top-100 ? 'In': 'Out')](300);           
			});
		}); 
		</script>

	</head>


	<body>
		<div id="class_container">

			<!-- <div id="float_block">
				<div class="a"><p>follow us @linkagency.ru</p></div>
				<div class="b"></div>

				<div class="c">
					<ul>
						<li><a class="facebook-follow-button" href="https://facebook.com/" data-size="large"><img src="img/facebook.png" width="110%"></a></li>
						<li><a class="instagram-follow-button" href="https://www.instagram.com/" data-size="large"><img src="img/instagram.png" width="170%"></a></li>
						<li><a class="twitter-follow-button" href="https://twitter.com/" data-size="large"><img src="img/twitter.png" width="170%"></a></li>
					</ul>
				</div>
			</div> -->
			
			<!-- <div id="float_block_blue">
				<div class="a_blue"><p>follow us @linkagency.ru</p></div>
				<div class="b_blue"></div>

				<div class="c_blue">
					<ul>
						<li><a class="facebook-follow-button" href="https://facebook.com/" data-size="large"><img src="img/facebook_blue.png" width="110%"></a></li>
						<li><a class="instagram-follow-button" href="https://www.instagram.com/" data-size="large"><img src="img/instagram_blue.png" width="170%"></a></li>
						<li><a class="twitter-follow-button" href="https://twitter.com/" data-size="large"><img src="img/twitter_blue.png" width="170%"></a></li>
					</ul>
				</div>
			</div> -->
			
			<!-- <div id="float_block_white">
				<div class="a"><p>follow us @linkagency.ru</p></div>
				<div class="b"></div>

				<div class="c">
					<ul>
						<li><a class="facebook-follow-button" href="https://facebook.com/" data-size="large"><img src="img/facebook.png" width="110%"></a></li>
						<li><a class="instagram-follow-button" href="https://www.instagram.com/" data-size="large"><img src="img/instagram.png" width="170%"></a></li>
						<li><a class="twitter-follow-button" href="https://twitter.com/" data-size="large"><img src="img/twitter.png" width="170%"></a></li>
					</ul>
				</div>
			</div> -->
			
			<!-- <div id="float_block_blue2">
				<div class="a_blue"><p>follow us @linkagency.ru</p></div>
				<div class="b_blue"></div>

				<div class="c_blue">
					<ul>
						<li><a class="facebook-follow-button" href="https://facebook.com/" data-size="large"><img src="img/facebook_blue.png" width="110%"></a></li>
						<li><a class="instagram-follow-button" href="https://www.instagram.com/" data-size="large"><img src="img/instagram_blue.png" width="170%"></a></li>
						<li><a class="twitter-follow-button" href="https://twitter.com/" data-size="large"><img src="img/twitter_blue.png" width="170%"></a></li>
					</ul>
				</div>
			</div> -->

			<div id="header">
				<div id="float_block_2">
					<div class="round_buttons_2">
						<a href="#header"><button id="toggle"></button></a>
						<a href="#about_us"><button id="toggle1"></button></a>
						<a href="#graphical_diagram"><button id="toggle2"></button></a>
						<a href="#diagram"><button id="toggle3"></button></a>
						<a href="#contact_us"><button id="toggle4"></button></a>
						<a href="#gallery"><button id="toggle5"></button></a>
						<a href="#gallery2"><button id="toggle6"></button></a>
					</div>
				</div>

				<div class="navigation">
					<ul>
						<li class="logo"><img src="img/logo.png"></li>
						<li><a href="#about_us">О Компании</a></li>
						<li><a href="#contact_us">Услуги</a></li>
						<li><a href="#gallery">Нестандартные форматы</a></li>
						<li><a href="#gallery2">Партнеры</a></li>
						<li><a href="#footer">Контакты</a></li>
					</ul>
				</div>

				<div class="header">
					<h1>Link Agency</h1>
					<h2 style="font-style: italic;">Международная рекламная сеть</h2>
				</div>
			</div>

			<div id="about_us">
				<div class="white_block">
					<div class="text">
						<h4>О Компании</h4>
						<h3>Кто мы?</h3>
						<p>Link объединил в рекламную сеть все крупнейшие<br> онлайн-кинотеатры, спортивные и<br> развлекательные ресурсы Рунета.</p>

						<ul>
							<li>Эксклюзивные права на весь рекламный инвентарь</li>
							<li>Централизованная закупка трафика</li>
							<li>Более 1 миллиарда показов в месяц</li>
							<li>40% медийного трафика России и стран СНГ</li>
						</ul>

					</div>
				</div>
			</div>

			<div id="graphical_diagram">

				<!--<img src="img/graphic.png" width="80%" style="margin-top: 10vw;">-->
				<div class="wrap">
						<div id="firstD" class="diagram" style="left: 0">
							<div class="container flex">
									
								<div class=" flex wrap">
									<div class="gender fe flex"><div class="icon"></div><div class="text"><p class="prec">52%</p><p>Женщины</p></div></div>	
									<div class="gender ma flex"><div class="icon"></div><div class="text"><p class="prec">48%</p><p>Мужчины</p></div></div>	
									<div class="numbers" male="7" female="9"><p>0</p><p>0<p></div>
									<div class="numbers" male="17" female="18"><p>0</p><p>0<p></div>
									<div class="numbers" male="13" female="13"><p>0</p><p>0<p></div>
									<div class="numbers" male="7" female="7"><p>0</p><p>0<p></div>
									<div class="numbers" male="4" female="4"><p>0</p><p>0<p></div>
									<div class="text_under flex">
										<p class="abs">возраст</p>
										<p>< 18</p>
										<p>18-24</p>
										<p>25-34</p>
										<p>35-44</p>
										<p>45+</p>
									</div>
								</div>
							</div>
						</div>
						<div id="secondD" class="diagram" style="left: 100%">
							<div class="container">
								<ul class="flex">
									<li class="flex">
										<h3 class="value"></h3>
										<div class="column" style="background-color: #00bff3" val="68.5">	</div>
										<p class="name">Внутренние<p>
									</li>
									<li class="flex">
										<h3 class="value"></h3>
										<div class="column" style="background-color: #00afde" val='23.1'>	</div>
										<p class="name">Поиск<p>
									</li>
									<li class="flex">
										<h3 class="value"></h3>
										<div class="column" style="background-color: #02a1cb" val='7.8'>	</div>
										<p class="name">Закладки<p>
									</li>
									<li class="flex">
										<h3 class="value"></h3>
										<div class="column" style="background-color: #02a1cb" val='0.5'>	</div>
										<p class="name">Сайты<p>
									</li>
									<li class="flex">
										<h3 class="value"></h3>
										<div class="column" style="background-color: #02a1cb" val='0.1'>	</div>
										<p class="name">Соц. сети<p>
									</li>
									<li class="flex">
										<h3 class="value"></h3>
										<div class="column" style="background-color: #02a1cb" val='0'>	</div>
										<p class="name">Объявления<p>
									</li>
								</ul>
							</div>
						</div>
				<div id="thirdD" class="diagram" style="left: 200%">
					<div class="container flex">
						<div class="wrap">
							<div class="top flex">
								<div class="left">
									<p>Просмотров страниц</p>
									<p>Посетителей</p>
								</div>
								<div class="right">
									<p>1 019 286 012  (+8% мес/мес)</p>
									<p>81 201 874   (+7% мес/мес)</p>
								</div>
								<div class="right"></div>
							</div>
							<div class="middle flex">
								<div class="left">
									<p>Преобладающий регион - Москва</p>
									<p>Преобладающая страна - Россия</p>
								</div>
								<div class="right">
									<p val="545">54,5%</p>
									<p val="119">11,9%</p>
								</div>
							</div>
							<div class="bottom flex">
								<div class="left">
									<p>Переходов с поисковиков</p>
									<p>Пользователей, пришедших с поисковиков</p>
								</div>
								<div class="right">
									<p>235 894 090 (+8% мес/мес)</p>
									<p>60 314 716 (+7% мес/мес)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				<canvas id="diagram_bg" width="300vw" height="100%"></canvas>
				<div class="nav flex">
					<div class="current"></div>
					<div></div>
					<div></div>
				</div>
				<div class="aud">
					<div class="top">
						<p>Аудитория</p>
					</div>
					<div class="title">
						<h2>Аудитория</h2>
						<div class="num"><span>1.</span></div>
						<p class="info">Мужчины, Женщины</p>
					</div>
				</div>
			</div>
			<script type="">

				var dotCount = 350;
				var dotSizeMax = 13;
				var dotSizeMin = 1;

				var bg = document.getElementById('diagram_bg')

				bg.width = $('#graphical_diagram').width()*3;
            	bg.height = $('#graphical_diagram').height();

				bgctx = bg.getContext('2d')
				//bgctx.fillStyle = "#ffffff"
				for (var i = 0; i < dotCount; i++) {
					bgctx.beginPath();
			      	bgctx.fillStyle = 'rgba(255,255,255,0.8)';
			      	bgctx.arc(Math.random()*bg.width, Math.random()*bg.height, dotSizeMin+(Math.random(dotSizeMax - dotSizeMin)*Math.random()/0.5), 0, 2 * Math.PI, false);
			      	bgctx.fill();
				}


			</script>

			<div id="diagram">
					<div class="container">
							<div class="wrap L">
								<div class="contry" style="background-color: #00ffae" val='57'><p>Россия - <span class="val">0%</span></p></div>
								<div class="contry" style="background-color: #01bf83" val='21'><p>Украина - <span class="val">0%</span></p></div>
								<div class="contry" style="background-color: #039e6d" val='7'><p>Другие - <span class="val">0%</span></p></div>
								<div class="contry" style="background-color: #007a7e" val='6'><p>Казахстан - <span class="val">0%</span></p></div>
								<div class="contry" style="background-color: #006b7e" val='5'><p>Беларусь - <span class="val">0%</span></p></div>
								<div class="contry" style="background-color: #005f7e" val='2'><p>Молдавия - <span class="val">0%</span></p></div>
								<div class="contry" style="background-color: #165c80" val='1'><p>Армения - <span class="val">0%</span></p></div>
								<div class="contry" style="background-color: #1b6388" val='1'><p>Германия - <span class="val">0%</span></p></div>
							</div>
							<div class="wrap S">
								<p class="info">Регионы России:</p>
								<div class="region" style="background-color: #54c1fa" val='221'><p>Остальные регионы России - <span class="val">0%</span></p></div>
								<div class="region" style="background-color: #00ff5a" val='119'><p>1. Москва - <span class="val">0%</span></p></div>
								<div class="region" style="background-color: #29ff75" val='42'><p>2. Санкт-Петербург - <span class="val">0%</span></p></div>
								<div class="region" style="background-color: #46ff88" val='25'><p>3. Краснодар - <span class="val">0%</span></p></div>
								<div class="region" style="background-color: #46ffc4" val='21'><p>4. Екатеринбург - <span class="val">0%</span></p></div>
								<div class="region" style="background-color: #57ffc9" val='20'><p>5. Новосибирск - <span class="val">0%</span></p></div>
								<div class="region" style="background-color: #57fff5" val='15'><p>6. Самара - <span class="val">0%</span></p></div>
								<div class="region" style="background-color: #6dfff6" val='14'><p>7. Ростов-на-Дону - <span class="val">0%</span></p></div>
								<div class="region" style="background-color: #86eaff" val='13'><p>9. Челябинск - <span class="val">0%</span></p></div>
								<div class="region" style="background-color: #86eaff" val='13'><p>10. Казань - <span class="val">0%</span></p></div>
								<div class="region" style="background-color: #86eaff" val='11'><p>11. Уфа - <span class="val">0%</span></p></div>
								<div class="region" style="background-color: #86eaff" val='10'><p>12. Иркутск - <span class="val">0%</span></p></div>
								<div class="region" style="background-color: #86eaff" val='10'><p>13. Владивосток - <span class="val">0%</span></p></div>
							</div>
					</div>
				<div class="aud">
					<div class="top">
						<p>Аудитория</p>
					</div>
					<div class="title">
						<h2>Аудитория</h2>
						<div class="num"><span>4.</span></div>
						<p class="info">Распределение территории по странам</p>
					</div>
				</div>
				<canvas id="diagram_bg2">	</canvas>
				<script type="">

				var dotCount = 100;
				var dotSizeMax = 13;
				var dotSizeMin = 1;

				var bg = document.getElementById('diagram_bg2')

				bg.width = $('#diagram').width();
            	bg.height = $('#diagram').height();

				bgctx = bg.getContext('2d')
				//bgctx.fillStyle = "#ffffff"
				for (var i = 0; i < dotCount; i++) {
					bgctx.beginPath();
			      	bgctx.fillStyle = 'rgba(255,255,255,0.8)';
			      	bgctx.arc(Math.random()*bg.width, Math.random()*bg.height, dotSizeMin+(Math.random(dotSizeMax - dotSizeMin)*Math.random()/0.5), 0, 2 * Math.PI, false);
			      	bgctx.fill();
				}


			</script>
				
			</div>

			<div id="contact_us">

				<div class="wrap flex">
					<div class="block1">
						<a id="toggler1"><button class="content_button">contact us</button></a>
						
						<div class="block1_content">
							<img src="img/1.png" width="70%">

							<h1>Преролл</h1>
							<p>Видеоролик хронометражем<br> 
							до 30 секунд перед фильмом<br> 
							или сериалом.</p>

							<div class="separate"></div>
							<h2>Досматриваемость 92%<br> 
							СРМ 150 до 300 рублей<br> 
							СТR 9%<br> 
							Более 1 млн. показов в сутки</h2>
						</div>
						<div id="box1" style="display: none;">
						<form action="index.php" method="post" name="cform" class="contact_form">
							<table>

								<tr>
									<td valign="top">
										<label for="email">Email Address *</label>
									</td>

									<td class="new_input" valign="top">
										<input  type="text" name="email" maxlength="80" size="30">
									</td>
								</tr>


								<tr>
									<td valign="top">
										<label for="comments">Comments *</label>
									</td>

									<td valign="top">
										<textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
									</td>
								</tr>


								<tr>
									<td colspan="2" style="text-align:center">
										<input type="submit" name="submit" value="Send" class="submit_input">
									</td>
								</tr>
								
								
							</table>
						</form>
						</div>
					</div>

					<div class="block2">
						<a id="toggler2"><button class="content_button">contact us</button></a>
						
						<div class="block2_content">
							<img src="img/2.png" width="70%">

							<h1>Брендирование</h1>
							<p>Баннер с максимальным СR<br> 
							на первом экране<br> 
							пользователя.</p>

							<div class="separate"></div>
							<h2>Самый яркий и заметный формат<br>
								CPM: 45 - 75 рублей<br>
								CTR 1,2%<br>
								Более 300 млн. показов в месяц
							</h2>
						</div>
						<div id="box2" style="display: none;">

						<form action="index.php" method="post" name="cform" class="contact_form">
							<table>

								<tr>
									<td valign="top">
										<label for="email">Email Address *</label>
									</td>

									<td class="new_input" valign="top">
										<input  type="text" name="email" maxlength="80" size="30">
									</td>
								</tr>


								<tr>
									<td valign="top">
										<label for="comments">Comments *</label>
									</td>

									<td valign="top">
										<textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
									</td>
								</tr>


								<tr>
									<td colspan="2" style="text-align:center">
										<input type="submit" name="submit" value="Send" class="submit_input">
									</td>
								</tr>
								
								
							</table>
						</form>
						</div>
					</div>

					<div class="block3">
						<a id="toggler3"><button class="content_button">contact us</button></a>
						
						<div class="block3_content">
							<img src="img/3.png" width="70%">

							<h1>Баннеры</h1>
							<p>Огромный баннер, который<br> 
							со всех сторон обвязывает<br> 
							контент сайта.</p>

							<div class="separate"></div>
							<h2>CPM: 20 - 50 рублей<br>
								CTR 0,4%<br>
								Более 500 млн. показов в месяц<br>
								«Резиновый» формат в мобильной<br> версии
							</h2>
						</div>
						<div id="box3" style="display: none;">

							<form action="index.php" method="post" name="cform" class="contact_form" style="top: 2.2vw">
							<table>

								<tr>
									<td valign="top">
										<label for="email">Email Address *</label>
									</td>

									<td class="new_input" valign="top">
										<input  type="text" name="email" maxlength="80" size="30">
									</td>
								</tr>


								<tr>
									<td valign="top">
										<label for="comments">Comments *</label>
									</td>

									<td valign="top">
										<textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
									</td>
								</tr>


								<tr>
									<td colspan="2" style="text-align:center">
										<input type="submit" name="submit" value="Send" class="submit_input">
									</td>
								</tr>
								
								
							</table>
						</form>
						</div>
					</div>
				</div>
			</div>

			<div id="gallery">

				<div class="text_block"><p>нестандартные форматы</p></div>

				<div class="round_buttons">
					<button id="flip_1"></button>
					<button id="flip_2"></button>
					<button id="flip_3"></button>
				</div>

				<div class="first_gallery">

					<div class="block_1">
						<div class="information"><h1>Озвучка или<br> проблемы с доступом?</h1>
							<h2>Рекламная озвучка самых популярных<br> зарубежных киносериалов</h2>

							<ul>
								<li>Не блокируется AdBlock</li>
								<li>Вирусный охват</li>
								<li>Повышение уровня узнаваемости бренда</li>
							</ul>
						</div>
						<div class="image_block"><img src="img/picture1.png"></div>
					</div>
					
					<div class="block_2">
						<div class="information"><h1>Интеграция в<br> спортивные трансляции</h1>
							<h2>Формат, когда мы вшиваем рекламный<br> контент в онлайн-трансляции<br> спортивных событий.</h2>
						</div>
						<div class="image_block"><img src="img/picture2.png"></div>
					</div>
					
					<div class="block_3">
						<div><img src="img/picture3.png"></div>
					</div>
				</div>
			</div>

			<div id="gallery2">

				<div class="poster-main" id="carousel" data-setting='{"width":1000,"height":500,"posterWidth":600,"posterHeight":500,"scale":0.8,
					"speed":1000,"autoPlay":false,"delay":3000,"verticalAlign":"middle"}'> 
					<div class="poster-btn poster-prev-btn" id="prevv"></div> 

					<ul class="poster-list">
						<li class="poster-item"><a href="#"><img src="img/gallery/baion_1.png" alt="" width="100%" /></a></li>
						<li class="poster-item"><a href="#"><img src="img/gallery/auto_1.png" alt="" width="100%" /></a></li>
						<li class="poster-item"><a href="#"><img src="img/gallery/pizza_1.png" alt="" width="100%" /></a></li>
						<li class="poster-item"><a href="#"><img src="img/gallery/leon_1.png" alt="" width="100%" /></a></li> 
						<li class="poster-item"><a href="#"><img src="img/gallery/xbet_1.png" alt="" width="100%" /></a></li> 
						<li class="poster-item"><a href="#"><img src="img/gallery/fonbet_1.png" alt="" width="100%" /></a></li>
						<li class="poster-item"><a href="#"><img src="img/gallery/tinkoff_1.png" alt="" width="100%" /></a></li> 
					</ul> 

					<div class="poster-btn poster-next-btn" id="nextt"></div> 
				</div>
				
				<div class="case">КЕЙС</div>

				<div id="divv" class="baion">
				
					<div class="info_pos">
						<img src="img/keisi/baion.png">
						<p>Форматы:   Брендирование, баннеры<br>
						Охват:   7,1млн. уникальных юзеров<br>
						Цена контакта с ЦА:   0,3 рубля<br>
						Трафик на сайт: 152 785 переходов за месяц<br>
						CPC:   1,3 рубля<br>
						Увеличение кол-ва заказов на 12%<br></p>
					</div>
				</div>
				
				<div id="divv" class="tinkoff" style="display:none">
				
					<div class="info_pos">	
						<img src="img/keisi/tinkoff.png">

						<p>Охват:   8,5 млн. уникальных юзеров<br>
							Цена контакта с ЦА:   0,2 рубля<br>
							Досмотры ролика:   94%<br>
							CPV(стоимость просмотра):   0,3 рубля<br>
							Форматы:   Баннеры, брендирование,прероллы<br>
							Результат:   630 заявок на кредитную карту в месяц<br>
							Стоимость заявки:   уменьшилась на 27%  по сравнению<br>
							с другими платными каналами<br>
							Конверсия из заявки в выдачу:   24%<br>
						</p>
					</div>
				</div>
				
				<div id="divv" class="fonbet" style="display:none">
				
					<div class="info_pos">
						<img src="img/keisi/fonbet.png">
						<p>Форматы:   Баннеры, брендирование, прероллы<br>
						Результат:   4000 игроков в месяц<br>
						Стоимость игрока:   дешевле на 31% по сравнению<br> с другими платными каналами<br></p>
					</div>
				</div>
				
				<div id="divv" class="xbet" style="display:none">
				
					<div class="info_pos">
						<img src="img/keisi/1xbet.jpg">

						<p>Форматы:   Преролы<br>
						Охват:   7,1 млн. уникальных юзеров<br>
						Досмотры ролика: 93%<br>
						CPV:   0,17 рубля<br></p>
					</div>
				</div>
				
				<div id="divv" class="leon" style="display:none">
				
					<div class="info_pos">
						<img src="img/keisi/leon.jpg">

						<p>Форматы:   Баннеры, брендирование<br>
							Охват:   1,7 млн. уникальных юзеров<br>
							Цена контакта с ЦА:   0,08 рубля<br>
							Средний CTR:   1,3%<br>
						</p>
					</div>
				</div>
				
				<div id="divv" class="pizza" style="display:none">
				
					<div class="info_pos">
						<img src="img/keisi/domnios_pizza.png">
						
						<p>Форматы:   Баннеры, брендирование <br>
							Охват:   1,7 млн. уникальных юзеров<br>
							Цена контакта с ЦА:   0,18 рубля<br>
							Средний CTR:   1,3%<br>
							Трафика на сайт:   46 991 переход<br>
						</p>
					</div>
				</div>
				
				<div id="divv" class="auto" style="display:none">
				
					<div class="info_pos">
						<img src="img/keisi/autoru.png">

						<p>Форматы: <br>
							Преролл, баннеры, брендирование (мобайл)<br>
							Охват: <br>
							1,2 млн. уникальных юзеров <br>
							Цена контакта с ЦА:<br>
							0,15 рублей<br>
							Досмотры ролика:<br>
							88%<br>
							CPV (стоимость просмотра):   0,17 рубля<br>
						</p>
					</div>
				</div>

			</div>

			<!--second gallery text sliding-->
			<script>
				var $currDiv = $( ".baion" );
				$( "#nextt" ).click(function() {
				$currDiv  = $currDiv .next("");
				$( "div#divv" ).css( "display", "none" );
				$currDiv .fadeIn(400);
				$currDiv .css( "display", "block" );
				});

				$( "#prevv" ).click(function() {
				$currDiv  = $currDiv .prev();
				$( "div#divv" ).css( "display", "none" );
				$currDiv .fadeIn(400);
				$currDiv .css( "display", "block" );
				});
			</script>

			<div id="footer">
				<div class="footer_links">
					<div>
						<h3>Link Agency</h3>
						<p>Link объединил в рекламную сеть<br> 
							все крупнейшие онлайн-кинотеатры,<br> 
							спортивные и развлекательные<br> 
							ресурсы Рунета.
						</p>
					</div>
					
						<form action="index.php" method="post" name ="mailcontact">
    						<div>
								<h3>Contact Us:</h3>
								<p>Имя, фамилия:</p><input type="text" name="name_and_last" class="footer_input_">
								<p>Электронная почта:</p><input type="text" name="conemail" class="footer_input_">
								<input class="footer_button" type="submit" name="sentemail" value="subscribe"></input>
							</div>
						</form>
					<div>
						<h3>Content:</h3>

						<div class="flex2">
							<div class="padding">
								<ul>
									<li>Home</li>
									<li>О компании</li>
									<li>Аудитория</li>
									<li>Услуги</li>
								</ul>
							</div>

							<div class="padding">
								<ul>
									<li>Кейсы</li>
									<li>Контакты</li>
									<li>Партнеры</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="follow_us">
						<!-- <div class="flex2">
							<div class="followus"><h3>Follow us:</h3></div>



							<div class="socials">
								<div id="fb-root"></div>
								<a class="facebook-follow-button" href="https://facebook.com/" data-size="large"><img src="img/facebook.png" width="9px"></a>
								<a class="instagram-follow-button" href="https://www.instagram.com/" data-size="large"><img src="img/instagram.png" width="20px"></a>
								<a class="twitter-follow-button" href="https://twitter.com/" data-size="large"><img src="img/twitter.png" width="20px"></a>
							</div>
						</div> -->

						
						<form action="index.php" method="post" name ="subForm">
    						<input class="footer_input" type="text" name="email" placeholder="Ваш эмейл"></input><input class="footer_button" type="submit" name="sent" value="subscribe"></input>
						</form>

						

					</div>
				</div>
				
			</div>
		</div>
	</body>
</html>