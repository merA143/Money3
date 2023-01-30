<?php

if (isset($_POST['SignupSubmit']))
{

    
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $passwordrpt = $_POST['passwordrpt'];

    if (empty($email) ||  empty($phone) ||  empty($password) || empty($passwordrpt))
    {
        header('location: signup.index.html?error=emptyfiled');
        exit();
    }

    if ($password !== $passwordrpt)
    {
        header('location: signup.index.html');
        exit();
    }

    $connection = new mysqli('localhost','root','','investment');
    $sql = 'insert into users (email,phone,password) values(?,?,?);';
    $stmt = $connection->prepare($sql);
    $type = 'sss';
    $stmt->bind_param($type,$email,$phone,$password);
    $stmt->execute();
    
    header('location: login.index.html');
    echo 'Sign Up Success';
    exit();
}
else{
    header('location: signup.index.html');
    exit();
}

?>
