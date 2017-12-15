<?php 

	class Album {

		private $pdo;
		private $id;
		private $title;
		private $artist;
		private $genre;
		private $artworkPath;
		
		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			$this->id = $id;

			$query = "SELECT * FROM albums WHERE id='$this->id'";
			$albums = $this->pdo->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$albums->execute();

			foreach ($albums as $album) {
				$this->title = $album['title'];
				$this->artistId = $album['artist'];
				$this->genre = $album['genre'];
				$this->artworkPath['artworkPath'];
			}

			
		}

		public function getTitle() {
			return $this->title;
		}

		//  Return artist object from the album object
		public function getArtist() {
			return new Artist($this->pdo, $this->artistId);
		}

		public function getGenre() {
			return $this->genre;
		}

		public function getartworkPath() {
			return $this->getartworkPath;
		}
	} 