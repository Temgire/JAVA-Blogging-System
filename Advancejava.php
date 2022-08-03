<?php
    include('connect.php');

    $sql = "SELECT id, title FROM advjava";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> JAVA </title>
    <link rel="stylesheet" href="java-page.css">
    <style>
.b{
    text-align:center;
    margin:2rem;
}
.b a{
    text-decoration: none;
    color: black;

}

.b a button{
    padding: 1rem;
    background-color: aliceblue;
}
    </style>
</head>
<body>
<?php include 'navbar.php'?>
<div class="blocks">

<?php
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $id= $row['id'];
            $title = $row['title'];
            echo "<a class='block' href='advblog.php?id=$id'>$title</a>";
        }
        } else {
        echo "0 results";
      }
?>

<div class="b">
<a href="./addAdvConcept.php">
    <button>
        Add Concept
    </button>
</a>
</div>
</div>
</body>
</html>