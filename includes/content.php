
<h1 class="display-3 text-center"> You might also like </h1>

<div class="row">
		<?php
			$query = "SELECT * FROM albums ORDER BY RAND() LIMIT 10";
			$albumQueries = $pdo->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$albumQueries->execute();
			$rowCount = $albumQueries->rowCount();
	
			foreach ($albumQueries as $albumQuery) {
				echo "<div class='card-view'>
						<a href='album.php?id=" . $albumQuery['id'] . "'>
							<img src='". $albumQuery['artworkPath'] . "'>
							<div class='album-caption'>"
								. $albumQuery['title'] .
							"</div>
						</a>
					</div>";
			}
		
		?>
</div>