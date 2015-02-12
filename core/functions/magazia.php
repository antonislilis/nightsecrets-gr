<?php
function getClients(){
	global $db;
	$sql = "SELECT * FROM clients";
	$query = $db->query($sql);
	// var_dump($stmt);
	// exit();
	return $query->fetchAll(PDO::FETCH_ASSOC);
	
}

function client_id_from_name($name) {
	global $db;
	$sql = "SELECT `client_id` FROM `clients` WHERE `name` = ?";
	$query = $db->prepare($sql);
	$params = array($name);
	$query->execute($params);
	$row = $query->fetch(PDO::FETCH_ASSOC);
	return $row['client_id'];
}

function getClientsByCategory($category){
	global $db;
	$sql = "SELECT * FROM clients where category = ? ORDER BY RAND() LIMIT 4";
	$query = $db->prepare($sql);
	$params = array($category);
	$query->execute($params);
	$row = $query->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}

// gia to location_results.php
function getClientsByLocation($location){
	global $db;
	$sql = "SELECT * FROM clients where perioxi = '$location' ORDER BY name";
	$query = $db->prepare($sql);
	$params = array($location);
	$query->execute($params);
	$row = $query->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}

// gia ton header sto menu perioxi
function getLocations($location){
	global $db;
	$sql = "SELECT * FROM `polymesa`.`locations` WHERE proastia = '$location' ORDER BY perioxi;";
	$query = $db->prepare($sql);
	$params = array($location);
	$query->execute($params);
	$row = $query->fetchAll(PDO::FETCH_ASSOC);
	return $row;	
}


function getCities(){
	global $db;
	$sql = "SELECT `perioxi` FROM `locations` ORDER BY `perioxi`";
	$query = $db->query($sql);
	$row = $query->fetchAll(PDO::FETCH_ASSOC);
	return $row;	 
}


// gia thn anazitisi 
function getClientsBySearch($search){
	global $db;
	$sql = "SELECT * FROM clients where `notes` LIKE :search OR `perioxi` = :search OR `name` LIKE :search OR `email` = :search OR `telephone` = :search ORDER BY name";
	$query = $db->prepare($sql);
	$params = array('search'=>$search);
	$query->execute($params);
	$row = $query->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}

// gia to client_details.php
function getLikes($client_id) {
		global $db;
		$sql = "SELECT COUNT(*) FROM `liked` WHERE `client_id` = ?";
		$query = $db->prepare($sql);
		$params = array($client_id);
		$query->execute($params);
		$row = $query->fetch(PDO::FETCH_ASSOC);
		$size = $row['COUNT(*)'];
	return ($size);
}

// gia to client_details.php
function iLiked($client_id) {
	 global $db;
	 $user = $_SESSION['user_id'];
		$sql = "SELECT COUNT(*) FROM `liked` WHERE `user_id` = ? AND `client_id` = ?";
		$query = $db->prepare($sql);
		$params = array($user, $client_id);
		$query->execute($params);
		$row = $query->fetch(PDO::FETCH_ASSOC);
		$size = $row['COUNT(*)'];
	return ($size);
}

// gia to client_details.php
function iFavourite($client_id) {
		global $db;
		$user = $_SESSION['user_id'];
		$sql = "SELECT COUNT(*) FROM `favourites` WHERE `user_id` = ? AND `client_id` = ?";
		$query = $db->prepare($sql);
		$params = array($user, $client_id);
		$query->execute($params);
		$row = $query->fetch(PDO::FETCH_ASSOC);
		$size = $row['COUNT(*)'];
	return ($size);
}

// gia na parw ta dedomena tou client mesw id
function client_data($client_id) {
    global $db;    
    $func_num_args = func_num_args();
    $func_get_args = func_get_args();
    
    if ($func_num_args > 1) {
        unset($func_get_args[0]);
        
        $fields = '`' . implode('`, `', $func_get_args) . '`';
        $sql = "SELECT $fields FROM `clients` WHERE `client_id` = ?";
		$query = $db->prepare($sql);
		$params = array($client_id);
		$query->execute($params);
		$row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}

// custom echo me to megethos char pou dinw sto $size
function custom_echo($size,$x){
  if(strlen($x)<=$size)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$size) . '...';
    echo $y;
  }
}


function getCategories(){
	global $db;  
	$sql = "SELECT * FROM categories ORDER by name";
	$query = $db->query($sql);
	$row = $query->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}

// gia ta agapimena magazia tou ekastote session user
function getMyFavourites(){
	global $db;
    $user_id = $_SESSION['user_id'];
	$sql = "
	SELECT * FROM clients WHERE client_id IN 
	(SELECT client_id FROM favourites where user_id= ?)	
	";
	$query = $db->prepare($sql);
	$params = array($user_id);
	$query->execute($params);
	$row = $query->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}


function ClientByName($name){
	global $db;
	$sql =("SELECT * FROM `magazia` WHERE `name` = '$name' ORDER by likes");
	$query = $db->prepare($sql);
	$params = array($name);
	$query->execute($params);
	$row = $query->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}


function upload($file_id, $folder="", $types="") {
    if(!$_FILES[$file_id]['name']) return array('','No file specified');
	
    $file_title = $_FILES[$file_id]['name'];
    //Kanw get to file extension
    $ext_arr = split("\.",basename($file_title));
    $ext = strtolower($ext_arr[count($ext_arr)-1]); //Get the last extension

    //Gia praktikous logous thewroume oti einai unique. 
   // $uniqer = substr(md5(uniqid(rand(),1)),0,5);
    //$file_name = $uniqer . '_' . $file_title;//Get Unique Name
	$user_id = $_SESSION['user_id'];
	$user_data = user_data($_SESSION['user_id'], 'username', 'logo_url');
	$username = $user_data['username'];
	$logo_url = $user_data['logo_url'];
	$uniqer = md5($username + microtime());
	$file_name = "$uniqer.$ext";//Get Unique Name

    $all_types = explode(",",strtolower($types));
    if($types) {
        if(in_array($ext,$all_types));
        else {
            $result = "'".$_FILES[$file_id]['name']."' Ο τύπος του αρχείου δεν είναι έγκυρος. Μπορείτε να ανεβάσετε εικόνες σε μορφή (jpg, png, gif)"; //Show error if any.
            return array('',$result);
        }
    }

    //Pou prepei na ginei to file upload
    if($folder) $folder .= '/'; //Add a '/' at the end of the folder
    $uploadfile = $folder . $file_name;

    $result = '';
    //Metafora tou file apo to stored location sto new location
    if (!move_uploaded_file($_FILES[$file_id]['tmp_name'], $uploadfile)) {
        $result = "Αδυναμία ανεβάσματος αρχείου '".$_FILES[$file_id]['name']."'"; //Show error if any.
        if(!file_exists($folder)) {
            $result .= " : Ο φάκελος δεν βρέθηκε.";
        } elseif(!is_writable($folder)) {
            $result .= " : Μή εγγράψιμος φάκελος.";
        } elseif(!is_writable($uploadfile)) {
            $result .= " : Μή εγγράψιμο αρχείο.";
        }
        $file_name = '';
        
    } else {
        if(!$_FILES[$file_id]['size']) { //Check if the file is made
            @unlink($uploadfile);//Delete the Empty file
            $file_name = '';
            $result = "Δέν βρέθηκε αρχείο - παρακαλώ χρησιμοποιήστε ένα έγκυρο."; //Show the error message
        } else {
            chmod($uploadfile,0777);//Make it universally writable.	
			//$finalfile = mysql_real_escape_string(htmlspecialchars($uploadfile));
			setActiveProfilePhoto();
			// insert to database
			global $db;
			$sql = "INSERT IGNORE INTO user_avatars (user_id, photo_path, active) VALUES (?, ?, ?)"; 	
			$query = $db->prepare($sql);
			$params = array($user_id, $uploadfile, 1);
			$query->execute($params);
			//echo $finalfile;
			echo "Η εικόνα ανέβηκε επιτυχώς";
        }
    }

    return array($file_name,$result);
}

// Energopoihsh ths fwto pou pataei o xrhsths ws active
function setActiveProfilePhoto(){
	global $db;
	$user_id = $_SESSION['user_id'];
	$sql = "UPDATE `user_avatars` SET `active` = 0 WHERE `user_id` = ?";
	$query = $db->prepare($sql);
	$params = array($user_id);
	$query->execute($params);
}

function getMyProfilePhoto(){
	global $db;
    $myId = $_SESSION['user_id'];
	$sql ="SELECT `photo_path` FROM `user_avatars` WHERE `user_id` = ? AND `active` = 1";
	$query = $db->prepare($sql);
	$params = array($myId);
	$query->execute($params);
	$photo = $query->fetch(PDO::FETCH_OBJ);
	return $photo->photo_path;
}


function getAllMyPhotos(){
	global $db;
    $myId = $_SESSION['user_id'];
	$sql ="SELECT * FROM `user_avatars` WHERE `user_id` = ? ORDER BY DateMade DESC";
	$query = $db->prepare($sql);
	$params = array($myId);
	$query->execute($params);
	$row = $query->fetchAll(PDO::FETCH_ASSOC);
	return $row;
}


?>