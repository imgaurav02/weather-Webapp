<?php
	$status ="";
	$msg ="";
	if(isset($_POST['submit'])){
		$city = $_POST['city'];
		$url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=4169f115b03b2bfc1523a4dd632a58b2";
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($result,true);
		if($result['cod']==200){

			$status ="yes";
		}
		else{
			$msg = $result['message'];
		}
	}

 
?>
<!DOCTYPE html>
<html>
<head>
<title>Gaurav Weather Report </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flatty Weather Report template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //Custom Theme files -->
<!-- web font -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!-- //web font -->
<!-- js -->   
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/skycons.js"></script> <!-- skycons-icons --> 	
<!-- //js -->  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
	<!-- w3ls-weather -->
	
	<div class="w3ls-weather">
		<h1>Gaurav Weather Report</h1>
		<form class="row g-3" method="post">

			<div class="col-auto">
				<input type="text" class="form-control" name="city" placeholder="Enter City">
			</div>
			<div class="col-auto">
				<button type="submit" name='submit' class="btn btn-primary mb-3">Submit</button>
			</div>
		</form>
		<?php if($status=="yes") { ?>
		<div class="w3ls-weather-agileinfo"> 
			<div class="weather-left">
				<div class="weather-left-text">
					<h4><?php echo $result['name'] ?></h4>
					<h5><?php echo date('l d F Y ',$result['dt']) ?></h5>
				</div>
				<ul class="report">
					<li><a href="#"><?php echo round($result['main']['temp']-273.15) ?> °C</li>
					
				</ul>
			</div>
			<div class="weather-right">
				<ul>
					<li>
						<figure class="icons">
							<img src="http://openweathermap.org/img/wn/<?php echo $result['weather'][0]['icon'] ?>@2x.png" width="60" height="60"></img>
						</figure>
						<h3><?php echo round($result['main']['temp']-273.15) ?> °C</h3>
						<div class="clear"></div>
					</li>
					<li>
						
						<div class="weather-text">
							<h4>WIND</h4>
							<h5><?php echo $result['wind']['speed'] ?> KM/H</h5>
						</div>
						<div class="clear"></div>
					</li>
					<li>
					
						<div class="weather-text">
							<h4></h4>
							<h5><?php echo $result['weather'][0]['main'] ?></h5>
						</div>
						<div class="clear"></div>
					</li>
					<li>

						<div class="weather-text">
							<h4>COUNTRY</h4>
							<h5><?php echo $result['sys']['country'] ?></h5>
						</div>
						<div class="clear"></div>
					</li>
				</ul>
				<script>
					 var icons = new Skycons({"color": "#fff"}),
						  list  = [
							"partly-cloudy-day"
						  ],
						  i;

					  for(i = list.length; i--; )
						icons.set(list[i], list[i]);
					  icons.play();
				</script>
				<script>
					 var icons = new Skycons({"color": "#fff"}),
						  list  = [
							"clear-night","partly-cloudy-night", "cloudy", "clear-day", "sleet", "snow", "wind","fog"
						  ],
						  i;

					  for(i = list.length; i--; )
						icons.set(list[i], list[i]);
					  icons.play();
				</script>
			</div>
			<div class="clear"></div>
		</div>  
	</div>	

	<?php } ?>
	<h1 color="white"><?php echo $msg?></h1>
</body>
</html>