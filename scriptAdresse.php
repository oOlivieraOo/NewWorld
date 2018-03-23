 <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


<div class="md-form">
    <i class="fa fa-map-marker prefix"></i>
    <input type="text" id="idAdresse" class="form-control" name="adresse" placeholder="Entrez votre adresse complète" list="datalistAdresses" required>
    <datalist id="datalistAdresses">
    </datalist>
</div>
<script>
/*function remplirListeDesAdresses()
{

  //recup du debut de l'adresse saisie
  var debutAdresse=document.getElementById('idAdresse').value;

  if(debutAdresse.length >9)//à partir de 10 caractères
  {
	  var dataListeAdresses=document.getElementById('datalistAdresses');
	  //j'efface toutes les options de la datalist
	  var noAdresse;
	  var nbAdresses=dataListeAdresses.length;
	  for (noAdresse = 0; noAdresse < nbAdresses; noAdresse++) 
	  {
	    dataListeAdresses.remove(0);
	  }
	  //je cree ma requete vers le serveur php
	  var request = new XMLHttpRequest();
	  // prise en charge des chgts d'état de la requete
	  request.onreadystatechange = function(response) 
	  {
	    if (request.readyState === 4) 
	    {
	      if (request.status === 200) 
	      {
		// j'obtient la reponse au format json et l'analyse on obtient un tableau
		var jsonResponse = JSON.parse(request.responseText);
		// pour chaque ligne du tableau.
		var noLigne;
		for(noLigne=0;noLigne<jsonResponse.features.length;noLigne++)
		{ 
			// Cree une nouvelle <option>.
			var nouvelleOption = document.createElement('option');
			// on renseigne la value de l'option avec le numéro du produit.
			$(nouvelleOption).val(jsonResponse.features[noLigne].properties.label);
			$(nouvelleOption).text(nouvelleOption.value);
			// ajout  de l'<option> en tant qu'enfant de la liste de selection des produits.
			$(dataListeAdresses).append(nouvelleOption);
		}

	       } 
	       else 
	       {
		  // An error occured :(
		  alert("Erreur de chargement de la datalist :(");
	       }
	    }
	  };
	  var debutAdresse=document.getElementById('idAdresse').value;
	  //formation du texte de la requete
      var texteRequeteAjax='https://api-adresse.data.gouv.fr/search/?q='+debutAdresse;
      //je l'ouvre
      request.open('GET', texteRequeteAjax, true);

	  //j'envoie le resultat
	  request.send();
  }//fin du si + de 9 caractères ont été saisi
}*/
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
		$('#idCodePostal').val(ui.item.postcode);
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