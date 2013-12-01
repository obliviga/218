<?php
$q1="test";
$program = new program();
class program {
    function __construct() {
        $questions = 'homepage';
        $arg  = NULL;
        if (isset($_REQUEST['questions'])) {
            $questions = $_REQUEST['questions'];
        }
        if (isset($_REQUEST['arg'])) {
            $arg = $_REQUEST['arg'];
        }
        
        $questions = new $questions($arg);
    }
    function __destruct() {
    	
    }
}

abstract class questions {
    public $content;
    
    function menu() {
    $menu = '<a href="./college.php">Homepage</a><br>';
    $menu .= '<a href="./college.php?questions=q1">Question 1</a><br>';
	$menu .= '<a href="./college.php?questions=q2">Question 2</a><br>';
	$menu .= '<a href="./college.php?questions=q3">Question 3</a><br>';
	$menu .= '<a href="./college.php?questions=q4">Question 4</a><br>';
	$menu .= '<a href="./college.php?questions=q5">Question 5</a><br>';
	$menu .= '<a href="./college.php?questions=q6">Question 6</a><br>';
	$menu .= '<a href="./college.php?questions=q7">Question 7</a><br>';
	$menu .= '<a href="./college.php?questions=q8">Question 8</a><br>';
	$menu .= '<a href="./q9.php">Question 9</a><br>';
	$menu .= '<a href="./college.php?questions=q10">Question 10</a><br>';
	$menu .= '<a href="./college.php?questions=q11">Question 11</a><br>';
	$menu .= '<a href="./college.php?questions=q12">Question 12</a><br>';
    return $menu;
    }
    
    function __construct($arg = NULL) {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->get();
        } else {
            $this->post();
        }
				
    }
    function get() {
        
    }
    function post() {
    }
    function __destruct() {
        
        echo $this->content;
    }
    
}
class homepage extends questions {
    function get() {
        $this->content .= $this->menu();
   }
	
}

class q1 extends questions {
		function html() {
			echo "
			<a href='college.php'>Back</a>
			<h3>Colleges that have the highest enrollment:</h3>
			";
		}
    function get() {
        $this->content .= $this->menu();
		$this->content .= $this->html();
        $this->content .= $this->getEnrollment();
        
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
			echo $row['INSTNM'] . ":" . "\n";
		    echo $row['EFYTOTLT'] . "<br>";
		}
		    }
		
		    function __destruct() {
		        
		    }
}

class q2 extends questions {
		function html() {
			echo "
			<a href='college.php'>Back</a>
			<h3>Colleges with the largest amount of total liabilties:</h3>";
		}
    function get() {
        $this->content .= $this->menu();
		$this->content .= $this->html();
        $this->content .= $this->getLiab();
    }
    function getLiab() {
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
		SELECT DISTINCT INSTNM, F1A13
		FROM colleges
		INNER JOIN fin_10
		ON colleges.UNITID = fin_10.UNITID
		GROUP BY INSTNM
		ORDER BY F1A13 DESC
		');
		
		# setting the fetch mode
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		while($row = $STH->fetch()) {
			echo $row['INSTNM'] . ":" . "\n";
		    echo $row['F1A13'] . "<br>";
		}
		    }
		    
		    function __destruct() {
		        
		    }
}

class q3 extends questions {
		function html() {
			echo "
			<a href='college.php'>Back</a>
			<h3>Colleges with the largest amount of net assets:</h3>";
		}
    function get() {
        $this->content .= $this->menu();
		$this->content .= $this->html();
        $this->content .= $this->netAss();
    }
	
    function netAss() {
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
		SELECT DISTINCT INSTNM, F1A18
		FROM colleges
		INNER JOIN fin_10
		ON colleges.UNITID = fin_10.UNITID
		GROUP BY INSTNM
		ORDER BY F1A18 DESC
		');
		
		# setting the fetch mode
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		while($row = $STH->fetch()) {
			echo $row['INSTNM'] . ":" . "\n";
		    echo $row['F1A18'] . "<br>";
		}
    }
	
	function __destruct() {
        
    }
}

class q4 extends questions {
		function html() {
			echo "
			<a href='college.php'>Back</a>
			<h3>Colleges with the largest amount of net assets:</h3>";
		}
    function get() {
        $this->content .= $this->menu();
		$this->content .= $this->html();
        $this->content .= $this->netAss();
    }
	
    function netAss() {
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
		SELECT DISTINCT INSTNM, F1A18
		FROM colleges
		INNER JOIN fin_10
		ON colleges.UNITID = fin_10.UNITID
		GROUP BY INSTNM
		ORDER BY F1A18 DESC
		');
		
		# setting the fetch mode
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		while($row = $STH->fetch()) {
			echo $row['INSTNM'] . ":" . "\n";
		    echo $row['F1A18'] . "<br>";
		}
    }
	
	function __destruct() {
        
    }
}

class q5 extends questions {
		function html() {
			echo "
			<a href='college.php'>Back</a>
			<h3>Colleges with the largest amount of total revenues:</h3>";
		}
    function get() {
        $this->content .= $this->menu();
		$this->content .= $this->html();
        $this->content .= $this->getRevenue();
    }
	
    function getRevenue() {
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
			echo $row['INSTNM'] . ":" . "\n";
		    echo "$" . $row['F1B25'] . "<br>";
		}
    }
	
	function __destruct() {
        
    }
}

class q6 extends questions {
		function html() {
			echo "
			<a href='college.php'>Back</a>
			<h3>Colleges with the largest amount of total revenue per student:</h3>";
		}
    function get() {
        $this->content .= $this->menu();
		$this->content .= $this->html();
        $this->content .= $this->getRevenuePS();
    }
	
    function getRevenuePS() {
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
		SELECT INSTNM, (fin_10.F1B25/enrollment_10.EFYTOTLT) as test
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
		    echo $row['INSTNM'] . ":" . "\n";
		    echo "$" .  $row['test'] . "<br>";
		}
    }
	
	function __destruct() {
        
    }
}

class q7 extends questions {
		function html() {
			echo "
			<a href='college.php'>Back</a>
			<h3>Colleges with the largest amount of net assets per student:</h3>";
		}
    function get() {
        $this->content .= $this->menu();
		$this->content .= $this->html();
        $this->content .= $this->netAssPS();
    }
	
    function netAssPS() {
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
		    echo $row['INSTNM'] . ":" . "\n";
		    echo $row['test'] . "<br>";
		}
    }
	
	function __destruct() {
        
    }
}

class q8 extends questions {
		function html() {
			echo "
			<a href='college.php'>Back</a>
			<h3>Colleges with the largest amount of total liabilties per student:</h3>";
		}
    function get() {
        $this->content .= $this->menu();
		$this->content .= $this->html();
        $this->content .= $this->getLiabPS();
    }
	
    function getLiabPS() {
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
		SELECT INSTNM, (fin_10.F1A13/enrollment_10.EFYTOTLT) as test
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
		    echo $row['INSTNM'] . ":" . "\n";
		    echo $row['test'] . "<br>";
		}
    }
	
	function __destruct() {
        
    }
}

class q9 extends questions {
		function html() {
			echo "
			<a href='college.php'>Back</a>
			<h3>Top 5 Colleges based on previous stats:</h3>";
		}
    function get() {
        $this->content .= $this->menu();
		$this->content .= $this->html();
        $this->content .= $this->getTable();
    }
	
    function getTable() {
		include 'q9.php';
    }
	
	function __destruct() {
        
    }
}

class q10 extends questions {

    function get() {
        $this->content .= $this->menu();
		$this->content .= $this->getAbbr();
    }
	
    function getAbbr() {
    	echo '
		<h3>Enter in a state abbreviation to retrieve the colleges in that state</h3>
		<form action="q10.php" method="post">
			Abbreviation: <input type="text" name="STABBR"><br>
			<input type="submit">
		</form>
		';	
    }

	function __destruct() {
        
    }
}

class q11 extends questions {
		function html() {
			echo "
			<a href='college.php'>Back</a>
			<h3>Colleges with the largest percentage increase in total liabilities between 2011 and 2010</h3>";
		}
    function get() {
        $this->content .= $this->menu();
		$this->content .= $this->html();
        $this->content .= $this->percentLiab();
    }
	
    function percentLiab() {
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
			echo $row['INSTNM'] . ":" . "\n";
		    echo $row['test'] . "%" . "<br>";
		}
    }
	
	function __destruct() {
        
    }
}

class q12 extends questions {
		function html() {
			echo "
			<a href='college.php'>Back</a>
			<h3>Colleges with the largest percentage increase in enrollment between 2011 and 2010</h3>";
		}
    function get() {
        $this->content .= $this->menu();
		$this->content .= $this->html();
        $this->content .= $this->percentEnrollment();
    }
	
    function percentEnrollment() {
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
		;
		');
		
		# setting the fetch mode
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		
		while($row = $STH->fetch()) {
			echo $row['INSTNM'] . ":" . "\n";
		    echo $row['test'] . "%" . "<br>";
		}
    }
	
	function __destruct() {
        
    }
}

?>