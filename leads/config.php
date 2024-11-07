<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'ivas_homes_uat');
// define('DB_PASSWORD', '6rl9d3zxwuqb');
// define('DB_NAME', 'ivas_homes_uat');
//**Live**
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ivas_homes');
define('DB_PASSWORD', 'a4qhe6aaw6of');
define('DB_NAME', 'ivas_homes');

//localhost
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'ivas_homes');

//$conn = new mysqli("localhost:3306", "ivas_homes_uat", "6rl9d3zxwuqb", "ivas_homes_uat");
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>