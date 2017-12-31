
<h1 class="display-3 text-center"> You might also like </h1>

<div class="container">
	<div class="row">
		<?php
			$albumQuery = "SELECT * FROM albums ORDER BY RAND() LIMIT 10";
			$albumQueries = $pdo->prepare($albumQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$albumQueries->execute();
			$rowCount = $albumQueries->rowCount();

			foreach ($albumQueries as $album) {
				echo "<div class='card-view'>
						<a href='album.php?id=" . $album['id'] . "'>
							<img src='". $album['artworkPath'] . "'>
							<div class='album-caption'>"
								. $album['title'] .
							"</div>
						</a>
					</div>";
			}

		?>
	</div>
</div>