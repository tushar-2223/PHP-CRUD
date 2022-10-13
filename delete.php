<?php

include 'config.php';

$id = $_GET['id'];

$deletesql = "DELETE FROM users WHERE ID = $id";

$result = mysqli_query($conn, $deletesql);

header("Location:userdata.php");

?>