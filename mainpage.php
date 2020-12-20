<?php
include_once("dbconnect.php");

//delete operation
    if (isset($_GET['operation'])) {
      $title = $_GET['title'];
      try {
        $sql = "DELETE FROM book WHERE title = '$title'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }

    try {

        $sql = "SELECT * FROM book";
        $stmt = $conn->query($sql );
        echo "<p><h1 align='center'>Book Depository</h1></p>";
        echo "<table border='1' align='center'>
        <tr>
          <th>Title</th>
          <th>Author</th>
          <th>Price</th>
          <th>Description</th>
          <th>Publisher</th>
          <th>ISBN</th>
          <th>Operation</th>
        </tr>";
        
        foreach($conn->query($sql) as $book) {
            echo "<tr>";

            echo "<td>".$book['title']."</td>";
            echo "<td>".$book['author']."</td>";
            echo "<td>".$book['price']."</td>";
            echo "<td>".$book['description']."</td>";
            echo "<td>".$book['publisher']."</td>";
            echo "<td>".$book['isbn']."</td>";
            echo "<td><a href='mainpage.php?title=".$book['title']."&operation=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>
            <a href='update.php?title=".$book['title']."&author=".$book['author']."&price=".$book['price']."
            &description=".$book['description']."&publisher=".$book['publisher']."&isbn=".$book['isbn']."'>Update</a></td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo "<p align='center'><a href='index.html?'>Insert new Book</a></p>";

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  $conn = null;
?>
