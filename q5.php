<a href="college.php">Back</a>
<h4>A list of colleges with the highest total revenues:</h4>
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
SELECT DISTINCT INSTNM, F1B25
FROM colleges
INNER JOIN fin_10
ON colleges.UNITID = fin_10.UNITID
GROUP BY INSTNM
ORDER BY F1B25 DESC
');

# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);

while($row = $STH->fetch()) {
	  echo $row['INSTNM'] . "\n";
    echo $row['F1B25'] . "<br>";
}
?>