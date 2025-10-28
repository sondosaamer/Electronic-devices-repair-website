<?php
$title = "Feedback";
require("Nav.php");

// deleting feedback
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $smt = $pdo->prepare('DELETE FROM feedback WHERE id = ?');
    $smt->execute([$id]);
}

// get all feedbacks from database
$smt = $pdo->prepare('SELECT * FROM feedback ');
$smt->execute([]);
$feedbacks = $smt->fetchAll(PDO::FETCH_ASSOC);

if(!$feedbacks):
?>
    <h2 class="text-center mb-3 mt-3">There is no feedbacks for now</h2>
<?php else:?>
    <div class="container mt-5">
        <h2 class="text-center m-3 text-success" >Feedbacks</h2>
        <table class="table">
    <thead >
        <tr>
        <th scope="col" >#</th>
        <th scope="col">User</th>
        <th scope="col">Title</th>
        <th scope="col">Feedback</th>
        <th scope="col">Operation</th>
        </tr>
    </thead>
    <tbody>
        <!-- display all feedbacks -->
        <?php foreach($feedbacks as $feedback): ?>
        <tr>
        <th scope="row"><?=$feedback['id']?></th>
        <td><?=$feedback['client_id']?></td>
        <td><?=$feedback['title']?></td>
        <td><?=$feedback['feedback']?></td>
        <td>
            <a href="AdminFeedback.php?id=<?=$feedback['id']?>" class="btn btn-danger">Delete</a>
        </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
    </div>
<?php endif ;

require("Footer.php");


?>
