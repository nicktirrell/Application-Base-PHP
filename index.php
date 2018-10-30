<?php

session_start();

require 'database.php';

//check if user is logged in
if( isset($_SESSION['user_id'] ) ){

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}

//if not, go to register
else {
	header("Location: /register");
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>App Base</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/styles/master.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">
</head>

<body class="fadeIn">
	<?php if( !empty($user) ): ?>

		<div class="form">

			<div class="logo">
				<a href="/"><img src="assets/images/placeholder-logo.png" /></a>
			</div>

			<div class="success">

				<p>Logged In!</p>

				<div class="buttons">
					<a class="wide" href="/logout">Log Out</a>
				</div>

			</div>
			
		</div>

	<?php endif; ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/index.js"></script>
</body>

</html>