<?php 
ob_start();
include 'core/init.php';
protect_page();

if (empty($_POST) === false) {
    $required_fields = array('current_password', 'password', 'password_again');
    foreach ($_POST as $key=>$value) {
        if (empty($value) && in_array($key, $required_fields) === true) {
            $errors[] = 'Τα πεδία με αστερίσκο είναι απαραίτητα';
            break 1;
        }
    }
    // check if current password = my old password
    if (md5($_POST['current_password'])  === $user_data['password']) {
       if (trim($_POST['password']) !== trim($_POST['password_again'])) {
           $errors[] = 'Οι δύο νέοι κωδικόι δεν είναι ίδιοι';
       } else if(strlen($_POST['password']) < 6) {
             $errors[] = 'Ο κωδικός πρέπει να περιέχει το λιγότερο 6 χαρακτήρες';   
       }  
    } else {
        $errors[] = 'Ο τωρινός σας κωδικός είναι λάθος';
    }
  
}

include 'includes/overall/header.php';
?>
<div role="main" class="main">
	<section class="page-top">
		<div class="container">
		
			<div class="row">
				<div class="col-md-12">
					<h2>Αλλαγή Κωδικού</h2>
				</div>
			</div>
		</div>
	</section>

<div class="container">
    

      
      
<?php
      // Gia na deixnei ta sfalmata sto header
 if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
       echo 'Ο κωδικός σας άλλαξε επιτυχώς!';
 } else {  
     if (isset($_GET['force']) === true && empty($_GET['force']) === true) {
      ?>
      <p>Πρέπει να αλλάξετε τον κωδικό σας αφού το ζητήσατε</p>
      <?php 
     }    
     if (empty($_POST) === false && empty($errors) === true ) {
        change_password($session_user_id, $_POST['password'] );
        echo 'Ο κωδικός σας άλλαξε επιτυχώς!';
        header('Location: changepassword.php?success');
     }  else if (empty($errors) === false) {
          echo output_errors($errors);
        }
 ?>
      
	<div align="center">
	  <form class="form-horizontal" role="form" action="" method="post">
		 <div class="col-xs-3">
			<label for="current_password"> Υπάρχον κωδικός</label>
            <input type="password" class="form-control" id="password" placeholder="Δώστε υπάρχον κωδικό" name="current_password">
            <br>
                 
            <label for="password"> Νέος κωδικός</label>
            <input type="password" class="form-control" id="password" placeholder="Δώστε νέο κωδικό"  name="password">
            <br>
              
            <label for="password_again"> Επιβεβαίωση νέου κωδικου</label>
            <input type="password" class="form-control" id="password" placeholder="Επιβεβαιώστε νέο κωδικό"  name="password_again">
            <br>
               
            <input type="submit" class="btn btn-primary btn-lg" value="Αλλαγή"></button>
    
         </div>    
      </form>
	</div>
  </div>
</div>
<?php
 }
include 'includes/overall/footer.php'; 
ob_end_clear();
?>