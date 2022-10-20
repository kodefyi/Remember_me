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

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="chkbx" name="chkbx">
                <label class="form-check-label" for="chkbx">Remember Me</label>
            </div><br>
            <button class="btn btn-primary"><a href="registration.php" style="color: white;">Create an Account?</a></button>

            <button type="submit" id="login" name="login" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['login'])) {
    session_start(); //session starts here
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

    $check_user = "SELECT * FROM user WHERE email='$email'AND password='$password'";
    $run = mysqli_query($conn, $check_user);
    if (mysqli_num_rows($run)) {
        echo "<script>window.open('welcome.php','_self')</script>";
        $_SESSION['email'] = $email; //here session is used and value of $email store in $_SESSION.
    } else {
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
}

?>