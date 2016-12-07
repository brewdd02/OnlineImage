function toggle(source)
{
	checkboxes = document.getElementsByName('num[]');
	
	for (var i = 0; i < checkboxes.length; i++)
	{
		checkboxes[i].checked = source.checked;
	}
}

function deleteFiles()
{
	checkboxes = document.getElementsByName('num[]');
	var filesToDelete = '';
	var count = 0;
	for (var i = 0; i < checkboxes.length; i++)
	{
		if (checkboxes[i].checked)
		{
			filesToDelete += ', ' + checkboxes[i].value.replace(/\//g, '');
			count++;
		}
	}
	
	if (count > 0)
	{
		window.location = "deleteFile.php" + "?filesToDelete=" + filesToDelete;
	}
	
	else
	{
		alert("You either have no existing files, or no file was selected to be deleted.");
	}
}

function downloadFiles()
{
	checkboxes = document.getElementsByName('num[]');
	var filesToDownload = '';
	var count = 0;
	for (var i = 0; i < checkboxes.length; i++)
	{
		if (checkboxes[i].checked)
			{
				filesToDownload += ', ' + checkboxes[i].value.replace(/\//g, '');
				count++;
			}
	
	}
	if(count > 0)
	{
		window.location = "downloadFile.php" + "?filesToDownload=" + filesToDownload;
	}
	
	else
	{
		alert("You either have no existing files, or no file was selected to be downloaded.");
	}
}

function displayFile(button)
{
	debugger;
	
	var file = button.name;
	
	window.location = "displayFile.php" + "?file=" + file;

}