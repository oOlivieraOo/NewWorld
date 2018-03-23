<?php include 'ConnectBase.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="slam.css">
	<link rel="stylesheet" type="text/css" href="NW.css" />
	<title>Accueil du site</title>
	<style>
		label {
		    display: initial;
		    width: initial;
		    text-align: left;
		    box-sizing: border-box;
		}
		pre {display : inline;}
		.sizeMain { width:40%; height: 35%; }			
	</style>
</head>
<body class="">

	<div class="topCentre sizeBandeau1 border2 bg1 box2 centrage"> 
		<h2>Accueil du site</h2>
	</div>
	<div class="centreMiddle sizeMain border2 bg1 box2 centrage">

Bonjour
<?php if(isset($_SESSION['username']))
{echo " <b>".$_SESSION['username']."</b>";} ?>,<br>
Bienvenue sur notre site.<br><br>
<?php
/* Si l'utilisateur est connecté,
 *  lien pour modifier ses informations, 
 *  lien pour se deconnecter
 */
if(isset($_SESSION['username']))
{
?>
	<a href="edit_infos.php">Modifier ses informations</a><br><br>
	<a href="connexion.php">Se déconnecter</a><br><br>
<?php
	if(isset($_SESSION['admin'])) {
	?>
		<a href="users.php">Liste des utilisateurs</a>.<br><br>
	<?php
	}
}
else
{
/* Utilisateur non connecté 
 * lien pour s'inscrire
 * lien pour se connecter
 */
?>

	<a href="signup.php">Inscription</a><br>
	<a href="connexion.php">Se connecter</a>
<?php
}
?>
	<div class=""></div>
	<div class="bottomCentre size1 border2 bg1 box2 centrage"><a href="	NW.php">Retour à l'accueil</a></div>
</div>
	
</body>
</html>