<?php
session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>!</h1>
    <?php

require_once ('config.php');

    $response = mysqli_query($link, 'SELECT id, username, status FROM users order by id ASC');
    echo "<table border='2' align='center'>
<H2 align='center'> Here are the Registered Users so far </h2>
<tr>
<th>ID</th>
<th>Username</th>
<th>Status</th>
<th>Action</th>
</tr>";
    while ($fetch = mysqli_fetch_array($response))
    {
        echo "<tr>";
        echo "<td>" . $fetch['id'] . "</td>";
        echo "<td>" . $fetch['username'] . "</td>";
        echo "<td>" . $fetch['status'] . "</td>";
        echo "<td align='center'><a style='text-decoration:none;' href='delete.php/?id=$fetch[id]'>X</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($link);
?>
    <p> </p> 
    <p text-indent: 25px;>
        <a href="reset-password.php" class="btn btn-warning" style="line-height:2">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3" style="line-height:2">Sign Out of Your Account</a>
    </p>
</body>
</html>