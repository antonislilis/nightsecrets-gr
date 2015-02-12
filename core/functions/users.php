<?php


function recover($mode, $email) {
    $mode  = sanitize($mode);
    $email = sanitize($email);
    
    $user_data = user_data(user_id_from_email($email), 'user_id', 'username');
   if ($mode == 'username') {
       email($email, 'Your username', "Hello " . $user_data['username'] . ",\n\nΤο όνομα χρήστη σας είναι: " .  $user_data['username'] . "\n\n-NightSectrets");
   } else if ($mode == 'password') {
       $generated_password = substr(md5(rand(999, 999999)), 0, 8);
       change_password($user_data['user_id'], $generated_password);
       
       update_user($user_data['user_id'], array('password_recover' => '1'));
       
       email($email, 'Your password recovery', "Hello " . $user_data['username'] . ",\n\nO νέος σας κωδικός είναι: " .  $generated_password . "\n\n-NightSectrets");
   }
  }


function update_user($user_id, $update_data) {
   global $session_user_id;
   $update = array();
   array_walk($update_data, 'array_sanitize');

   foreach($update_data as $field=>$data) {
       $update[] = '`' . $field . '` = \''  . $data . '\'';
   }
    global $db;
    $sql = "UPDATE `users` SET " . implode(', ', $update) . " WHERE `user_id` = $user_id";
	$query = $db->query($sql);
}

// h function pou energopoiei tous xristes, apo 0 se 1 afou elegksei an to email kai to email code einai swsta
function activate($email, $email_code) {
    $email        = mysql_real_escape_string($email);
    $email_code   = mysql_real_escape_string($email_code);
    
    if (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email' AND `email_code` = '$email_code' AND `active` = 0"), 0) == 1) {
        mysql_query("UPDATE `users` SET `active` = 1 WHERE `email` = '$email'");
        return true;
    } else {
        return false;
    }
}

// allagi kwdikou, pairnei orismata to userid kai ton kwdiko kai metatrepei ton kwdiko me kryptografisi
function change_password($user_id, $password) {
    $user_id = (int)$user_id;
    $password = md5($password);
    global $db;
    $sql = "UPDATE `users` SET `password` = ?, `password_recover` = ? WHERE  `user_id` = ?";
	$query = $db->prepare($sql);
	$params = array($password, 0, $user_id);
	$query->execute($params);
    
}


// pernaei ta dedomena tou register sthn vasi dedomenwn ston pinaka users
function register_user($register_data) {
   array_walk($register_data, 'array_sanitize');
   $register_data['password'] = md5($register_data['password']);
   
   $fields = '`' . implode('`, `', array_keys($register_data)) . '`';
   $data = '\'' . implode('\', \'', $register_data) . '\'';
   
   global $db;
   mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
   $query = $db->query($sql);
   email($register_data['email'], 'Activate your account', "Hello " . $register_data['username'] . ",\n\nΓια να ενεργοποιήσετε τον λογαριασμό σας
   πατήστε στο παρακάτω link:\n\nhttp://nightsecrets.co.nf/activate.php?email=" . $register_data['email'] . "&email_code=" . $register_data['email_code'] . "\n\n- NightSectrets");
}


// epistrefei tous users pou einai active
function user_count() {
	global $db;
    return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 1"), 0);
}



//7:1  kaleitai apo thn init.php gia na dwsei ta stoixeia tou user apo thn mysql
function user_data($user_id) {
	global $db;
    $user_id = (int)$user_id;
    
    $func_num_args = func_num_args();
    $func_get_args = func_get_args();
    
    if ($func_num_args > 1) {
        unset($func_get_args[0]);
        $fields = '`' . implode('`, `', $func_get_args) . '`';
        $sql = "SELECT $fields FROM `users` WHERE `user_id` = ?";
		$query = $db->prepare($sql);
		$params = array($user_id);
		$query->execute($params);
		$row = $query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}

// an o xristis einai login tote epistrefei true. diaforetika false
function logged_in() {
    return isset($_SESSION['user_id']);
}

// elegxos an to username pou dothike yparxei hdh
function user_exists($username){
    $username = sanitize($username);
    $req = mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'"); 
    return (mysql_num_rows($req) > 0)?true:false; 
}

// elegxos an to email pou dothike yparxei hdh
function email_exists($email){
    $email = sanitize($email);
    $req = mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '$email'"); 
    return (mysql_num_rows($req) > 0)?true:false; 
}

// elegxos an o user einai energopoihmenos
function user_active($username){ 
    $username = sanitize($username);
    $req = mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username' AND `active` =1"); 
    return (mysql_num_rows($req) > 0)?true:false; 
}
  
// kserontas to username pairnw to userid
function user_id_from_username($username) {
    global $db;
    $sql = "SELECT `user_id` FROM `users` WHERE `username` = ?";
	$query = $db->prepare($sql);
	$params = array($username);
	$query->execute($params);
	$row = $query->fetch(PDO::FETCH_ASSOC);
	return $row['user_id'];
}


//mesw email pairnw to userid
function user_id_from_email($email) {
	global $db;
    $sql = "SELECT `user_id` FROM `users` WHERE `email` = ?";
	$query = $db->prepare($sql);
	$params = array($email);
	$query->execute($params);
	$row = $query->fetch(PDO::FETCH_ASSOC);
	return $row['user_id'];
}

// elegxos gia to login
function login($username, $password) {
    $user_id = user_id_from_username($username);
    $username = sanitize($username);
	
    $password = md5($password);
    $req = mysql_query("SELECT `user_id` FROM `users` WHERE (`username` = '$username' OR `email` = '$username') AND `password` = '$password'");
    return (mysql_num_rows($req) > 0)?$user_id : false;
}


?>
