<?php
$title = "Login";
require("Nav.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = isset($_POST["username"]) ? $_POST["username"] : null;
    $password = isset($_POST["password"]) ? password_hash($_POST["password"],PASSWORD_DEFAULT) : null;
    $type = isset($_POST["type"]) ? $_POST["type"] : null;
    
    if($username && $password && $type){
        $smt = $pdo->prepare('INSERT INTO clients (name, password, type) VALUES (?,?,?)');
        $smt->execute([$username,$password,$type]);
        header('location:login.php');
        exit();
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
            Please complete your data!
            </div>';
    }
}
?>


<form class='container m-auto mt-5' style="width: 50%" action="" method="POST" >
    <h2 class='mb-3'>Register</h2>
    <div class="mb-3">
        <label for="username" class="form-label">User Name</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="type" value="individual" />
        <label class="form-check-label">
            Individual
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="type" value="bussiness" />
        <label class="form-check-label">
            Bussiness
        </label>
    </div>
    <div class='text-center m-auto'>
        <p>
        Already have an account?<a href="Login.php"> login</a>
        </p>
        <button type="submit" class="btn btn-success m-3 w-25">Register</button>
    </div>
</form>
<?php

require('Footer.php');