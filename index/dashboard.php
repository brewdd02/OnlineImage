<?php

session_start();
require_once('connectToDb.php');
	
	function getUserFiles(){
	
		$connection = connect();
		$sql = "SELECT * FROM files WHERE username ='" . getUsername() . "'";
		$result = $connection->query($sql) or die(mysqli_error());
		
		$checkboxName = 'file';
		$file = 1;
		
		while($info = $result->fetch_assoc()){
			
			$checkboxName += strval($file);
			
			echo "<tr id=" . rowColor($file) . ">" .
			"<td><input type=\"checkbox\" name=" . $checkboxName . "/></td>" .
			"<td id=\"firstCol\">" . $info["fileLoc"] . 
			"</td><td id=\"secCol\">" . $info["mimeType"] . 
			"</td><td id=\"thirdCol\">" . $info["id"] . 
			"</td><td id=\"fourthCol\">" . $info["username"] . "</td></tr>";
			
			$file++;
			
		}
	
		$connection->close();
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
	
	if (isset($_POST["logout"])){
		$_SESSION = array();
		session_destroy();
		header("Location:index.php");
		exit;
	}

?>

<!DOCTYPE html>
<html>
	<?php include('template/head.php'); ?>
	<body>
		<header style="">
			<img id="logo" src="images/logo.png" alt="logo">
			<form method="post" action="dashboard.php">
			<input type="submit" name="logout" value="Log Out"/>
		</form>
			<hr>
		</header>
		<section style="table align: center;">
			<input type="text" placeholder="Search" style="border-radius: 12px;margin-bottom: 50px;margin-left: 83%">
			<br>
			<br>
			<div id="buttons">
				<input type="image" id="upload" src="images/uploadcrop.png" onmouseover="this.src='images/uploadhovercrop.png'" onmouseout="this.src='images/uploadcrop.png'" style="width:13%" onclick="alert('hello');">
				<input type="image" id="delete" src="images/d2crop.png" onmouseover="this.src='images/d2hcrop.png'" onmouseout="this.src='images/d2crop.png'" style="width:13%" onclick="alert('hello');">
				<input type="image" id="download" src="images/downloadcrop.png" onmouseover="this.src='images/downloadhovercrop.png'" onmouseout="this.src='images/downloadcrop.png'" style="width:13%"  onclick="alert('hello');">
			</div>
			<table id="fileList" style="margin: auto;">
				<tr id="head">
					<th style="/* color: #6be400; */border-radius: 12px 0 0 0;0: 0padding-left: 1;" > <input type="checkbox"/> </th>
					<th id="firstCol" >File Name</th>
					<th id="secCol" style="/* color: #ff7800; */">Type</th>
					<th id="thirdCol">Size</th>
					<th id="fourthCol" style="border-radius: 0 12px 0 0;">Date Uploaded</th>
				</tr>
				<?php
					getUserFiles();
				?>
                <tr id="last">
                  <td style="border-radius: 0 0 0 12px;"></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style="border-radius: 0 0 12px 0;"></td>
                </tr>
			</table>
		</section>
		<footer>
			Created for CS372<br>
			Fall 2016
		</footer>
	</body>
</html>