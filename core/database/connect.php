<?php
//edw kanoume thn syndesi me thn vasi mas kai kaloume ayto to arxeio mesw include
//kathe fora pou theloume na kanoume kapoio query

// connect me mysql_query gia na deiksw thn diafora me PDO sthn ergasia
$connect_error = 'Sorry, connection problems';
 $conn = mysql_connect('localhost','root','') or die ($connect_error);
 $db = mysql_select_db('polymesa') or die ($connect_error);
 mysql_query("set names utf8");
 
 
 // connect me PDO 
 function connect_DB()
 {
	$dsn = 'mysql:host=localhost;dbname=polymesa;charset=utf8';
	$conn = new PDO($dsn, 'root', '');
	$conn->exec("set names utf8");
	return $conn;
 
 }
 
 $db = connect_DB();
 $db->exec("set names utf8");

 ?>