<?php
	require "dbconnection.php";

	if(isset($_GET["sensor"])) {
    	getSensorData($_GET["sensor"], $conn);
	} else {
	   makeError(1);
	   die();
	}

	function getSensorData($sensor, $conn) {
		$sql = "SELECT * FROM `sensors` WHERE $sensor = 1";
		$result = $conn->query($sql);
		$json = array();
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$json = [
					"error" => 0,
					"id" => $row["id"],
					"lon" => $row["lon"],
					"lat" => $row["lat"],
					"waterlevel" => $row["waterlevel"],
					"lastDataTime" => $row["last data time"]
				];
				$encoded_json = json_encode($json);
				print_r($encoded_json);
			}
		} else {
			makeError(2);
			die();
		}
		$conn->close();
	}

	function makeError($errorNumber) {
		$json = array();
		$json = [
					"error" => 1,
					"errornumber" => $errorNumber,
				];
		$encoded_json = json_encode($json);
		print_r($encoded_json);
	}
?>