
<h4>A list of URLs from the MSN homepage:</h4>
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
SELECT CHILDREN,PARENT
FROM urls
');

# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);

echo "<table border='1'";
			echo "
			<tr>
			  <th>Child URL</th>
			  <th>Parent URL</th>
			</tr>";

while($row = $STH->fetch()) {
			echo "<tr>";
				echo "<th>" . $row['CHILDREN'] . "</th>";
			  echo "<th>" . $row['PARENT'] . "</th>";
			echo "</tr>";
		
}
echo "</table>";
?>