$(function(){
	const request = $.ajax({
		type: 'POST',
		url: "distribution_activities.php",
	});
	
	request.done(onSuccess1);
	
	const request2 = $.ajax({
		type: 'POST',
		url: "distribution_user.php",
	});
	
	request2.done(onSuccess2);
	
	const request3 = $.ajax({
		type: 'POST',
		url: "distribution_month.php",
	});
	
	request3.done(onSuccess3);
	
	const request4 = $.ajax({
		type: 'POST',
		url: "distribution_day.php",
	});
	
	request4.done(onSuccess4);
	
	const request5 = $.ajax({
		type: 'POST',
		url: "distribution_hour.php",
	});
	
	request5.done(onSuccess5);
	
	const request6 = $.ajax({
		type: 'POST',
		url: "distribution_year.php",
	});
	
	request6.done(onSuccess6);
});

function onSuccess1(responseText){
	var labels = [];
	var chart_data = [];
	var colors = [];
	for(var i = 0; i < responseText.length; i++){
		labels.push(responseText[i].label);
		chart_data.push(responseText[i].percent);
		colors.push('rgba('+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', 0.4)');
	}
	var ctx = document.getElementById('chart1').getContext('2d');
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
		}
	}); 
}



function onSuccess2(responseText){
	var labels = [];
	var chart_data = [];
	var colors = [];
	for(var i = 0; i < responseText.length; i++){
		labels.push(responseText[i].label);
		chart_data.push(responseText[i].percent);
		colors.push('rgba('+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', 0.4)');
	}
	var ctx = document.getElementById('chart2').getContext('2d');
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
		}
	}); 
}

function onSuccess3(responseText){
	var labels = [];
	var chart_data = [];
	var colors = [];
	for(var i = 0; i < responseText.length; i++){
		labels.push(responseText[i].label);
		chart_data.push(responseText[i].percent);
		colors.push('rgba('+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', 0.4)');
	}
	var ctx = document.getElementById('chart3').getContext('2d');
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
		}
	}); 
}

function onSuccess4(responseText){
	var labels = [];
	var chart_data = [];
	var colors = [];
	for(var i = 0; i < responseText.length; i++){
		labels.push(responseText[i].label);
		chart_data.push(responseText[i].percent);
		colors.push('rgba('+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', 0.4)');
	}
	var ctx = document.getElementById('chart4').getContext('2d');
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
		}
	}); 
}

function onSuccess5(responseText){
	var labels = [];
	var chart_data = [];
	var colors = [];
	for(var i = 0; i < responseText.length; i++){
		labels.push(responseText[i].label);
		chart_data.push(responseText[i].percent);
		colors.push('rgba('+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', 0.4)');
	}
	var ctx = document.getElementById('chart5').getContext('2d');
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
		}
	}); 
}

function onSuccess6(responseText){
	var labels = [];
	var chart_data = [];
	var colors = [];
	for(var i = 0; i < responseText.length; i++){
		labels.push(responseText[i].label);
		chart_data.push(responseText[i].percent);
		colors.push('rgba('+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', 0.4)');
	}
	var ctx = document.getElementById('chart6').getContext('2d');
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
		}
	}); 
}