<?php

foreach($_REQUEST as $key => $value)  
{
	if($key == "method"){
		$method = $value;
	}
	if($key =="pid"){
		$pid = $value;
	}	

	if($key =="rfid"){
		$rfid = $value;
	}

	if($key =="date"){
		$date = $value;
	}

	if($key =="done"){
		$done = $value;
	}	

}//End of foreach


include("connection.php"); 	

// Check the connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//update the values in database
if($method == '1'){
	//mysqli_query($conn,"UPDATE patient SET card_id = '$rfid' WHERE p_id = '$pid'");	
	mysqli_query($conn,"INSERT INTO patient (p_name, p_id, card_id, Gender, phone_no, Birthday) values ('', '$pid', '$rfid', '', '', '')");
} //DELETE the data in database
else if($method == '2'){
	mysqli_query($conn,"DELETE FROM patient WHERE card_id ='$rfid'");	
}
else if($method == '3'){
	mysqli_query($conn,"INSERT INTO patient_medicine_record (p_id, date, medicine_name, medicine_id , Done ) values ('$pid', '$date', 'Dinutuximab', '1216', '$done')");	
}
	
?>








