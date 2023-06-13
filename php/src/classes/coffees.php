<?php

class Coffees{
	private $coffeesTable = "kawy";
	public $id;
	public $species;
	public $owner;
	public $countryOfOrigin;
	public $region;
	public $producer;
	public $harverYear;
	public $gradingDate;
	public $processingMethod;
	public $aroma, $flavor, $aftertaste, $acidity, $body, $balance, $uniformity, $cleanCup, $sweetness, $cupperPoints, $totalCupPoints, $moisture;
	public $color;
	public $certification;
	public $altitudeMeters;

	public function __construct($db){
		$this->conn = $db;
	}

	function read(){
		if($this->id){
			$stmt = $this->conn->prepare("SELECT * FROM " . $this->coffeesTable . " WHERE ID = ?");
			$stmt->bind_param("i", $this->id);
		}else{
			$stmt = $this->conn->prepare("SELECT * FROM " . $this->coffeesTable);
		}

		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
}
?>