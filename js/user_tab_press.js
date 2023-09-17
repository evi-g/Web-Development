$(function(){
	const request = $.ajax({
		type: 'POST',
		url: "echo_user.php",
	});
	
	request.done(onSuccessEcho);
	
	const request2 = $.ajax({
		type: 'POST',
		url: "user_data.php",
	});
	
	request2.done(onSuccessInfo);
	
	const request3 = $.ajax({
		type: 'POST',
		url: "user_leaderboard.php",
	});
	
	request3.done(onSuccessLeaderboard);
});

function onSuccessEcho(responseText){
	$('#chart_container').html('');
	$('<canvas id="echo-year"></canvas>').appendTo($("#chart_container"));
	var labels = [];
	var chart_data = [];
	var colors = [];
	for(var i = 0; i < responseText.length; i++){
		labels.push(responseText[i].date);
		chart_data.push(responseText[i].echo);
		colors.push('rgba('+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', 0.4)');
	}
	var ctx = document.getElementById('echo-year').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: labels,
			datasets: [{
				label: 'Percentage ',
				data: chart_data,
				backgroundColor: colors,
				borderWidth: 10
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	}); 
}

function onSuccessInfo(responseText){
	$('#table_container').html('');
	$('<table id = "info_table" class="data_table"></table>').appendTo($("#table_container"));
	var row = document.getElementById("info_table").insertRow(0);
	var cel1 = row.insertCell(0);
	var cel2 = row.insertCell(1);
	cel1.innerHTML = "Ποσοστό οικολογικής μετακίνησης τρέχοντος μήνα";
	cel2.innerHTML = responseText.echo;
	var row = document.getElementById("info_table").insertRow(0);
	var cel1 = row.insertCell(0);
	var cel2 = row.insertCell(1);
	cel1.innerHTML = "Περίοδος εγγραφών";
	cel2.innerHTML = "Από: "+responseText.min_date+" έως: "+ responseText.max_date;
	var row = document.getElementById("info_table").insertRow(0);
	var cel1 = row.insertCell(0);
	var cel2 = row.insertCell(1);
	cel1.innerHTML = "Τελευταίο ανέβασμα";
	cel2.innerHTML = "Από: "+responseText.latest;
}

function onSuccessLeaderboard(responseText){
	for(var i = 0; i < responseText.length; i++){
		var row = document.getElementById("leaderboard").insertRow(0);
		var cel1 = row.insertCell(0);
		var cel2 = row.insertCell(1);
		cel1.innerHTML = i+1+"---";
		cel2.innerHTML = responseText[i].user;
	}
}