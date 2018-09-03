<?php
include("VITL.php");
if(isset($_POST["search-data"])){
	
	$searchVal = trim($_POST["search-data"]);
	$vitl = new VITL();
	echo $vitl->searchData($searchVal);
}

?>