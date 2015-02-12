<?php 
//epanafora username kai apostoli neou password mesw email
include 'core/init.php';
logged_in_redirect();
include 'includes/overall/header.php';
?>
<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Επαναφορά</h2>
			</div>
		</div>
	</div>
</section>

<div class="container">
<?php
if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
?>
    <p>Ευχαριστούμε, σας έχουμε στείλει email</p>
<?php
} else {
$mode_allowed = array ('username', 'password');
 if (isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
    if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
        if (email_exists($_POST['email']) === true) {
         //kalei thn recover apo to users.php wste na steilei to email
		 recover($_GET['mode'], $_POST['email']);
         header('Location: recover.php?success');
         exit();
      } else {
          echo '<p>Συγνώμη, δεν βρήκαμε αυτό το email</p>';
      }
 }
 ?>
	<div class="col-xs-4">
		<form class="form-horizontal" role="form" action="" method="post">
			<label for="email">  Παρακαλούμε δώστε το email σας:</label>
		   
			<input type="text"  class="form-control" placeholder="Δώστε email" name="email"><br>
			<input type="submit"  class="btn btn-primary btn-lg" value="Επαναφορά"><br>
		</form>	
    </div>

<?php
 } else {
     header('Location: index.php');
     exit();
 }
}
?>
</div>      
<?php include 'includes/overall/footer.php'; ?>