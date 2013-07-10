﻿<?php // -- Script par IDEALOGEEK --

// LISTE DES DOSSIERS & FICHIERS A LA RACINE
if ( (count($_POST) != 0) )
{ 
  if (isset($_POST["nom-dossier"])) { $dossier = htmlspecialchars($_POST["nom-dossier"]); } // Si le POST[nom-dossier] existe, alors on récupère le contenu de la variable
  else { $affichage = shell_exec('ls -alh /srv/http/debian-srv'); } // Sinon, on montre le dossier web par défaut

  if (isset($_POST["nom-fichier"])) { $fichier = htmlspecialchars($_POST["nom-fichier"]); } // Si le POST[nom-fichier] existe, alors on récupère le contenu de la variable

  if ( (isset($_POST["move"])) && ($_POST["move"] == 1) ) // Si le POST[move] existe et qu'il est égal à 1
  { 
   $deplacement = shell_exec("cd ".$dossier); // On se déplace dans le dossier (variable précédemment récupérée)
   echo "<fieldset align='center'>Vous êtes dans le dossier « <b>".$dossier."</b> ».</fieldset>"; // Affichage "tête haute" tout en haut de la page web
   $affichage = shell_exec('ls -alh '.$dossier); // Exécution de l'affichage du dossier choisi (variable précédemment récupérée)
  } 

  else if ( (isset($_POST["liste"])) && ($_POST["liste"] == 1) )
  { 
  echo "<fieldset align='center'>Vous affichez le contenu du dossier « <b>".$dossier."</b> ».</fieldset>";
  $affichage = shell_exec('ls -h '.$dossier);
  }

  else if ( (isset($_POST["voir-fichier"])) && ($_POST["voir-fichier"] == 1) )
  { 
  echo "<fieldset align='center'>Vous affichez le fichier « <b>".$_POST["nom-fichier"]."</b> ».</fieldset>";
  $fichier_affichage = shell_exec("echo cat ".$_POST["nom-fichier"]." >> /srv/http/debian-srv/gestion/script.sh");
  $affichage = shell_exec("/srv/http/debian-srv/gestion/script.sh"); // On exécute le script précédemment rempli
  $reset = shell_exec("echo '#!/bin/sh' > /srv/http/debian-srv/gestion/script.sh"); // Remise à zéro du fichier / script pour effectuer de nouvelles commandes, sans avoir les commandes précédemment effectuées
  }
}
else { echo "<fieldset align='center'>Vous êtes dans le dossier d'origine, soit « <b>/var/www/</b> »</fieldset>"; $affichage = shell_exec('ls -alh /srv/http/debian-srv'); } // Dossier web par défaut si aucun dossier sélectionné

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
    <style type="text/css">
        .onglet
        {
                display:inline-block;
                margin-left:3px;
                margin-right:3px;
                padding:3px;
                border:1px solid black;
                cursor:pointer;
        }
        .onglet_0
        {
                background:#bbbbbb;
                border-bottom:1px solid black;
        }
        .onglet_1
        {
                background:#dddddd;
                border-bottom:0px solid black;
                padding-bottom:4px;
        }
        .contenu_onglet
        {
                background-color:#dddddd;
                border:1px solid black;
                margin-top:-1px;
                padding:5px;
                display:none;
        }
        ul
        {
                margin-top:0px;
                margin-bottom:0px;
                margin-left:-10px
        }
        h1
        {
                margin:0px;
                padding:0px;
        }
        </style>

</head>

<body>
<br /><h1>Administration du serveur web « Apache2 »</h1>
<br />

<table><td>
<!-- Liste des dossiers -->
<fieldset><legend><h2>Liste des fichiers & dossiers</h2></legend>
	<fieldset align="justify"><pre><?php echo $affichage; ?></pre></fieldset><hr />
	<form action="#" method="POST">
		<input type="hidden" name="liste" value="1" />
	<!-- Choix d'un dossier à lister -->
		Nom du <b>dossier à afficher</b> : <input type="text" name="nom-dossier" value="<?php if (isset($_POST['nom-dossier'])) { echo $_POST['nom-dossier']; } else { echo '/var/www/'; } ?>" /> <input type="submit" name="Voir le dossier" value="Voir le dossier" />
	</form>

	<form action="#" method="POST">
		<input type="hidden" name="voir-fichier" value="1" />
	<!-- Choix d'un fichier à afficher -->
		Nom du <b><u>fichier</u> à afficher</b> : <input type="text" name="nom-fichier" value="<?php if (isset($_POST['nom-dossier'])) { echo $_POST['nom-dossier']; } else { echo '/var/www/'; } ?>" /> <input type="submit" name="Voir le fichier" value="Voir le fichier" />
	</form>

	<form action="#" method="POST">
		<input type="hidden" name="move" value="1" />
	<!-- Choix d'un dossier dans lequel il faut se déplacer -->
		<b>Se déplacer</b> dans un dossier : <input type="text" name="nom-dossier" value="<?php if (isset($_POST['nom-dossier'])) { echo $_POST['nom-dossier']; } else { echo '/var/www/'; } ?>" /> <input type="submit" name="Se déplacer" value="Se déplacer" />
	</form></td>


<td>

<div class="systeme_onglets">
        <div class="onglets">
            <span class="onglet_0 onglet" id="onglet_dossiers" onclick="javascript:change_onglet('dossiers');">Gestion dossiers</span>
            <span class="onglet_0 onglet" id="onglet_fichiers" onclick="javascript:change_onglet('fichiers');">Gestion fichiers</span>
        </div>
        <div class="contenu_onglets">
            <div class="contenu_onglet" id="contenu_onglet_dossiers">
                <h1>Gestion des dossiers</h1>
		<form action="creation.php" method="POST">
		<input type="hidden" name="creation" value="1" /> <input type="hidden" name="dossier" value="1" />
		<!-- Création d'un dossier -->
			<fieldset><legend><h2>Création d'un dossier</h2></legend>
			Nom du dossier : <input type="text" name="nom-dossier" /> 
<input type="submit" name="Créer le dossier" value="Créer le dossier" />
	
			</fieldset>
		</form>

		<form action="delete.php" method="POST">
		<input type="hidden" name="delete" value="1" /> <input type="hidden" name="dossier" value="1" />
		<!-- Suppression d'un dossier -->
			<fieldset><legend><h2>Suppression d'un dossier</h2></legend>
			Nom du dossier : <input type="text" name="nom-dossier" /> 
<input type="submit" name="Supprimer le dossier" value="Supprimer le dossier" />
			</fieldset>
		</form>

		<form action="renommage.php" method="POST">
		<input type="hidden" name="renommage" value="1" /> <input type="hidden" name="dossier" value="1" />
		<!-- Renommer d'un dossier -->
			<fieldset><legend><h2>Renommage d'un dossier</h2></legend>
			Nom du dossier à renommer : <input type="text" name="nom-dossier-origine" /> <hr />
			Nouveau nom du dossier : <input type="text" name="nouveau-nom-dossier" /> 
<input type="submit" name="Renommer le dossier" value="Renommer le dossier" />
			</fieldset>
		</form>
            </div>

            <div class="contenu_onglet" id="contenu_onglet_fichiers">
                <h1>Gestion des fichiers</h1>
		<form action="creation.php" method="POST">
		<input type="hidden" name="creation" value="1" /> <input type="hidden" name="fichier" value="1" />
		<!-- Création d'un dossier -->
			<fieldset><legend><h2>Création d'un fichier</h2></legend>
			Nom du fichier : <input type="text" name="nom-fichier" /> <br />
			Contenu du fichier : <textarea name="contenu-fichier" rows="6" cols="25"> </textarea> <br />
		<center><input type="submit" name="Créer le fichier" value="Créer le fichier" /></center>
	
			</fieldset>
		</form>

		<form action="delete.php" method="POST">
		<input type="hidden" name="delete" value="1" /> <input type="hidden" name="fichier" value="1" /> 
		<!-- Suppression d'un dossier -->
			<fieldset><legend><h2>Suppression d'un fichier dans</h2></legend>
			Nom du fichier : <input type="text" name="nom-fichier" /> <input type="submit" name="Supprimer le fichier" value="Supprimer le fichier" />
			</fieldset>
		</form>

		<form action="renommage.php" method="POST">
		<input type="hidden" name="renommage" value="1" /> <input type="hidden" name="fichier" value="1" />
		<!-- Renommer d'un dossier -->
			<fieldset><legend><h2>Renommage d'un fichier</h2></legend>
			Nom du fichier à renommer : <input type="text" name="nom-fichier-origine" /> <hr />
			Nouveau nom du fichier : <input type="text" name="nouveau-nom-fichier" /> <input type="submit" name="Renommer le fichier" value="Renommer le fichier" />
			</fieldset>
		</form>
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

<hr width="50%" />

<fieldset><legend><h3>Envoi de fichiers</h3></legend>
<form action="upload.php" method="POST" enctype="multipart/form-data">
Fichier à envoyer : <input type="file" name="fichiers" /><br />
<input type="submit" name="envoyer" value="Envoyer le fichier" />
</form>
</fieldset>

</body>
</html>