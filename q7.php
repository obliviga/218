<a href="college.php">Back</a>
<h4>Colleges with the largest amount of net assets per student.</h4>
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
SELECT INSTNM, (fin_10.F1A18/enrollment_10.EFYTOTLT) as test
FROM colleges
INNER JOIN fin_10
ON colleges.UNITID = fin_10.UNITID
INNER JOIN enrollment_10
ON fin_10.UNITID = enrollment_10.UNITID
GROUP BY INSTNM
ORDER BY test desc
');

# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);

while($row = $STH->fetch()) {
    echo $row['INSTNM'] . "\n";
    echo $row['test'] . "<br>";
}
?>