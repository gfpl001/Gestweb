<?php // -- Script par IDEALOGEEK --

$server = $_POST["server"];

// REBOOT DU SERVEUR WEB
if ( (isset($server)) && $server=="srv-web")
{
	if ($_POST["reboot-www"]=='1')
	{
		$reboot = shell_exec("echo /etc/init.d/apache2 restart >> /var/www/gestion/script.sh");
		$execution = shell_exec("sudo /var/www/gestion/script.sh"); // On exécute le script précédemment rempli
		$reset = shell_exec("echo '#!/bin/sh' > /var/www/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
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
}	

// DEMARRAGE SERVEUR MYSQL
elseif ( (isset($server)) && $server=="srv-mysql")
{
	if ($_POST["start-mysql"]=='1')
	{
		$start = shell_exec("echo /etc/init.d/mysql start >> /var/www/gestion/script.sh");
		$execution = shell_exec("sudo /var/www/gestion/script.sh"); // On exécute le script précédemment rempli
		$reset = shell_exec("echo '#!/bin/sh' > /var/www/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
	}
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

// REDEMARRAGE SERVEUR MYSQL
	elseif ( ($_POST["reboot-mysql"]=='1') )
	{
		$start = shell_exec("echo /etc/init.d/mysql restart >> /var/www/gestion/script.sh");
		$execution = shell_exec("sudo /var/www/gestion/script.sh"); // On exécute le script précédemment rempli
		$reset = shell_exec("echo '#!/bin/sh' > /var/www/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
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


// ARRÊT SERVEUR MYSQL
	elseif ( ($_POST["halt-mysql"]=='1') )
	{
		$start = shell_exec("echo /etc/init.d/mysql stop >> /var/www/gestion/script.sh");
		$execution = shell_exec("sudo /var/www/gestion/script.sh"); // On exécute le script précédemment rempli
		$reset = shell_exec("echo '#!/bin/sh' > /var/www/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
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
	}	
	else
	{ echo "Aucune opération effectuée sur le serveur MySQL.<br />"; }
}?>
