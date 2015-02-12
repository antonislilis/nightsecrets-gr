<?php
  ob_start();
include 'core/init.php';
include 'includes/overall/header.php';
?>	
<div role="main" class="main">
	<section class="page-top">
		<div class="container">
		
			<div class="row">
				<div class="col-md-12">
					<h2>Σύνδεση - Εγγραφή</h2>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row featured-boxes login">
					<div class="col-md-6">
						<div class="featured-box featured-box-secundary default info-content">
							<div class="box-content">
								<h4>Είμαι υπάρχων χρήστης</h4>
								<form action="" id="" type="post" method="POST">
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Όνομα Χρήστη ή Διεύθυνση E-mail</label>
												<input type="text" value="" class="form-control" name="login_username">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Κωδικός</label>
												<input type="password" value="" class="form-control" name="login_password">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<span class="remember-box checkbox">
												<label for="rememberme">
													<input type="checkbox" id="rememberme" name="rememberme">Θυμήσου με
												</label>
											</span>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-6">
											Ξεχάσατε <a href="recover.php?mode=username">όνομα χρήστη</a> ή <a href="recover.php?mode=password">κωδικό</a>?
										</div>
									
										<div class="col-md-6">
											<input type="submit" name="login" id="login" value="Σύνδεση" class="btn btn-primary pull-right push-bottom" data-loading-text="Φόρτωση...">
										</div>
									</div>
								</form>
								<?php
								if (isset($_POST["login"])) {
								if (empty($_POST['login_username']) === false || empty($_POST['login_password']) === false) {
								$username = $_POST['login_username'];
								$password = $_POST['login_password'];

								if(empty($username) === true || empty($password) === true){
								$errors[]= 'Πρέπει να δώσετε όνομα χρήστη ΚΑΙ κωδικό';
								} else if (user_exists($username) === false){
								 $errors[]= 'Λάθος όνομα χρήστη';
								} else if (user_active($username) === false) {
								$errors[] = 'Δεν έχετε ενεργοποιήσει ακόμα τον λογαριασμό σας!';
								} else {

								if (strlen($password) > 32) {
								$errors[] = 'Μεγάλος κωδικός';
								}

								$login = login($username, $password);
								if ($login === false) {
								$errors[] = 'Ο συνδυασμός χρήστη/κωδικού είναι λανθασμένος';
								}
								else {
								$_SESSION['user_id'] = $login;
								header('Location: index.php');
								exit();   
								}         
								}
								if (empty($errors) === false) {
								echo output_errors($errors); 
								}
								else {
								$errors[] = 'No data received';                           //6
								}
								} 
								else { echo "Πρέπει να συμπληρώσετε τα πεδία";}
								} 
								?>											
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="featured-box featured-box-secundary default info-content">
							<div class="box-content">
								<h4>Κάντε νέα εγγραφή</h4>
								<form action="" id="" type="post" method="POST">
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Όνομα Χρήστη</label>
												<input type="text" value="" class="form-control" name="username">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Διεύθυνση E-mail</label>
												<input type="text" value="" class="form-control" name="email">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-6">
												<label>Κωδικός</label>
												<input type="password" value="" class="form-control" name="password">
											</div>
											<div class="col-md-6">
												<label>Κωδικός Ξανά</label>
												<input type="password" value="" class="form-control" name="password_again">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input type="submit" value="Εγγραφή" name="register" id="register" class="btn btn-primary pull-right push-bottom" data-loading-text="Φόρτωση...">
										</div>
									</div>
								</form>
								<?php
								if (isset($_POST["register"])) {
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
								header('Location:page-login.php?success');

								exit();

								// else deikse errors
								} 

								else if (empty($errors) === false) {
								echo output_errors($errors);
								}

								}else{  
								if (isset($_GET['success']) === true ) {
								echo "<center><p>Εγγραφήκατε επιτυχώς. Ελέγξτε το email σας για να ενεργοποιήσετε τον λογαριασμό σας.</p></center>";
								}
								}
								?>
							</div> <!-- box content -->
						</div>
					</div> <!-- md6 -->
				</div> <!-- row features boxes -->
			</div> <!-- md12 line 19 -->
		</div> <!-- row line 18 -->
	</div> <!-- container -->
</div> <!-- main -->
<?php include 'includes/overall/footer.php';
	ob_end_clear();
?>	