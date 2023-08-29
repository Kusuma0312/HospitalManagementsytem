<?php
session_start();
include("include\connection.php");
if(isset($_POST['login'])){
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    if(empty($uname)){
        echo "<script>alert('Enter Username')</script>";
    }else if (empty($pass)) {
        echo "<script>alert('Enter Password')</script>";
    }else{
        $query="SELECT * FROM patient WHERE username='$uname' AND password='$pass'";
        $res=mysqli_query($connect,$query);
        if(mysqli_num_rows($res)==1){
            header("Location:patient\index.php");
            $_SESSION['patient']=$uname;

        }else{
            echo "<script>alert('Invalid account')</script>";

        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login Page</title>
</head>
<body style="background-image:url(back.jpg); background-repeat:no-repeat;background-size:cover;">
    <?php
    include("include\header.php");

    
    
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5 jumbotron">
                    <h5 class="text-center">Patient Login</h5>
                    <form method="post">
                    <div class="form-group">
                        <label >username</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter username">
                    </div>
                        <div class="form-group">
                            <label>password"</label>
                            <input type="password" name="pass" class="form-control" auto-complete="off" placeholder="Enter Password">
                        </div>
                        <input type="submit" value="Login" name="login" class="btn btn-info">
                        <p>I dont have an account <a href="account.php">Click here!</a></p>
                    </form>

                </div>
                <div class="col-md-3"></div>

            </div>
        </div>
    </div>
</body>
</html>