<a href="college.php">Back</a><br>
<h3>Compare Top 5 colleges based on clicked Statistic:</h3>
<a href="http://mywebclass.org/~ak557/q9.php?f=getInstitution">Institution</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getEnrollment">Enrollment</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getTotLiab">Total Liabilities</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getNetAssets">Net Assets</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getTotRev">Total Revenues</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getTotRevPS">Total Revenues per Student</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getNetAssetsPS">Net Assets per Student</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getTotLiabPS">Total Liabilities per Student</a>
<br>
<?php
if(function_exists($_GET['f'])) {
   $_GET['f']();
}
function getInstitution() {
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
	
	$enrollment = $DBH->query('
	SELECT DISTINCT INSTNM, EFYTOTLT, F1A13, F1A18, F1B25, (fin_10.F1B25/enrollment_10.EFYTOTLT) as totrevPS, 
	(fin_10.F1A18/enrollment_10.EFYTOTLT) as totnetassPS, (fin_10.F1A13/enrollment_10.EFYTOTLT) as totLiabPS
	FROM colleges
	INNER JOIN enrollment_10
	ON colleges.UNITID = enrollment_10.UNITID
	INNER JOIN fin_10
	ON enrollment_10.UNITID = fin_10.UNITID
	GROUP BY INSTNM
	LIMIT 5
	');
	
	# setting the fetch mode
	$enrollment->setFetchMode(PDO::FETCH_ASSOC);
	echo "<table border='1'";
			echo "
			<tr>
			  <th>Institution</th>
			  <th>Enrollment</th>
			  <th>Total Liabilities</th>
			  <th>Net Assets</th>
			  <th>Total Revenues</th>
			  <th>Total Revenues per Student</th>
			  <th>Net Assets per Student</th>
			  <th>Total Liabilities per Student</th>
			</tr>";
	while($row = $enrollment->fetch()) {
		
			echo "<tr>";
				echo "<th>" . $row['INSTNM'] . "</th>";
			    echo "<th>" . $row['EFYTOTLT'] . "</th>";
				echo "<th>" . $row['F1A13'] . "</th>";
				echo "<th>" . $row['F1A18'] . "</th>";
				echo "<th>" . $row['F1B25'] . "</th>";
				echo "<th>" . $row['totrevPS'] . "</th>";
				echo "<th>" . $row['totnetassPS'] . "</th>";
				echo "<th>" . $row['totLiabPS'] . "</th>";
			echo "</tr>";

	}
		echo "</table>";
}

function getEnrollment() {
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
	
	$enrollment = $DBH->query('
	SELECT DISTINCT INSTNM, EFYTOTLT, F1A13, F1A18, F1B25, (fin_10.F1B25/enrollment_10.EFYTOTLT) as totrevPS, 
	(fin_10.F1A18/enrollment_10.EFYTOTLT) as totnetassPS, (fin_10.F1A13/enrollment_10.EFYTOTLT) as totLiabPS
	FROM colleges
	INNER JOIN enrollment_10
	ON colleges.UNITID = enrollment_10.UNITID
	INNER JOIN fin_10
	ON enrollment_10.UNITID = fin_10.UNITID
	GROUP BY INSTNM
	ORDER BY EFYTOTLT DESC
	LIMIT 5
	');
	
	# setting the fetch mode
	$enrollment->setFetchMode(PDO::FETCH_ASSOC);
		echo "<table border='1'";
			echo "
			<tr>
			  <th>Institution</th>
			  <th>Enrollment</th>
			  <th>Total Liabilities</th>
			  <th>Net Assets</th>
			  <th>Total Revenues</th>
			  <th>Total Revenues per Student</th>
			  <th>Net Assets per Student</th>
			  <th>Total Liabilities per Student</th>
			</tr>";
	while($row = $enrollment->fetch()) {
			echo "<tr>";
				echo "<th>" . $row['INSTNM'] . "</th>";
			    echo "<th>" . $row['EFYTOTLT'] . "</th>";
				echo "<th>" . $row['F1A13'] . "</th>";
				echo "<th>" . $row['F1A18'] . "</th>";
				echo "<th>" . $row['F1B25'] . "</th>";
				echo "<th>" . $row['totrevPS'] . "</th>";
				echo "<th>" . $row['totnetassPS'] . "</th>";
				echo "<th>" . $row['totLiabPS'] . "</th>";
			echo "</tr>";

	}
		echo "</table>";
}
echo "<br>";

function getTotLiab() {
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
	
	$totLiab = $DBH->query('
	SELECT DISTINCT INSTNM, EFYTOTLT, F1A13, F1A18, F1B25, (fin_10.F1B25/enrollment_10.EFYTOTLT) as totrevPS, 
	(fin_10.F1A18/enrollment_10.EFYTOTLT) as totnetassPS, (fin_10.F1A13/enrollment_10.EFYTOTLT) as totLiabPS
	FROM colleges
	INNER JOIN enrollment_10
	ON colleges.UNITID = enrollment_10.UNITID
	INNER JOIN fin_10
	ON enrollment_10.UNITID = fin_10.UNITID
	GROUP BY INSTNM
	ORDER BY F1A13 DESC
	LIMIT 5
	');
	
	# setting the fetch mode
	$totLiab->setFetchMode(PDO::FETCH_ASSOC);
	echo "<table border='1'";
			echo "
			<tr>
			  <th>Institution</th>
			  <th>Enrollment</th>
			  <th>Total Liabilities</th>
			  <th>Net Assets</th>
			  <th>Total Revenues</th>
			  <th>Total Revenues per Student</th>
			  <th>Net Assets per Student</th>
			  <th>Total Liabilities per Student</th>
			</tr>";
	while($row = $totLiab->fetch()) {

			echo "<tr>";
				echo "<th>" . $row['INSTNM'] . "</th>";
			    echo "<th>" . $row['EFYTOTLT'] . "</th>";
				echo "<th>" . $row['F1A13'] . "</th>";
				echo "<th>" . $row['F1A18'] . "</th>";
				echo "<th>" . $row['F1B25'] . "</th>";
				echo "<th>" . $row['totrevPS'] . "</th>";
				echo "<th>" . $row['totnetassPS'] . "</th>";
				echo "<th>" . $row['totLiabPS'] . "</th>";
			echo "</tr>";

	}
		echo "</table>";
}
echo "<br>";
function getNetAssets() {
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
	
	$netAss = $DBH->query('
	SELECT DISTINCT INSTNM, EFYTOTLT, F1A13, F1A18, F1B25, (fin_10.F1B25/enrollment_10.EFYTOTLT) as totrevPS, 
	(fin_10.F1A18/enrollment_10.EFYTOTLT) as totnetassPS, (fin_10.F1A13/enrollment_10.EFYTOTLT) as totLiabPS
	FROM colleges
	INNER JOIN enrollment_10
	ON colleges.UNITID = enrollment_10.UNITID
	INNER JOIN fin_10
	ON enrollment_10.UNITID = fin_10.UNITID
	GROUP BY INSTNM
	ORDER BY F1A18 DESC
	LIMIT 5
	');
	
	# setting the fetch mode
	$netAss->setFetchMode(PDO::FETCH_ASSOC);
			echo "<table border='1'";
			echo "
			<tr>
			  <th>Institution</th>
			  <th>Enrollment</th>
			  <th>Total Liabilities</th>
			  <th>Net Assets</th>
			  <th>Total Revenues</th>
			  <th>Total Revenues per Student</th>
			  <th>Net Assets per Student</th>
			  <th>Total Liabilities per Student</th>
			</tr>";
	while($row = $netAss->fetch()) {

			echo "<tr>";
				echo "<th>" . $row['INSTNM'] . "</th>";
			    echo "<th>" . $row['EFYTOTLT'] . "</th>";
				echo "<th>" . $row['F1A13'] . "</th>";
				echo "<th>" . $row['F1A18'] . "</th>";
				echo "<th>" . $row['F1B25'] . "</th>";
				echo "<th>" . $row['totrevPS'] . "</th>";
				echo "<th>" . $row['totnetassPS'] . "</th>";
				echo "<th>" . $row['totLiabPS'] . "</th>";
			echo "</tr>";

	}
		echo "</table>";
}

echo "<br>";
function getTotRev() {
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
	
	$totalRev = $DBH->query('
	SELECT DISTINCT INSTNM, EFYTOTLT, F1A13, F1A18, F1B25, (fin_10.F1B25/enrollment_10.EFYTOTLT) as totrevPS, 
	(fin_10.F1A18/enrollment_10.EFYTOTLT) as totnetassPS, (fin_10.F1A13/enrollment_10.EFYTOTLT) as totLiabPS
	FROM colleges
	INNER JOIN enrollment_10
	ON colleges.UNITID = enrollment_10.UNITID
	INNER JOIN fin_10
	ON enrollment_10.UNITID = fin_10.UNITID
	GROUP BY INSTNM
	ORDER BY F1B25 DESC
	LIMIT 5
	');
	
	# setting the fetch mode
	$totalRev->setFetchMode(PDO::FETCH_ASSOC);
	echo "<table border='1'";
			echo "
			<tr>
			  <th>Institution</th>
			  <th>Enrollment</th>
			  <th>Total Liabilities</th>
			  <th>Net Assets</th>
			  <th>Total Revenues</th>
			  <th>Total Revenues per Student</th>
			  <th>Net Assets per Student</th>
			  <th>Total Liabilities per Student</th>
			</tr>";
	while($row = $totalRev->fetch()) {
			echo "<tr>";
				echo "<th>" . $row['INSTNM'] . "</th>";
			    echo "<th>" . $row['EFYTOTLT'] . "</th>";
				echo "<th>" . $row['F1A13'] . "</th>";
				echo "<th>" . $row['F1A18'] . "</th>";
				echo "<th>" . $row['F1B25'] . "</th>";
				echo "<th>" . $row['totrevPS'] . "</th>";
				echo "<th>" . $row['totnetassPS'] . "</th>";
				echo "<th>" . $row['totLiabPS'] . "</th>";
			echo "</tr>";

	}
		echo "</table>";
}
echo "<br>";

function getTotRevPS() {
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
	
	$totalRevPS = $DBH->query('
	SELECT DISTINCT INSTNM, EFYTOTLT, F1A13, F1A18, F1B25, (fin_10.F1B25/enrollment_10.EFYTOTLT) as totrevPS, 
	(fin_10.F1A18/enrollment_10.EFYTOTLT) as totnetassPS, (fin_10.F1A13/enrollment_10.EFYTOTLT) as totLiabPS
	FROM colleges
	INNER JOIN enrollment_10
	ON colleges.UNITID = enrollment_10.UNITID
	INNER JOIN fin_10
	ON enrollment_10.UNITID = fin_10.UNITID
	GROUP BY INSTNM
	ORDER BY totrevPS DESC
	LIMIT 5
	');
	
	# setting the fetch mode
	$totalRevPS->setFetchMode(PDO::FETCH_ASSOC);
	echo "<table border='1'";
			echo "
			<tr>
			  <th>Institution</th>
			  <th>Enrollment</th>
			  <th>Total Liabilities</th>
			  <th>Net Assets</th>
			  <th>Total Revenues</th>
			  <th>Total Revenues per Student</th>
			  <th>Net Assets per Student</th>
			  <th>Total Liabilities per Student</th>
			</tr>";
	while($row = $totalRevPS->fetch()) {
			echo "<tr>";
				echo "<th>" . $row['INSTNM'] . "</th>";
			    echo "<th>" . $row['EFYTOTLT'] . "</th>";
				echo "<th>" . $row['F1A13'] . "</th>";
				echo "<th>" . $row['F1A18'] . "</th>";
				echo "<th>" . $row['F1B25'] . "</th>";
				echo "<th>" . $row['totrevPS'] . "</th>";
				echo "<th>" . $row['totnetassPS'] . "</th>";
				echo "<th>" . $row['totLiabPS'] . "</th>";
			echo "</tr>";

	}
		echo "</table>";
}
echo "<br>";
function getNetAssetsPS() {
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
	
	$netAssPS = $DBH->query('
	SELECT DISTINCT INSTNM, EFYTOTLT, F1A13, F1A18, F1B25, (fin_10.F1B25/enrollment_10.EFYTOTLT) as totrevPS, 
	(fin_10.F1A18/enrollment_10.EFYTOTLT) as totnetassPS, (fin_10.F1A13/enrollment_10.EFYTOTLT) as totLiabPS
	FROM colleges
	INNER JOIN enrollment_10
	ON colleges.UNITID = enrollment_10.UNITID
	INNER JOIN fin_10
	ON enrollment_10.UNITID = fin_10.UNITID
	GROUP BY INSTNM
	ORDER BY totnetassPS DESC
	LIMIT 5
	');
	
	# setting the fetch mode
	$netAssPS->setFetchMode(PDO::FETCH_ASSOC);
	echo "<table border='1'";
			echo "
			<tr>
			  <th>Institution</th>
			  <th>Enrollment</th>
			  <th>Total Liabilities</th>
			  <th>Net Assets</th>
			  <th>Total Revenues</th>
			  <th>Total Revenues per Student</th>
			  <th>Net Assets per Student</th>
			  <th>Total Liabilities per Student</th>
			</tr>";
	while($row = $netAssPS->fetch()) {
			echo "<tr>";
				echo "<th>" . $row['INSTNM'] . "</th>";
			    echo "<th>" . $row['EFYTOTLT'] . "</th>";
				echo "<th>" . $row['F1A13'] . "</th>";
				echo "<th>" . $row['F1A18'] . "</th>";
				echo "<th>" . $row['F1B25'] . "</th>";
				echo "<th>" . $row['totrevPS'] . "</th>";
				echo "<th>" . $row['totnetassPS'] . "</th>";
				echo "<th>" . $row['totLiabPS'] . "</th>";
			echo "</tr>";

	}
		echo "</table>";
}

echo "<br>";

function getTotLiabPS() {
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
	
	$totLiabPS = $DBH->query('
	SELECT DISTINCT INSTNM, EFYTOTLT, F1A13, F1A18, F1B25, (fin_10.F1B25/enrollment_10.EFYTOTLT) as totrevPS, 
	(fin_10.F1A18/enrollment_10.EFYTOTLT) as totnetassPS, (fin_10.F1A13/enrollment_10.EFYTOTLT) as totLiabPS
	FROM colleges
	INNER JOIN enrollment_10
	ON colleges.UNITID = enrollment_10.UNITID
	INNER JOIN fin_10
	ON enrollment_10.UNITID = fin_10.UNITID
	GROUP BY INSTNM
	ORDER BY totLiabPS DESC
	LIMIT 5
	');
	
	# setting the fetch mode
	$totLiabPS->setFetchMode(PDO::FETCH_ASSOC);
	echo "<table border='1'";
			echo "
			<tr>
			  <th>Institution</th>
			  <th>Enrollment</th>
			  <th>Total Liabilities</th>
			  <th>Net Assets</th>
			  <th>Total Revenues</th>
			  <th>Total Revenues per Student</th>
			  <th>Net Assets per Student</th>
			  <th>Total Liabilities per Student</th>
			</tr>";
	while($row = $totLiabPS->fetch()) {
			echo "<tr>";
				echo "<th>" . $row['INSTNM'] . "</th>";
			    echo "<th>" . $row['EFYTOTLT'] . "</th>";
				echo "<th>" . $row['F1A13'] . "</th>";
				echo "<th>" . $row['F1A18'] . "</th>";
				echo "<th>" . $row['F1B25'] . "</th>";
				echo "<th>" . $row['totrevPS'] . "</th>";
				echo "<th>" . $row['totnetassPS'] . "</th>";
				echo "<th>" . $row['totLiabPS'] . "</th>";
			echo "</tr>";

	}
		echo "</table>";
}
?>