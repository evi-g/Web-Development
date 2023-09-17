function delete_all(){
	var confirm_delete = confirm("Είστε σίγουρος ότι θέλετε να διαγράψετε όλα τα δεδομένα των χρηστών; Η ενέργεια είναι μη αναστρέψιμη");
	if(confirm_delete){
		const request = $.ajax({
			type: "POST",
			url: "delete_from_db.php"
		});
		
		request.done(onSuccess);
	}
}

function onSuccess(responseText){
	if(responseText == 11){
		alert("Επιτυχής Διαγραφή");
	}
	else{
		alert("Υπήρξε ένα μη αναμενόμενο σφάλμα");
	}
}