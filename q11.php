<a href="college.php">Back</a><br>
<h4>A list of colleges with the highest percent increase in total liabilities:</h4>
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
SELECT INSTNM, (SUM(fin_11.F1A13-fin_10.F1A13))/fin_10.F1A13 as test
FROM colleges
INNER JOIN fin_10
ON colleges.UNITID = fin_10.UNITID
INNER JOIN fin_11
ON fin_10.UNITID = fin_11.UNITID
GROUP BY INSTNM
ORDER BY test DESC 
');

# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);

while($row = $STH->fetch()) {
	  echo $row['INSTNM'] . "\n";
    echo $row['test'] . "<br>";
}
?>