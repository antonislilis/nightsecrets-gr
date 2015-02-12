<?php

function email($to, $subject, $body) {
    mail($to, $subject, $body, 'From: noreply@NightSectrets.com');
    
}

function logged_in_redirect() {
    if (logged_in() === true) {
        header('Location: index.php');
        exit();
    } 
}

// gia selides pou xreiazontai na eisai logged_in
function protect_page() {
    if (logged_in() === false) {
        header('Location: protected.php');
    exit();
    }
}

// kanw sanitize dedomenwn se pinakes
function array_sanitize(&$item) {
    $item = htmlentities(strip_tags(mysql_real_escape_string($item)));
}

// skopos na deiksw enan tropo asfaleias mesw mysql_query
function sanitize($data){
  return htmlentities(strip_tags(mysql_real_escape_string($data)));
  
}

// custon errors
function output_errors($errors) {
    
    return '<br><center><font color="white"><p>' . implode('</p><p>', $errors)  . '</p></font></center>';    
}


?>
