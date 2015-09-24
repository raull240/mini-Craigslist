<?php
session_start();

//error_reporting(0);
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
require 'database/connect.php';
require 'functions/users.php';
require 'functions/general.php';
if(logged_in()===true)
{
$session_user_id = $_SESSION['user_id'];
$user_data = user_data($session_user_id,'UID','FirstName','LastName','Email','Password','PhoneNo','Address','UserType');
}
$errors=array();

?>