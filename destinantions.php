<?php 
	include 'includes/templades/headers.php';
	require 'includes/templades/config/database.php';
?>


<?php
	$rowsDestinations = function() {
		$query = "SELECT * FROM `destinations`";
		return mysqli_fetch_all(mysqli_query(getConnection(), $query), MYSQLI_ASSOC);
	}
?>

<body>

	<p class="destinationword">DESTINATIONS</p>


	<?php foreach ($rowsDestinations() as $row) : ?>
		<fieldset class="cuadrado">
			<legend class="city"><?= $row['namecity']  ?></legend>
			<div class="margen">
				<img class="imgcity" src="<?= $row['images_des'] ?>" >
				<span class="pcity"><?= $row['description'] ?></span>
			</div>
		</fieldset>
	<?php endforeach; ?>


<?php 
include './includes/templades/footers.php' 
?>
	
</body>
</html>