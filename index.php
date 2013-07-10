<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!-- Charset en UTF-8 pour un bon encodage de la page web -->
</head>

<body>

<!-- Titre centré & animé | page d'accueil du serveur -->
<h1><center>.: Accueil :.</center><br />Serveur web Debian "debian-srv"<br /><center><a href="http://idealogeek.fr/" name="Blog IDEALOGEEK - Accueil" target="_blank">IDEALOGEEK</a></center></h1>

	<p align="justify"> <!-- Présentation succincte du serveur / page web -->
<a href="http://idealogeek.fr/" name="Blog IDEALOGEEK - Accueil" target="_blank">IDEALOGEEK</a> vous propose un serveur web basé sur Debian 7.1 Stable « Wheezy » ; Le serveur a été préalablement installé et configuré pour que vous puissiez l'utiliser dès son démarrage. <br/>
Plusieurs fonctionnalités ont été installées (« <em>apache2</em> », « <em>mysql-server</em> », « <em>openssl</em> » ...) et bien d'autres.
	</p>
<hr width="50%" />
	<p align="justify"> <!-- Variables pour affichage d'informations techniques relatives au serveur web -->
<fieldset><legend><h3>Informations techniques du serveur</h3></legend>
<?php
	echo "<u>Plateforme de serveur web installée</u> : <i>".$_SERVER["SERVER_SOFTWARE"]."</i><br />";
	echo "<u>Nom du serveur web</u> : <i>".$_SERVER["SERVER_NAME"]."</i><br />";
	echo "<u>Adresse IP du serveur web</u> : <i>".$_SERVER["SERVER_ADDR"]."</i><br />";
	echo "<u>Port du serveur web</u> : <i>".$_SERVER["SERVER_PORT"]."</i><br />";
	echo "<u>Emplacement du dossier « web »</u> : <i>".$_SERVER["DOCUMENT_ROOT"]."</i><br />";
?>
</fieldset>
	</p>
<hr width="50%" />
	<p align="justify"> <!-- Présentation succincte du serveur / page web -->
<h3>Menu principal</h3>
<ul>
	<li><a href="doc-srv-www.html" name="Documentation de ce serveur web - Fournie par IDEALOGEEK.fr"><b>Documentation</b> du serveur + Informations complémentaires</a></li>
	<li><a href="/phpmyadmin" name="PHPMyAdmin - Gestion des bases de données" target="_blank"><b>PHPMyAdmin - Gestion des bases de données MySQL</b></a></li>
	<li><a href="/debian-srv/gestion" name="Panneau d'administration du serveur web Apache2" target=""><b>Gestion du dossier web</b></a></li>
</ul>
	</p>

	<p align="justify"> <!-- Présentation succincte du serveur / page web -->
<ul>
	<li><a href="http://idealogeek.fr/" name="Blog IDEALOGEEK - Accueil" target="_blank"><b>IDEALOGEEK</b> - Accueil du blog</a></li>
	<li><a href="http://idealogeek.fr/contact/" name="IDEALOGEEK - Formulaire de contact" target="_blank"><b>IDEALOGEEK - Me contacter</b> via le formulaire du blog</a> | <a href="mailto:contact@idealogeek.fr" name="Envoyer un mail à IDEALOGEEK"><b>Envoyer un mail</b> à Julien (Administrateur IDEALOGEEK)</a></li>
</ul>
	</p>
</body>

</html>
