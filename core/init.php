<?php
session_start();
error_reporting(0);
require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';
require 'functions/magazia.php';

$current_file = explode('/', $_SERVER['SCRIPT_NAME']);
$current_file = end($current_file);

// kalw thn user_data functions sto users.php gia na parw ta stoixeia tou xrhsth apo to mysql
if (logged_in() === true) {
    $session_user_id =  $_SESSION['user_id'];   
	// ftiaxnw ton pinaka me ta stoixeia tou syndedemenou xristi
    $user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'email', 'status', 'about_me', 'logo_url');
    if (user_active($user_data['username']) === false) {
        session_destroy();
        header('Location: index.php');
        exit();
      }
      if ($current_file !== 'changepassword.php'  && $user_data['password_recover'] == 1) {
          header('Location: changepassword.php?force');
          exit();
      }
}
//dimiourgw ton pinaka gia ta errors
$errors = array();
?>