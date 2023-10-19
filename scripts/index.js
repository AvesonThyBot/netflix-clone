// --------------- Import api key ---------------
import * as apikey from "./apikey.js";

// --------------- Displaying data ---------------
let url = "https://watchmode.p.rapidapi.com/list-titles/?types=movie%2Ctv_series&page=5&release_date_start=20010101&release_date_end=20201211";
let options = apikey.options;

// displays the given data
function displayData() {
	fetch(url, options)
		.then((data) => data.json())
		.then((data) => {
			console.log(data);
		});
}

// displayData();
