<?php

$host = 'localhost';
$user = 'ak557';
$pass = 'password';
$database = 'test';

$db = mysql_connect($host, $user, $pass);
mysql_query("use $database", $db);

/********************************************************************************/
// Parameters: filename.csv table_name

$argv = $_SERVER['argv'];

if($argv[1]) { $file = $argv[1]; }
else {
	echo "Please provide a file name\n"; exit; 
}
if($argv[2]) { $table = $argv[2]; }
else {
	$table = pathinfo($file);
	$table = $table['states'];
}

/********************************************************************************/
// Get the first row to create the column headings

$fp = fopen($file, 'r');
$frow = fgetcsv($fp);

$ccount = 0;
foreach($frow as $column) {
	$ccount++;
	if(isset($columns)) $columns .= ', ';
	else $columns="";
	$columns .= "$column varchar(255)";
}

$create = "create table if not exists $table ($columns);";
mysql_query($create, $db);

/********************************************************************************/
// Import the data into the newly created table.

$file = $_SERVER['PWD'].'/'.$file;
$q = "load data infile '$file' into table $table fields terminated by ',' ignore 1 lines";
mysql_query($q, $db);

?>