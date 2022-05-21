<?php 
include("connection.php");

$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

  /*$sql = "SELECT * FROM patient where p_id = '$id'";
  $result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)){
    $name = $row['p_name'];
		$ID = $row['p_id'];
    $Gender = $row['Gender'];
    $bid = $row['Birthday'];		
		$contact = $row['phone_no'];
		$cardId = $row['card_id'];
  }*/

 ?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Patient information Edit</title>
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
  <h3>ID: <?php echo $id; ?></h3>
  <h4>Are you sure to delete? </h4>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
       
        <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" maxlength="8" required="">
    </div>
 
<input type="submit" class="btn btn-danger" name="delete" value="YES, Delete it">
<a class="btn btn-primary" href="server1.php">NO</a>
</form>
</div>
</div>
<?php 
if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $sql = "DELETE FROM patient WHERE p_id = '$id'"; 

  if ($conn->query($sql) === TRUE) {
    header("Location: server1.php");
  }
   else {
      echo "<script>alert('Error deleting record: ')</script>" . $conn->error;
  }
}

?>

</body>
</html> 
