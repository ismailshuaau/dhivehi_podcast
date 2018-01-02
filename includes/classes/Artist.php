<?php

	class Artist {

		private $pdo;
		private $id;

		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function getName() {
			$artistQuery = "SELECT name FROM artists WHERE id='$this->id'";
			$artists = $this->pdo->prepare($artistQuery, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$artists->execute();

			foreach ($artists as $artist) {
				return $artist['name'];
			}
		}

		public function getSongIds() {
			$query = "SELECT id FROM songs WHERE artist='$this->id' ORDER BY plays ASC";
			$ids = $this->pdo->prepare($query);
			$ids->execute();
			$results = $ids->fetchAll(PDO::FETCH_ASSOC);

			return $results;
		}
	}