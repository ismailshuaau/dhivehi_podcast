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
			$this->pdoDatas = $this->pdo->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$this->pdoDatas->execute();

			foreach ( $this->pdoDatas as $this->pdoData ) {
				$this->title = $this->pdoData['title'];
				$this->artistId = $this->pdoData['artist'];
				$this->albumId = $this->pdoData['album'];
				$this->genre = $this->pdoData['genre'];
				$this->duration = $this->pdoData['duration'];
				$this->path = $this->pdoData['path']; 
			}

			
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
