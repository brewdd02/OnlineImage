<?php 
session_start();
require_once('connectToDb.php');
require_once('getUserFiles.php');
	
if(!empty($_POST['search'])){
		
		$connection = connect();
		$search_term = $connection->real_escape_string($_POST['search']);
		$sql = "SELECT * FROM files WHERE username ='" . getUsername() . "' AND fileLoc LIKE '%" . $search_term . "%'";
		
		printTableHead();
		
		printTableData($connection, $sql);
		
		printTableLastRow();
	
		$connection->close();
	}
	
	else{
	
		getAllUserFiles();
	}
	