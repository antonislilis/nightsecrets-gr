

<?php
include 'core/functions/magazia.php';
/* 
 NEW.PHP
 Allows user to create a new entry in the database
*/
 
 // creates the new record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($name, $description, $notes, $category, $address, $perioxi, $email, $telephone, $logo, $main_photo, $url, $video ,$error)
 {
 ?>
 <?php
//include 'core/init.php';
include 'includes/overall/header.php';
?>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div class="container">'.$error.'</div>';
 }
 ?> 
 <div class="container">
 <form action="" method="post">
 <div>
 

 
 <div class="row">
	<div class="col-md-6">
			 <div class="row">
					<div class="form-group">
						<div class="col-md-10">
							<strong>Όνομα:</strong>
							<input type="text" value="" data-msg-required="Please enter name." maxlength="100" class="form-control" name="name" id="name">
						</div>
					</div>
			</div>
				
			<div class="row">
					<div class="form-group">
						<div class="col-md-10">
							<strong>Περιγραφή:</strong>
							<textarea value="" data-msg-required="Please enter name." rows="6" maxlength="1000" class="form-control" name="description" id="description"><?php echo $description; ?></textarea>
						</div>
					</div>
			</div>	


			<div class="row">
					<div class="form-group">
						<div class="col-md-10">
							<strong>Ετικέτα: (μέχρι 25 χαρακτήρες)</strong>
							<input type="text" value="" data-msg-required="Please enter note." maxlength="25" class="form-control" name="notes" id="notes">
						</div>
					</div>
			</div>	

			 <div class="row">
					<div class="form-group">
						<div class="col-md-10">
							<strong>Κατηγορία:</strong>
							<select data-msg-required="Please enter cat." class="form-control" name="category" id="category">
						<?php	$cats = getCategories();
						        foreach ($cats as $cat) :
						?>
						
						  
						    
						    <option value="<?php echo $cat['category']; ?>"> <?php echo $cat['name']; ?> </option>
					
							
						<?php endforeach ?>	
							</select>
						</div>
					</div>
			</div>

			 <div class="row">
					<div class="form-group">
						<div class="col-md-10">
							<strong>Οδός:</strong>
							<input type="text" value="" data-msg-required="Please enter add." maxlength="245" class="form-control" name="address" id="address">
						</div>
					</div>
			</div>

			 <div class="row">
					<div class="form-group">
						<div class="col-md-10">
							<strong>Περιοχή:</strong>
							<select data-msg-required="Please enter cat." class="form-control" name="perioxi" id="perioxi">
							<?php $cities = getCities();
							foreach ($cities as $city) { ?>

								<option value="<?php echo $city['perioxi'];?>">	<?php echo $city['perioxi'];?></option>	
							
								
						<?php } ?>
						</select>
						</div>
					</div>
			</div>
			
			<div class="row">
					<div class="form-group">
						<div class="col-md-10">
							<strong>Email:</strong>
							<input type="text" value="" data-msg-required="Please enter name." maxlength="100" class="form-control" name="email" id="email">
						</div>
					</div>
			</div>
			
			<div class="row">
					<div class="form-group">
						<div class="col-md-10">
							<strong>Τηλέφωνο:</strong>
							<input type="text" value="" data-msg-required="Please enter name." maxlength="100" class="form-control" name="telephone" id="telephone">
						</div>
					</div>
			</div>
	</div>
	
	<!-- Alli seira -->
	<div class="col-md-6">
	
	
		<div class="row">
			<div class="form-group">
				<div class="col-md-10">
					<strong>Logo:</strong>
					<input type="text" value="" data-msg-required="Please enter name." maxlength="245" class="form-control" name="logo" id="logo">
					<img class="img-thumbnail img-responsive" src="" width="250" />
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group">
				<div class="col-md-10">
					<strong>Κεντρική Φωτογραφία:</strong>
					<input type="text" value="" data-msg-required="Please enter name." maxlength="245" class="form-control" name="main_photo" id="main_photo">
					<img class="img-thumbnail img-responsive" src="" width="250" />
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group">
				<div class="col-md-10">
					<strong>Url:</strong>
					<input type="text" value="" data-msg-required="Please enter name." maxlength="245" class="form-control" name="url" id="url">
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group">
				<div class="col-md-10">
					<strong>Βίντεο:</strong>
					<textarea   rows="6" maxlength="1000" class="form-control" name="video" id="video"></textarea>
					
				</div>
			</div>
		</div>
		
		<p>* Required</p>
		 <div class="row">
			<div class="col-md-10">
				<input type="submit"  name="submit" value="Εντάξει" class="btn btn-primary btn-lg pull-right" data-loading-text="Loading...">
			</div>
		</div>
		
	</div>
</div>	
		
 
 </div>
 </form> 
 </div>
<?php include 'includes/overall/footer.php'; ?>
 <?php
 }
 
 
 

 // connect to the database
include('core/database/connect.php');
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
 $notes = mysql_real_escape_string(htmlspecialchars($_POST['notes']));
 $category = mysql_real_escape_string(htmlspecialchars($_POST['category']));
 $address = mysql_real_escape_string(htmlspecialchars($_POST['address']));
 $perioxi = mysql_real_escape_string(htmlspecialchars($_POST['perioxi']));
 $email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
 $telephone = mysql_real_escape_string(htmlspecialchars($_POST['telephone']));
 $logo = mysql_real_escape_string(htmlspecialchars($_POST['logo']));
 $main_photo = mysql_real_escape_string(htmlspecialchars($_POST['main_photo']));
 $url = mysql_real_escape_string(htmlspecialchars($_POST['url']));
 //$video = mysql_real_escape_string(htmlspecialchars($_POST['video']));
 $video = $_POST['video'];
 // check to make sure both fields are entered
 if ($name == '' || $description == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($name, $description, $notes, $category, $address, $perioxi, $email, $telephone, $logo, $main_photo, $url, $video ,$error);
 }
 else
 {
 // save the data to the database
 global $db;
$sql = "INSERT clients SET name='$name', description='$description', notes='$notes', category='$category',
				address='$address', perioxi='$perioxi', email='$email', telephone='$telephone',
				logo='$logo', main_photo='$main_photo', url='$url', video='$video'";
 $db->query($sql);
 // once saved, redirect back to the view page
 header("Location: view.php"); 
 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','','','','','','','','','','','');
 }
?>			