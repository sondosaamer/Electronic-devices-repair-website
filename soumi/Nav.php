<?php
require("config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soume | <?=$title?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Soume Computing</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        
                        <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="AdminFeedback.php">Feedbacks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Logout.php">Logout</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-pills btn btn-outline-success" href="AdminSupport.php">Support Request</a>
                        </li>
                        <?php else:?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Feedback.php">Feedbacks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="About.php">About us</a>
                        </li>
                        <?php if (isset($_SESSION['username'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="Logout.php">Logout</a>
                        </li> 

                        <?php else:?>
                        <li class="nav-item">
                            <a class="nav-link" href="Login.php">Login</a>
                        </li>
                        <?php endif;?>
                        <li class="nav-item">
                            <a class="nav-pills btn btn-outline-success" href="Support.php">Support Request</a>
                        </li>
                        <?php endif?>
                    </ul>
                </div>
            </div>
        </nav>