<?php
    session_start();
    
    if( isset($_SESSION['user_id']) ){
        header("Location: /");
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

    <div class="form">

        <div class="logo">
            <a href="/"><img src="assets/images/placeholder-logo.png" /></a>
        </div>

        <p class="title">Create an account</p>
        <p class="description">No vis cibo fabulas, falli explicari mei an. Eius porro mentitum te vim, per probatus iudicabit. Eu eos elit atomorum.</p>
        <?php include('partials/register.php') ?>
        <p class="disclaim">Movet delicata qualisque cu quo. In vim admodum maluisset, nec causae.</p>
        
    </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/index.js"></script>
</body>

</html>