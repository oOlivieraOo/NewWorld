  <?php 
  session_start();

  include_once('ConnectBase.php');
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajout de lots</title>
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

    <script>
		//rechargement de la page principale lors de la fermeture de la fenêtre de login
		$('#modal_login').on('hidden.bs.modal', function () {
			location.reload();
		});
	</script>

</head>
<body>
<!-- FORMULAIRE DE SAISIE D'AJOUT DE LOT -->
<form method="POST" style="margin-top: 65px;">
	<p class="h5 text-center mb-4">Ajouter vos lots</p>

	<div class="md-form">
		<i class="fa fa-user prefix grey-text"></i>
		<input class="form-control" type="text" name="prixUnitaire" requiered>
		<label for="orangeForm-name">Prix Unitaire</label>
	</div>

	<div class="md-form">
		<i class="fa fa-user prefix grey-text"></i>
		<input class="form-control" type="text" name="idUnite" requiered>
		<label for="orangeForm-name">Unité</label>
	</div>

	<div class="md-form">
		<i class="fa fa-user prefix grey-text"></i>
		<input class="form-control" type="text" name="quantite" requiered>
		<label for="orangeForm-name">Quantité</label>
	</div>

	<div class="md-form">
		<i class="fa fa-user prefix grey-text"></i>
		<input class="form-control" type="text" name="dteRecolte" requiered>
		<label for="orangeForm-name">Date de la récolte</label>
	</div>

	<div class="md-form">
		<i class="fa fa-user prefix grey-text"></i>
		<input class="form-control" type="text" name="dteLimiteConso" requiered>
		<label for="orangeForm-name">Date limite conso</label>
	</div>

	<div class="text-center">
	<button class="btn btn-deep-orange">Valider</button>
	</div>

</form>
<!-- FIN FORMULAIRE DE SAISIE D'AJOUT DE LOT -->

	<center><a href="NW.php" style="font-size: 150%;">Retour à l'accueil</a></center>

	<?php
		if(isset($_POST['prixUnitaire'])&&($_POST['idUnite'])&&($_POST['quantite'])&&($_POST['dteRecolte'])&&($_POST['dteLimiteConso']))
		{
			
		}
	?>

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
