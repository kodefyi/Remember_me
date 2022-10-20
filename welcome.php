<?php
session_start();
if (!$_SESSION['email']) {
    header("Location: index.php"); //redirect to the login page to secure the welcome page without login access.  
}else{
    $email = $_SESSION['email'];
}

?>
<!DOCTYPE html>
<html>
<title>Welcome Page</title>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>

<body>
    <div class="card-body" style="width: 50rem;">
        <span>
            <h1>Hello, <?php echo $email; ?></h1>
        </span>
        <span>
            <a href="logout.php">Logout</a>
        </span>
    </div>
</body>

</html>