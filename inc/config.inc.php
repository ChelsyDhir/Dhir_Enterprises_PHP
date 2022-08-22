<?php

//defination of database things
define("DB_HOST", "localhost");  
define("DB_USER", "root");  
define("DB_PASS", "");  
define("DB_NAME", "Dhir_Enterprises");
define("DB_PORT", 3306);  

// definition for log file
define('LOGFILE','log/error_log.txt');
ini_set("log_errors", TRUE);  
ini_set('error_log', LOGFILE); 

?>
