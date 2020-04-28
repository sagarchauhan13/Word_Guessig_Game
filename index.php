<?php
session_start();
session_unset();
require_once 'dbConfig.php';
require_once 'class.php';
$operation = new WordPlay();
if(isset($_POST['user_email'])){
    $user_email = $_POST['user_email'];
    $insert = $operation->InsertEmail($user_email);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Word Play</title>
        <link rel="stylesheet" href="css.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="/sagar/task4/js.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div id="login_form" class="container col-lg-6">
            <form method="post" name="form" id="form" action="index.php">
                <div class="form-group">
                    <label for="user_email">E-mail address</label>
                    <input type="email" class="form-control" id="user_email" placeholder="Enter email" name="user_email" autofocus>
                </div>
                <button type="button" class="btn btn-primary btn-lg" id="start" name="start" value="start">Start Game</button>
            </form>
        </div>
        <div id="getwords" class="container col-lg-6"></div>
        <div id="result"></div> 
    </body>
</html>
