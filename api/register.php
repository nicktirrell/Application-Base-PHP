<?php

require '../database.php';

//ensure email and password values are set
if(!empty($_POST['email']) && !empty($_POST['password'])):

	//query database to make sure email doesn't exist
	$records = $conn->prepare('SELECT * FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	//if email does exist, return erroe
	if($results):

		echo '0';

	else:

		// enter the new user in the databases
		$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':email', $_POST['email']);
		$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

		// if new user was entered into database
		if( $stmt->execute() ):
			
			echo '<div class="success">';
			echo '<p>Account created.</p>';
			echo '<div class="buttons">';
			echo '<a class="wide" href="/login">Log In</a>';
			echo '</div>';
			echo '</div>';

		else:

			echo '0';

		endif;

	endif;

else:

	echo '0';

endif;


?>