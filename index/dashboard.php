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
<!--	<script>
		$(document).ready(function() {

    		$('#fileList tr').click(function() {
        		
        		$("#file").show();
        		var value = $(this).val();
        	
        		$.ajax(
        			{
        				type:'POST',
        				url:'fileViewer.php',
        				data: 'file='+value,
        				success:function(data){
							
							myWindow = window.open("data:text/html," + encodeURIComponent("<iframe src=\"brett/dashboard.html\" height=\"500\" width=\"300\"></iframe>"),
                       								"_blank", "width=700,height=700");
							myWindow.focus();
							
						
        				}
        			});
        
    });

}); 
	</script>  -->
	
	
		<header style="">
			<img id="logo" src="images/logo.png" alt="logo">
			<form method="post" action="dashboard.php">
			<input id="logout" type="submit" name="logout" value="Log Out"/>
		</form>
		</header>
		<section style="table align: center;">
			
			<input id="search" type="search" placeholder="Search for files" style="border-radius: 12px;margin-bottom: 50px;margin-left: 83%">
			<br>
			<br>
			
			<div id="buttons">
				<input type="image" id="upload" src="images/uploadcrop.png" onmouseover="this.src='images/uploadhovercrop.png'" onmouseout="this.src='images/uploadcrop.png'" style="width:13%" data-toggle="modal" data-target="#myModal">
				<input type="image" id="delete" name="delete" src="images/d2crop.png" onmouseover="this.src='images/d2hcrop.png'" onmouseout="this.src='images/d2crop.png'" style="width:13%">
				<input type="image" id="download" src="images/downloadcrop.png" onmouseover="this.src='images/downloadhovercrop.png'" onmouseout="this.src='images/downloadcrop.png'" style="width:13%"  onclick="alert('hello');">
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
	</body>
</html>