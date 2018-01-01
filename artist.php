<?php

include("includes/includedFiles.php");

if (isset($_GET['id'])) {
	$artistId = $_GET['id'];
} else {
	header("Location: index.php");
}

$artist = new Artist($pdo, $artistId);

?>

<div class="entity-info">
	<div class="center-section">
		<div class="artist-info">
			<h1 class="artist-name"><?php echo $artist->getName(); ?></h1>

			<div class="header-buttons">
				<button class="btn primary">PLAY</button>
			</div>
		</div>
	</div>
</div>