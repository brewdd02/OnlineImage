<?php 

require_once('connectToDb.php');

function getAllUserFiles(){
	
		$connection = connect();
		
		$sql = "SELECT * FROM files WHERE username ='" . getUsername() . "'";
		
		printTableHead();
		
		printTableData($connection, $sql);
		
		printTableLastRow();
	
		$connection->close();
	}
	
	function printTableData($connection, $sql){
		
		$result = $connection->query($sql) or die(mysqli_error());
		
		$file= 1;
		
		while($info = $result->fetch_assoc()){
		
			//get just file name - hide user folder
			$fileName = explode('/', $info["fileLoc"]);
			
			echo "<tr id=" . rowColor($file) . " value=". $info["id"]. ">" .
			"<td><input type=\"checkbox\" name=\"num[]\" value=". $info["id"] ."/></td>" .
			"<td id=\"firstCol\">" . $fileName[1] . 
			"</td><td id=\"secCol\">" . $info["mimeType"] . 
			"</td><td id=\"thirdCol\">" . $info["size"] . 
			"</td><td id=\"fourthCol\">" . $info["date"] . "</td></tr>";
			
			
			$file++;
			
			//reset row color structure
			if($file > 4)
				$file = 1;
			
		}
		
	}
	
	function printTableHead(){
	
		echo "<tr id=\"head\">
					<th style=\"/* color: #6be400; */border-radius: 12px 0 0 0;0: 0padding-left: 1;\" > <input id=\"check1\" type=\"checkbox\" onClick=\"toggle(this)\"/> </th>
					<th id=\"firstCol\" >File Name</th>
					<th id=\"secCol\" style=\"/* color: #ff7800; */\">Type</th>
					<th id=\"thirdCol\">Size</th>
					<th id=\"fourthCol\" style=\"border-radius: 0 12px 0 0;\">Date Uploaded</th>
				</tr>";
	}
	
	function printTableLastRow(){
	
		echo "<tr id=\"last\">
                  <td style=\"border-radius: 0 0 0 12px;\"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style=\"border-radius: 0 0 12px 0;\"></td>
                </tr>";
	}
	
	function rowColor($row){
	
		if (($row % 4) === 0)
			return "fourth";
			
		else if(($row % 3) === 0)
			return "third";
			
		else if(($row % 2) === 0)
			return "second";
			
		else
			return "first";
	}



?>