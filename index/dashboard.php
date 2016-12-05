<?php

session_start();
require_once('getUserFiles.php');
	
	
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
		<script>
		  $(document).ready(function(e)
                {
                    $("#search").keyup(function()
                    {
                        $("#fileList").show();
                        var x = $(this).val();

                        $.ajax(
                            {
                                type:'POST',
                                url:'searchUserFiles.php',
                                data: 'search='+x,
                                beforeSend:function(){
                                	$("#fileList").html("Searching . . .");
                                },
                                success:function(data)
                                {
                                    $("#fileList").html(data);
                                }
                                ,
                });
				
			});
		
		});
	</script>
		<header style="">
			<img id="logo" src="images/logo.png" alt="logo">
			<form method="post" action="dashboard.php">
			<input type="submit" name="logout" value="Log Out"/>
		</form>
			<hr>
		</header>
		<section style="table align: center;">
			<input id="search" type="search" placeholder="Search for files" style="border-radius: 12px;margin-bottom: 50px;margin-left: 83%">
			<br>
			<br>
			<div id="buttons">
				<input type="image" id="upload" src="images/uploadcrop.png" onmouseover="this.src='images/uploadhovercrop.png'" onmouseout="this.src='images/uploadcrop.png'" style="width:13%" onclick="alert('hello');">
				<input type="image" id="delete" src="images/d2crop.png" onmouseover="this.src='images/d2hcrop.png'" onmouseout="this.src='images/d2crop.png'" style="width:13%" onclick="alert('hello');">
				<input type="image" id="download" src="images/downloadcrop.png" onmouseover="this.src='images/downloadhovercrop.png'" onmouseout="this.src='images/downloadcrop.png'" style="width:13%"  onclick="alert('hello');">
			</div>
			
			
			<table id="fileList" style="margin: auto;">
				<?php getAllUserFiles() ?>
			</table>
			
		</section>
		<footer>
			Created for CS372<br>
			Fall 2016
		</footer>
	</body>
</html>