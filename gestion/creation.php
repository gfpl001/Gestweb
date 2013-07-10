<?php // -- Script par IDEALOGEEK --

// CREATION D'UN DOSSIER A LA RACINE DU DOCUMENT-ROOT WEB
if ( (isset($_POST["dossier"])) && ($_POST["creation"]=='1') && (count($_POST) != 0) ) // Si le POST[dossier] existe, que le POST[creation] est égal à 1 et que les POST ne sont pas vides...
{
  $dossier = htmlspecialchars($_POST["nom-dossier"]);

  $ajout_dossier = shell_exec("echo mkdir /srv/http/debian-srv/".$dossier." >> /srv/http/debian-srv/gestion/script.sh");
  $droits_dossier = shell_exec("echo chmod 755 /srv/http/debian-srv/".$dossier." >> /srv/http/debian-srv/gestion/script.sh");
  $execution = shell_exec("/srv/http/debian-srv/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /srv/http/debian-srv/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
?>

<html>
<body>
	<h1>Création d'un dossier... Réussite !</h1>
Le dossier <b>« <?php echo $dossier; ?> »</b> a été créé ! <br />
Redirection automatique dans deux (2) secondes...
<meta http-equiv="Refresh" content="2;url=index.php">
</body>
</html>

<?php
}

else if ( (isset($_POST["fichier"])) && ($_POST["creation"]=='1') && (count($_POST) != 0) ) // Si le POST[fichier] existe, que le POST[creation] est égal à 1 et que les POST ne sont pas vides...
{
  $fichier = htmlspecialchars($_POST["nom-fichier"]);
  $contenu_fichier = addslashes($_POST["contenu-fichier"]);

  $ajout_fichier = shell_exec("echo touch /srv/http/debian-srv/".$fichier." >> /srv/http/debian-srv/gestion/script.sh");
  $droits_fichier = shell_exec("echo chmod 664 /srv/http/debian-srv/".$fichier." >> /srv/http/debian-srv/gestion/script.sh");
  $ajout_contenu_fichier = shell_exec("echo ".$contenu_fichier." >> /srv/http/debian-srv/".$fichier);
  $execution = shell_exec("/srv/http/debian-srv/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /srv/http/debian-srv/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
?>
<html>
<body>
	<h1>Création d'un fichier... Réussite !</h1>
Le dossier <b>« <?php echo $fichier; ?> »</b> a été créé ! <br />
Redirection automatique dans deux (2) secondes...
<meta http-equiv="Refresh" content="2;url=index.php">
</body>
</html>
<?php
} ?>
