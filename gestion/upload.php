<?php
$uploaddir = '/srv/http/debian-srv/'; // Racine du dossier web
$uploadfile = $uploaddir . basename($_FILES['fichiers']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['fichiers']['tmp_name'], $uploadfile)) {
    echo "Téléchargement réussi -";
} else {
    echo "Erreur lors du téléchargement : <br />";
}
echo '</pre>';

?>
