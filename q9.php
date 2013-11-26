<a href="college.php">Back</a><br>
<h3>See Top 5 colleges based on clicked Statistic:</h3>
<a href="http://mywebclass.org/~ak557/q9.php?f=getEnrollment">Enrollment</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getTotLiab">Total Liabilities</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getNetAssets">Net Assets</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getTotRev">Total Revenues</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getTotRevPS">Total Revenues per Student</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getNetAssetsPS">Net Assets per Student</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getTotLiabPS">Total Liabilities per Student</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getPercentLiab">Percent increase in total liabilities</a>
<a href="http://mywebclass.org/~ak557/q9.php?f=getPercentEnroll">Percent increase in enrollment</a><br>
<?php
if(function_exists($_GET['f'])) {
   $_GET['f']();
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
	SELECT DISTINCT INSTNM, EFYTOTLT
	FROM colleges
	INNER JOIN enrollment_10
	ON colleges.UNITID = enrollment_10.UNITID
	GROUP BY INSTNM
	ORDER BY EFYTOTLT DESC
	LIMIT 5
	');
	
	# setting the fetch mode
	$enrollment->setFetchMode(PDO::FETCH_ASSOC);
	
	while($row = $enrollment->fetch()) {
		echo $row['INSTNM'] . ":" . "\n";
	    echo $row['EFYTOTLT'] . "<br>";
	}
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
	SELECT DISTINCT INSTNM, F1A13
	FROM colleges
	INNER JOIN fin_10
	ON colleges.UNITID = fin_10.UNITID
	GROUP BY INSTNM
	ORDER BY F1A13 DESC
	LIMIT 5
	');
	
	# setting the fetch mode
	$totLiab->setFetchMode(PDO::FETCH_ASSOC);
	
	while($row = $totLiab->fetch()) {
		echo $row['INSTNM'] . ":" . "\n";
	    echo $row['F1A13'] . "<br>";
	}
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
	SELECT DISTINCT INSTNM, F1A18
	FROM colleges
	INNER JOIN fin_10
	ON colleges.UNITID = fin_10.UNITID
	GROUP BY INSTNM
	ORDER BY F1A18 DESC
	LIMIT 5
	');
	
	# setting the fetch mode
	$netAss->setFetchMode(PDO::FETCH_ASSOC);
	
	while($row = $netAss->fetch()) {
		echo $row['INSTNM'] . ":" . "\n";
	    echo $row['F1A18'] . "<br>";
	}
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
	SELECT DISTINCT INSTNM, F1B25
	FROM colleges
	INNER JOIN fin_10
	ON colleges.UNITID = fin_10.UNITID
	GROUP BY INSTNM
	ORDER BY F1B25 DESC
	LIMIT 5
	');
	
	# setting the fetch mode
	$totalRev->setFetchMode(PDO::FETCH_ASSOC);
	
	while($row = $totalRev->fetch()) {
		echo $row['INSTNM'] . ":" . "\n";
	    echo $row['F1B25'] . "<br>";
	}
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
	SELECT INSTNM, (fin_10.F1B25/enrollment_10.EFYTOTLT) as test
	FROM colleges
	INNER JOIN fin_10
	ON colleges.UNITID = fin_10.UNITID
	INNER JOIN enrollment_10
	ON fin_10.UNITID = enrollment_10.UNITID
	GROUP BY INSTNM
	ORDER BY test desc
	LIMIT 5
	');
	
	# setting the fetch mode
	$totalRevPS->setFetchMode(PDO::FETCH_ASSOC);
	
	while($row = $totalRevPS->fetch()) {
		echo $row['INSTNM'] . ":" . "\n";
	    echo $row['test'] . "<br>";
	}
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
	SELECT INSTNM, (fin_10.F1A18/enrollment_10.EFYTOTLT) as test
	FROM colleges
	INNER JOIN fin_10
	ON colleges.UNITID = fin_10.UNITID
	INNER JOIN enrollment_10
	ON fin_10.UNITID = enrollment_10.UNITID
	GROUP BY INSTNM
	ORDER BY test desc
	LIMIT 5
	');
	
	# setting the fetch mode
	$netAssPS->setFetchMode(PDO::FETCH_ASSOC);
	
	while($row = $netAssPS->fetch()) {
		echo $row['INSTNM'] . ":" . "\n";
	    echo $row['test'] . "<br>";
	}
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
	SELECT INSTNM, (fin_10.F1A13/enrollment_10.EFYTOTLT) as test
	FROM colleges
	INNER JOIN fin_10
	ON colleges.UNITID = fin_10.UNITID
	INNER JOIN enrollment_10
	ON fin_10.UNITID = enrollment_10.UNITID
	GROUP BY INSTNM
	ORDER BY test desc
	LIMIT 5
	');
	
	# setting the fetch mode
	$totLiabPS->setFetchMode(PDO::FETCH_ASSOC);
	
	while($row = $totLiabPS->fetch()) {
		echo $row['INSTNM'] . ":" . "\n";
	    echo $row['test'] . "<br>";
	}
}

echo "<br>";

function getPercentLiab() {
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
	
	$percentEnrollment = $DBH->query('
	SELECT INSTNM, (SUM(fin_11.F1A13-fin_10.F1A13))/fin_10.F1A13 as test
	FROM colleges
	INNER JOIN fin_10
	ON colleges.UNITID = fin_10.UNITID
	INNER JOIN fin_11
	ON fin_10.UNITID = fin_11.UNITID
	GROUP BY INSTNM
	ORDER BY test DESC 
	LIMIT 5
	');
	
	# setting the fetch mode
	$percentEnrollment->setFetchMode(PDO::FETCH_ASSOC);
	
	while($row = $percentEnrollment->fetch()) {
		echo $row['INSTNM'] . ":" . "\n";
	    echo $row['test'] . "%" . "<br>";
	}
}
echo "<br>";
function getPercentEnroll() {
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
	
	$percentEnrollment = $DBH->query('
	SELECT INSTNM, (SUM(enrollment_10.EFYTOTLT-enrollment_11.EFYTOTLT))/enrollment_10.EFYTOTLT as test
	FROM colleges
	INNER JOIN enrollment_10
	ON colleges.UNITID = enrollment_10.UNITID
	INNER JOIN enrollment_11
	ON enrollment_10.UNITID = enrollment_11.UNITID
	GROUP BY INSTNM
	ORDER BY test DESC 
	LIMIT 5
	');
	
	# setting the fetch mode
	$percentEnrollment->setFetchMode(PDO::FETCH_ASSOC);
	
	while($row = $percentEnrollment->fetch()) {
		echo $row['INSTNM'] . ":" . "\n";
	    echo $row['test'] . "%" . "<br>";
	}
}
?>