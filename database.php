<?php

date_default_timezone_set("America/New_York");

$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'app_base';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}