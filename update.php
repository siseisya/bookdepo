  
<?php
include_once("dbconnect.php");
$isbn = $_GET['isbn'];
$title = $_GET['title'];
$author = $_GET['author'];
$price = $_GET['price'];
$description = $_GET['description'];
$publisher = $_GET['publisher'];

if (isset($_GET['operation'])) {
  try {
      $sqlupdate = "UPDATE book SET  title = '$title',author = '$author', price = '$price', publisher='$publisher', description = '$description' WHERE isbn = '$isbn' ";
      $conn->exec($sqlupdate);
      echo "<script> alert('Update Success')</script>";
      echo "<script> window.location.replace('mainpage.php?title = ".$title."&isbn=".$isbn."') </script>;";
    } 
    catch(PDOException $e) {
      echo "<script> alert('Update Error')</script>";
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
<body>
<p>
<h2 align='center'><?php echo $title?></h2>
</p>

   <h3 align="center">Update Depository<?php echo $isbn?></h3>

    <form action="update.php" method="get" align="center" onsubmit="return confirm('Are you sure want to update this?');">

        <input type="hidden" name="isbn" id="isbn" value="<?php echo $isbn;?>" required><br>
        <input type="hidden" name="operation" id="operation" value="update" required><br>
        

            <label for="title"><b>Title:</b></label><br>
            <input type="text" name="title" id="title" value="<?php echo $title;?>" required>
            <br>
            <label for="author"><b>Author:</b></label><br>
            <input type="text" name="author" id="author" value="<?php echo $author;?>" required>
            <br>
            <label for="price"><b>Price(RM):</b></label><br>
            <input type="text" name="price" id="price" value="<?php echo $price;?>" required>
            <br>
            <label for="description"><b>Description:</b></label><br>
            <input type="text" name="description" id="description" value="<?php echo $description;?>" required>
            <br>
            <label for="publisher"><b>Publisher:</b></label><br>
            <input type="text" name="publisher"id="publisher"value="<?php echo $publisher;?>" required>
            <br>
            <input type="submit" value="Update">
    </form>
      <p align="center"><a href="mainpage.php">Cancel</a></p>
</body>

</html>