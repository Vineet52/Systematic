<?php
  	session_start();
  	if(!isset($_SESSION['userID']))
  	{
   		header('location: login.php');
  	}
   	$name = $_SESSION['name'];
    $surname = $_SESSION['surname'];
    $userID = $_SESSION['userID'];
    $accessLevels = $_SESSION['accessLevel'];
?>