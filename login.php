<?php

if (isset($_POST['LoginSubmit']))
{
    $connect = new mysqli('localhost','root','','investment');
    $sql = 'SELECT * FROM users WHERE phone = ? AND password = ? ;';
    $stmt = $connect->prepare($sql);

    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $stmt->bind_param('ss',$phone,$password);
    $stmt->execute();

    $data = $stmt->get_result();

    if ($data->num_rows > 0)
    {
        header('location: home.html');
        
    }
    else
    {
       
        header('location: invalid.html');

    }
}
else
{
   header('location: login.index.html');
   exit();
}

?>