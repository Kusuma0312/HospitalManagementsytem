<?php
include("include\connection.php");
if(isset($_POST['apply'])){

    $firstname=$_POST['fname'];
    $surname=$_POST['sname'];
    $username=$_POST['uname'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $country=$_POST['country'];
    $password=$_POST['pass'];
    $confirm_password=$_POST['con_pass'];
    $error=array();
    if(empty($firstname)){
        $error['apply']="Enter First name";
    }else if(empty($surname)){
        $error['apply']="Enter surname";

    }else if(empty($username)){
        $error['apply']="Enter username";

    }else if(empty($email)){
        $error['apply']="Enter email";

    }else if($gender ==""){
        $error['apply']="select gender";

    }else if(empty($phone)){
        $error['apply']="Enter phone number";

    }else if($country==""){
        $error['apply']="Enter country";

    }else if(empty($password)){
        $error['apply']="Enter password";
    }else if($confirm_password!=$password){
        $error['apply']="password not matched";

    }
    if(count($error)===0){
        $query="INSERT INTO doctors(firstname, surname, username, email, gender, phone, country, password, salary, data_reg, status, profile) VALUES('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pending','doctor.jpg')";
        $result=mysqli_query($connect,$query);
        if($result){

            echo "<script>alert('you have successfully applied')</script>";
            header("Location:doctorlogin.php");

        }else{
            echo "<script>alert('Failed')</script>";


        }


    }


}
if(isset($error['apply'])){
    $s=$error['apply'];
    $show="<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
    $show="";
}





?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Now!!</title>
</head>
<body style="background-image:url(back.jpg);background-size:cover;background-repeat:no-repeat;">
    <?php
    include("include\header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron">
                    <h5 class="text-center">Apply Now!</h5>
                    <div>
                        <?php
                        echo $show;


                           ?>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <label>Firstname></label>
                            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname']))echo $_POST['fname'];?>">
                        </div>
                        <div class="form-group">
                            <label>surname></label>
                            <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter surname" value="<?php if(isset($_POST['sname']))echo $_POST['sname'];?>">
                        </div>
                        <div class="form-group">
                            <label>Username></label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname']))echo $_POST['uname'];?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Emailaddress" value="<?php if(isset($_POST['email']))echo $_POST['email'];?>">
                        </div>
                        <div class="from-group">
                            <label >Select Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="female">female</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>PhoneNumber</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phonenumber" value="<?php if(isset($_POST['phone']))echo $_POST['phone'];?>">
                        </div>
                        <div class="from-group">
                            <label >Select Country</label>
                            <select name="country" class="form-control">
                                <option value="">Select Country</option>
                                <option value="Russia">Russia</option>
                                <option value="India">India</option>
                                <option value="Ghana">Ghana</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                        </div>
                        <input type="submit" value="Apply" name="apply" class="btn btn-success">
                        <p>I already have an account <a href="doctorlogin.php">Click here</a></p>
                    </form>

                </div>
                <div class="col-md-3"></div>

            </div>
        </div>
    </div>
</body>
</html>