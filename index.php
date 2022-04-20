<?php 

session_start();
$alert = "";
$alert2= "";

if(isset($_GET["error"])){
    if($_GET["error"] == 1){
        $message = "Username or password is incorrect";
        $alert = "<small style='color: red;' class='form-text'>" . $message . "</small>";
    }
}
if(isset($_SESSION["success"])){
    if($_SESSION["success"] = 1){
        $message = "Success!";
        $alert2 = "
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>". $message . "</strong> Account created.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
        </div>
        ";
        session_unset();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        DAILY REPORT
    </title>
            <!-- CSS  -->
    <link rel="stylesheet" href="css/styles.css">
        <!-- BOOTSTRAP  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="index">
    <img src="images/logo.png" alt="" width="50px" height="auto">
    TARELCO I BIGLOADS
</a>
</nav>
<div class="container col-md-3 mt-5 p-5">

    <div class="card">
        <div class="card-header">
            <h4>Sign In</h4>
            <small id="emailHelp" class="form-text text-muted">If you already have an account, sign in here.</small>
        </div>
        <?php echo $alert2;?>
        <div class="card-body">
            <form action="handleLogin" method="POST">
                <div class="form-group">
                    <label for="Username">Username</label>
                    <input name="username" type="text" class="form-control" id="Username">
                <?php echo $alert?>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <!-- <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <br>
                <input type="submit" name="login" class="btn btn-success w-100" value="Log In">
                <!-- <button name="login" type="submit" class="btn btn-success w-100">Log In</button> -->
            </form>
            <small id="emailHelp" class="form-text text-muted">Don't have an account yet? <a href="register">Register here.</a></small>
        </div>
        
    </div>

</div>
</body>
</html>
