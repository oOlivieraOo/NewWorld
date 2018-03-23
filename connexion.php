<?php
session_start();
include('ConnectBase.php');
include_once ("gestionBaseDonnees.php");
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
function test($test){
	echo "<br>";
	print_r($test);
	echo "</br>";
}
?>
<?php

if(isset($_SESSION['pseudoUser']) && ($_SESSION['motDePasse']))
{
	unset($_SESSION['pseudoUser']);
	unset($_SESSION['motDePasse']);
}
else
{
	$pseudoUser = '';

	if(isset($_REQUEST['btn']))
	{

		$pseudoUser = $_REQUEST['pseudoUser'];
		$motDePasse = $_REQUEST['motDePasse'];

			// récupération du mot de passe utilisateur
		echo 'SELECT pseudoUser, motDePasse FROM Utilisateur WHERE pseudoUser="'.$pseudoUser.'"';
		$result = $bdd->query('SELECT idUser, pseudoUser, motDePasse FROM Utilisateur WHERE pseudoUser="'.$pseudoUser.'"');
	// echo __LINE__,var_dump($result),
		"<br>";
		test($result);
		if ($result === false OR $result->num_rows<1)
		{
			$form = true;
			$message = 'Utilisateur inconnu';
		}
		else
		{
			$ligne = $result->fetch_array();
			test($ligne);
				// comparaison des mots de passe
			if($ligne['motDePasse']==$motDePasse)
			{
					// utilisateur reconnu, pas de formulaire à afficher
				$form = false;
					// màj du pseudoUser et identifiant dans la session
				$_SESSION['pseudoUser'] = $_REQUEST['pseudoUser'];
				$_SESSION['userid'] = $ligne['idUser'];

				echo "Vous êtes connecté.";
			}
			else
			{
				$form = true;
				$message = 'Identifiants non reconnus !';
			}
		}
	}
	else
	{
		$form = true;
	}
	if($form)
	{
		if(isset($message))	{
			echo $message;
		}
		?>
		<!DOCTYPE html>
		<html>
		<head>

			<title>Connexion</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="MDB_Free/css/mdb.min.css">
			<link rel="stylesheet" href="MDB_Free/css/bootstrap.min.css" />
			<link rel="stylesheet" href="MDB_Free/css/style.css" />

			<script type="text/javascript" src="MDB_Free/js/jquery-3.2.1.min.js"></script>

			<style rel="stylesheet">
			/* TEMPLATE STYLES */
			html,body {

				/* padding-bottom: 2rem;*/
			}
      /*  .widget-wrapper {
            padding-bottom: 2rem;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 2rem;
            }*/

            .navbar {
            	background-color: #304a74;
            }

            .top-nav-collapse {
            	background-color: #304a74;
            }

            footer.page-footer {
            	background-color: #304a74;
            	margin-top: 2rem;
            }

            @media only screen and (max-width: 768px) {
            	.navbar {
            		background-color: #4285F4;
            	}
            }

            .scrolling-navbar {
            	-webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            	-moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            	transition: background .5s ease-in-out, padding .5s ease-in-out;
            }

        </style>

    </head>

    <body>

    	<form method="POST" style="margin-top: 65px;">
    		<p class="h5 text-center mb-4" style="margin-top: 65px;">Connexion</p>
    		<div class="md-form">
    			<i class="fa fa-user prefix grey-text"></i>
    			<input type="text" id="pseudoUser" name="pseudoUser" class="form-control" required>
    			<label for="orangeForm-name">Pseudo</label>
    		</div>

    		<div class="md-form">
    			<i class="fa fa-lock prefix grey-text"></i>
    			<input type="password" id="motDePasse" name="motDePasse" class="form-control" required>
    			<label for="orangeForm-pass">Mot de passe</label>
    		</div>

    		<div class="text-center">
    			<button class="btn btn-deep-orange">Se connecter</button>
    		</div>

    		<br /><center><a href="NW.php" style="font-size: 150%;">Retour à l'accueil</a></center>
    	</form>
    	<?php
    }
}
?>
</div>

<?php
include("menu.php");
include("toutenbas.php");
?>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="MDB_Free/js/tether.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="MDB_Free/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="MDB_Free/js/mdb.min.js"></script>
</body>
</html>