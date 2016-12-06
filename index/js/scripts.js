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
	
	for (var i = 0; i < checkboxes.length; i++)
	{
		if (checkboxes[i].checked)
		{
			filesToDelete += ', ' + checkboxes[i].value.replace(/\//g, '');
		}
	}
	
	window.location = "deleteFile.php" + "?filesToDelete=" + filesToDelete;
}