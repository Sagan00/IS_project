<?php
class Database{
	private $servername = 'db';
	private $username = 'MYSQL_USER';
	private $password = 'MYSQL_PASSWORD';
	private $dbname = 'MYSQL_DATABASE';	

	public function getConnection(){
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		}else{
			$conn->query("SET SESSION TRANSACTION ISOLATION LEVEL SERIALIZABLE");
			return $conn;
		}
	}
}
?>