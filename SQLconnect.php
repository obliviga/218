<?php
$host='localhost';
$dbname='test';
$user='ak557';
$pass='password';
try {
  # MySQL with PDO_MYSQL
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

$STH = $DBH->query('SELECT State, Abbreviation FROM states GROUP BY Abbreviation');

# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);

while($row = $STH->fetch()) {
    echo $row['State'] . "\n";
    echo $row['Abbreviation'] . "<br>";
}
?>