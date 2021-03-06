<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

<link rel="stylesheet" href="inout.css">
  <title>In Out</title>

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>


<body>

<!--NAVIGATION-->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">In Out</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Refresh</a>
        </li>
      </ul>
    </div>
  </nav>

  <table class="table-bordered table">
    <tr>
      <th>Employee</th>
      <th>In</th>
      <th>Out</th>
      <th>Message</th>
  </tr>

  <tbody>

<?php
$servername = "localhost";
$username = "baughy";
$password = "Espeon1";
$dbname = "jaxcode56";

// Change Message

if(isset($_POST['message'])) {

$_POST['message'] = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE io_employees SET message ='{$_POST['message']}' WHERE userid={$_POST['userid']}";

if (mysqli_query($conn, $sql)) {

} else {
echo "Error updating record: " . mysqli_error($conn);
}
}


// Change In Out Status

if(isset($_GET['io'])) {
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE io_employees SET io ='{$_GET['io']}' WHERE userid={$_GET['userid']}";

if (mysqli_query($conn, $sql)) {

} else {
echo "Error updating record: " . mysqli_error($conn);
}
}




// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM io_employees";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td class="align-middle lead"><?=$row['user']?></td>
<? if($row['io'] == '0') { ?>
<td class="text-center"><a href="index.php?userid=<?=$row['userid']?>&io=1"><img src="images/circle_green.png" class="hidden"></a></td>
<td class="text-center"><img src="images/circle_red.png"></td>
<? } else { ?>
<td class="text-center"><img src="images/circle_green.png"></td>
<td class="text-center"><a href="index.php?userid=<?=$row['userid']?>&io=0"><img src="images/circle_red.png" class="hidden"></a></td>
<? } ?>
<td>
<? if($row['message'] != '') { ?>
<a data-toggle="collapse" href="#collapse<?=$row['userid']?>" aria-expanded="false" aria-controls="collapse<?=$row['userid']?>" style="color:#000000;">
<?=$row['message']?>
</a>
<? } else {?>
<a data-toggle="collapse" href="#collapse<?=$row['userid']?>" aria-expanded="false" aria-controls="collapse<?=$row['userid']?>" class="text-muted float-right" style="text-decoration-style: dashed;font-style: italic;font-size:12px;text-decoration: underline;"><i class="far fa-edit"></i></a>
<? } ?>


</p>
<div class="collapse" id="collapse<?=$row['userid']?>">
<div>
	<form action="index.php" method="POST">
	<input type="text" name="message" value="<?=$row['message']?>">
	<input type="hidden" name="userid" value="<?=$row['userid']?>">
	<input class="btn btn-secondary btn-md" style="padding:0 4px;" type="submit" value="Submit">
	</form>
</div>
</div>



</td>
</tr>
<?
}
} else {
echo "0 results";
}

mysqli_close($conn);
?>


</tbody>
