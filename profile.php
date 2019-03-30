<?php
session_start();
$email = "p@gmail.com";
include "config.php";
$displayProfile = "SELECT * from `user` WHERE `email` = '".$email."'";

if(!$displayProfileCheck = mysqli_query($conn,$displayProfile)){

	die("0");
}
$count = mysqli_num_rows($displayProfileCheck);

if($count == 0){
	
  
  die("1");
 }
$getProfile = mysqli_fetch_assoc($displayProfileCheck);

//Exercise recommendation
if($getProfile['bmi']>'15.0'){
	$bmi15= "1.Push Ups";
}
elseif($getProfile['bmi']>'15.0' && $$getProfile['bmi']<'15.5'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'15.5' && $$getProfile['bmi']<'16.0'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'16.0' && $$getProfile['bmi']<'16.5'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'16.5' && $$getProfile['bmi']<'17.0'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'17.0' && $$getProfile['bmi']<'17.5'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'17.0' && $$getProfile['bmi']<'17.5'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'17.5' && $$getProfile['bmi']<'18.0'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'18.0' && $$getProfile['bmi']<'18.5'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'18.5' && $$getProfile['bmi']<'19.0'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'19.0' && $$getProfile['bmi']<'19.5'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'19.5' && $$getProfile['bmi']<'20.0'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'20.0' && $$getProfile['bmi']<'20.5'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'20.5' && $$getProfile['bmi']<'21.0'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'21.0' && $$getProfile['bmi']<'21.5'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'21.5' && $$getProfile['bmi']<'22.0'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'22.0' && $$getProfile['bmi']<'22.5'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'22.5' && $$getProfile['bmi']<'23.0'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'23.0' && $$getProfile['bmi']<'23.5'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'23.5' && $$getProfile['bmi']<'24.0'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'24.0' && $$getProfile['bmi']<'24.5'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'24.5' && $$getProfile['bmi']<'25.0'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'25.0' && $$getProfile['bmi']<'25.5'){
	echo "Avoid Cardio";
}
elseif($getProfile['bmi']>'25.5' && $$getProfile['bmi']<'30.0'){
	echo "Avoid Cardio";
}
else{
	echo "Avoid Cardio";
}


?>
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>FoodPal</title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css'>
	<!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Kaushan+Script" rel="stylesheet">
	<style type="text/css">
		
	</style>

</head>

<body style="background-color: white;">
	<nav style="background-color: WHITE;">
		<div class="nav-wrapper">
			<a href="#" class="brand-logo"><img src="img/logo.png" height="60" width="180" style="padding: 10px;"></a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="sass.html">Sass</a></li>
				<li><a href="badges.html">Components</a></li>
				<li><a href="collapsible.html">JavaScript</a></li>
			</ul>
		</div>
	</nav>
	<br/>
	<div class="container">
		

		<div class="card">

<br/>
			<div class="row">
				<div class="col s9 offset-s2 l3 offset-l2">
					<img src="img/anonymous.png" style="width:200px;height:200px;border: 5px solid #e1e8f0; border-radius: 50%;text-align: center; display: block;
					margin-left: auto;
					margin-right: auto;
					">
					<br/>	
				</div>

				<div class="col s9 offset-s2 l6" style="font-family: 'Alfa Slab One', cursive;color: #658588;">
					<div class="row">
						<div class="col s12" style="font-size: 2rem;padding-bottom: 0px;">
							<?php echo $getProfile['name']; ?>
							<hr/ style="margin-bottom: 0px;">
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">mail_outline</i> Email: 
						</div>
						<div class="col s6">
							<?php echo $getProfile['email']; ?>
						</div>
					</div>
					<div class="row">
						
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">accessible_forward</i> Age:: 
						</div>
						<div class="col s6">
							<?php echo $getProfile['age'] .' years'; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">wc</i>
							Gender:
						</div>
						<div class="col s6">
							<?php echo $getProfile['gender']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">vertical_split</i>
							Height:
						</div>
						<div class="col s6">
							<?php echo $getProfile['height']. ' cms'; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">accessibility</i>
							Current Weight:
						</div>
						<div class="col s6">
							<?php echo $getProfile['weight']. ' kgs'; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">directions_run</i>
							Daily Activity:
						</div>
						<div class="col s6">
							<?php echo $getProfile['daily_activity']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">local_hospital</i>
							Medical Conditions:
						</div>
						<div class="col s6">
							<?php echo $getProfile['medical_conditions']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">location_on</i>
							Location:
						</div>
						<div class="col s6">
							<?php echo $getProfile['location']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">transfer_within_a_station</i>
							BMI:
						</div>
						<div class="col s6">
							<?php echo $getProfile['bmi']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col s6" style="color: #e62739">
							<i class="material-icons left">done_all</i>
							Goal Weight:
						</div>
						<div class="col s6">
							<?php echo $getProfile['ideal_weight'].' kgs'; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	


	
<script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>
</body>
</html>
