
<?php 

	class Playlist {

		private $pdo;
		private $id;
		private $name;
		private $owner;
		
		public function __construct($pdo, $data) {
			$this->pdo = $pdo;


			if (!is_array($data)) {
					// theData is an id (string)
					$query = ("SELECT * FROM playlists WHERE id='$data'");
					$playlists = $pdo->prepare($query);
					$playlists->execute();
					$results = $playlists->fetchAll(PDO::FETCH_ASSOC);
				}

				foreach ($results as $result) {
					$this->id = $result['id'];
					$this->name = $result['name'];
					$this->owner = $result['owner'];
				}
				
		}
		
			
		public function getId() {
			return $this->id;
		}
		public function getName() {
			return $this->name;
		}

		public function getOwner() {
			return $this->owner;
		}

		public function getNumberOfSongs() {
			$query = ("SELECT `id` FROM playlistsongs WHERE playlistId='$this->id'");
			$songs = $this->pdo->prepare($query);
			$songs->execute();

			return $songs->rowCount();
		}

		public function getSongIds() {
			$query = ("SELECT `id` FROM playlistsongs WHERE playlistId='$this->id' ORDER BY playlistOrder ASC");
			$ids = $this->pdo->prepare($query);
			$ids->execute();
			$results = $ids->fetchAll(PDO::FETCH_ASSOC);

			return $results;
		}

	} 