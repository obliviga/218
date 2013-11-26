<a href="college.php">Back</a>

<form>
Enter State Abbreviation: <input type="text" name="abbreviation">
</form>

POST==$abbr

WHERE LIKE '%$POST%'
<?php
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

$STH = $DBH->query('
SELECT DISTINCT INSTNM, STABBR
FROM colleges
');

# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);

while($row = $STH->fetch()) {
	  echo $row['INSTNM'] . "\n";
    echo $row['STABBR'] . "<br>";
}


?>