<?php
function getClients(){
	global $db;
	$sql = "SELECT * FROM clients";
	$stmt = $db->query($sql);
	// var_dump($stmt);
	// exit();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	
}

function client_id_from_name($name) {
    
    return mysql_result(mysql_query("SELECT `client_id` FROM `clients` WHERE `name` = '$name'"), 0, 'client_id');
}

function client_id_from_namePDO($name) {
    // $name = sanitize($name);
	global $db;
	
	$params = array('Name'=>$name);
	$sql = "SELECT `client_id` FROM `clients` WHERE `name` = :Name";
	$stmt = $db->prepare($sql);
	$result = $stmt->execute($params);
	$row = $result->fetch(PDO::FETCH_ASSOC);
	// var_dump($row);
	// exit();
	return $row['client_id'];
	
	
    return mysql_result(mysql_query(), 0, 'client_id');
}

function getClientsByCategory($category){
	$category = sanitize($category);
	$sql = "SELECT * FROM clients where category = '$category' ORDER BY RAND() LIMIT 4";
	$arr = array();
	
	$query = mysql_query($sql);
	
	while ($row = mysql_fetch_assoc($query)) {
	$arr[] = $row;
	}
	return $arr;
}

// gia to location_results.php
function getClientsByLocation($location){
	//$location = sanitize($location);
	$sql = "SELECT * FROM clients where perioxi = '$location' ORDER BY name";
	$arr = array();
	$query = mysql_query($sql);
	
	while ($row = mysql_fetch_assoc($query)) {
	$arr[] = $row;
	}
	return $arr;
}

// gia ton header sto menu perioxi
function getLocations($location){

	// $location = sanitize($location);
	$sql = "SELECT * FROM `polymesa`.`locations` WHERE proastia = '$location' ORDER BY perioxi;";
	$arr = array();
	
	mysql_query("set names utf8");
	$query = mysql_query($sql);
	while ($row = mysql_fetch_assoc($query)) {
		$arr[] = $row;
	}

	 return $arr;
	 
	// global $db;
	// $sql = "SELECT * FROM `polymesa`.`locations` WHERE proastia = '{$location}' ORDER BY perioxi;";
	// $stm = $db->prepare($sql);
	// $params = array('location'=>$location);
	// $stm->execute(  );
	// return $stm->fetchAll(PDO::FETCH_ASSOC);

	
	
}


function getCities(){

	// $location = sanitize($location);
	$sql = "SELECT `perioxi` FROM `locations` ORDER BY `perioxi`";
	$arr = array();
	
	mysql_query("set names utf8");
	$query = mysql_query($sql);
	while ($row = mysql_fetch_assoc($query)) {
		$arr[] = $row;
	}

	 return $arr;
	 
}


// gia thn anazitisi 
function getClientsBySearch($search){
	//$search = sanitize($search);
	$sql = "SELECT * FROM clients where `notes` LIKE '%$search%' OR `perioxi` = '$search' OR `name` LIKE '%$search%' OR `email` = '$search' OR `telephone` = '$search' ORDER BY name";
	$arr = array();
	
	$query = mysql_query($sql);
	
	while ($row = mysql_fetch_assoc($query)) {
	$arr[] = $row;
	}
	return $arr;
}

// gia to client_details.php
function getLikes($client_id) {
     $client_id = (int)$client_id;
		$query = mysql_query("SELECT COUNT(*) FROM `liked` WHERE `client_id` = '$client_id'");
		$row = mysql_fetch_assoc($query); 
		$size = $row['COUNT(*)'];
	return ($size);
}

// gia to client_details.php
function iLiked($client_id) {
     $client_id = (int)$client_id;
	 $user = $_SESSION['user_id'];
		$query = mysql_query("SELECT COUNT(*) FROM `liked` WHERE `user_id` = '$user' AND `client_id` = '$client_id'");
		$row = mysql_fetch_assoc($query); 
		$size = $row['COUNT(*)'];
	return ($size);
}

// gia to client_details.php
function iFavourite($client_id) {
     $client_id = (int)$client_id;
	 $user = $_SESSION['user_id'];
		$query = mysql_query("SELECT COUNT(*) FROM `favourites` WHERE `user_id` = '$user' AND `client_id` = '$client_id'");
		$row = mysql_fetch_assoc($query); 
		$size = $row['COUNT(*)'];
	return ($size);
}

// gia na parw ta dedomena tou client mesw id
function client_data($client_id) {
    $data = array();
    $client_id = (int)$client_id;
    
    $func_num_args = func_num_args();
    $func_get_args = func_get_args();
    
    if ($func_num_args > 1) {
        unset($func_get_args[0]);
        
        $fields = '`' . implode('`, `', $func_get_args) . '`';
        $data =  mysql_fetch_assoc(mysql_query("SELECT $fields FROM `clients` WHERE `client_id` = $client_id"));

        return $data;
    }
}

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
	$sql = "SELECT * FROM categories ORDER by name";
	$arr = array();
	
	$query = mysql_query($sql);
	
	while ($row = mysql_fetch_assoc($query)) {
	$arr[] = $row;
	}
	return $arr;
}

function getMyFavourites(){
    $user_id = $_SESSION['user_id'];
	$sql = "
	SELECT * FROM clients WHERE client_id IN 
	(SELECT client_id FROM favourites where user_id='$user_id')	
	";
	$arr = array();
	
	$query = mysql_query($sql);
	
	while ($row = mysql_fetch_assoc($query)) {
	$arr[] = $row;
	}
	return $arr;
}


function ClientByName($name){
   // $myId = $_SESSION['user_id'];
	$sql =("SELECT * FROM `magazia` WHERE `name` = '$name' ORDER by likes");
	$arr = array();
	$query = mysql_query($sql);
	while ($row = mysql_fetch_assoc($query)) {
	$arr[] = $row;
	}
	return $arr;
}


function upload($file_id, $folder="", $types="") {
    if(!$_FILES[$file_id]['name']) return array('','No file specified');

    $file_title = $_FILES[$file_id]['name'];
    //Get file extension
    $ext_arr = split("\.",basename($file_title));
    $ext = strtolower($ext_arr[count($ext_arr)-1]); //Get the last extension

    //Not really uniqe - but for all practical reasons, it is
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

    //Where the file must be uploaded to
    if($folder) $folder .= '/';//Add a '/' at the end of the folder
    $uploadfile = $folder . $file_name;

    $result = '';
    //Move the file from the stored location to the new location
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
			$sql_insert = ("INSERT IGNORE INTO user_avatars (user_id, photo_path, active) VALUES ('$user_id', '$uploadfile', 1);"); 
			mysql_query($sql_insert) or die(mysql_error());
			//echo $finalfile;
			echo "Η εικόνα ανέβηκε επιτυχώς";
        }
    }

    return array($file_name,$result);
}

function setActiveProfilePhoto(){
$user_id = $_SESSION['user_id'];
mysql_query ("UPDATE `user_avatars` SET `active` = 0 WHERE `user_id` = '$user_id'") or die(mysql_error());
}

function getMyProfilePhoto(){
    $myId = $_SESSION['user_id'];
	$sql ="SELECT `photo_path` FROM `user_avatars` WHERE `user_id` = '$myId' AND `active` = 1";
	$query = mysql_query($sql);
    $row = mysql_fetch_assoc($query); 
	$photo = $row['photo_path'];
	return $photo;
}


function getAllMyPhotos(){
    $myId = $_SESSION['user_id'];
	$sql ="SELECT * FROM `user_avatars` WHERE `user_id` = '$myId' ORDER BY DateMade DESC";
	$arr = array();
	$query = mysql_query($sql);
	while ($row = mysql_fetch_assoc($query)) {
	$arr[] = $row;
	}
	return $arr;
}


?>