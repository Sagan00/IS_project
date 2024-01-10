<?php
class Flat{

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

	
	public function __construct($id, $dataDodania, $region, $iloscPokoi, $ulica, $metraz, $model, $rokBudowy, $cena, $stopaProcentowa) {
        $this->id = $id;
        $this->dataDodania = $dataDodania;
        $this->region = $region;
        $this->iloscPokoi = $iloscPokoi;
        $this->ulica = $ulica;
        $this->metraz = $metraz;
        $this->model = $model;
        $this->rokBudowy = $rokBudowy;
        $this->cena = $cena;
        $this->stopaProcentowa = $stopaProcentowa;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setDataDodania($dataDodania) {
        $this->dataDodania = $dataDodania;
    }
    
    public function setRegion($region) {
        $this->region = $region;
    }
    
    public function setIloscPokoi($iloscPokoi) {
        $this->iloscPokoi = $iloscPokoi;
    }
    
    public function setUlica($ulica) {
        $this->ulica = $ulica;
    }
    
    public function setMetraz($metraz) {
        $this->metraz = $metraz;
    }
    
    public function setModel($model) {
        $this->model = $model;
    }
    
    public function setRokBudowy($rokBudowy) {
        $this->rokBudowy = $rokBudowy;
    }
    
    public function setCena($cena) {
        $this->cena = $cena;
    }
    
    public function setStopaProcentowa($stopaProcentowa) {
        $this->stopaProcentowa = $stopaProcentowa;
    }
    
    
    // Getters
    public function getId() {
        return $this->id;
    }
    
    public function getDataDodania() {
        return $this->dataDodania;
    }
    
    public function getRegion() {
        return $this->region;
    }
    
    public function getIloscPokoi() {
        return $this->iloscPokoi;
    }
    
    public function getUlica() {
        return $this->ulica;
    }
    
    public function getMetraz() {
        return $this->metraz;
    }
    
    public function getModel() {
        return $this->model;
    }
    
    public function getRokBudowy() {
        return $this->rokBudowy;
    }
    
    public function getCena() {
        return $this->cena;
    }
    
    public function getStopaProcentowa() {
        return $this->stopaProcentowa;
    }
}
?>