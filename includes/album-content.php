<div class="row">
	<?php 

		if (isset($_GET['id'])) {
			$albumId = $_GET['id'];
		} else {
			header("Location: index.php");
		}

		$query = "SELECT * FROM albums WHERE id='$albumId'";
		$albumQueries = $pdo->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
		$albumQueries->execute();
		$rowCount = $albumQueries->rowCount();

		foreach ($albumQueries as $albumQuery) {
		 	echo $albumQuery['title'];
		 } 

	 ?>

</div>