<?php
class Coffee{

	private $id;
	private $species;
	private $owner;
	private $countryOfOrigin;
	private $region;
	private $producer;
	private $harverYear;
	private $gradingDate;
	private $processingMethod;
	private $aroma, $flavor, $aftertaste, $acidity, $body, $balance, $uniformity, $cleanCup, $sweetness, $cupperPoints, $totalCupPoints, $moisture;
	private $color;
	private $certification;
	private $altitudeMeters;

	
	public function __construct($id, $species, $owner, $countryOfOrigin, $region, $producer, $harvestYear, $gradingDate, $processingMethod, $aroma, $flavor, $aftertaste, $acidity, $body, $balance, $uniformity, $cleanCup, $sweetness, $cupperPoints, $totalCupPoints, $moisture, $color, $certification, $altitudeMeters) {
        $this->id = $id;
        $this->species = $species;
        $this->owner = $owner;
        $this->countryOfOrigin = $countryOfOrigin;
        $this->region = $region;
        $this->producer = $producer;
        $this->harvestYear = $harvestYear;
        $this->gradingDate = $gradingDate;
        $this->processingMethod = $processingMethod;
        $this->aroma = $aroma;
        $this->flavor = $flavor;
        $this->aftertaste = $aftertaste;
        $this->acidity = $acidity;
        $this->body = $body;
        $this->balance = $balance;
        $this->uniformity = $uniformity;
        $this->cleanCup = $cleanCup;
        $this->sweetness = $sweetness;
        $this->cupperPoints = $cupperPoints;
        $this->totalCupPoints = $totalCupPoints;
        $this->moisture = $moisture;
        $this->color = $color;
        $this->certification = $certification;
        $this->altitudeMeters = $altitudeMeters;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setSpecies($species) {
        $this->species = $species;
    }
    
    public function setOwner($owner) {
        $this->owner = $owner;
    }
    
    public function setCountryOfOrigin($countryOfOrigin) {
        $this->countryOfOrigin = $countryOfOrigin;
    }
    
    public function setRegion($region) {
        $this->region = $region;
    }
    
    public function setProducer($producer) {
        $this->producer = $producer;
    }
    
    public function setHarvestYear($harvestYear) {
        $this->harvestYear = $harvestYear;
    }
    
    public function setGradingDate($gradingDate) {
        $this->gradingDate = $gradingDate;
    }
    
    public function setProcessingMethod($processingMethod) {
        $this->processingMethod = $processingMethod;
    }
    
    public function setAroma($aroma) {
        $this->aroma = $aroma;
    }
    
    public function setFlavor($flavor) {
        $this->flavor = $flavor;
    }
    
    public function setAftertaste($aftertaste) {
        $this->aftertaste = $aftertaste;
    }
    
    public function setAcidity($acidity) {
        $this->acidity = $acidity;
    }
    
    public function setBody($body) {
        $this->body = $body;
    }
    
    public function setBalance($balance) {
        $this->balance = $balance;
    }
    
    public function setUniformity($uniformity) {
        $this->uniformity = $uniformity;
    }
    
    public function setCleanCup($cleanCup) {
        $this->cleanCup = $cleanCup;
    }
    
    public function setSweetness($sweetness) {
        $this->sweetness = $sweetness;
    }
    
    public function setCupperPoints($cupperPoints) {
        $this->cupperPoints = $cupperPoints;
    }
    
    public function setTotalCupPoints($totalCupPoints) {
        $this->totalCupPoints = $totalCupPoints;
    }
    
    public function setMoisture($moisture) {
        $this->moisture = $moisture;
    }
    
    public function setColor($color) {
        $this->color = $color;
    }
    
    public function setCertification($certification) {
        $this->certification = $certification;
    }
    
    public function setAltitudeMeters($altitudeMeters) {
        $this->altitudeMeters = $altitudeMeters;
    }
    
    // Getters
    public function getId() {
        return $this->id;
    }
    
    public function getSpecies() {
        return $this->species;
    }
    
    public function getOwner() {
        return $this->owner;
    }
    
    public function getCountryOfOrigin() {
        return $this->countryOfOrigin;
    }
    
    public function getRegion() {
        return $this->region;
    }
    
    public function getProducer() {
        return $this->producer;
    }
    
    public function getHarvestYear() {
        return $this->harvestYear;
    }
    
    public function getGradingDate() {
        return $this->gradingDate;
    }
    
    public function getProcessingMethod() {
        return $this->processingMethod;
    }
    
    public function getAroma() {
        return $this->aroma;
    }
    
    public function getFlavor() {
        return $this->flavor;
    }
    
    public function getAftertaste() {
        return $this->aftertaste;
    }
    
    public function getAcidity() {
        return $this->acidity;
    }
    
    public function getBody() {
        return $this->body;
    }
    
    public function getBalance() {
        return $this->balance;
    }
    
    public function getUniformity() {
        return $this->uniformity;
    }
    
    public function getCleanCup() {
        return $this->cleanCup;
    }
    
    public function getSweetness() {
        return $this->sweetness;
    }
    
    public function getCupperPoints() {
        return $this->cupperPoints;
    }
    
    public function getTotalCupPoints() {
        return $this->totalCupPoints;
    }
    
    public function getMoisture() {
        return $this->moisture;
    }
    
    public function getColor() {
        return $this->color;
    }
    
    public function getCertification() {
        return $this->certification;
    }
    
    public function getAltitudeMeters() {
        return $this->altitudeMeters;
    }
}
?>