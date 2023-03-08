<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('location: index.php'); # no space in location: = redircet in php
        exit(); # or die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-3">Jus Tin (Manager)</h2>

        <?php if(isset($_GET['error'])) :?>
            <div class="alert alert-warning">
                Cannot upload file
            </div> 
        <?php endif ?>
        <?php if(file_exists('_actions/photos/profile.jpg')) : ?>
            <img src="_actions/photos/profile.jpg" alt="Profile Picture" class="img-thumbnail mb-3" style="width:200px;">
        <?php endif ?>

        <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" name="photo" class="form-control">
                <button type="submit" class="btn btn-secondary">Upload</button>
            </div>
        </form>

        <ul class="list-group">
            <li class="list-group-item">
                <strong>Email :</strong>justin777@gmail.com
            </li>
            <li class="list-group-item">
                 <strong>Phone :</strong>(+95) 9755033035
            </li>
            <li class="list-group-item">
                 <strong>Address :</strong>No.62, Tamwe, Yangon, Myanmar
            </li>
        </ul>
        <br>
        <a href="_actions/logout.php">Logout</a>
    </div>
</body>
</html>