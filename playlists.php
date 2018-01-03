<?php 

	include('includes/includedFiles.php');

?>

<div class="playlist-container">
	<div class="row">
	 	<div class="container">
	 		<h2>Playlists</h2>
	 		<div class="button-items">
	 			<button class="btn" onclick="createPlayList()">New Playlist</button>
	 		</div>
	 		<div>
	 			<div class="row">
					<?php

						$username = $userLoggedIn->getUserName();
						$playListQuery = ("SELECT * FROM playlists WHERE owner='$username'");
						$playListQueries = $pdo->prepare($playListQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
						$playListQueries->execute();
						$rowCount = $playListQueries->rowCount();

						if($rowCount == 0) {
							echo "<span class='no-results'> No playlist created </span>";
						}

						foreach ($playListQueries as $row) {

							$playlist = new Playlist($pdo, $row);
							echo "<div class='card-view' role='link' tabindex='0' 
							onclick='openPage(\"playlist.php?id=" . $playlist->getId() . "\")'>
									<div class='playlist-icon'>
										<i class='fa fa-headphones' aria-hidden='true'></i>
									</div>
									<div class='playlist-caption'>"
										. $playlist->getName() .
									"</div>
								 </div>";
						}

					?>
				</div> 
	 		</div>
	 	</div>
	</div>
</div>