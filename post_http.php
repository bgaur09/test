<?php

// db credentials
$servername = "127.0.0.1";
$username = "root";
$password = "password";
$dbname = "test";

$entityBody = file_get_contents('php://input');

if (isset($entityBody)) {
    $result = json_decode($entityBody);
   
   

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sql = "INSERT INTO save_post_data (oxigen_id, order_id, operator_id, status)
VALUES ('".$result->OPTRANSID."', '".$result->ORDERID."', '".$result->PRID."', '".$result->STATUS."')";
$sqlfnl = $db->prepare($sql);

if($sqlfnl->execute() == TRUE) {
	echo '{"STATUS":"data saved !"}';
}
else {
	echo '{"STATUS":"data could not be saved !"}';
}

}


?>

