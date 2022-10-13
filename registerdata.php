<?php

include 'config.php';
session_start();

$sql = "SELECT * FROM registertable";
$result = mysqli_query($conn, $sql);

$nums = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="userdatastyle.css">
    <style>
        img{
            height: 100px;
            width:100px;
        }
    </style>
    <title>Userdata</title>
</head>

<body>
    <div class="container">
        <div class="tableheader">
            <h1>RegisterData</h1>
            <h3>return Login Page : <a href="Login.php">Login</a></h3>
        </div>

        <table>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Photo</th>
            </tr>

            <?php
            while ($res = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $res['User ID'] ?></td>
                    <td><?php echo $res['Username'] ?></td>
                    <td><?php echo $res['Email'] ?></td>
                    <td><?php echo $res['Password'] ?></td>
                    <td><img src="<?php echo $res['Photo'] ?>"></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>