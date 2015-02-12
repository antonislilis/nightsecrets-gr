<?php 
include '../core/init.php';
protect_page();


switch ($_POST['Function'])
{

 case 'AddToFavourites':
  echo AddToFavourites();
  break;
  
  case 'RemoveFavourites':
  echo RemoveFavourites();
  break;
 
 case 'AddLike':
  echo AddLike();
  break; 
 
  case 'RemoveLike':
  echo RemoveLike();
  break; 
  
  case 'RemovePhoto':
  echo RemovePhoto();
  break;
  
  case 'SetProfilePhoto':
  echo SetProfilePhoto();
  break;
}





function AddToFavourites(){
	global $db;
	extract($_POST);	
	$qry = "INSERT IGNORE INTO `favourites` (user_id, client_id) VALUES ({$_SESSION['user_id']}, {$ClientID});";
	$db->query($qry);

	return json_encode(array('status'=>'ok','text'=>'Client added to favourites', 'newtext'=>'Αγαπημένο', 'Query'=>$qry));
}


function RemoveFavourites(){
	global $db;
	extract($_POST);	
	$qry = "DELETE FROM `favourites` WHERE user_id = {$_SESSION['user_id']} AND client_id = {$ClientID} LIMIT 1;";
	$db->query($qry);

	return json_encode(array('status'=>'ok','text'=>'Client removed from favourites', 'newtext'=>'Προσθήκη σε Αγαπημένα', 'Query'=>$qry));
}

function AddLike(){
	global $db;
	extract($_POST);	
	$qry = "INSERT IGNORE INTO `liked` (user_id, client_id) VALUES ({$_SESSION['user_id']}, {$ClientID});";
	$db->query($qry);
	$newlikes = getLikes($ClientID);

	return json_encode(array('status'=>'ok','text'=>'You Liked','newlikes'=> $newlikes ,'Query'=>$qry));
}


function RemoveLike(){
	global $db;
	extract($_POST);	
	$qry = "DELETE FROM `liked` WHERE user_id = {$_SESSION['user_id']} AND client_id = {$ClientID} LIMIT 1;";
	$db->query($qry);
	$newlikes = getLikes($ClientID);
	
	return json_encode(array('status'=>'ok','text'=>'You DisLiked','newlikes'=> $newlikes , 'Query'=>$qry));
}

function RemovePhoto(){
	global $db;
	extract($_POST);	
	$qry = "DELETE FROM `user_avatars` WHERE `avatars_id` = {$ActionID} LIMIT 1;";
	$db->query($qry);

	return json_encode(array('status'=>'ok','text'=>'Photo deleted', 'Query'=>$qry));
}

function SetProfilePhoto(){
	global $db;
	extract($_POST);	
	$qry = ("UPDATE `user_avatars` SET `active` = 0 WHERE `user_id` = {$_SESSION['user_id']}");
	$db->query($qry);
	$qry2 = ("UPDATE `user_avatars` SET `active` = 1 WHERE `avatars_id` = {$ActionID}");
	$db->query($qry2);
	
	return json_encode(array('status'=>'ok','text'=>'Photo Activated', 'Query'=>$qry, 'Query2'=>$qry2));
}




?>


