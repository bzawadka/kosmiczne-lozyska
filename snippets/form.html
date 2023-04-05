<form id="myForm">
    <label for="shaft diameter">shaftDiameter:</label>
    <input type="text" name="shaftDiameter" id="shaftDiameter" value="25">
    <label for="case diameter">caseDiameter:</label>
    <input type="text" name="caseDiameter" id="caseDiameter" value="35">
	<label for="width">width:</label>
    <input type="text" name="width" id="width" value="5">
    <br>
    <button type="submit" id="submit-button">Submit</button>
	<label id="loading-label" hidden>loading...</label>
</form>
<div id="table-container"></div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		const form = document.getElementById("myForm");
		form.addEventListener("submit", function(event) {	
			event.preventDefault();
			markAsLoading();
			
			const p1 = document.getElementById("shaftDiameter").value;
			const p2 = document.getElementById("caseDiameter").value;
			const p3 = document.getElementById("width").value;
			const url = "https://kosmiczne-lozyska.000webhostapp.com/api-page?shaftDiameter=" + p1 + "&caseDiameter=" + p2 + "&width=" + p3;
			fetch(url, {
				method: "GET",
			})
			.then(response => response.text())
			.then(data => {
				const i1 = data.indexOf("<table>");
				const i2 = data.indexOf("</table>");
				const simmeringHtmlTable = data.substring(i1, i2 + 8);

				document.getElementById("table-container").innerHTML = simmeringHtmlTable;
				markAsLoaded();
			})
			.catch(error => {
				markAsLoaded();
				console.error("Error:", error);
				document.getElementById("table-container").innerHTML = error.message
			});
		});
	});
	
	function markAsLoading() {
		document.getElementById("table-container").innerHTML = '<div/>';
		document.getElementById("submit-button").disabled = true;
		document.getElementById("loading-label").hidden = false;			
	}
	
	function markAsLoaded() {
		document.getElementById("submit-button").disabled = false;
		document.getElementById("loading-label").hidden = true;
	}
</script>
