<?php

{
	$_SESSION['ExpiresOn'] = time()+15*60;
	$_SESSION['UserID'];
	$_SESSION['Username'] = $row['Username']
	$_SESSION['Avatar']
	$_SESSION['JobTitle']
	
}



if (time() < $_SESSION['ExpiresOn'])

	$_SESSION['ExpiresOn'] = time()+15*60;	

else
+{
	header('Location: Login.html');
	exit();
}

?>