function uploadFile(){
	var fileInput = document.getElementById("file"); 
	if(fileInput.files.length == 0 ){
		alert("Παρακαλώ επιλέξτε ένα αρχείο");
	}
	var file = fileInput.files[0];
	var formData = new FormData();
	formData.append('file', file);
	const request = $.ajax({
		type: 'POST',
		url: "file_to_database.php",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	});
	
	request.done(onSuccess);
}

function onSuccess(responseText){
	console.log(responseText);
	if(responseText == 111){
		alert("Επιτυχής εισαγωγή του αρχείου");
	}
	else{
		alert("Υπήρξε ένα μη αναμενόμενο σφάλμα");
	}
}