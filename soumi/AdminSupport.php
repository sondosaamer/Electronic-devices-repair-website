<?php
$title = "Support";
require("Nav.php");

// deleting request
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $smt = $pdo->prepare('DELETE FROM problems WHERE id = ?');
    $smt->execute([$id]);
}

// changing state
if($_SERVER['REQUEST_METHOD'] === 'POST'):
    $id = isset($_POST["id"]) ? $_POST["id"] : null;
    $price = isset($_POST["price"]) ? $_POST["price"] : null;
    $state = isset($_POST["state"]) ? $_POST["state"] : null;
    if(!$price && $state == 'Done'):?>
        <div class="alert alert-danger" role="alert">
            Specify price with 'Done' state!
        </div>
    <?php elseif($price && !($state == 'Done')):?>
        <div class="alert alert-danger" role="alert">
            Can not specify price before done!
        </div>
    <?php elseif(!($state == 'Done')): 
        $smt = $pdo->prepare("UPDATE problems SET state = ? WHERE id = ?");
        $smt->execute([$state, $id]);?>
        <div class="alert alert-success" role="alert">
            State updated successfuly!
        </div>
    <?php elseif($state == 'Done'): 
        $smt = $pdo->prepare("UPDATE problems SET state = ?, price = ? WHERE id = ?");
        $smt->execute([$state, $price, $id]);?>
        <div class="alert alert-success" role="alert">
            State and price updated successfuly!
        </div>
    <?php else:?>
        <div class="alert alert-danger" role="alert">
            Error!
        </div>
    <?php endif ?>
<?php endif;


// get all feedbacks from database
$smt = $pdo->prepare('SELECT * FROM problems ');
$smt->execute([]);
$requests = $smt->fetchAll(PDO::FETCH_ASSOC);

if(!$requests):
?>
    <h2 class="text-center mb-3 mt-3">There is no requests for now</h2>
<?php else:?>
    <div class="container mt-5">
        <h2 class="text-center m-3 text-success" >Requests</h2>
        <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">User</th>
        <th scope="col">Title</th>
        <th scope="col">Problem</th>
        <th scope="col">Location</th>
        <th scope="col">Price</th>
        <th scope="col">State</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <!-- display all feedbacks -->
        <?php foreach($requests as $request): ?>
        <tr>
        <th scope="row"><?=$request['id']?></th>
        <td><?=$request['client_id']?></td>
        <td><?=$request['title']?></td>
        <td><?=$request['problem']?></td>
        <td><?=$request['location']?></td>
        <td><?=$request['price'] == 0? '-': $request['price'] ?></td>
        <td>
            <form action="" method="POST" class="text-center">
                <input type="text" class="form-control d-none" name="id" value="<?=$request['id']?>" >
                <input type="text" placeholder="Price" class="form-control d-block" name="price">
                <select class="form-select" name="state">
                    <option value="Pending"<?php if($request['state'] == 'Pending'):?> selected <?php endif ?> >Pending</option>
                    <option value="In Progress" <?php if($request['state'] == 'In progress'):?> selected <?php endif ?>>In Progress</option>
                    <option value="Done" <?php if($request['state'] == 'Done'):?> selected <?php endif ?>>Done</option>
                    
                </select>
                <button type="submit" class="btn btn-warning mt-2">Update</button>
            </form>
        </td>
        <td>
            <a href="AdminSupport.php?id=<?=$request['id']?>" class="btn btn-danger">Delete</a>
        </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
    <h5 class="text-center text-success">That's all for now.</h5>
    </div>
<?php endif ;


require("Footer.php");


?>
