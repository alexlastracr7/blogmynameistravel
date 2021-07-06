<?php 

include './includes/templades/headers.php';
require 'includes/templades/config/database.php';

?> 
<body>

<?php
	$rowsAboutMe = function() {
		$query = "SELECT * FROM `about_me`";
		return mysqli_fetch_assoc(mysqli_query(getConnection(), $query));
	}
?>

	<section>

		<div>
			<p class="aboutme">ABOUT  ME</p>
		</div>
		
			
				<div class="cuadrado">	
					<fieldset class="cajita" >
						<div class="posicion">
							<img class="moscualex" src="<?= $rowsAboutMe()['images_me'] ?>" > 
						</div>
						<p class="testimonio"><?= $rowsAboutMe()['text_aboutme'] ?>
						</p>
					</fieldset>
				</div>
	
	</section>
	
	<?php 
		include './includes/templades/footers.php' 
	?>
</body>
</html>