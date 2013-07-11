<?php
$taille_fichier = filesize($_FILES['fichier']['tmp_name']);
$taille_maxi = 1000000;

if( (isset($_FILES["fichier"])) && (count($_POST) != 0) )
{ 
     $dossier = $_POST["dossier"];
     $fichier = basename($_FILES["fichier"]["name"]);
     if(move_uploaded_file($_FILES["fichier"]["tmp_name"], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo "Upload effectué avec succès !";
		  Header ("Location: index.php"); //Redirection auto
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          if($taille_fichier>$taille_maxi)
			{
				 $erreur = 'Le fichier est trop gros';
			}
		  echo "Echec de l'upload !";
     }
}
?>