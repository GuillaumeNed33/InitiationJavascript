<?php
$driver = 'sqlsrv';
$host = 'INFO-SIMPLET';
$nomDb = 'Classique_Web';
$user = 'ETD';
$password = 'ETD';
$pdodsn = "$driver:Server=$host;Database=$nomDb";
$dbh = new PDO($pdodsn, $user, $password);

$stmt = $dbh->prepare("Select Nom_Musicien, Prénom_Musicien as prenom from Musicien where Nom_Musicien LIKE :nom order by Nom_Musicien");
header("Content-type: application/json");
$init = $_REQUEST['initiale'];
$stmt->bindValue(':nom', $init.'%');
$stmt->execute();
$array = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($array);
$dbh = null;
?>