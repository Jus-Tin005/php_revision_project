<?php
    session_start();

    include("../vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\UsersTable;
    use Helpers\HTTP;

    $email = $_POST['email'];
    $password = md5($_POST['password']); #Notice here


    $table = new UsersTable(new MySQL());

    $user = $table->findByEmailAndPassword($email,$password);

    if($user){
        if($table->suspend($user->id)){
            HTTP::redirect("/index.php", "suspended=1");
    
            $_SESSION['user'] = $user;
            HTTP::redirect("/profile.php"); 
        }
    }else{
        HTTP::redirect("/index.php", "incorrect=1");
    }






/*
    if($email === 'justin777@gmail.com' and $password === '12345678js'){
        $_SESSION['user'] = ['username' => 'Jus Tin'];
        header('location: ../profile.php');
    }else{
        header('location: ../index.php?incorrect=1');
    }
    */