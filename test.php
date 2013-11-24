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
        $menu = '<a href="./test.php">Homepage</a><br>';
        $menu .= '<a href="./test.php?questions=login">Login</a>';
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
class login extends questions {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->loginForm();
    }
    function loginForm() {
		include 'q1.php';
    }
}



?>