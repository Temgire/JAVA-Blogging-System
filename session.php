<?php
    if(isset($_POST['submit'])){
        $msg = $_POST['msg'];
        include 'connect.php';

        $qry = "INSERT INTO message(msg) VALUES('$msg')";
        mysqli_query($conn, $qry);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="query.css">
    <title>Learn JAVA Website</title>
</head>
<body>
<?php include 'navbar.php'?>
<main class="main">
 <button  onclick="displayForm();">
     Add Message
 </button>

 <form style="display:none;" action="session.php" method="post" id="form" class="form">
    <textarea name="msg" id="msg" cols="100" rows="10" placeholder="Enter the message"></textarea>
   <br>
    <input type="submit" class="submit" name="submit" value="Submit">
 </form>

 <div class="all-msgs">
     <h1>Chats </h1>
     <?php 
        $qry = "SELECT * FROM message ORDER BY id DESC";
        include 'connect.php';
        $cnt = 1;

        $data = mysqli_query($conn, $qry);

        while($res = mysqli_fetch_assoc($data)){

       ?>
     <div class="mess">
            <?php echo $cnt.'. '. $res['msg'] ?>
     </div>
     <?php
        $cnt++;  
    }
      ?>
 </div>

 </main>

 <script>
     function displayForm(){
        var form = document.getElementById('form');
        form.style.display = "block";
     }
 </script>
</body>
</html>