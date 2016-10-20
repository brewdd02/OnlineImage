// initialize
function Init() 
{
	if (window.File && window.FileList && window.FileReader) 
	{
		var fileselect = document.getElementById("fileselect");
		var	filedrag = document.getElementById("filedrag");
		var	submitbutton = document.getElementById("submitbutton");

		// file select
		fileselect.addEventListener("change", FileSelectHandler, false);

		// is XHR2 available?
		var xhr = new XMLHttpRequest();
		if (xhr.upload) 
		{
			// file drop
			filedrag.addEventListener("dragover", FileDragHover, false);
			filedrag.addEventListener("dragleave", FileDragHover, false);
			filedrag.addEventListener("drop", FileSelectHandler, false);
			filedrag.style.display = "block";
			
			// remove submit button
			submitbutton.style.display = "none";
		}
	}
}

// file drag hover
function FileDragHover(e) 
{
	e.stopPropagation();
	e.preventDefault();
	e.target.className = (e.type == "dragover" ? "hover" : "");
}

// file selection
function FileSelectHandler(e) 
{
	// cancel event and hover styling
	FileDragHover(e);

	// fetch FileList object
	var files = e.target.files || e.dataTransfer.files;

	document.getElementById("filedrag").innerHTML =  files.length + " file(s) selected";
}