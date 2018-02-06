<?php
$dbconn = mysqli_connect("localhost","root","","bookdb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
       if(isset($_POST["update"])){
        $id = $_POST['ID'];
        $title = $_POST['Title'];
        $pages = $_POST['Pages'];
        $author = $_POST['Author'];
        $year = $_POST['PublishedYear'];
        $sql="UPDATE books SET Title='$title',Pages='$pages',Author='$author',PublishedYear='$year'
        WHERE ID='$id'";
        if(mysqli_query($dbconn,$sql)){
            header('Location: addbook.php');
        }
    }
    else{
        $id = $_POST['ID'];
        $sql="DELETE FROM books WHERE ID='$id'";
        if(mysqli_query($dbconn,$sql)){
            header('Location: addbook.php');
        }
    }
    
?>