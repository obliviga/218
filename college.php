<?php
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
		$menu .= '<a href="./college.php?questions=q9">Question 9</a><br>';
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
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->getEnrollment();
    }
	
    function getEnrollment() {
		include 'q1.php';
    }

    function __destruct() {
        
    }
}

class q2 extends questions {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->getLiab();
    }
    
    function getLiab() {
		include 'q2.php';
    }
    
    function __destruct() {
        
    }
}

class q3 extends questions {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->netAss();
    }
	
    function netAss() {
		include 'q3.php';
    }
	
	function __destruct() {
        
    }
}

class q4 extends questions {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->netAss();
    }
	
    function netAss() {
		include 'q4.php';
    }
	
	function __destruct() {
        
    }
}

class q5 extends questions {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->getRevenue();
    }
	
    function getRevenue() {
		include 'q5.php';
    }
	
	function __destruct() {
        
    }
}

class q6 extends questions {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->getRevenuePS();
    }
	
    function getRevenuePS() {
		include 'q6.php';
    }
	
	function __destruct() {
        
    }
}

class q7 extends questions {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->netAssPS();
    }
	
    function netAssPS() {
		include 'q7.php';
    }
	
	function __destruct() {
        
    }
}

class q8 extends questions {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->getLiabPS();
    }
	
    function getLiabPS() {
		include 'q8.php';
    }
	
	function __destruct() {
        
    }
}

class q9 extends questions {
    function get() {
        $this->content .= $this->menu();
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
		include 'q10.php';
    }
	
	function __destruct() {
        
    }
}

class q11 extends questions {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->percentLiab();
    }
	
    function percentLiab() {
		include 'q11.php';
    }
	
	function __destruct() {
        
    }
}

class q12 extends questions {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->percentEnrollment();
    }
	
    function percentEnrollment() {
		include 'q12.php';
    }
	
	function __destruct() {
        
    }
}

?>