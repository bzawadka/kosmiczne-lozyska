<div id="table-container"></div>

<?php
	$data = array(
	  'shaftDiameter' => '25',
	  'caseDiameter' => '35',
	  'width' => '5',
	  'design' => 'BAUMSL',
	  'dustlip' => 'false'
	);

	$response = wp_remote_post('https://simmerring-api-stag.azurewebsites.net/api/SimmerringFinder?apiKey=2c5fe3bd-923e-4d48-a044-9772bc190674', array(
		'body' => $data
	));

	if (is_wp_error($response)) {
		// handle error
	}

	$body = wp_remote_retrieve_body($response);
	$data = json_decode($body);

	// $data now contains an array of objects with three fields each
?>

<table>
    <thead>
        <tr>
            <th>articleNo</th>
            <th>rankingPct</th>
            <th>designname</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $item): ?>
            <tr>
                <td><?php echo $item->articleNo; ?></td>
                <td><?php echo $item->rankingPct; ?></td>
                <td><?php echo $item->designname; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
