<?php


require '../include/connexion.php';
$id = $_GET['id'];
$req = $db->prepare('DELETE FROM stagiaires where cin = ?');
$req->execute([$id]);

header('location: ./index.php?message=Deleted');