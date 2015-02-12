<?php 
  ob_start();
  include 'core/init.php';
  include 'includes/overall/header.php'; 
logged_in_redirect();
?>

<?php

// required fields for register
if (empty($_POST) === false) {
    $required_fields = array('username', 'password', 'password_again', 'email');
    foreach ($_POST as $key=>$value) {
        if (empty($value) && in_array($key, $required_fields) === true) {
            $errors[] = 'Λείπουν πεδία';
            break 1;
        }
    }
    
    //username exists check
    if (empty($errors) === true) {
        if (user_exists($_POST['username']) === true) {
            $errors[] = 'Συγνώμη, το όνομα χρήστη \'' . $_POST['username'] . '\' χρησιμοποιήται.';
        }
    // elegxos check for spaces in username    
        if (preg_match("/\\s/", $_POST['username']) == true) {
           // $regular_expression = preg_match("/\\s/", $_POST['username']);
            //var_dump($regular_expression);
            $errors[] = 'Το όνομα χρήστη δεν πρέπει να περιέχει κενά.';
        }
        
    //megethos password check    
        if (strlen($_POST['password']) < 6) {
            $errors[] = 'Ο κωδικός πρέπει να περιέχει τουλάχιστον 6 χαρακτήρες.';
        }
    // password match check    
        if ($_POST['password'] !== $_POST['password_again']) {
            $errors[] = 'Οι κωδικόι δεν ταιριάζουν.';
        }
    // email validation check    
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'Πρέπει να δώσετε πραγματικό email.';
        }
    // email check if already exists    
        if (email_exists($_POST['email']) === true) {
            $errors[] = 'Συγνώμη, το email που δώσατε \'' . $_POST['email'] . '\' χρησιμοποιήται ήδη.';
        }
        
       //  if(empty($_POST['gender']) === true){
       // $errors[]= 'Πρέπει να διαλέξετε φύλο.';
       //  }
    }
}


//&& empty($_GET['success']) === false
if (isset($_GET['success']) === true ) {
    echo "<center><h3 style=color:white;>You have registered! Please, check your email to activate your account.</h3></center>";
} else {
        // if all fields are ok then perna ta dedomena 
if (empty($_POST) === false && empty($errors) === true) {
      $username = $_POST['username'];
	 // $today = date("Y-m-d H:i:s");
	  $logo_url = "img/profile_pic/$username.jpg";
	  $userstatus = "Hello People...";
	  $userabout = "Im a new user...";
	 // $checkbox = $_POST['terms'];
    $register_data = array( 
         'username'     => $_POST['username'],
         'password'     => $_POST['password'], 
       //  'first_name'   => $_POST['first_name'],
       //  'last_name'    => $_POST['last_name'],
       //  'gender'       => $_POST['gender'],
         'email'        => $_POST['email'],
		 'logo_url'     => $logo_url,
		 'status'     => $userstatus,
		 'about_me'     => $userabout,
         'email_code'   => md5($_POST['username'] + microtime())
		// 'DateMade' => $today
		
    );
    
    register_user($register_data);
	include 'includes/overall/footer.php';
    header('Location:register.php?success');
	
    exit;
   
    
      // else deikse errors
    } 

	else if (empty($errors) === false) {
        echo output_errors($errors);
    }

?>

<?php
}
include 'includes/overall/footer.php';
ob_end_clear();
?>
