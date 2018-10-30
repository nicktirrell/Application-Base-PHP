<?php

session_start();

require '../database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	//get user details from db
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	//if user exists, compare supplied pass with db pass
	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ):

		echo $results['id'];
		//set session cookie
		$_SESSION['user_id'] = $results['id'];
		echo '1';

	else:

		echo '0';

	endif;

else:

	echo '0';

endif;

?>