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
<thead>
    <tr>
      <th>UserID</th>
      <th>Employee</th>
      <th>Status</th>
      <th>Message</th>
      <th>Update</th>
      <th>Delete</th>
  </tr>

  <tbody>

<?php
$servername = "localhost";
$username = "baughy";
$password = "Espeon1";
$dbname = "jaxcode56";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM io_employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["userid"]. "</td><td>" . $row["user"]. "</td><td>" . $row["io"]. "</td><td>" . $row["message"]."</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

</tbody>
</table>
</body>
</html>
