<?php
	
	$db = "tfc_bus";
	$user = "root";
	$pass = "3Dae3";
	$host = "localhost";
	$port = 3306;

	#$user = $_POST["user"]#

	$conn = mysqli_connect($host, $user, $pass, $db, $port);
	if($conn){
		#$q = "SELECT * FROM paragem2";
		#$result = mysqli_query($conn, $q);


	$stmt = $conn->prepare("SELECT ID_paragem, nome_paragem, longitude, latitude FROM paragem2;");
	
	//executing the query 
	$stmt->execute();
	
	//binding results to the query 
	$stmt->bind_result($ID_paragem, $nome_paragem, $longitude, $latitude);
	
	$products = array(); 
	
	//traversing through all the result 
	while($stmt->fetch()){
		$temp = array();
		$temp['ID_paragem'] = $ID_paragem; 
		$temp['nome_paragem'] = $nome_paragem; 
		$temp['longitude'] = $longitude; 
		$temp['latitude'] = $latitude; 
		array_push($products, $temp);
	}
	
	//displaying the result in json format 

	#echo json_encode($products);
	echo count($products);

	}
	else{
		echo "No Connection With DB";
	}



