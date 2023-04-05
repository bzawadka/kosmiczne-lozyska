<form id="myForm">
    <label for="shaftDiameter">shaftDiameter:</label>
    <input type="text" name="shaftDiameter" id="shaftDiameter" value="25">
    <br>
    <label for="caseDiameter">caseDiameter:</label>
    <input type="text" name="caseDiameter" id="caseDiameter" value="35">
    <br>
    <button type="submit" id="submit-button">Submit</button>
	<label id="loading-label" hidden>loading...</label>
</form>
<div id="table-container"></div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		var form = document.getElementById("myForm");
		form.addEventListener("submit", function(event) {	
			event.preventDefault();
			markAsLoading();
			
			$p1 = document.getElementById("shaftDiameter").value;
			$p2 = document.getElementById("caseDiameter").value;
			fetch("https://kosmiczne-lozyska.000webhostapp.com/api-page?shaftDiameter=" + $p1 + "&caseDiameter=" + $p2, {
				method: "GET",
			})
			.then(response => response.text())
			.then(data => {
				const i1 = data.indexOf("<table>");
				const i2 = data.indexOf("</table>");
				const dataTable = data.substring(i1, i2 + 8);

				var container = document.getElementById("table-container");
				container.innerHTML = dataTable;
				markAsLoaded();
			})
			.catch(error => {
				console.error("Error:", error);
				markAsLoaded();
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
