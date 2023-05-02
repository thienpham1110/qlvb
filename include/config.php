<?php
define("HOST","localhost");
define("DB_NAME","db_qlvb");
define("USER","root");
define("PASS","");
define("BASE_URL","http://localhost:81/qlvb/");
define("VANBAN_TRANG",20);
define("MON_TRANG",6);


function loadClass($c) {
    if (is_file("controller/$c.php")) {
		include "controller/$c.php";
	} elseif (is_file("model/$c.php")) {
		include "model/$c.php";
	} else {
		echo "No class $c";exit;
	}
}
?>