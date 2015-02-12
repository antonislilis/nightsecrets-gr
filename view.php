<?php
include 'core/init.php';
include 'includes/overall/header.php';
?>
<div role="main" class="main" style="overflow:auto;">
<?php
/* 
	VIEW.PHP
	Displays all data from 'clients' table
*/
	global $db;
	$sql = "SELECT * FROM clients";
	$query = $db->query($sql); 
	?> 
		<section class="page-top">
			<div class="container">
			
				<div class="row">
					<div class="col-md-12">
						<h2>Ο πίνακας των Client</h2>
					</div>
				</div>
			</div>
		</section>
	<?php
	echo "<table class='table table-striped' border='1' cellpadding='10'>";
	echo "<tr> 
	<th>ID</th> 
	<th>Όνομα</th> 
	<th>Περιγραφή</th> 
	<th>Είδος</th> 
	<th>Κατηγορία</th> 
	<th>Διεύθυνση</th> 
	<th>Περιοχή</th>  
	<th>Logo</th>
	<th>Κύρια Φωτογραφία</th>  
	<th>Email</th>  
	<th>Τηλέφωνο</th>
	<th>Url</th>
	<th>Βίντεο</th>
	<th>Επεξεργασία</th>
	<th>Διαγραφή</th>	
	</tr>";

	// loop through results of database query, displaying them in the table
	while($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>	
		<tr>
			 <td> <?php echo $row['client_id']; ?></td>
			 <td> <strong><?php echo $row['name']; ?></strong> </td>
			 <td> <?php echo custom_echo(90,$row['description']); ?>   </td>
			 <td> <?php echo $row['notes']; ?>   </td>
			 <td> <?php echo $row['category']; ?>   </td>
			 <td> <?php echo $row['address']; ?>   </td>
			 <td> <?php echo $row['perioxi']; ?>   </td>
			 <td><img src=" <?php echo $row['logo']; ?>    " width="150" height="100"/></td>
			 <td><img src=" <?php echo $row['main_photo']; ?>    " width="150" height="100"/></td>
			 <td> <?php echo custom_echo(15,$row['email']); ?>   </td>
			 <td> <?php echo $row['telephone']; ?>   </td>
			 <td> <?php echo custom_echo(15,$row['url']); ?>   </td>
			 <td><?php echo custom_echo(10,"Δείτε μέσα"); ?>  </td>
			 <td><a href="edit.php?id=<?php  echo $row['client_id']; ?>  ">Επεξεργασία</a></td>
			 <td><a href="delete.php?id= <?php echo $row['client_id']; ?>   ">Διαγραφή</a></td>
		 </tr>
	<?php } ?>
	 </table>
<center><p><a href="new.php" class="btn btn-lg btn-primary">Νέα Εγγραφή</a></p></center>
</div>
<?php include 'includes/overall/footer.php'; ?>