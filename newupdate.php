<?php
include_once("dbconnect.php");
$title = $_GET['title'];
$author = $_GET['author'];
$price = $_GET['price'];
$description = $_GET['description'];
$publisher = $_GET['publisher'];
$isbn = $_GET['isbn'];

// if (isset($_COOKIE["email"])){
//   echo "Value is: " . $_COOKIE["email"];
// }


if (isset($_GET['isbn'])) {
  $title = $_GET['title'];
  $author = $_GET['author'];
  $price = $_GET['price'];
  $description = $_GET['description'];
  $publisher = $_GET['publisher'];

  try {
    $sql = "INSERT INTO book(title, author, price, description, publisher,isbn)
    VALUES ('$title', '$author', '$price', '$description', '$publisher', $isbn)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Success')</script>";
    echo "<script> window.location.replace('mainpage.php?title=".$title."&isbn=".$isbn."') </script>;";
   
  } catch(PDOException $e) {
    echo "<script> alert('Insert Error')</script>";
    //echo "<script> window.location.replace('index.html') </script>;";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<p>
<h2 align='center'><?php echo $title?></h2>
</p>

<body>
    <h2 align="center">Insert New Book Depository</h2>

    <form action="update.php" method="get" align="center" >
 
    <input type="hidden" id="isbn" name="isbn" value="<?php echo $isbn;?>" required><br>

          <label for="title"><b>Title</b></label><br>
          <input type="text" name="title" id="title" value="<?php echo $title;?>" required> <br>
  
          <label for="author"><b>Author</b></label><br>
          <input type="text" name="author" id="author" value="<?php echo $author;?>"required> <br>
  
          <label for="price"><b>Price</b></label><br>
          <input type="text" name="price" id="price" value="<?php echo $price;?>"required> <br>

          <label for="publisher"><b>Publisher :</b></label><br>
          <input type="text" name="publisher" id="publisher" value="<?php echo $publisher;?>" required> <br>
  
          <label for="description"><b>Description :</b></label><br>
          <input type="text" name="description" id="description" value="<?php echo $description;?>"required> <br>
  
        <input type="submit" name="submit" value="Submit">

</form>
    <p align="center"><a href="mainpage.php?isbn=<?php echo $isbn?>">Cancel</a></p>
</body>

</html>
?>
