<?php // -- Script par IDEALOGEEK --

// RENOMMER UN DOSSIER A LA RACINE DU DOCUMENT-ROOT WEB
if ( (isset($_POST["dossier"])) && ($_POST["renommage"]=='1') && (count($_POST) != 0) ) // Si le POST[dossier] existe, que le POST[renommage] est égal à 1 et que les POST ne sont pas vides...
{
  $ancien_dossier = addslashes($_POST["nom-dossier-origine"]); $nouveau_dossier = addslashes($_POST["nouveau-nom-dossier"]); // Récupération des variables
  $emplacement = htmlspecialchars($_POST["emplacement"]);

  $delete = shell_exec("echo mv ".$emplacement."/".$ancien_dossier." ".$emplacement."/".$nouveau_dossier." >> '/var/www/gestion/script.sh'"); // On bouge l'ancien dossier (connu par la variable $ancien_dossier) en temps que $nouveau_dossier -> les modifs sont saisies dans le script.sh, permettant de lancer les commandes dans le serveur
  $execution = shell_exec("/var/www/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /var/www/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
?>
<html>
<body>
	<h1>Modification d'un dossier... Réussite !</h1>
Le dossier <b>« <?php echo $ancien_dossier; ?> »</b> a été déplacé / renommé en <b>« <?php echo $nouveau_dossier; ?> »</b> !<br />
Redirection automatique dans deux (2) secondes...
<meta http-equiv="Refresh" content="2;url=index.php">
</body>
</html>

<?php
}
else if ( (isset($_POST["fichier"])) && ($_POST["renommage"]=='1') && (count($_POST) != 0) ) // Si le POST[fichier] existe, que le POST[renommage] est égal à 1 et que les POST ne sont pas vides...
{
  $ancien_fichier = htmlspecialchars($_POST["nom-fichier-origine"]); $nouveau_fichier = htmlspecialchars($_POST["nouveau-nom-fichier"]);
  $emplacement = htmlspecialchars($_POST["emplacement"]);

  $delete = shell_exec("echo mv ".$emplacement."/".$ancien_fichier." ".$emplacement."/".$nouveau_fichier." >> '/var/www/gestion/script.sh'");
  $execution = shell_exec("/var/www/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /var/www/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
?>
<html>
<body>
	<h1>Modification d'un fichier... Réussite !</h1>
Le fichier <b>« <?php echo $ancien_fichier; ?> »</b> a été déplacé / renommé en <b>« <?php echo $nouveau_fichier; ?> »</b> !<br />
Redirection automatique dans deux (2) secondes...
<meta http-equiv="Refresh" content="2;url=index.php">
</body>
</html>
<?php
} ?>
