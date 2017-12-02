<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

if (isset($_SESSION)) {
    session_destroy();
}
$_SESSION['error'] = ''; // Variable To Store Error Message
    if (empty($_POST['user']) || empty($_POST['pass'])) {
        $_SESSION['error'] = "No se ha introducido nombre de usuario o contraseña.";
    } else {
// Define $username and $password
        $username=mysqli_real_escape_string($_POST['username']);        
        $password = mysqli_real_escape_string($_POST['pass']);
        $connection = mysqli_connect("localhost", "id3531087_root", "benri.exe", "id3531087_logins");
        $query = mysqli_query($connection, "SELECT * FROM users WHERE pass='$password' AND user_name='$username'");
        if(mysqli_affected_rows($query)){
           $_SESSION['username']=$username;
        }else{
            $_SESSION['error'] = "Contraseña o usuario incorrecto";
        }
        header("location:index.php");
    }
        ?>
    </body>
</html>
