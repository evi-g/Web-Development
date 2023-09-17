$(function(){
	document.getElementById("reset_btn").onclick = function(){
		var element = document.getElementById("activities");
		var options = element.options;
		for(var i = 1; i < options.length; i++){
			options[i].selected = false;
		}	
	}
});	

function export_button(){
	var type = document.querySelector('input[name="export_type"]:checked').value;
	var hourSearch = document.getElementById("hour").value;
	var daySearch = document.getElementById("day").value;
	var monthSearch = document.getElementById("month").value;
	var yearSearch = document.getElementById("year").value;
	var activities = document.getElementById("activities").selectedOptions;
	var search_terms = "";
	for(var i = 0; i < activities.length; i++){
		if(i == 0){
			search_terms += "(type = '"+activities[i].value+"'";
		}
		else{
			search_terms += "type = '"+activities[i].value+"'";
		}
		if(i != activities.length - 1){
			search_terms += " or ";
		}
		else{
			search_terms += ")"
		}
	}
	var tempHour = searchHour(hourSearch);
	if(tempHour != null){	
		if(search_terms == ""){	
			search_terms += tempHour;
		}
		else if(tempHour != ""){
			search_terms = search_terms+" and "+tempHour;
		}
	}
	else{
		return;
	}
	var tempDay = searchDay(daySearch);
	if(tempDay != null){
		if(search_terms == ""){	
			search_terms += tempDay;
		}
		else if(tempDay != ""){
			search_terms = search_terms+" and "+tempDay;
		}
	}
	else{
		return;
	}
	var tempMonth = searchMonth(monthSearch);
	if(tempMonth != null){
		if(search_terms == ""){
			search_terms += tempMonth;
		}
		else if(tempMonth != ""){
			search_terms = search_terms+" and "+tempMonth;
		}
	}
	else{
		return;
	}
	var tempYear = searchYear(yearSearch);
	if(tempYear != null){
		if(search_terms == ""){
			search_terms += tempYear;
		}
		else if(tempYear != ""){
			search_terms = search_terms+" and "+tempYear;
		}
	}
	else{
		return;
	} 
	export_data(search_terms, type);
}

function search_button(){
	var hourSearch = document.getElementById("hour").value;
	var daySearch = document.getElementById("day").value;
	var monthSearch = document.getElementById("month").value;
	var yearSearch = document.getElementById("year").value;
	var activities = document.getElementById("activities").selectedOptions;
	var search_terms = "";
	for(var i = 0; i < activities.length; i++){
		if(i == 0){
			search_terms += "(type = '"+activities[i].value+"'";
		}
		else{
			search_terms += "type = '"+activities[i].value+"'";
		}
		if(i != activities.length - 1){
			search_terms += " or ";
		}
		else{
			search_terms += ")"
		}
	}
	var tempHour = searchHour(hourSearch);
	if(tempHour != null){	
		if(search_terms == ""){	
			search_terms += tempHour;
		}
		else if(tempHour != ""){
			search_terms = search_terms+" and "+tempHour;
		}
	}
	else{
		return;
	}
	var tempDay = searchDay(daySearch);
	if(tempDay != null){
		if(search_terms == ""){	
			search_terms += tempDay;
		}
		else if(tempDay != ""){
			search_terms = search_terms+" and "+tempDay;
		}
	}
	else{
		return;
	}
	var tempMonth = searchMonth(monthSearch);
	if(tempMonth != null){
		if(search_terms == ""){
			search_terms += tempMonth;
		}
		else if(tempMonth != ""){
			search_terms = search_terms+" and "+tempMonth;
		}
	}
	else{
		return;
	}
	var tempYear = searchYear(yearSearch);
	if(tempYear != null){
		if(search_terms == ""){
			search_terms += tempYear;
		}
		else if(tempYear != ""){
			search_terms = search_terms+" and "+tempYear;
		}
	}
	else{
		return;
	}
	search_for_locations(search_terms);
}

function searchHour(searchText){
	var search_terms = "";
	if(searchText != ""){
		var hours = searchText.split("-");
		if(hours.length != 2){
			alert("Η αναζήτηση πρέπει να είναι της μορφής: Ώρα-Ώρα");
			return null;
		}
		var hourFrom = checkHourValidation(hours[0]);
		if(hourFrom == null){
			return null;
		}
		
		var hourTo = checkHourValidation(hours[1]);
		if(hourTo == null){
			return null;
		}
		if(hourFrom > hourTo){
			var temp = hourFrom;
			hourFrom = hourTo;
			hourTo = temp;
		}
		if(search_terms == ""){
			search_terms += "hour(timestamp) >= "+hourFrom+" and hour(timestamp) <= "+hourTo+"";
		}
		else{
			search_terms += " and hour(timestamp) >= "+hourFrom+" and hour(timestamp) <= "+hourTo+"";
		}
	}
	return search_terms;
}

function searchDay(searchText){
	var search_terms = "";
	if(searchText != ""){
		var days = searchText.split("-");
		if(days.length != 2){
			alert("Η αναζήτηση πρέπει να είναι της μορφής: Μήνας-Μήνας");
			return null;
		}
		var dayFrom = getDayNumeric(days[0]);
		if(dayFrom == null){
			return null;
		}
		var dayTo = getDayNumeric(days[1]);
		if(dayTo == null){
			return null;
		}
		if(dayFrom > dayTo){
			var temp = dayFrom;
			dayFrom = dayTo;
			dayTo = temp;
		}
		search_terms += "dayofweek(timestamp) >= "+dayFrom+" and dayofweek(timestamp) <= "+dayTo+"";
	}
	return search_terms;
}

function searchMonth(searchText){
	var search_terms = "";
	if(searchText != ""){
		var months = searchText.split("-");
		if(months.length != 2){
			alert("Η αναζήτηση πρέπει να είναι της μορφής: Μήνας-Μήνας");
			return null;
		}
		var monthFrom = getMonthNumeric(months[0]);
		if(monthFrom == null){
			return null;
		}
		var monthTo = getMonthNumeric(months[1]);
		if(monthTo == null){
			return null;
		}
		if(monthFrom > monthTo){
			var temp = monthFrom;
			monthFrom = monthTo;
			monthTo = temp;
		}
		search_terms += "month(timestamp) >= "+monthFrom+" and month(timestamp) <= "+monthTo+"";
	}
	return search_terms;
}

function searchYear(searchText){
	var search_terms = "";
	if(searchText != ""){
		var years = searchText.split("-");
		if(years.length != 2){
			alert("Η αναζήτηση πρέπει να είναι της μορφής: Έτος-Έτος");
			return null;
		}
		var yearFrom = checkYearValidation(years[0]);
		if(yearFrom == null){
			return null;
		}
		
		var yearTo = checkYearValidation(years[1]);
		if(yearTo == null){
			return null;
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
	return search_terms;
}

function getDayNumeric(day){
	var availableDays = availableDaysMap();
	if(availableDays.has(day.toLowerCase())){
		dayFrom = availableDays.get(day.toLowerCase());
		return dayFrom;
	}
	else{
		alert("Η ημέρα που δώσατε δεν αναγνωρίστηκε να είναι τονισμένη");
		return null;
	}
}

function availableDaysMap(){
	var map = new Map();
	map.set('δευτέρα', 2);
	map.set('τρίτη', 3);
	map.set('τετάρτη', 4);
	map.set('πέμπτη', 5);
	map.set('παρασκευή', 6);
	map.set('σάββατο', 7);
	map.set('κυριακή', 1);
	return map;
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
	console.log(year)
	if(year < 2000 || year > 2100){
		alert("Μη έγκυρο έτος");
		return null;
	}
	return parseInt(year);
}

function checkHourValidation(hour){
	if(isNaN(hour)){
		alert("Η ώρα πρέπει να είναι αριθμός από 0 έως 23");
		return null;
	}
	if(hour < 0 || hour > 23){
		alert("Η ώρα πρέπει να είναι αριθμός από 0 έως 23");
		return null;
	}
	return parseInt(hour);
}

function search_for_locations(search_terms){
	const request = $.ajax({
		type: "POST",
		url: "admin_locations_search.php",
		data: {search: search_terms}
	});
	
	request.done(onSuccessSearch);
}

function onSuccessSearch(responseText){
	$('#map_container').html('');
	$('<div id = "map" style="width:650px; height: 400px;"></div>').appendTo($("#map_container"));
	var map = L.map('map');
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);
	map.setView( [38.2462420, 21.7350847], 12);
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

function export_data(search_terms, export_type){
	const request = $.ajax({
		type: "POST",
		url: "admin_export.php",
		data: {search: search_terms, type: export_type}
	});
	
	request.done(onSuccessExport);
}

function onSuccessExport(responseText){
	console.log(responseText);
}	