<?php
$host='localhost';
$dbName='dboaNewWorld';
$user='root';
$password='passf005';
$base=mysqli_connect($host,$user,$password,$dbName);


try
{
	
	$bdd = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $user, $password);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (Execption $e)
{
		die('Erreur : ' . $e->getMessage());
}
?>