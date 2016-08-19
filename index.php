<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Encryption and decryption by cipher of caesar.</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>	
	<script type="text/javascript" src="assets/js/angular.min.js"></script>
	 <!--Load the AJAX API-->
	<script type="text/javascript" src="assets/js/charts/loader.js"></script>

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	
	<script type="text/javascript" src="assets/js/script.js"></script>


</head>
<body ng-app>
<?php
	include('assets/includes/nav.php');
?>

<div class="container">
	<div class="row">

		<?php
			include('assets/includes/main.php');
		?>

		<?php
			include('assets/includes/freqDiagram.php');
		?>

		<?php
			include('assets/includes/answer.php');
		?>

	</div>
</div>

<?php
	include('assets/includes/footer.php');
?>

</body>
</html>