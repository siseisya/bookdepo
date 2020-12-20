<?php
include_once("dbconnect.php");
$title = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];
$description = $_POST['description'];
$publisher = $_POST['publisher'];
$isbn = $_POST['isbn'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO book(title, author, price, description, publisher, isbn)
    VALUES ('$title', '$author', '$price', '$description', '$publisher', $isbn)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script>alert('New Book Depository Created')</script>";
    echo"<script>window.location.replace('mainpage.php')</script>;";

  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    echo "<script>alert('Error')</script>";
    echo "<script> window.location.replace('index.html')</script>;";
  }

  $conn = null;

?>