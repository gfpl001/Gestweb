<html>
<body>
﻿<?php // -- Script par IDEALOGEEK --

// CREATION D'UN DOSSIER

/*
@ Clean Car
*/
function clean_car($data){
$data=(htmlspecialchars($data));
return $data;
}

/*
@ Secure name folder
*/
function secure_name($name) {
    $except = array('\\', '/', ':', '*', '?', '"', '<', '>', '|');
    return str_replace($except, '', $name);
} 

/*
@ Created Dir
*/
function MakeDirectory($dir, $mode)
{

  if (is_dir($dir) || @mkdir($dir,$mode)) return TRUE; //file created and or exist
  if (!MakeDirectory(dirname($dir),$mode)) return FALSE; // return false Error 
  return @mkdir($dir,$mode);
}


if ( (isset($_POST["dossier"])) && ($_POST["creation"]=='1') && (count($_POST) != 0) ) // Si le POST[dossier] existe, que le POST[creation] est égal à 1 et que les POST ne sont pas vides...
{
	
	secure_name(	$dossier_creation = htmlspecialchars($_POST["nom-nouveau-dossier"]));
  	secure_name(	$emplacement = htmlspecialchars($_POST["emplacement"]));
  	
	if((!empty($dossier_creation))&&(!empty($emplacement))){ //check empty name or not
	
	
	
	MakeDirectory($emplacement."/".$dossier_creation,'755'); //755 or 0755
	}else{ echo 'ERROR EMPTY NAME '; exit; // must change to check if folder has ben created 
	};
  
?>


	<h1>Création d'un dossier... Réussite !</h1>
Le dossier <b>« <?php echo $dossier_creation; ?> »</b> a été créé avec succès ! <br />
Redirection automatique dans deux (2) secondes...
<meta http-equiv="Refresh" content="2;url=index.php">


<?php
}

else if ( (isset($_POST["fichier"])) && ($_POST["creation"]=='1') && (count($_POST) != 0) ) // Si le POST[fichier] existe, que le POST[creation] est égal à 1 et que les POST ne sont pas vides...
{
  $dossier = htmlspecialchars($_POST["nom-dossier"]);
  $fichier = htmlspecialchars($_POST["nom-fichier"]);
  $contenu_fichier = addslashes($_POST["contenu-fichier"]);

  $ajout_fichier = shell_exec("echo touch ".$dossier."/".$fichier." >> /var/www/gestion/script.sh");
  $droits_fichier = shell_exec("echo chmod 764 ".$dossier."/".$fichier." >> /var/www/gestion/script.sh");
  $ajout_contenu_fichier = shell_exec("echo ".$contenu_fichier." >> ".$dossier."/".$fichier);
  $execution = shell_exec("/var/www/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /var/www/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
?>

	<h1>Création d'un fichier... Réussite !</h1>
Le fichier <b>« <?php echo $fichier; ?> »</b> a été créé avec succès ! <br />
Redirection automatique dans deux (2) secondes...
<meta http-equiv="Refresh" content="2;url=index.php">

<?php } ?>
</body>
</html>
