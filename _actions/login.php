<?php
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email === 'justin777@gmail.com' and $password === '12345678js'){
        $_SESSION['user'] = ['username' => 'Jus Tin'];
        header('location: ../profile.php');
    }else{
        header('location: ../index.php?incorrect=1');
    }