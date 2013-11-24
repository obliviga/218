<a href="college.php">Back</a><br><br>
<?php
$program = new program();
class program {
    function __construct() {
        $page = 'homepage';
        $arg  = NULL;
        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        }
        if (isset($_REQUEST['arg'])) {
            $arg = $_REQUEST['arg'];
        }
        
        //echo $page;
        $page = new $page($arg);
    }
    function __destruct() {
    }
}
abstract class page {
    public $content;
    
    function menu() {
        $menu .= '<a href="./index.php?page=states">Enter Abbr.</a>';
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
$host='localhost';
$dbname='test';
$user='ak557';
$pass='password';
try {
  # MySQL with PDO_MYSQL
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

$STH = $DBH->query('
SELECT *
FROM states
');

# setting the fetch mode
$STH->setFetchMode(PDO::FETCH_ASSOC);

while($row = $STH->fetch()) {
	  echo $row['State'] . "\n";
    echo $row['Abbreviation'] . "<br>";
}

class states extends page {
    function get() {
        $this->content .= $this->statesForm();
    }
    function statesForm() {
        $form = '<form action="q10.php?page=states" method="post">
    <P>
    <LABEL for="abbreviation">abbreviation: </LABEL>
        <INPUT type="text" name="abbreviation" id="abbreviation"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
</form>
';
        return $form;
    }
    function post() {
		isset($_POST['abbreviation']);
    }
}
?>