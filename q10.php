<a href="college.php">Back</a><br>

<?php
$abbr = mysql_real_escape_string($_POST['STABBR']);

$host='localhost';
$dbname='ak557';
$user='ak557';
$pass='ak557$1234';
try {
  # MySQL with PDO_MYSQL
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

$STH = $DBH->query("
SELECT INSTNM, STABBR
FROM colleges
WHERE STABBR ='$abbr'
");

# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);

while($row = $STH->fetch()) {
	echo $row['INSTNM'] . "\n";
    echo $row['STABBR'] . "<br>";
}


?>