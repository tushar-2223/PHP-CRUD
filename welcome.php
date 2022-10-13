<?php
include 'config.php';
session_start();

error_reporting(0);

if (!isset($_SESSION['Username'])) {
    header("Location: Login.php");
}

if (isset($_POST['submit'])) {
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    // photoupload

    $filename = $_FILES["Photo"]["name"];
    $tempname = $_FILES["Photo"]["tmp_name"];
    $folder = "uploadimages/".$filename;
    move_uploaded_file($tempname, $folder);

    //data
    $sql = "SELECT * FROM registertable WHERE Email = '$Email'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Email Already Exits.')</script>";
    } else {
        $sql = "INSERT INTO registertable (Username,Email,Password,Photo) VALUES ('$Username', '$Email', '$Password','$folder')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Register successfully.')</script>";
            $Password = "";
            
        } else {
            echo "<script>alert('Something went wrong.')</script>";
        }
    }

  

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcomepage</title>
</head>

<body>
    <!-- <h1>
    welcome
    <//?php echo $_SESSION['Username'];?> 
    </h1>  -->
    <a href="logout.php">logout</a>
    <div class="container">
    <form method="POST" class="loginform" enctype="multipart/form-data">
        <h1 class="formheader">Registration</h1>
        <div class="input-group">
            <input type="file" name="Photo"  id="" required>
        </div>
        <div class="input-group">
            <input type="text" name="Username" value="<?php echo $_SESSION['Username']; ?>" id="" required>
        </div>
        <div class="input-group">
            <input type="email" name="Email" value="<?php echo $_SESSION['Email']; ?>" id="" required>
        </div>
        <div class="input-group">
            <input type="password" name="Password" placeholder="Password" id="" required>
        </div>
        <div class="input-group">
            <button name="submit" class="btn">registration</button>
        </div>
    </form>
    </div>
</body>

</html>