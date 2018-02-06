<?php
$dbconn = mysqli_connect("localhost","root","","bookdb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }  
?>
<html>

<head>
	<title>Book Information</title>
    <link href="assets/css/reg.css" rel="stylesheet">
</head>
<style>
		body{
			background: #333;
			font-family:arial;
		}
		form{
			padding:10px;
			margin:0 auto;
			background:#FFFFFF;
			width:500px;
			align-items: center;
			align-content: center;
		}
		div{
			padding:10px;
			margin:0 auto;
			background:#FFFFFF;
			width:1000px;
		}

		label{
			font-weight:bold;
			float:left;
			width: 200px;
		}
	</style>
<body>
	<form action="" method="post">
	<h1>Library Database</h1>
	<fieldset>
		<legend>Book Information</legend>
		<label>Title:</label> <input type="text" name="title" required/><br />
		<label>Pages:</label> <input type="number" min=1 name="pages" required/><br />
		<label>Author:</label> <input type="text" name="author" required/><br />
		<label>Published Year:</label> <input type="text" name="year" required/>
        <br/>
         <?php
        if (
            isset($_POST["title"]) &&
            isset($_POST["pages"]) &&
            isset($_POST["author"])  &&
            isset($_POST["year"]) 


           ){

            $title = $_POST["title"];
            $pages = $_POST["pages"];
            $author  = $_POST["author"];
            $year = $_POST["year"];
            $query = "INSERT INTO books(Title,Pages,Author,PublishedYear) VALUES('$title','$pages','$author','year')";
            mysqli_query($dbconn, $query);
        }
    ?>
    <input style="float:right" type="submit" value="Add Book" onClick="return submit_form();" name="submit"/>
    </fieldset>
    </form>
    <div>
    <h3>List of Stored Books</h3>
    <table border="2" align="center" cellpadding=5>
            <thead>
                <tr><th>Title</th>
                    <th>Pages</th>
                    <th>Author</th>
                    <th>Published Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            	
                 <?php
            $sql = "SELECT * FROM books";
            if($result = mysqli_query($dbconn,$sql)){
                while($rows = mysqli_fetch_assoc($result)){
                	$ID = $rows["ID"];
                    $Title = $rows["Title"];
                    $Pages = $rows["Pages"];
                    $Author = $rows["Author"];
                    $PublishedYear = $rows["PublishedYear"];
                    echo "
                            <tr>
                            <form action='account_handler.php' method='post'>
                            <input type='hidden' name='ID' value='$ID' />
                            <td><input type='text' class='flds-edit' value='$Title' name='Title'/></td>
                            <td><input type='text' class='flds-edit' value='$Pages' name='Pages'/></td>
                            <td><input type='text' class='flds-edit' value='$Author' name='Author'/></td>
                            <td><input type='text' class='flds-edit' value='$PublishedYear' name='PublishedYear'/></td>
                            <td><input type='submit' value='Update' name='update'/>
                            <input type='submit' value='Delete' name='delete'/></td>
                            </form>
                            </tr>
                    ";
                }
            }
        ?>
    </div>
            </tbody>
        </table>
    <script type="text/javascript" src="assets/js/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		function submit_form(){
			alert("A new book has been successfully added!");
		}
	</script>
</body>
</html>