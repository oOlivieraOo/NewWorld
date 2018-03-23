<?php 
    include('ConnectBase.php');
	include_once ("gestionBaseDonnees.php");
?>

<!DOCTYPE html>
<html>
<head>


	<title>New World</title>
	<meta charset="utf-8">
	<!--<link rel="stylesheet" href="NW.css" />-->
	<link rel="stylesheet" href="MDB_Free/css/mdb.min.css">
	<link rel="stylesheet" href="MDB_Free/css/bootstrap.min.css" />
	<link rel="stylesheet" href="MDB_Free/css/style.css" />

	    <script type="text/javascript" src="MDB_Free/js/jquery-2.2.3.min.js"></script>
     <script language="javascript"></script>


    <style rel="stylesheet">
        /* TEMPLATE STYLES */
        main {
            padding-top: 3rem;
            padding-bottom: 2rem;
        }
        .widget-wrapper {
            padding-bottom: 2rem;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 2rem;
        }
        .navbar {
            background-color: #304a74;
        }
        footer.page-footer {
            background-color: #304a74;
            margin-top: 2rem;
        }

        @media (max-width: 776px) {
            .carousel {
                height: 100%;
            }
        }
        .carousel-item{
            height: 100%;
        }
        .carousel-inner {
            height: 100%;
        }
    </style>
<!--Section: Contact v.1-->
<section class="section pb-5">

<br><br>

    <div class="row">

        <!--Grid column-->
        <div class="col-lg-5 mb-4">

            <!--Form with header-->
            <div class="card">
            	<form method="POST">
	            <?php 
	            	if(!($_REQUEST['Envoyer']))
	            	{
	            ?>
                <div class="card-body">
                    <!--Header-->
                    <!--<div class="form-header blue accent-1">
                        <h3><i class="fa fa-envelope"></i> Nous écrire:</h3>
                    </div>
                    -->

                    <p>Toujours à votre écoute, n'hésitez pas si vous avez une question!</p>
                    <br>

                    <!--Body-->
                    <div class="md-form">
                        <i class="fa fa-user prefix grey-text"></i>
                        <input type="text" id="nomUser" name="nomUser" class="form-control">
                        <label for="form-name">Your name</label>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-envelope prefix grey-text"></i>
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="form-email">Your email</label>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-tag prefix grey-text"></i>
                        <input type="text" id="sujet" name="sujet" class="form-control">
                        <label for="form-Subject">Sujet</label>
                    </div>

                    <div class="md-form">
                        <i class="fa fa-pencil prefix grey-text"></i>
                        <textarea type="text" id="message" name="message" class="md-textarea"></textarea>
                        <label for="form-text">Message</label>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-light-blue" name="Envoyer" id="Envoyer">Envoyer</button>
                    </div>

                </div>
                <?php
                }
                else
                {
                	$nomUser=$_POST['nomUser'];
				    $email=$_POST['email'];
				    $sujet=$_POST['sujet'];
				    $message=$_POST['message'];
				  

					if(($nomUser=="") || ($email=="") || ($message=="") || ($sujet==""))
					{
						echo "Champs manquants, il faut tous les remplir";
					}
					else
					{
						$header = "From: $nomUser<$email> \r\n Reply-To: $nomUser";
						mail("olivier.anassalon@gmail.com", $sujet, $message, $header);
						echo "Les champs sont remplis.";
					}


                }
                ?>
                </form>
            </div>
            <!--Form with header-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-7">

            <!--Google map-->
            <div id="map-container" class="z-depth-1-half map-container" style="height: 400px"></div>

            <br>
            <!--Buttons-->
            <div class="row text-center">
                <div class="col-md-4">
                    <a class="btn-floating blue accent-1"><i class="fa fa-map-marker"></i></a>
                    <p>San Francisco, CA 94126</p>
                    <p>United States</p>
                </div>

                <div class="col-md-4">
                    <a class="btn-floating blue accent-1"><i class="fa fa-phone"></i></a>
                    <p>+ 01 234 567 89</p>
                    <p>Mon - Fri, 8:00-22:00</p>
                </div>

                <div class="col-md-4">
                    <a class="btn-floating blue accent-1"><i class="fa fa-envelope"></i></a>
                    <p>info@gmail.com</p>
                    <p>sale@gmail.com</p>
                </div>
            </div>

        </div>
       <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.1-->
</head>

<?php
	include ("menu.php");
	include ("toutenbas.php");
?>

<!-- chargement de jquery -->
<!-- SCRIPTS -->

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="MDB_Free/js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="MDB_Free/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="MDB_Free/js/mdb.min.js"></script>
<!-- fin des scripts -->

</body>

</html>