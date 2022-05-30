<?php
session_start();
$connect=mysqli_connect("localhost","root","","tcs") or die("Connection Failed");
if(!empty($_POST['submit']))
{
    $username=$_POST['sername'];
    $password=$_POST['password'];
    $query="select * from registeration where email='$username'and password='$password'";
    $result=mysqli_query($connect,$query);
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        $_SESSION['email'] = $emailid;
        header("Location:index1.php");
    }else{


        echo "Not successful";
    }

}
?>














<!DOCTYPE html>
<html lang="en" >
<head>
    <!--        <meta charset="UTF-8">-->
    <title>Login Form</title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'><link rel="stylesheet" href="./style.css">

</head>
<!--<body>-->

<!-- partial:index.partial.html -->
<img class="img" src="login22.png">
<div class="container">
    <div class="screen">
        <div class="screen__content">

            <form class="login" method="post">
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <input type="text" class="login__input" name="sername" placeholder="Email">
                </div>
                <div class="login__field">
                   <i class="login__icon fas fa-lock"></i>
                    <input type="password" class="login__input" name="password" placeholder="Password">
                </div>
                 <input type="submit" class="button login__submit" name="submit" value="Login">
<!--                    <span class="button__text" >Log In Now</span>-->
<!--                    <i class="button__icon fas fa-chevron-right"></i>-->


            </form>


            <div class="social-login">
                <div class="social-icons">
                    <!--					<a href="#" class="social-login__icon fab fa-instagram"></a>-->
                    <!--					<a href="#" class="social-login__icon fab fa-facebook"></a>-->
                    <!--					<a href="#" class="social-login__icon fab fa-twitter"></a>-->
                </div>
            </div>
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>
    </div>
</div>
<!-- partial -->

</body>
</html>






