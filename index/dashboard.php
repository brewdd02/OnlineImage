<?php

session_start();
require_once('getUserFiles.php');
require_once('connectToDb.php');
	
	
	if (isset($_POST["logout"])){
		$_SESSION = array();
		session_destroy();
		header("Location:index.php");
		exit;
	}
	
	if (!isset($_SESSION['uid']))
	{
		header("Location:index.php");
	}
	

?>

<!DOCTYPE html>
<html>
	<?php include('template/head.php'); ?>
	<body>
		<header style="">
			<input type="image" id="logo" src="images/logo.png" alt="logo" onClick="window.location.reload()">
			<form method="post" action="dashboard.php">
				<input id="logout" class="btn btn-primary" type="submit" name="logout" value="Log Out"/>
			</form>
			<h2 id="welcomeUser">Nice of you to drop in today, <?php echo getUsername(); ?>!</h2>
		</header>
		<section style="table align: center;">
			
			<input id="search" type="search" class="form-control" placeholder="Search for files" style="border-radius: 12px;margin-top: 20px;margin-left: 80%">
			<br>
			<br>
			
			<div id="buttons">
				<input type="image" id="upload" src="images/uploadcrop.png" onmouseover="this.src='images/uploadhovercrop.png'" onmouseout="this.src='images/uploadcrop.png'" style="width:13%" data-toggle="modal" data-target="#myModal">
				<input type="image" id="delete" name="delete" src="images/d2crop.png" onmouseover="this.src='images/d2hcrop.png'" onmouseout="this.src='images/d2crop.png'" style="width:13%" onClick="deleteFiles()">
				<input type="image" id="download" src="images/downloadcrop.png" onmouseover="this.src='images/downloadhovercrop.png'" onmouseout="this.src='images/downloadcrop.png'" style="width:13%"  onclick="downloadFiles()">
			</div>
			<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" onclick="window.location.reload();">&times;</button>
						<h4 class="modal-title">Upload Files</h4>
					</div>
					<div class="modal-body">
						<form action="upload.php" class="dropzone"></form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.reload();">Close</button>
					</div>
				</div>

				</div>
			</div>
			<table id="fileList" style="margin: auto;">
				<?php getAllUserFiles() ?>
			</table>
			
		</section>
		<footer>
			Created for CS372<br>
			Fall 2016
		</footer>
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
                                    
                            } ,
                		});
				
					});
				});
		
	</script>
	</body>
</html>