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

class session {
    function __construct() {
		session_start();
    }
    function __destruct() {
    	
    }
}

abstract class page {
    public $content;
    
    function menu() {
        $menu = '<a href="./index.php">Homepage</a><br>';
        $menu .= '<a href="./index.php?page=login">Login</a>';
		$menu .= '<a href="./index.php?page=forgot">&nbsp;(Forgot Password?)</a><br>';
        $menu .= '<a href="./index.php?page=register">Register</a><br>';
        $menu .= '<a href="./index.php?page=transaction">Transaction Information</a><br>';
        $menu .= '<a href="./index.php?page=enter">Enter Transactions</a><br>';
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
class homepage extends page {
    function get() {
        $this->content .= $this->menu();
    }
}
class login extends page {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->loginForm();
    }
    function loginForm() {
        $form = '<form action="index.php?page=login" method="post">
    <P>
    <LABEL for="username">Username: </LABEL>
              <INPUT type="text" name="username" id="username"><BR>
    <LABEL for="password">Password: </LABEL>
              <INPUT type="text" name ="password" id="password"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
</form>
';
        return $form;
    }
    function post() {
        if(isset($_POST['username']) == "anish" && $_POST['password'] == "password" ) {
			$session = new session();
			$_SESSION['username'] = $_POST['username'];
        	header('Location: index.php?page=transaction');
			exit;
        }
			else {
				echo "Incorrect login information!";
				}
    }
}
class forgot extends page {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->forgotForm();
    }
    function forgotForm() {
        $form = '<form action="index.php?page=forgot" method="post">
    <P> Please enter your<br>
    <LABEL for="username">Username: </LABEL>
              <INPUT type="text" name="username" id="username"><BR>
              or<br>
    <LABEL for="email">Email: </LABEL>
              <INPUT type="text" name ="email" id="email"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
</form>
';
        return $form;
    }
    function post() {
        print_r($_POST);
    }
}
class register extends page {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->registerForm();
    }
    function registerForm() {
        $form = '<form action="index.php?page=register" method="post">
    <P>
    <LABEL for="username">Username: </LABEL>
              <INPUT type="text" name="username" id="username"><BR>
    <LABEL for="password">Password: </LABEL>
              <INPUT type="text" name ="password" id="password"><BR>
    <LABEL for="email">email: </LABEL>
              <INPUT type="text" name ="email" id="email"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
</form>
';
        return $form;
    }
    function post() {
        print_r($_POST);
    }
}
class transaction extends page {
	
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->transactionForm();
		$this->content .= $this->welcomeUser();
    }
    function transactionForm() {
        $table = '<h4>Transaction Information:</h4>
<table border="1">
<tr>
  <th>date</th>
  <th>transaction source</th>
  <th>transaction type</th>
  <th>transaction amount</th>
</tr>
<tr>
  <td>07/23/2014</td>
  <td>TD Bank</td>
  <td>Money</td>
  <td>$500</td>
</tr>
</table>

';
        return $table;
				
    }

	function welcomeUser() {
		$session = new session();
		$username = $_SESSION['username'];
        $welcomeUser = 'Welcome, ' . $_SESSION['username'];
        return $welcomeUser;
	}
}
class enter extends page {
    function get() {
        $this->content .= $this->menu();
        $this->content .= $this->enterForm();
    }
    function enterForm() {
        $form = '<form action="index.php?page=enter" method="post">
    <P> Please enter debit or credit transactions:<br>
    <LABEL for="debit">Debit: </LABEL>
              <INPUT type="text" name="debit" id="debit"><BR>
              or<br>
    <LABEL for="credit">Credit: </LABEL>
              <INPUT type="text" name ="credit" id="credit"><BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
</form>
';
        return $form;
    }
    function post() {
        print_r($_POST);
    }
}



?>