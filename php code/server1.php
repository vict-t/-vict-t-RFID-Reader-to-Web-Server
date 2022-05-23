<?php 
include("connection.php");
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Patient information Search</title>
<!-- External CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<style>
    * {
  font-family: sans-serif; 
}   
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   
   <!-- .collapse.navbar-collapse -->
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <!-- active means the current page-->
       <li class="nav-item active">
         <a class="nav-link" href="server1.php">Patient information<span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="SearchingTypes.php">Medicine Search</a>
       </li>  
       <li class="nav-item">
         <a class="nav-link" href="medicalRecord.php">Patient Medical Record</a>
       </li> 
     </ul>
   </div>   
 </nav>
<div class="container">

		<div id="link_wrapper">
            
 <br>
 <h1><span class="badge badge-dark">Patient information</span></h1>
 <h5><span class="badge badge-light">Search Patient information by typing Patient ID</span></h5>
 <br>
 <?php
$id = "";
if (isset($_GET["id"]) && !empty(trim($_GET["id"])))
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
?>

 <form action="server1.php" method="get" >
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">ID:</span>
        <input type="text"  class="form-control" name="id" value="<?= is_numeric($id)? $id: "" ?>" />        
        <input type="submit" class="btn btn-outline-dark" value="Search" />
    </div>  
</form>

<table class="table">
	<thead class="thead-light">
	<th>Name</th>
	<th>ID</th>
        <th>Gender</th>
        <th>Birthday</th>
	<th>Contact</th>
	<th>Card ID</th>
        <th>Edit</th>                
	</thead>
<?php 
    $sql =  "SELECT * ";
    $sql .= "FROM patient ";
    if (!empty($id)){
        $sql .= "WHERE p_id = ". $id ." ";
    }
    $sql .= "ORDER BY p_id ";
    
    $result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)){
		$name = $row['p_name'];
		$ID = $row['p_id'];
   		$Gender = $row['Gender'];
   		 $bid = $row['Birthday'];		
		$contact = $row['phone_no'];
		$cardId = $row['card_id'];
 ?>
	<tbody>
		<tr>
		<td><?php echo $name; ?></td>
		<td><?php echo $ID; ?></td>
          	<td><?php echo $Gender; ?></td>
		<td><?php echo $bid; ?></td>
		<td><?php echo $contact; ?></td>
		<td><?php echo $cardId; ?></td>
          <?php echo '<td><a href="update.php?id='.$row['p_id'].'" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">Edit</a>'; ?>
          <?php echo '<a href="delete.php?id='.$row['p_id'].'" class="btn btn-danger" tabindex="-1" role="button" aria-disabled="true">DELETE</a></td>'; ?>
		</tr>
	</tbody>
<?php 	
} ?>
</table>

<br><br>

</div>
</div>


</body>
</html>
