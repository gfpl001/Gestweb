<?php // -- Script par IDEALOGEEK --

// SUPPRESSION D'UN DOSSIER
if ( (isset($_POST["dossier"])) && ($_POST["delete"]=='1') && (count($_POST) != 0) ) // Si le POST[dossier] existe, que le POST[delete] est égal à 1 et que les POST ne sont pas vides...
{
  $dossier = htmlspecialchars($_POST["nom-dossier"]); // Récupération de la variable contenant le nom du dossier
  $emplacement = htmlspecialchars($_POST["emplacement"]);

  $delete = shell_exec("echo rm -rf ".$emplacement."/".$dossier." >> /srv/http/debian-srv/Gestweb/gestion/script.sh");
  $execution = shell_exec("/srv/http/debian-srv/Gestweb/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /srv/http/debian-srv/Gestweb/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
?>

<html>
<body>
	<h1>Suppression d'un dossier... Réussite !</h1>
Le dossier <b>« <?php echo $dossier; ?> »</b> a été supprimé - Tout le contenu de ce dossier a été effacé !<br />
Redirection automatique dans deux (2) secondes...
<meta http-equiv="Refresh" content="2;url=index.php">
</body>
</html>
<?php
}

else if ( (isset($_POST["fichier"])) && ($_POST["delete"]=='1') && (count($_POST) != 0) ) // Si le POST[fichier] existe, que le POST[delete] est égal à 1 et que les POST ne sont pas vides...
{  
  $fichier = htmlspecialchars($_POST["nom-fichier"]);
  $emplacement = htmlspecialchars($_POST["emplacement"]);

  $delete = shell_exec("echo rm ".$emplacement."/".$fichier." >> /srv/http/debian-srv/Gestweb/gestion/script.sh");
  $execution = shell_exec("/srv/http/debian-srv/Gestweb/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /srv/http/debian-srv/Gestweb/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
?>

<html>
<body>
	<h1>Suppression du fichier... Réussite !</h1>
Le fichier <b>« <?php echo $fichier; ?> »</b> a été supprimé !<br />
Redirection automatique dans deux (2) secondes...
<meta http-equiv="Refresh" content="2;url=index.php">
</body>
</html>
<?php
} ?>
