<!-- this is primitive REST API implementation which returns html instead of proper data (like json) -->

<div id="table-container"></div>

<?php
// 	// check if the form was submitted - or parameters provided
// 	if ($_SERVER["REQUEST_METHOD"] == "GET")
	
	$request_data = array(
		'shaftDiameter' => $_GET['shaftDiameter'],
		'caseDiameter' => $_GET['caseDiameter'],
		'width' => $_GET['width'],
	    'design' => 'BAUMSL',
	    'dustlip' => 'false'
	);

	$response = wp_remote_post('https://simmerring-api-stag.azurewebsites.net/api/SimmerringFinder?apiKey=2c5fe3bd-923e-4d48-a044-9772bc190674', array(
		'body' => $request_data
	));

	if (is_wp_error($response)) {
		echo 'An error occured when calling FST API';
	}

	$body = wp_remote_retrieve_body($response);
	$data = json_decode($body);

	// $data now contains an array of objects with a few fields each
?>

<!--  thumbnail -->
<!--  eCatalogLink -->
<table>
    <label>count: <?php echo count($data)?></label>
    <thead>
        <tr>
            <th>articleNo</th>
            <th>rankingPct</th>
            <th>designname<th>
	    <th>shaftDiameter<th>
    	    <th>caseDiameter<th>
    	    <th>width<th>
    	    <th>materialname<th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $item): ?>
            <tr>
                <td><?php echo $item->articleNo; ?></td>
                <td><?php echo $item->rankingPct; ?></td>
                <td><?php echo $item->designname; ?></td>
		<td><?php echo $item->shaftDiameter; ?></td>
		<td><?php echo $item->caseDiameter; ?></td>
		<td><?php echo $item->width; ?></td>
		<td><?php echo $item->materialname; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
