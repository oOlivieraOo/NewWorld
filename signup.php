  <?php 
  session_start();


  include_once('ConnectBase.php');
  ?>

  <!DOCTYPE html>
  <html>
  <head>
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

<datalist id="listeRoles">
  <option value="Client">Consommateur(client)</option>
  <option value="Fournisseur">Producteur(fournisseur)</option>
  <option value="Distributeur">Point relais(distributeur)</option>
</datalist>

<title>Inscription</title>
</head>
<body>

  <!-- Form register -->
  <form method="POST" style="margin-top: 65px;">
    <p class="h5 text-center mb-4">S'inscrire</p>

    <div class="md-form">
      <i class="fa fa-user prefix grey-text"></i>
      <input class="form-control" type="text" name="role" id="idRole" value="Client" list="listeRoles" class="success"/>
      <label for="orangeForm-name">Votre rôle</label>
    </div>

    <div class="md-form">
      <i class="fa fa-user prefix grey-text"></i>
      <input type="text" id="nomUser" name="nomUser" class="form-control" required>
      <label for="orangeForm-name">Votre nom</label>
    </div>

    <div class="md-form">
      <i class="fa fa-user prefix grey-text"></i>
      <input type="text" id="prenomUser" name="prenomUser" class="form-control" required>
      <label for="orangeForm-name">Votre prénom</label>
    </div>

    <div class="md-form">
      <i class="fa fa-user prefix grey-text"></i>
      <input type="text" id="pseudoUser" name="pseudoUser" class="form-control" required>
      <label for="orangeForm-name">Votre pseudo</label>
    </div>

    <div class="md-form">
      <i class="fa fa-envelope prefix grey-text"></i>
      <input type="text" id="email" name="email" class="form-control" required>
      <label for="orangeForm-email">Votre email</label>
    </div>
    <!-- ###########################Adresse, rue, ville########################### -->

    <!-- ##################__Script_Ajout_Adresse__##################-->

    <datalist id="listeDesAdresses"></datalist>
    <script>
//cette fonction n'est plus utilisée j'ai mis un autocomplete à la place
//se lance quand l'adresse change
//elle met à jour la liste des adresses commençant par ce qui a été saisi par l'utilisateur
function remplirListeDesAdresses()
{
  //recup du debut du code postal de la commune
  var debutAdresse=document.getElementById('idAdresse').value;
  if(debutAdresse.length >10)//à partir de 10 caractères
  {
    var dataListeAdresses=document.getElementById('listeDesAdresses');
    //j'efface toutes les options de la datalist
    //essais
    $(dataListeAdresses).empty();
    var noAdresse;
    var nbAdresses=dataListeAdresses.length;
    for (noAdresse = 0; noAdresse < nbAdresses; noAdresse++) 
    {
      dataListeAdresses.remove(0);
    }
    //je cree ma requete vers le serveur data.gouv.fr
    var request = new XMLHttpRequest();
    // prise en charge des chgts d'état de la requete
    request.onreadystatechange = function(response) 
    {
      if (request.readyState === 4) 
      {
        if (request.status === 200) 
        {
      // j'obtient la reponse au format json et l'analyse on obtient un tableau
      var tabJsonOptions = JSON.parse(request.responseText);
      //alert (tabJsonOptions.features[0].properties.label);
      //alert(request.responseText);
      // pour chaque ligne du tableau.
      var noLigne;
      if(tabJsonOptions.features.length==1)
      {
        //remplir les zones de saisie cpostal et ville
        var laVille=document.getElementById("idVille");
        laVille.setAttribute("value",tabJsonOptions.features[0].properties.city);
        var leCp=document.getElementById("idCP");
        leCp.setAttribute("value",tabJsonOptions.features[0].properties.postcode);
        var laRue=document.getElementById("idRue");
        laRue.setAttribute("value",tabJsonOptions.features[0].properties.street);
        //latitude et longitude
        var laLatitude=document.getElementById("idLatitude");
        laLatitude.setAttribute("value",tabJsonOptions.features[0].geometry.coordinates[1]);
        var laLongitude=document.getElementById("idLongitude");
        laLongitude.setAttribute("value",tabJsonOptions.features[0].geometry.coordinates[0]);
      }
      else
      {
        for(noLigne=0;noLigne<tabJsonOptions.features.length;noLigne++)
        { 
          // Cree une nouvelle <option>.
          var nouvelleOption = document.createElement('option');
          // on renseigne la value de l'option avec le numéro du produit.
          nouvelleOption.value = tabJsonOptions.features[noLigne].properties.label;
          //on affiche aussi le codePostal et la commune
          nouvelleOption.text=nouvelleOption.value;
          // ajout  de l'<option> en tant qu'enfant de la liste de selection des produits.
          dataListeAdresses.appendChild(nouvelleOption);
          alert('option ajoutee'+tabJsonOptions.features[noLigne].properties.label);
        }
      }
    } 
    else 
    {
      // An error occured :(
      alert("Couldn't load datalist options :(");
    }
  }
};
    //recup du debut du code postal de la commune
    var debutAdresse=document.getElementById('idAdresse').value;
    //formation du texte de la requete
    var texteRequeteAjax='https://api-adresse.data.gouv.fr/search/?limit=10&q='+debutAdresse;
    //je l'ouvre
    request.open('GET', texteRequeteAjax, true);
    //et l'envoie
    request.send();
  }//fin du si + de 5 caractères ont été saisi
}
</script>
<!--########################Fin d'ajout script adresses########################-->

<div class="md-form">
  <i class="fa fa-envelope prefix grey-text"></i>
  <!--<input required type="text" name="adresse" id="idAdresse" placeholder="Adresse" value="" list="listeDesAdresses" oninput="remplirListeDesAdresses()"/>-->
  <input required type="text" name="adresse" id="idAdresse" placeholder="Adresse" value="" />
  <label for="orangeForm-name">Votre adresse</label>
</div>

<script language="javascript">
  //auto complément de l'adresse ville et code postal
  $("#idAdresse").autocomplete({
    source: function (request, response) {
      $.ajax({
        url: "https://api-adresse.data.gouv.fr/search/?limit=5",
        data: { q: request.term },
        dataType: "json",
        success: function (data) {
          response($.map(data.features, function (item) {
            return { label: item.properties.label, postcode: item.properties.postcode,city: item.properties.city, value: item.properties.label, street: item.properties.street, name: item.properties.name, latitude: item.geometry.coordinates[1],longitude: item.geometry.coordinates[0]};
          }));
        }
      });
    },
    select: function(event, ui) {
      $('#idCP').val(ui.item.postcode);
      $('#idVille').val(ui.item.city);
      if(ui.item.street)
        $('#idRue').val(ui.item.street);
      else
        $('#idRue').val(ui.item.name);
      $("#idLatitude").val(ui.item.latitude);
      $("#idLongitude").val(ui.item.longitude);
    }
  });
</script>
<!-- FIN JAVASCRIPT -->


<div class="md-form">
 <i class="fa fa-user prefix grey-text"></i>
 <input class="form-control" type="text" 
 name="ville" id="idVille" 
 placeholder="Votre ville..." 
 value="" class="success"/>
 <label for="orangeForm-name">Votre ville</label>
</div>

<div class="md-form">
  <i class="fa fa-user prefix grey-text"></i>
  <input class="form-control" type="text" 
  name="rue" id="idRue" 
  placeholder="rue..." 
  value="" class="success"/>
  <label for="orangeForm-name">Votre rue</label>
</div>

<div class="md-form">
  <i class="fa fa-envelope prefix grey-text"></i>
  <input class="form-control" type="text" 
  name="codePostal" id="idCP" 
  placeholder="Votre code postal..." 
  value="" class="success">
  <label for="orangeForm-name">Votre code postal</label>
</div>

<!-- ###########################Fin Adresse, rue, CP, ville########################### -->

<div class="md-form">
  <i class="fa fa-lock prefix grey-text"></i>
  <input type="password" name="motDePasse" id="motDePasse" maxlength="25" class="form-control" required>
  <label for="orangeForm-pass">Votre mot de passe</label>
</div>

<div class="md-form">
  <i class="fa fa-lock prefix grey-text"></i>
  <input type="password" name="confirmationDuMotDePasse" id="confirmaMotDePasse" maxlength="25" class="form-control" required>
  <label for="orangeForm-pass">Confirmation du mot de passe</label>
</div>

<!--#############Coordonnées longitude, latitude################-->

<div class="md-form">
  <input class="form-control" type="hidden" 
  name="latitude" id="idLatitude" 
  placeholder="" 
  value="" class="success"/>
  <label for="idLatitude"></label>
</div>

<div class="md-form">
  <input class="form-control" type="hidden" 
  name="longitude" id="idLongitude" 
  placeholder="" 
  value="" class="success"/>
  <label for="idLongitude"></label>
</div>

<!--#############Fin Coordonnées longitude, latitude################-->              
<div class="text-center">
  <button class="btn btn-deep-orange">S'inscrire</button>
</div>

</form>
<!-- Form register -->


<center><a href="NW.php" style="font-size: 150%;">Retour à l'accueil</a></center>
</div>
<?php


      if(isset($_POST['nomUser']) && ($_POST['prenomUser']) && ($_POST['pseudoUser']) && ($_POST['email']) && ($_POST['motDePasse']) && ($_POST['confirmationDuMotDePasse']) && ($_POST['rue']) && ($_POST['codePostal']) && ($_POST['ville']) && ($_POST['adresse']) && ($_POST['role'])) //rajouter '&' pour prenom, pseudo, email et mdp
      {

          //faire la requete qui cherche le prochain identifiant pour l'utilisateur
        $txtReq="SELECT ifnull(max(idUser),1000)+1 FROM Utilisateur";
        $resultatIdentifiant=mysqli_query($base,$txtReq) or die (mysqli_error());
        $sonIdentifiant=mysqli_fetch_row($resultatIdentifiant)[0];  
        $motDePasseCrypte=sha1($_POST['motDePasse']);

        //  $tabInfresultatmdp = sha1('motDePasse');
         $txtReqInsert = "INSERT INTO Utilisateur (idUser, nomRole, nomUser, prenomUser, pseudoUser, email, motDePasse, rue, codePostal, ville, adresse) VALUES('$sonIdentifiant', '$_POST[role]','$_POST[nomUser]','$_POST[prenomUser]','$_POST[pseudoUser]','$_POST[email]','$motDePasseCrypte','$_POST[rue]','$_POST[codePostal]','$_POST[ville]','$_POST[adresse]')";

          $resInsert=mysqli_query($base,$txtReqInsert);

          if($resInsert)
          {
            ?>
            <p>Votre inscription a bien été prise en compte vous pouvez désormais vous connecter <a href="connexion.php"></a></p>
            <script language="javascript">
             alert("Inscription réussie");
             window.document.location="NW.php";
           </script>
           <?php
         }  
         else
         {
          echo "<div>
          <h2>Problème serveur</h2>
          <p>Avertissement: Un problème de connexion à la base de données s'est produit</p>
          <p>L'équipe technique a été avertie</p>
          <p>Merci de réessayer ultérieurement</p>
          </div>";

        }
      
    }
      else//le formulaire n'a pas encore été posté
      {

      }

      ?>

      <?php
      mysqli_close($base);
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