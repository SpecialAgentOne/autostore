<?php
$servername='localhost';
$username="a0008603_auto";
$password="autopass2023";
$db="a0008603_auto";

try
{
	$con=new PDO("mysql:host=$servername;dbname=a0008603_auto",$username,$password);
	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//echo 'connected';
}
catch(PDOException $e)
{
	echo '<br>'.$e->getMessage();
}
	
?>