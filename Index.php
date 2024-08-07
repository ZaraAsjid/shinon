<?php
$host = "localhost"; 
$username = "root";
$password = "1218";
$database = "shine";
$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully";
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="file:///C:\Users\wdeve\Desktop\XXAMP\htdocs\shine1\Home.css" rel="stylesheet">
    <title>Shineonyou25</title>
    <style>
      .link{
        background-color: pink;
        color: white;
        padding-left: 24px;
        text-decoration:dashed;
        font-size: 20px;
      }
      .link:hover{
        background-color: white;
        background:fixed;
        color: black;
        text-decoration: dashed;
        font-size: 25px;
        font-style: italic;
        font-weight: bold;
      }
      .container-fluid{
        background-color: pink;
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid"style="color:White; background:pink;">
    <h1 style="color:White; background:pink;">ShineOnYou25</h1>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <button class="btn btn-light ms-auto" onclick="window.location.href='admin_access.php'">ADMIN</button>
    </div>
  </div>
</nav>
<div class="container-fluid">
    <div class="row">
      <div class="col">
        <ul class="list-unstyled d-flex flex-column align-items-center mb-0">
          <li>
            <a class="link" href="home.php">Home</a>
          </li>
          <li>
            <a class=" link" href="Nails.php">Nails</a>
          </li>
          <li>
            <a class="link" href="Cosmatics.php">Cosmetics</a>
          </li>
          <li >
            <a class=" link" href="Dresses.php">Dresses</a>
          </li>
          <li>
            <a class=" link" href="Jewelry.php">Jewelry</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>