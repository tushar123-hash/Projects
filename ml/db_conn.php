<?php  
define('DB_USER', 'oes');
define('DB_PSWD', 'tu2793539ma');
define('DB_HOST', 'localhost');
define('DB_NAME', 'hoteldb');

try {
		$dbcon = new mysqli(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
		mysqli_set_charset($dbcon, 'utf8');
	} catch (Exception $e) {
		echo "System is updating please try later";
	} catch (Error $e){
		echo "System is updating please try later";
	}
?>