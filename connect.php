<?php
	function connect($dbHost, $dbName, $dbUsername, $dbPasswd){
		$db = new mysqli($dbHost, $dbUsername, $dbPasswd, $dbName);
		if($db->connect_error) {
			die("couldn't connect to database");
		}
		return($db);
	}
?>
