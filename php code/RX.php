<?php

foreach($_REQUEST as $key => $value) 
{
	if($key =="rfid"){
		$rfid = $value;
	}	

}//End of foreach


include("connection.php"); 	//We include the connect.php which has the data for the connection to the database


// Check  the connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//Now we update the values in database
$sql = "SELECT * FROM patient WHERE card_id = '$rfid' ";
$result = mysqli_query($conn, $sql);	
while($row = mysqli_fetch_array($result)){
	$name = $row['p_name'];
	$ID = $row['p_id'];
    $Gender = $row['Gender'];
    $bid = $row['Birthday'];		
	$contact = $row['phone_no'];

//echo the data back to the Arduino
echo "ID: $ID"; 
echo "  ";
echo "Name: $name";
echo "  ";
echo "Gender: $Gender";
echo "  ";
echo "Birthday: $bid";
echo "  ";
echo "Phone: $contact";

}

?>








