<?php
include("config.php");
class VITL{
	
	public function dbConnect(){
		
		$dbhost = DB_SERVER; // set the hostname
		$dbname = DB_DATABASE ; // set the database name
		$dbuser = DB_USERNAME ; // set the mysql username
		$dbpass = DB_PASSWORD;  // set the mysql password

		try {
			$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
			$dbConnection->exec("set names utf8");
			$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $dbConnection;

		}
		catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	
		
	}
	
	public function searchData($searchVal){
		
		
		try {
			
			$dbConnection = $this->dbConnect();
			$stmt = $dbConnection->prepare("SELECT * FROM `names` WHERE `last_name` like :searchVal ORDER BY first_name ASC");
			$val = "%$searchVal%";	
			$stmt->bindParam(':searchVal', $val , PDO::PARAM_STR);			
			$stmt->execute();

			$Count = $stmt->rowCount(); 
			//echo " Total Records Count : $Count .<br>" ;
             
			$result ="" ;
			if ($Count  > 0){
				while($data=$stmt->fetch(PDO::FETCH_ASSOC)) {										
				   $result = $result .'<div class="search-result">'.$data['first_name'].'&nbsp;'. $data['last_name'].'</div>';				

				}
				return $result ;
			}

		}
		catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	}	
	
}


?>