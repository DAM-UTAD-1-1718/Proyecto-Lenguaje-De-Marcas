<?php

if (isset($_SESSION['username'])) {
   header("location:index.php");
}else if(isset ($_SESSION)){
    session_destroy();
}

if(isset($_POST['username'])&&isset ($_POST['pass'])){
$username=mysqli_real_escape_string($_POST['username']);        
$password = mysqli_real_escape_string($_POST['pass']);
$connection = mysqli_connect("localhost", "id3531087_root", "benri.exe", "id3531087_logins");
$comprobacion = mysqli_query($connection, "SELECT * FROM id3531087_logins WHERE username='$username'");
if(mysqli_affected_rows($comprobacion>0)){
    $query = mysqli_query($connection, "INSERT into logs (user_name, pass) " .
                    "VALUES('" . $username . "', '" . "'". $password . "')");
}else{
       header("location:index.php");
}

}
?>
