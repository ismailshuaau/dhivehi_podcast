<?php 
	class Song {

		private $pdo;
		private $id;
		private $pdoData;
		private $title;
		private $artistId;
		private $albumId;
		private $genre;
		private $duration;
		private $path;

		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			$this->id = $id;

			$query = "SELECT * FROM songs WHERE id='$this->id'";
			$pdoData = $this->pdo->prepare($query);
			$pdoData->execute();

			$results = $pdoData->fetchAll(PDO::FETCH_ASSOC);

			foreach ( $results as $result ) {
				$this->ids = $result['id'];
				$this->title = $result['title'];
				$this->artistId = $result['artist'];
				$this->albumId = $result['album'];
				$this->genre = $result['genre'];
				$this->duration = $result['duration'];
				$this->path = $result['path']; 
			}

			
		}

		public function getId() {
			return $this->ids;
		}

		public function getTitle() {
			return $this->title;
		}

		public function getArtist() {
			return new Artist($this->pdo, $this->artistId);
		}

		public function getAlbum() {
			return new Album($this->pdo, $this->albumId);
		}

		public function getGenre() {
			return $this->$genre;
		}

		public function getDuration() {
			return $this->duration;
		}

		public function getPdoData() {
			return $this->pdoData;
		}

	}
