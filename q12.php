<a href="college.php">Back</a><br>
<h4>The top 10 colleges with the highest increase in total enrollment:</h4>
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
SELECT INSTNM, (SUM(enrollment_10.EFYTOTLT-enrollment_11.EFYTOTLT))/enrollment_10.EFYTOTLT as test
FROM colleges
INNER JOIN enrollment_10
ON colleges.UNITID = enrollment_10.UNITID
INNER JOIN enrollment_11
ON enrollment_10.UNITID = enrollment_11.UNITID
GROUP BY INSTNM
ORDER BY test DESC 
LIMIT 10;
');

# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);

while($row = $STH->fetch()) {
	  echo $row['INSTNM'] . "\n";
    echo $row['test'] . "<br>";
}
?>