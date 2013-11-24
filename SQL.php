<?php
$host='localhost';
$dbname='employees';
$user='ak557';
$pass='password';
try {
  # MySQL with PDO_MYSQL
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
$STH = $DBH->query('SELECT name, owner, species FROM pet');

# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);

while($row = $STH->fetch()) {
    echo $row['name'] . "\n";
    echo $row['owner'] . "\n";
    echo $row['species'] . "\n";
}
?>