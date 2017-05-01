window.onload=function(){

	//ajax call to show all movies
	var request = $.ajax({
		type: 'GET',
		url: "includes/SQLCall.php", //sql call of titles
		data, mydata
		dataType: "json"
	});

	request.done(functoin(data)){
		//object array of movies
		var movieArray = $.map(data, function(value,index)){
			return [value];
		});
		//show movies
		console.log(movieArray); 

		movieArray.forEach(function(item) {
			// making a new instance of the Pokemon object while looping over the pokemon objects from
			// the array. Be sure to look at the properties of each object in the console.
			var movie = new movie(item.thing); //what we want to show on the search page, title, director, image?

			// jquery to append the html to the .row class, need to call render on pokemon object to get html
			$(".results .row").append(movie.render); //make sure the class that we are adding the movies to is row, or change it appropriately 
		});
	}
	//keyup event to call ajax
	$(".search").keyup(function() {
		// START CODE Q4
		var request = $.ajax({
			type: 'GET',
			url: "includes/SQLCall.php", //sql call of titles
			data, mydata
			dataType: "json"
		});

		request.done(function(data) {
				// This is your array of pokemon, the data was converted into an object array
				var pokemonArray = $.map(data, function(value, index) {
		    		return [value];
				});
				// show the array of pokemon objects
				// Loop over the objects in the array
				$(".results .row").empty();
				movieArray.forEach(function(item) {
					// making a new instance of the Pokemon object while looping over the pokemon objects from
					// the array. Be sure to look at the properties of each object in the console.
					var movie = new movie(item.thing); //what we want to show on the search page, title, director, image?
					// jquery to append the html to the .row class, need to call render on pokemon object to get html
					
					if(item.title.toLowerCase().indexOf($("#search").val().toLowerCase())!=-1||
					item.director.toLowerCase().indexOf($("#search").val().toLowerCase())!=-1){ //search title or directr
						//console.log(item.title.indexOf($("#search").val()));
						$(".results .row").append(movie.render); //make sure the class that we are adding the movies to is row, or change it appropriately 
					}
				});
			});
		});

	
}