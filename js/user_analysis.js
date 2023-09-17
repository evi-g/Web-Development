function search_button(){
	monthSearch = document.getElementById("month").value;
	yearSearch = document.getElementById("year").value;
	var search_terms = "";
	if(monthSearch != ""){
		var months = monthSearch.split("-");
		if(months.length != 2){
			alert("Η αναζήτηση πρέπει να είναι της μορφής: Μήνας-Μήνας");
			return;
		}
		var monthFrom = getMonthNumeric(months[0]);
		if(monthFrom == null){
			return;
		}
		var monthTo = getMonthNumeric(months[1]);
		if(monthTo == null){
			return;
		}
		if(monthFrom > monthTo){
			var temp = monthFrom;
			monthFrom = monthTo;
			monthTo = temp;
		}
		search_terms += "month(timestamp) >= "+monthFrom+" and month(timestamp) <= "+monthTo+"";
	}

	if(yearSearch != ""){
		var years = yearSearch.split("-");
		if(years.length != 2){
			alert("Η αναζήτηση πρέπει να είναι της μορφής: Έτος-Έτος");
			return;
		}
		var yearFrom = checkYearValidation(years[0]);
		if(yearFrom == null){
			return;
		}
		
		var yearTo = checkYearValidation(years[1]);
		if(yearTo == null){
			return;
		}
		if(yearFrom > yearTo){
			var temp = yearFrom;
			yearFrom = yearTo;
			yearTo = temp;
		}
		if(search_terms == ""){
			search_terms += "year(timestamp) >= "+yearFrom+" and year(timestamp) <= "+yearTo+"";
		}
		else{
			search_terms += " and year(timestamp) >= "+yearFrom+" and year(timestamp) <= "+yearTo+"";
		}
	}
	search(search_terms);
}

function getMonthNumeric(month){
	var availableMonths = availableMonthsMap();
	if(availableMonths.has(month.toLowerCase())){
		monthFrom = availableMonths.get(month.toLowerCase());
		return monthFrom;
	}
	else{
		alert("Ο μήνας που δώσατε δεν αναγνωρίστηκε. Ο μήνας πρέπει να είναι τονισμένος και να είναι γραμμένος στην πλήρη μορφή του (π.χ. Μάρτιος όχι Μάρτης)");
		return null;
	}
}

function availableMonthsMap(){
	var map = new Map();
	map.set('ιανουάριος', 1);
	map.set('φεβρουάριος', 2);
	map.set('μάρτιος', 3);
	map.set('απρίλιος', 4);
	map.set('μάιος', 5);
	map.set('ιούνιος', 6);
	map.set('ιούλιος', 7);
	map.set('αύγουστος', 8);
	map.set('σεπτέμβριος', 9);
	map.set('οκτώβριος', 10);
	map.set('νοέμβριος', 11);
	map.set('δεκέμβριος', 12);
	return map;
}

function checkYearValidation(year){
	if(isNaN(year)){
		alert("Το έτος πρέπει να είναι αριθμός");
		return null;
	}
	if(year < 2000 || year > 2100){
		alert("Μη έγκυρο έτος");
		return null;
	}
	return parseInt(year);
}

function search(terms){
	const request = $.ajax({
		type: "POST",
		data: {search_term: terms},
		url: "user_analysis_activities.php",
	});
	request.done(onSuccessActivities);
	
	const request2 = $.ajax({
		type: "POST",
		data: {search_term: terms},
		url: "user_analysis_hour.php",
	});
	request2.done(onSuccessHour);
	
	const request3 = $.ajax({
		type: "POST",
		data: {search_term: terms},
		url: "user_analysis_day.php",
	});
	request3.done(onSuccessDay); 
	
	var search = "timestamp";
	var replaceWith = "timestampMs";
	var newTerms = terms.split(search).join(replaceWith);
	
	const request4 = $.ajax({
		type: "POST",
		data: {search_term: newTerms},
		url: "user_analysis_locations.php",
	});
	request4.done(onSuccessLocations);
}

function onSuccessActivities(responseText){
	$('#chart_container1').html('');
	$('<canvas id="activity-percent"></canvas>').appendTo($("#chart_container1"));
	var labels = [];
	var chart_data = [];
	var colors = [];
	for(var i = 0; i < responseText.length; i++){
		labels.push(responseText[i].label);
		chart_data.push(responseText[i].percent);
		colors.push('rgba('+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', 0.4)');
	}
	var ctx = document.getElementById('activity-percent').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: labels,
			datasets: [{
				label: 'Ποσοστό ',
				data: chart_data,
				backgroundColor: colors,
				borderWidth: 1
			}]
		}
	}); 
}

function onSuccessHour(responseText){
	$('#chart_container2').html('');
	$('<canvas id="most_hour"></canvas>').appendTo($("#chart_container2"));
	var labels = [];
	var chart_data = [];
	var colors = [];
	for(var i = 0; i < responseText.length; i++){
		labels.push(responseText[i].label);
		chart_data.push(responseText[i].hour);
		colors.push('rgba('+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+' , 0.4)');
	}
	var ctx = document.getElementById('most_hour').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: labels,
			datasets: [{
				label: 'Ώρα ',
				data: chart_data,
				backgroundColor: colors,
				borderWidth: 10
			}]
		}
	}); 
}



function onSuccessDay(responseText){
	$('#chart_container3').html('');
	$('<canvas id="most_day"></canvas>').appendTo($("#chart_container3"));
	var labels = [];
	var chart_data = [];
	var colors = [];
	for(var i = 0; i < responseText.length; i++){
		labels.push(responseText[i].label);
		chart_data.push(responseText[i].day);
		colors.push('rgba('+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+', '+parseInt((Math.random() * 255) +1)+' , 0.4)');
	}
	var ctx = document.getElementById('most_day').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			labels: labels,
			datasets: [{
				label: 'Ημέρα ',
				data: chart_data,
				backgroundColor: colors,
				borderWidth: 1
			}]
		}
	}); 
}

function onSuccessLocations(responseText){
	$('#chart_container4').html('');
	$('<div id = "map" style="width:650px; height: 400px;"></div>').appendTo($("#chart_container4"));
	var map = L.map('map');
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);
	map.setView([38.2462420, 21.7350847], 12);
	var drawnItems = new L.FeatureGroup();
	map.addLayer(drawnItems); 
	var testData = {
		max: 100,
		data: responseText
	};
	console.log(testData);
	var cfg = {
		"radius": 40,
		"max_opacity": 0.8,
		"scaleRadius": false,
		"useLocalExtrema": false,
		latField: 'la',
		lngField: 'lo',
		valueField: 'count'
	};
	var heatmapLayer = new HeatmapOverlay(cfg);
	map.addLayer(heatmapLayer);
	heatmapLayer.setData(testData);
}