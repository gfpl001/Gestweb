<?php // -- Script par IDEALOGEEK --

// LISTE DES DOSSIERS & FICHIERS A LA RACINE
if ( (count($_POST) != 0) )
{ 
  if (isset($_POST["nom-dossier"])) { $dossier = htmlspecialchars($_POST["nom-dossier"]); } // Si le POST[nom-dossier] existe, alors on récupère le contenu de la variable
  else { $affichage = shell_exec('ls -alh /srv/http/debian-srv/Gestweb'); } // Sinon, on montre le dossier web par défaut

  if (isset($_POST["nom-fichier"])) { $fichier = htmlspecialchars($_POST["nom-fichier"]); } // Si le POST[nom-fichier] existe, alors on récupère le contenu de la variable

  if ( (isset($_POST["move"])) && ($_POST["move"] == 1) ) // Si le POST[move] existe et qu'il est égal à 1
  { 
   $deplacement = shell_exec("cd ".$dossier); // On se déplace dans le dossier (variable précédemment récupérée)
   echo "<fieldset align='center'>Vous êtes dans le dossier « <b>".$dossier."</b> ».</fieldset>"; // Affichage "tête haute" tout en haut de la page web
   $affichage = shell_exec('ls -alh '.$dossier); // Exécution de l'affichage du dossier choisi (variable précédemment récupérée)
  }

  else if ( (isset($_POST["voir-fichier"])) && ($_POST["voir-fichier"] == 1) )
  { 
  echo "<fieldset align='center'>Vous affichez le fichier « <b>".$_POST["nom-fichier"]."</b> ».</fieldset>";
  $fichier_affichage = shell_exec("echo cat ".$dossier."/".$_POST["nom-fichier"]." >> /srv/http/debian-srv/Gestweb/gestion/script.sh");
  $affichage = shell_exec("/srv/http/debian-srv/Gestweb/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /srv/http/debian-srv/Gestweb/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
  }
}
else { echo "<fieldset align='center'>Vous êtes dans le dossier d'origine, soit « <b>/srv/http/debian-srv/Gestweb</b> »</fieldset>"; $affichage = shell_exec('ls -alh /srv/http/debian-srv/Gestweb'); } // Dossier web par défaut si aucun dossier sélectionné

?>


<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!-- Charset en UTF-8 pour un bon encodage de la page web -->

<script type="text/javascript">
        //<!--
                function change_onglet(name)
                {
                        document.getElementById('onglet_'+anc_onglet).className = 'onglet_0 onglet';
                        document.getElementById('onglet_'+name).className = 'onglet_1 onglet';
                        document.getElementById('contenu_onglet_'+anc_onglet).style.display = 'none';
                        document.getElementById('contenu_onglet_'+name).style.display = 'block';
                        anc_onglet = name;
                }
        //-->
</script>
<link rel="stylesheet" href="style.css">

</head>

<body>
<br /><center><h1>Administration du serveur web « Apache2 »</h1></center>
<br />

<table><td>
<!-- Liste des dossiers -->
<fieldset><legend><h2>Liste des fichiers & dossiers</h2></legend>
	<fieldset align="justify"><pre><?php echo $affichage; ?></pre></fieldset><hr />
	
	<form action="#" method="POST">
		<input type="hidden" name="move" value="1" />
	<!-- Choix d'un dossier dans lequel il faut se déplacer -->
		<input type="text" name="nom-dossier" size="40" value="<?php if (isset($dossier)) { echo $dossier; } else { echo '/srv/http/debian-srv/Gestweb/'; } ?>" /> <input type="submit" name="Se déplacer" value="Se déplacer dans un dossier" />
	</form>

	<form action="#" method="POST">
		<input type="hidden" name="voir-fichier" value="1" />
	<!-- Choix d'un fichier à afficher -->
		<input type="text" name="nom-fichier" size="40" value="<?php if (isset($dossier)) { echo $dossier; } else { echo '/srv/http/debian-srv/Gestweb/'; } ?>" /> <input type="submit" name="Voir le fichier" value="Afficher le contenu du fichier" />
	</form>

<fieldset><legend><h3>Envoi d'un fichier</h3></legend>
	<form action="upload.php" method="POST" enctype="multipart/form-data">
	Fichier à envoyer : <input type="file" name="fichiers" /><br />
	<input type="submit" name="envoyer" value="Envoyer le fichier" />
	</form>
</fieldset>

	</td>


<td>

<div class="systeme_onglets">
        <div class="onglets">
            <span class="onglet_0 onglet" id="onglet_dossiers" onclick="javascript:change_onglet('dossiers');">Gestion dossiers</span>
            <span class="onglet_0 onglet" id="onglet_fichiers" onclick="javascript:change_onglet('fichiers');">Gestion fichiers</span>
            <span class="onglet_0 onglet" id="onglet_serveur" onclick="javascript:change_onglet('serveur');">Gestion du serveur</span>
        </div>
        <div class="contenu_onglets">
            <div class="contenu_onglet" id="contenu_onglet_dossiers">
                <center><h1>Gestion des dossiers</h1> dans <b><?php if (isset($dossier)) { echo $dossier; } else { echo '/srv/http/debian-srv/Gestweb/'; } ?></b></center><hr />
		<form action="creation.php" method="POST">
		<input type="hidden" name="creation" value="1" /> <input type="hidden" name="dossier" value="1" /> <input type="hidden" name="emplacement" value="<?php if (isset($dossier)) { echo $dossier; } else { echo '/srv/http/debian-srv/Gestweb/'; } ?>" />
		<!-- Création d'un dossier -->
			<fieldset><legend><h2>Création d'un dossier</h2></legend>
			Nom du dossier : <input type="text" name="nom-nouveau-dossier" /> 
<input type="submit" name="Créer le dossier" value="Créer le dossier" />
	
			</fieldset>
		</form>

		<form action="delete.php" method="POST">
		<input type="hidden" name="delete" value="1" /> <input type="hidden" name="dossier" value="1" /> <input type="hidden" name="emplacement" value="<?php if (isset($dossier)) { echo $dossier; } else { echo '/srv/http/debian-srv/Gestweb/'; } ?>" />
		<!-- Suppression d'un dossier -->
			<fieldset><legend><h2>Suppression d'un dossier</h2></legend>
			Nom du dossier : <input type="text" name="nom-dossier" /> 
<input type="submit" name="Supprimer le dossier" value="Supprimer le dossier" />
			</fieldset>
		</form>

		<form action="renommage.php" method="POST">
		<input type="hidden" name="renommage" value="1" /> <input type="hidden" name="dossier" value="1" /> <input type="hidden" name="emplacement" value="<?php if (isset($dossier)) { echo $dossier; } else { echo '/srv/http/debian-srv/Gestweb/'; } ?>" />
		<!-- Renommer d'un dossier -->
			<fieldset><legend><h2>Renommage d'un dossier</h2></legend>
			Nom du dossier à renommer : <input type="text" name="nom-dossier-origine" /> <hr />
			Nouveau nom du dossier : <input type="text" name="nouveau-nom-dossier" /> 
<input type="submit" name="Renommer le dossier" value="Renommer le dossier" />
			</fieldset>
		</form>
            </div>

            <div class="contenu_onglet" id="contenu_onglet_fichiers">
                <center><h1>Gestion des fichiers</h1> dans <b><?php if (isset($dossier)) { echo $dossier; } else { echo '/srv/http/debian-srv/Gestweb/'; } ?></b></center><hr />
		<form action="creation.php" method="POST">
		<input type="hidden" name="creation" value="1" /> <input type="hidden" name="fichier" value="1" /> 
		<!-- Création d'un fichier -->
			<fieldset><legend><h2>Création d'un fichier</h2></legend>
			Nom du fichier : <input type="text" name="nom-fichier" /> <br />

Emplacement du fichier : <input type="text" name="nom-dossier" size="40" value="<?php if (isset($dossier)) { echo $dossier; } else { echo '/srv/http/debian-srv/Gestweb/'; } ?>" /><br />

			Contenu du fichier : <textarea name="contenu-fichier" rows="6" cols="25"> </textarea> <br />
		<center><input type="submit" name="Créer le fichier" value="Créer le fichier" /></center>
	
			</fieldset>
		</form>

		<form action="delete.php" method="POST">
		<input type="hidden" name="delete" value="1" /> <input type="hidden" name="fichier" value="1" /> <input type="hidden" name="emplacement" value="<?php if (isset($dossier)) { echo $dossier; } else { echo '/srv/http/debian-srv/Gestweb/'; } ?>" />
		<!-- Suppression d'un dossier -->
			<fieldset><legend><h2>Suppression d'un fichier</h2></legend>
			Nom du fichier : <input type="text" name="nom-fichier" /> <input type="submit" name="Supprimer le fichier" value="Supprimer le fichier" />
			</fieldset>
		</form>

		<form action="renommage.php" method="POST">
		<input type="hidden" name="renommage" value="1" /> <input type="hidden" name="fichier" value="1" /> <input type="hidden" name="emplacement" value="<?php if (isset($dossier)) { echo $dossier; } else { echo '/srv/http/debian-srv/Gestweb/'; } ?>" />
		<!-- Renommer d'un dossier -->
			<fieldset><legend><h2>Renommage d'un fichier</h2></legend>
			Nom du fichier à renommer : <input type="text" name="nom-fichier-origine" /> <hr />
			Nouveau nom du fichier : <input type="text" name="nouveau-nom-fichier" /> <input type="submit" name="Renommer le fichier" value="Renommer le fichier" />
			</fieldset>
		</form>
            </div>

	    <div class="contenu_onglet" id="contenu_onglet_serveur">
		<ul>
<center><h3>Serveur WEB</h3></center>
			<li><form action="system.php" method="POST"> <input type="hidden" name="reboot-www" value="1" /> <input type="hidden" name="srv-web" value="1" /> <input type="submit" style="background-color: #FFCC33; color: #000000" value="Redémarrer le serveur web" /><form></li>
			<li><form action="system.php" method="POST"> <input type="hidden" name="halt-www" value="1" /> <input type="hidden" name="srv-web" value="1" /> <input type="submit" style="background-color: #CC0000; color: #ffffff" value="Arrêter le serveur web" /><form></li>
<br /><hr /><center><h3>Serveur MySQL</h3></center>
			<li><form action="system.php" method="POST"> <input type="hidden" name="start-mysql" value="1" /> <input type="hidden" name="srv-mysql" value="1" /> <input type="submit" style="background-color: #33CC00; color: #ffffff" value="Démarrer le serveur MySQL" /><form></li>
			<li><form action="system.php" method="POST"> <input type="hidden" name="reboot-mysql" value="1" /> <input type="hidden" name="srv-mysql" value="1" /> <input type="submit" style="background-color: #FFCC33; color: #000000" value="Redémarrer le serveur MySQL" /><form></li>
			<li><form action="system.php" method="POST"> <input type="hidden" name="halt-mysql" value="1" /> <input type="hidden" name="srv-mysql" value="1" /> <input type="submit" style="background-color: #CC0000; color: #ffffff" value="Arrêter le serveur MySQL" /><form></li>
		</ul>
<hr />
<a href="modif_phpini.php">Afficher & Modifier le fichier 'php.ini'</a>
	    </div>

        </div>
    </div>
    <script type="text/javascript">
        //<!--
                var anc_onglet = 'dossiers';
                change_onglet(anc_onglet);
        //-->
    </script>
</td></tr></table>

</fieldset>

</body>
</html>
