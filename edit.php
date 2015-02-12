

<?php
include 'core/functions/magazia.php';
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($id, $name, $description, $notes, $category, $address, $perioxi, $email, $telephone, $logo, $main_photo, $url, $video        ,$error)
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
  <input type="hidden" name="id" value="<?php echo $id; ?>"/>
   <div>
 
    <p><strong>ClinetID: <?php echo $id; ?></p></strong>
 
	<div class="row">
		<div class="col-md-6">
			 <div class="row">
				<div class="form-group">
					<div class="col-md-10">
						<strong>Όνομα:</strong>
						<input type="text" value="<?php echo $name; ?>" data-msg-required="Please enter name." maxlength="100" class="form-control" name="name" id="name">
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
						<input type="text" value="<?php echo $notes; ?>" data-msg-required="Please enter note." maxlength="25" class="form-control" name="notes" id="notes">
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
					
					   <?php if ($cat['category'] == $category) { ?>
						<option value="<?php echo $cat['category']; ?>" selected> <?php echo $cat['name']; ?> </option>
					   <?php } else { ?>
						<option value="<?php echo $cat['category']; ?>"> <?php echo $cat['name']; ?> </option>
					   <?php } ?>
						
					<?php endforeach ?>	
						</select>
					</div>
				</div>
			</div>

			 <div class="row">
				<div class="form-group">
					<div class="col-md-10">
						<strong>Οδός:</strong>
						<input type="text" value="<?php echo $address; ?>" data-msg-required="Please enter add." maxlength="245" class="form-control" name="address" id="address">
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
						
						<?php if ($city['perioxi'] == $perioxi) {?>
							<option value="<?php echo $city['perioxi'];?>" selected><?php echo $city['perioxi'];?></option>	
						<?php } else { ?>
							<option value="<?php echo $city['perioxi'];?>">	<?php echo $city['perioxi'];?></option>	
						<?php } ?>
							
					<?php } ?>
					</select>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group">
					<div class="col-md-10">
						<strong>Email:</strong>
						<input type="text" value="<?php echo $email; ?>" data-msg-required="Please enter name." maxlength="100" class="form-control" name="email" id="email">
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="form-group">
					<div class="col-md-10">
						<strong>Τηλέφωνο:</strong>
						<input type="text" value="<?php echo $telephone; ?>" data-msg-required="Please enter name." maxlength="100" class="form-control" name="telephone" id="telephone">
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
						<input type="text" value="<?php echo $logo; ?>" data-msg-required="Please enter name." maxlength="245" class="form-control" name="logo" id="logo">
						<img class="img-thumbnail img-responsive" src="<?php echo $logo; ?>" width="250" />
					</div>
				</div>
			</div>		
			<div class="row">
				<div class="form-group">
					<div class="col-md-10">
						<strong>Κεντρική Φωτογραφία:</strong>
						<input type="text" value="<?php echo $main_photo; ?>" data-msg-required="Please enter name." maxlength="245" class="form-control" name="main_photo" id="main_photo">
						<img class="img-thumbnail img-responsive" src="<?php echo $main_photo; ?>" width="250" />
					</div>
				</div>
			</div>		
			<div class="row">
				<div class="form-group">
					<div class="col-md-10">
						<strong>Url:</strong>
						<input type="text" value="<?php echo $url; ?>" data-msg-required="Please enter name." maxlength="245" class="form-control" name="url" id="url">
					</div>
				</div>
			</div>		
			<div class="row">
				<div class="form-group">
					<div class="col-md-10">
						<strong>Βίντεο:</strong>
						<textarea   rows="6" maxlength="1000" class="form-control" name="video" id="video"><?php echo $video; ?></textarea>
						
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
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid
 $id = $_POST['id'];
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
 // check that name/description fields are both filled in
 if ($name == '' || $description == '' || $category == '' || $address == '' || $perioxi == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($id, $name, $description, $notes, $category, $address, $perioxi, $email, $telephone, $logo, $main_photo, $url, $video      ,$error);
 }
 else
 {
 // save the data to the database
 global $db;
$sql = "UPDATE clients SET name='$name', description='$description', notes='$notes', category='$category',
				address='$address', perioxi='$perioxi', email='$email', telephone='$telephone',
				logo='$logo', main_photo='$main_photo', url='$url', video='$video'
 
 WHERE client_id='$id'";
$db->query($sql);
 
 // once saved, redirect back to the view page
 header("Location: view.php"); 
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
 $id = $_GET['id'];
 $result = mysql_query("SELECT * FROM clients WHERE client_id=$id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $name = $row['name'];
 $description = $row['description'];
 $notes = $row['notes'];
 $category = $row['category'];
 $address = $row['address'];
 $perioxi = $row['perioxi'];
 $email = $row['email'];
 $telephone = $row['telephone'];
 $logo = $row['logo'];
 $main_photo = $row['main_photo'];
 $url = $row['url'];
 $video = $row['video'];
 
 // show form
 renderForm($id, $name, $description, $notes, $category, $address, $perioxi, $email, $telephone, $logo, $main_photo, $url, $video   ,'');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>			