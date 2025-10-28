<?php
$title = "Support";
require("Nav.php");

// deleting request
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $smt = $pdo->prepare('DELETE FROM problems WHERE id = ?');
    $smt->execute([$id]);
}

// sending request data to database
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(!isset($_SESSION['username'])){
        echo '<div class="alert alert-warning" role="alert">
                Login first
                </div>';
    }
    else{
        $title = isset($_POST["title"]) ? $_POST["title"] : null;
        $problem = isset($_POST["problem"]) ? $_POST["problem"] : null;
        $location = isset($_POST["location"]) ? $_POST["location"] : null;
        // alert if invalid input or empty
        if (!$title || !$problem || !$location) {
            echo '<div class="alert alert-danger" role="alert">
                    Empty or invalid input!
                    </div>';
            exit();
        }
        // successfully sending data
        $smt = $pdo->prepare('INSERT INTO problems (client_id,title,problem,location) VALUES (?,?,?,?)');
        $smt->execute([$_SESSION['id'],$title,$problem,$location]);
        echo '
        <div class="alert alert-success" role="alert">
            Feedback sent successfuly!
            </div>';
        
    }
}


?>

<!-- sending requests form -->
<form class='container m-auto mt-5' style=" width: 50%" action="" method="POST">
    <h2 class='mb-3'>Support Request</h2>
    <div class="mb-3">
        <label for="username" class="form-label">Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="mb-3">
        <label for="feedback" class="form-label">Problem</label>
        <textarea class="form-control" rows="3" name="problem"></textarea>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Location</label>
        <input type="text" class="form-control" name="location">
    </div>
    <div class='text-center m-auto'>
        <button type="submit" class="btn btn-success m-3 w-25">Send</button>
    </div>
</form>

<?php if(isset($_SESSION['id'])):
    // get user requests from database
    $smt = $pdo->prepare('SELECT * FROM problems WHERE client_id = ?');
    $smt->execute([$_SESSION['id']]);
    $userrequests = $smt->fetchAll(PDO::FETCH_ASSOC);
    // check if there are any requests for thbis user
    if($userrequests):
    ?>
    <div class="container mt-5">
        <h2 class="text-center m-3" >Your current requests</h2>
        <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Problem</th>
        <th scope="col">State</th>
        <th scope="col">Check</th>
        <th scope="col">Operation</th>
        </tr>
    </thead>
    <tbody>
        <!-- display user requests -->
        <?php foreach($userrequests as $request): ?>
        <tr>
        <th scope="row"><?=$request['id']?></th>
        <td><?=$request['title']?></td>
        <td><?=$request['problem']?></td>
        <td><?=$request['state']?></td>
        <td><?=$request['price'] == 0 ? '-' : $request['price']?> </td>
        <td>
            <a href="Support.php?id=<?=$request['id']?>" class="btn btn-danger">Delete</a>
        </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
    </div>
    <?php endif ?>
<?php endif ?>

<?php

require("Footer.php");
