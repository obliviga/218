<a href="college.php">Back</a>
<h4>A list of colleges with the highest enrollment:</h4>
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
SELECT DISTINCT INSTNM, EFYTOTLT
FROM colleges
INNER JOIN enrollment_10
ON colleges.UNITID = enrollment_10.UNITID
GROUP BY INSTNM
ORDER BY EFYTOTLT DESC
');

# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);

while($row = $STH->fetch()) {
	  echo $row['INSTNM'] . "\n";
    echo $row['EFYTOTLT'] . "<br>";
}
?>