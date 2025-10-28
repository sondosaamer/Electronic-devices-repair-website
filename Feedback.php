<?php
$title = "Feedback";
require("Nav.php");

// deleting feedback
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $smt = $pdo->prepare('DELETE FROM feedback WHERE id = ?');
    $smt->execute([$id]);
}

// sending form feedback to database
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(!isset($_SESSION['username'])){
        echo '<div class="alert alert-warning" role="alert">
                Login first
                </div>';
    }
    else{
        $title = isset($_POST["title"]) ? $_POST["title"] : null;
        $feedback = isset($_POST["feedback"]) ? $_POST["feedback"] : null;
        // alert if invalid input or empty
        if (!$title || !$feedback) {
            echo '<div class="alert alert-danger" role="alert">
                    Empty or invalid input!
                    </div>';
            exit();
        }
        // successfully sending data
        if (isset($_POST["title"]) && isset($_POST["feedback"])){
            $smt = $pdo->prepare('INSERT INTO feedback (client_id,title,feedback) VALUES (?,?,?)');
            $smt->execute([$_SESSION['id'],$title,$feedback]);
            echo '
            <div class="alert alert-success" role="alert">
                Feedback sent successfuly!
                </div>';
        }
    }
}

// get all feedbacks from database
$smt = $pdo->prepare('SELECT * FROM feedback ');
$smt->execute([]);
$feedbacks = $smt->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- feedback form to send feeedbacks -->
<form class="container m-auto mt-5 mb-5" style="width: 50%" action="" method="POST">
    <h2 class="mb-3">Feedback</h2>
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" class="form-control" name="title" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Feedback</label>
        <textarea class="form-control" rows="3" name="feedback" required></textarea>
    </div>
    <div class="text-center m-auto">
        <button type="submit" class="btn btn-success m-3 w-25">Send</button>
    </div>
</form>

<!-- user feedbacks -->
<?php if(isset($_SESSION['id'])): 
    // get user created feedbacks from database
    $smt = $pdo->prepare('SELECT * FROM feedback WHERE client_id = ?');
    $smt->execute([$_SESSION['id']]);
    $userfeedbacks = $smt->fetchAll(PDO::FETCH_ASSOC);
    if($userfeedbacks):
?>
        <div class="row container-fluid d-flex justify-content-center">
            <h2 class="text-center m-5">Your feedbacks:</h2>
        <?php foreach($userfeedbacks as $feedback):?>
            <div class="card text-ite bg m-2" style="width: 18rem">
                <div class="card-body">
                    <h5 class="card-title"><?=$feedback["title"]?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">User: <?=$_SESSION['username']?></h6>
                    <p class="card-text"><?=$feedback["feedback"]?></p>
                    <div>
                        <a href="Feedback.php?id=<?=$feedback['id']?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
<?php endif ?>

<!-- feedbacks from other users -->
<?php if($feedbacks):?> 
    <div class="row container-fluid d-flex justify-content-center">
        <h2 class="text-center m-5">Other clients feedbacks:</h2>
        <?php foreach($feedbacks as $feedback):?>
            <?php 
            // user name
            $smt = $pdo->prepare('SELECT name FROM clients WHERE id = ? ');
            $smt->execute([$feedback['client_id']]);
            $user_name = $smt->fetch(PDO::FETCH_ASSOC);
            ?>
        <div class="card text-ite bg m-2" style="width: 18rem">
            <div class="card-body">
                <h5 class="card-title"><?=$feedback["title"]?></h5>
                <h6 class="card-subtitle mb-2 text-muted">User:<?=$user_name['name']?></h6>
                <p class="card-text"><?=$feedback["feedback"]?></p>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>

<?php

require("Footer.php");
