<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'clients' table
*/

 // connect to the database
 include('core/database/connect.php');
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 global $db;
$sql = "DELETE FROM clients WHERE client_id=$id";
$db->query($sql); 
 
 // redirect back to the view page
 header("Location: view.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: view.php");
 }
 
?>			