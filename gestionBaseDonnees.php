<?php
/*
*
*
*	Présentation de la base de données
*
*
*
*/
		class gestionBaseDonnees {
		public $mysqli = null;	//Déclaration de la classe + création de la var mysqli

	/**
	  * Ajoute un utilisateur
	  *
	  * @param string $iUser Identifiant de l'utilisateur
	  *	@param string $email Mail de l'utilisateur
	  * @param string $motDePasse Mot de passe de l'utilisateur
	  *
	 */
	public function addUtilisateur($idUser, $email, $motDePasse, $pseudoUser) {
		$query = "INSERT INTO Utilisateur (idUser, nomUser, prenomUser, pseudoUser, dateInscription, motDePasse, email) VALUES (".$idUser.",'".$email."','".$motDePasse."','".$pseudoUser."')";
		return $this->runQuery($query);
	}

	/**
	  * Supprime un utilisateur
	  *
	  * @param string $idUser Identifiant de l'utilisateur
	  *
	  *
	  *
	*/
	public function delUtilisateur($idUser) {
		$query = "DELETE FROM Utilisateur where idUser = ".$idUser;
		return $this->runQuery($query);
	}

}
?>
