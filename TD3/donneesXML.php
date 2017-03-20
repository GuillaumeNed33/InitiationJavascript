<?php
$driver = 'sqlsrv';
$host = 'INFO-SIMPLET';
 $nomDb = 'Classique_Web';
 $user = 'ETD';
 $password = 'ETD';
 $pdodsn = "$driver:Server=$host;Database=$nomDb";
 $dbh = new PDO($pdodsn, $user, $password);

 $stmt = $dbh->prepare("Select Nom_Musicien, Prénom_Musicien from Musicien where
Nom_Musicien LIKE :nom order by Nom_Musicien");
 $init = $_REQUEST['initiale'];
//$init = 'a';
 $stmt->execute(array(':nom' => $init.'%'));
 Header('Content-type: text/xml');
 echo '<?xml version="1.0" encoding="UTF-8"?'.'>';
 echo "<MUSICIENS>";
 while($row = $stmt->fetch()){
     echo"<MUSICIEN>";
     echo "<NOM>";
     echo ($row[utf8_decode('Nom_Musicien')]);
     echo "</NOM>";
     echo "<PRENOM>";
     echo ($row[utf8_decode('Prénom_Musicien')]);
     echo "</PRENOM>";
     echo"</MUSICIEN>";
 }
 // Deconnexion de la base de données
 echo "</MUSICIENS>";
 $dbh=null;
?>