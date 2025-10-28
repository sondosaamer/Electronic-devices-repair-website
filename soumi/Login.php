<?php
$title = "Login";
require("Nav.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = isset($_POST["username"]) ? $_POST["username"] : null;
    $password = isset($_POST["password"]) ? $_POST["password"] : null;
    
    if($username && $password){
        $smt = $pdo->prepare('SELECT * FROM clients WHERE name = ?');
        $smt->execute([$username]);
        $user = $smt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password, $user['password'])){
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['type'] = $user['type'];
            header('location:index.php');
            exit();
        }
        else{
            echo '<div class="alert alert-danger" role="alert">
                Check your user name and password!
                </div>';
        }
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
                Please complete your data!
                </div>';
    }
}
?>


<form class='container m-auto mt-5' style="width: 50%" action="" method="POST">
    <h2 class='mb-3'>Login</h2>
    <div class="mb-3">
        <label for="username" class="form-label">User Name</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class='text-center m-auto'>
        <p>
        Does not have an account? <a href="Register.php">Register</a>
        </p>
        <button type="submit" class="btn btn-success m-3 w-25">Login</button>
    </div>
</form>

<?php 

require("Footer.php");
