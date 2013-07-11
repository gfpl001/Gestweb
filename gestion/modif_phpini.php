<?php // -- Script par IDEALOGEEK --
  $fichier_affichage = shell_exec("echo cat /etc/php5/apache2/php.ini >> /var/www/gestion/script.sh");
  $affichage = shell_exec("/var/www/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /var/www/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
?>
<html>

<head>
<link rel="stylesheet" href="style.css">
</head>

<body>

<ul id="menu">
  <li><a href="index.php" title="Retourner à l'accueil de l'administration">Retour</a></li>
  <li><a href="#" title="Editer le fichier">Edition</a></li>
  <li><a href="#" title="Sauvegarder le fichier">Sauvegarder</a></li>
</ul>

<center><h2>Affichage du fichier "php.ini"</h2></center>
Toutes les modifications effectuées sur ce fichier peuvent avoir des conséquences fatales quant à votre serveur web. Veuillez donc faire très attention aux manipulations effectuées.
<br /><br />
<fieldset align="justify"><pre><?php echo $affichage; ?></pre></fieldset>

</body>

</html>
