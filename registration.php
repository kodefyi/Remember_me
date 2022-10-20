<?php
include('dbconnection/connection.php');
?>
<!DOCTYPE html>
<html>
<title>Simple Login & Logout with Remember me Functionality</title>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>

<body>
    <div class="card-body" style="width: 50rem;">
        <form method="POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <br>
            <button class="btn btn-primary"><a href="index.php" style="color: white;">Already Have an Account?</a></button>

            <button type="submit" id="register" name="register" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($password == '') {
        echo "<script>alert('Please enter the password')</script>";
        exit();
    }

    if ($email == '') {
        echo "<script>alert('Please enter the email')</script>";
        exit();
    }

    $check_email_query = "SELECT * FROM user WHERE email='$email'";
    $run_query = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($run_query) > 0) {
        echo "<script>alert('Email $email is already exist in our database, Please try another one!')</script>";
        exit();
    }

    $add_user = "INSERT INTO `user`(`email`, `password`) VALUES ('$email','$password')";
    $run = mysqli_query($conn, $add_user);
    echo "<script>window.open('index.php','_self')</script>";
}

?>