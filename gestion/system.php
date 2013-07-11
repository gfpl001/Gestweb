<?php // -- Script par IDEALOGEEK --

// REBOOT DU SERVEUR WEB
if ( (isset($_POST["srv-web"])) && ($_POST["reboot"]=='1') && (count($_POST) != 0) )
{
  $reboot = shell_exec("echo /etc/init.d/apache2 restart >> /srv/http/debian-srv/Gestweb/gestion/script.sh");
  $execution = shell_exec("/srv/http/debian-srv/Gestweb/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /srv/http/debian-srv/Gestweb/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
?>

<html>
<body>
	<h1>Commande de redémarrage du serveur WEB... Effectuée !</h1>
Le serveur est en train de redémarrer automatiquement.<br />
Redirection automatique dans une (1) minute...
<meta http-equiv="Refresh" content="10;url=index.php">
</body>
</html>

<?php
} 

// EXTINCTION DU SERVEUR WEB
else if ( (isset($_POST["srv-web"])) && ($_POST["halt"]=='1') && (count($_POST) != 0) )
{
  $halt = shell_exec("echo /etc/init.d/apache2 stop >> /srv/http/debian-srv/Gestweb/gestion/script.sh");
  $execution = shell_exec("/srv/http/debian-srv/Gestweb/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /srv/http/debian-srv/Gestweb/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées

// Le serveur étant éteint, il n'est donc pas possible d'afficher un message...
}





// DEMARRAGE SERVEUR MYSQL
else if ( (isset($_POST["srv-mysql"])) && ($_POST["start"]=='1') && (count($_POST) != 0) )
{
  $start = shell_exec("echo /etc/init.d/mysql start >> /srv/http/debian-srv/Gestweb/gestion/script.sh");
  $execution = shell_exec("/srv/http/debian-srv/Gestweb/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /srv/http/debian-srv/Gestweb/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
?>
<html>
<body>
	<h1>Commande d'allumage du serveur MySQL... Effectuée !</h1>
Le serveur est en train de démarrer automatiquement.<br />
Redirection automatique dans une (1) minute...
<meta http-equiv="Refresh" content="10;url=index.php">
</body>
</html>

<?php
} 

// REDEMARRAGE SERVEUR MYSQL
else if ( (isset($_POST["srv-mysql"])) && ($_POST["reboot"]=='1') && (count($_POST) != 0) )
{
  $start = shell_exec("echo /etc/init.d/mysql restart >> /srv/http/debian-srv/Gestweb/gestion/script.sh");
  $execution = shell_exec("/srv/http/debian-srv/Gestweb/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /srv/http/debian-srv/Gestweb/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
?>
<html>
<body>
	<h1>Commande de redémarrage du serveur MySQL... Effectuée !</h1>
Le serveur est en train de redémarrer automatiquement.<br />
Redirection automatique dans une (1) minute...
<meta http-equiv="Refresh" content="10;url=index.php">
</body>
</html>

<?php
} 

// DEMARRAGE SERVEUR MYSQL
else if ( (isset($_POST["srv-mysql"])) && ($_POST["halt"]=='1') && (count($_POST) != 0) )
{
  $start = shell_exec("echo /etc/init.d/mysql stop >> /srv/http/debian-srv/Gestweb/gestion/script.sh");
  $execution = shell_exec("/srv/http/debian-srv/Gestweb/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /srv/http/debian-srv/Gestweb/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
?>
<html>
<body>
	<h1>Commande d'arrêt du serveur MySQL... Effectuée !</h1>
Le serveur est en train de s'arrêter automatiquement.<br />
Redirection automatique dans deux (2) secondes...
<meta http-equiv="Refresh" content="2;url=index.php">
</body>
</html>

<?php
} ?>
