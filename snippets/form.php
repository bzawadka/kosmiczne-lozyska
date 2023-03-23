<form id="myForm">
    <label for="shaftDiameter">shaftDiameter:</label>
    <input type="text" name="shaftDiameter" id="shaftDiameter" value="25">
    <br>
    <label for="caseDiameter">caseDiameter:</label>
    <input type="text" name="caseDiameter" id="caseDiameter" value="35">
    <br>
    <button type="submit">Submit</button>
</form>
<div id="table-container"></div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("myForm");
    form.addEventListener("submit", function(event) {
        event.preventDefault();
// 		var data = {
//             shaftDiameter: document.getElementById("shaftDiameter").value,
//             caseDiameter: document.getElementById("caseDiameter").value
//         };
		$p1 = document.getElementById("shaftDiameter").value;
		$p2 = document.getElementById("caseDiameter").value;
        fetch("https://kosmiczne-lozyska.000webhostapp.com/api-page?shaftDiameter=" + $p1 + "&caseDiameter=" + $p2, {
            method: "GET",
// 			method: "POST",
// 			headers: {
//                 "Content-Type": "application/json"
//             },
//             body: JSON.stringify(data)
        })
//         .then(response => response.json())
		.then(response => response.text())
        .then(data => {
			const i1 = data.indexOf("<table>");
			const i2 = data.indexOf("</table>");
			
			const aTable = data.substring(i1, i2 + 8);
			console.log("czesc");
			console.log(aTable);
			
			var container = document.getElementById("table-container");
            container.innerHTML = aTable;
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});
</script>
