<?php

if(isset($_POST['sub'])){
    include 'connect.php';
        $name = $_POST['name'];
        $desc = $_POST['descr'];
        $opexp = $_POST['opexps'];
        $filename = $_FILES['code']["name"];
    $tempname = $_FILES["code"]["tmp_name"];
    $folder = "codeimg/" . $filename;

    $opfilename = $_FILES['op']["name"];
    $optempname = $_FILES["op"]["tmp_name"];
    $opfolder = "opimg/" . $filename;


          $sql = "INSERT INTO java (title, descr, code, op, opexp) VALUES ('$name', '$desc', 'opimg/$opfilename','codeimg/$filename','$opexp')";
          if (move_uploaded_file($tempname, $folder) && move_uploaded_file($optempname, $opfolder)) {
            echo "<script> alert('Image added'); </script>";
            $msg = "Image uploaded successfully";
            if (mysqli_query($conn, $sql)) {
                echo "Added Successfully..!!";
                // header('Location: index.html');
                // exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            $msg = "Failed to upload image";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join</title>
    <link rel="stylesheet" href="join.css">
    
</head>

<body>
    <?php
        include('navbar.php');
    ?>
    <div class="main">
        <div class="glass">

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <form enctype="multipart/form-data"  action="addJavaConcept.php" method="post" class="form">

                <input type="text" name="name" placeholder="Title" autocomplete="off" required>
                Code Image : <br>
            
                <input type="file" id="file" class="file" name="code">
                Output : <br>
                <input type="file" id="file" class="file" name="op">
                <textarea name="descr" id="descr" cols="30" rows="10" placeholder="Add Description"></textarea><br>
                <textarea name="opexps" id="opexps" cols="30" rows="10" placeholder="Add Output Explanation"></textarea><br>
                <input type="submit" value="Submit" name="sub">


            </form>
        
        </div>

    </div>
</body>

</html>