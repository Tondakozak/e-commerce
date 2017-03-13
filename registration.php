<?php
//require common functions
require "common.php";

// if the registration form was sent
if (isset($_POST["email"])) {
	//connect to database
	$collection = (new MongoDB\Client)->ecomerce->users;

	//Convert to PHP array
	$username = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	$passwordagain = filter_input(INPUT_POST, 'password_again', FILTER_SANITIZE_STRING);
	$dataArray = [ 
	   "name" => trim($username),
	   "email" => strtolower(trim($email)),
	   "password" => trim($password),
	   "passwordagain" => trim($passwordagain),
	   ];

	// check if the inputs are filled in
	$error = false;
	if (empty($dataArray["name"])) {
		$error = true;
		$_SESSION["message"]["error"][] = "Name Required";
	}
	   
	if (empty($dataArray["email"])) {
		$error = true;
		$_SESSION["message"]["error"][] = "Email Required";
	}
	else {
	    // check if the email doesn't exists in DB
	    $document = $collection->findOne(['email' => $dataArray['email']]);
		if ($document != null) {
			$error = true;
			$_SESSION["message"]["error"][] = "Email Already in Our Database, Choose Another Email Address";
		}
	}
	 if (empty($dataArray["password"])) {
		$error = true;
		$_SESSION["message"]["error"][] = "Password Required";
	}
	  
	 if (empty($dataArray["passwordagain"])) {
		$error = true;
		$_SESSION["message"]["error"][] = "Password Again Required";
	}
	if (($dataArray["passwordagain"] != $dataArray["password"])) {
		$error = true;
		$_SESSION["message"]["error"][] = "Password Does Not Match";
	}

	// if the input is correct
	if (!$error) {
	    // hash the password
		$dataArray['password'] = password_hash($dataArray['password'], 1);
		unset($dataArray ['passwordagain']); // delete password again
		$dataArray ['role'] = "customer"; // add role

		// Add new users to the database
		$returnVal = $collection->insertOne($dataArray); 

		$_SESSION["message"]["success"][] = "YOU are registered";

	
	}

}

generate_header("Registration");

// show form
include'src/view/registration_form.php';
registration_form();


generate_footer();

