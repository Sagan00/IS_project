<?php

class Flats{
	private $apartments = "mieszkania";
	private $id;
	private $dataDodania;
	private $region;
	private $iloscPokoi;
	private $ulica;
	private $metraz;
	private $model;
	private $rokBudowy;
	private $cena;
	private $stopaProcentowa;
	
	public function __construct($db){
		$this->conn = $db;
	}

	function read(){
		if($this->id){
			$stmt = $this->conn->prepare("SELECT * FROM " . $this->apartments . " WHERE ID = ?");
			$stmt->bind_param("i", $this->id);
		}else{
			$stmt = $this->conn->prepare("SELECT * FROM " . $this->apartments);
		}

		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
}
?>