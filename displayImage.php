<?php
	if (isset($_POST["submit"]))
	{
		$link = mysqli_connect("localhost", "root", "", "OnlineImage");
		
		if (!$link) 
		{
			echo "Error: Unable to connect to MySQL.";
			return;
		}
		
		$username = $_POST['username'];
		
		$sql = 'SELECT * FROM `images` WHERE username = "'.$username.'"';
		$result = $link->query($sql);
			
		if ($result->num_rows > 0)
		{
			while ($row = $result->fetch_assoc())
			{
				echo '<img src="'.$row["imageLoc"].'" alt="Uploaded Image">';
			}
		}
	}
?>