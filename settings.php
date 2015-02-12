<?php 
ob_start();
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';
?>
<div role="main" class="main">
	<section class="page-top">
		<div class="container">
		
			<div class="row">
				<div class="col-md-12">
					<h2>Ρυθμίσεις</h2>
				</div>
			</div>
		</div>
	</section>	
	<div class="container">
		<?php
		if (empty($_POST) === false) {
			$required_fields = array( 'email');
			foreach ($_POST as $key=>$value) {
				if (empty($value) && in_array($key, $required_fields) === true) {
					$errors[] = 'Τα πεδία με αστερίσκο είναι απαραίτητα';
					break 1;
				}
			}		
			if (empty($errors) === true) {
				if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
					$errors[] = 'Χρειάζεται ένα πραγματικό email';
				} else if (email_exists($_POST['email']) === true && $user_data['email'] !== $_POST['email']) {
					 $errors[] = 'Συγνώμη, αυτό το email \'' . $_POST['email'] . '\' χρησιμοποιήται ήδη.';
				}		
			}
		}
		?>
		<div class="row">
			<div  class="col-xs-4">
				<form class="form-horizontal" role="form" action="" method="post">   
				<p>Το τωρινό σας email είναι: </p>
				<input class="form-control" type="text" name="email" value="<?php echo $user_data['email']; ?>">
			</div>
		  
			<div  class="col-xs-4">
			<br><br>
					<input type="submit" class="btn btn-primary btn-lg"  value="Αλλαγή Email"></button> 
				   </form>			
			</div>

			<div  class="col-xs-4">
			<br><br>
				<form method="get" action="changepassword.php">
				 <button type="submit" class="btn btn-primary btn-lg">Αλλαγή Κωδικού</button>
				</form>
		   </div>
		</div>

		<?php
		if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
		  echo 'Τα στοιχεία σας άλλαξαν επιτυχώς!';
		} else {
			if (empty($_POST) === false && empty($errors) === true) {
				$update_data = array(
				  'email' => $_POST['email'], 
				);
				update_user($session_user_id, $update_data);
				echo 'Τα στοιχεία σας άλλαξαν επιτυχώς!';
				header('Location: settings.php?success');
				exit();	
			} else if (empty($errors) === false) {
				echo output_errors($errors);
			}
		}
		?>
	</div> <!-- container -->
</div> <!-- main -->
<?php
include 'includes/overall/footer.php';
ob_end_clear(); ?>