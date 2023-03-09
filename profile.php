<?php

    include("vendor/autoload.php");

    use Helpers\Auth;

    $auth = Auth::check();


    /*
    session_start();
    if(!isset($_SESSION['user'])){
        header('location: index.php'); # no space in location: = redircet in php
        exit(); # or die();
    }
    */
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
    <div class="container mt-5 mb-5">
        <h2 class="mb-3">
            <?= $auth->name?>
            <span class="fw-normal text-muted">
                (<?= $auth->role?>)
            </span>
        </h2>

        <?php if(isset($_GET['error'])) :?>
            <div class="alert alert-warning">
                Cannot upload file
            </div> 
        <?php endif ?>

        
        <?php if($auth->photo) : ?>
            <img src="_actions/photos/<?= $auth->photo ?>" alt="Profile Picture" class="img-thumbnail mb-3" style="width:200px;">
        <?php endif ?>

        <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" name="photo" class="form-control">
                <button type="submit" class="btn btn-secondary">Upload</button>
            </div>
        </form>

        <ul class="list-group">
            <li class="list-group-item">
                <strong>Email :</strong><?= $auth->email ?>
            </li>
            <li class="list-group-item">
                 <strong>Phone :</strong><?= $auth->phone ?>
            </li>
            <li class="list-group-item">
                 <strong>Address :</strong><?= $auth->address ?>
            </li>
        </ul>
        <br>
        <a href="admin.php">Manage Users</a>
        <a href="_actions/logout.php" class="text-center">Logout</a>
    </div>
</body>
</html>