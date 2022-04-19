<?php 

// if(isset($_GET["error"])){
//     if($_GET["error"] == 1){
//         echo "error 1 badi";
//     }
//     if($_GET["error"] == 2){
//         echo "error 2 badi";
//     }
// }

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
            <h4>Sign Up</h4>
            <small id="emailHelp" class="form-text text-muted">Create an account.</small>
        </div>
        <div class="card-body">
            <form action="handleRegister" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" class="form-control" id="username" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input name="confirmPassword" type="password" class="form-control" id="confirmPassword">
                </div>
                <button name="register" type="submit" class="btn btn-success w-100">Register</button>
            </form>
            <small id="emailHelp" class="form-text text-muted">Already have an account? Go back to <a href="index">login.</a></small>
        </div>
        
    </div>

</div>
</body>
</html>
