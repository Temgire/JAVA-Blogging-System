

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> JAVA </title>
    <link rel="stylesheet" href="blog.css">

    <style>
        .arena{
            margin: 2rem 30rem;
            display:flex;
            flex-direction:column;
            justify-content: space-around;
            align-items: center;
        }

        img{
            margin:2rem;
        }
    </style>
    
</head>
<body>
<?php
if(isset($_GET['id'])){

    include('connect.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM advjava WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
?>
<?php include 'navbar.php'?>
<div class="arena">

<?php
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $id= $row['id'];
            $title = $row['title'];
            $desc = $row['descr'];
            $code = $row['code'];
            $op = $row['op'];
            $opexp = $row['opexp'];
            echo "<h1>$title</h1>";
            echo "<hr>";
            echo "<h2>Description</h2>";
            echo "<p class='desc'>$desc</p>";
            echo "<hr>";
            echo "<h2>Code</h2>";
            echo "<img src='$code' width='700'></img>";
            echo "<hr>";
            echo "<h2>Output</h2>";
            echo "<img src='$op' width='500'></img>";
            echo "<hr>";
            echo "<h2>Example Explained</h2>";
            echo "<p class='exp'>$opexp</p>";
        }
        } else {
        echo "0 results";
      }
    }
?>
</div>
</body>
</html>