<?php
$driver = 'sqlsrv';
$host = 'INFO-SIMPLET';
$nomDb = 'Classique_Web';
$user = 'ETD';
$password = 'ETD';
$pdodsn = "$driver:Server=$host;Database=$nomDb";
$dbh = new PDO($pdodsn, $user, $password);

$stmt = $dbh->prepare("Select Code_Album, Titre_Album, Année_Album as annee from Album where Titre_Album LIKE :nom order by Titre_Album");
header("Content-type: application/json");
$init = $_REQUEST['initiale'];
$stmt->bindValue(':nom', $init.'%');
$stmt->execute();
$array = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($array);
$dbh = null;
?>