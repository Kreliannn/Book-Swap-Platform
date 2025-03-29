<?php 
    include_once("backend/database.php");
    $all_convo = $database->get("select * from convo where user1_id = ? || user2_id = ?", [$_SESSION['user']['user_id'], $_SESSION['user']['user_id']], "fetchAll");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>chat</title>
    <style>
        .hover-effect:hover {
            background-color: #E8F3E8;
            cursor: pointer;
        }
        body {
            background-color: #F5F8F5;
        }
        .list-group-item {
            border-color: #7C9070;
        }
    </style>
</head>
<body>

<?php include("reusable_code/navbar.php")?>

<input type="hidden" id='user' value='<?=json_encode($_SESSION['user'])?>'>


     
    
    <div class="col"  style='height:100dvh; overflow:auto'>
        <div class="container mt-5">
    <br>
        <div class="container mt-2">
            <div class="d-flex align-items-center border rounded p-3">
                <img src="img/<?=$_SESSION['user']['profile_picture']?>" alt="User Avatar" class="rounded-circle me-3" width="100" height="100">
                <div>
                    <h3 class="mb-0"><?=$_SESSION['user']['full_name']?></h3>
                </div>
            </div>
        </div>
        <br>
            <h2 class="mb-4 text-center" style="">Conversations</h2>
           
            <ul class="list-group shadow" id='contactList' style="border-color: #7C9070;">
                <?php foreach($all_convo as $convo): ?>
                    <?php if($convo['user1_id'] == $_SESSION['user']['user_id']): ?>
                    <?php $info = $database->get("select * from users where user_id = ?", [$convo['user2_id'] ], "fetch"); ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="img/<?php echo $info['profile_picture']; ?>" alt="Receiver Avatar" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0"><?php echo $info['full_name']; ?></h6>
                            </div>
                        </div>
                        <a href="convo.php?convo_id=<?php echo $convo['convo_id']; ?>" class="btn btn-primary">message</a>
                    </li>
                    <?php else: ?>
                    <?php $info = $database->get("select * from users where user_id = ?", [$convo['user1_id'] ], "fetch"); ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="img/<?php echo $info['profile_picture']; ?>" alt="Receiver Avatar" class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0"><?php echo $info['full_name']; ?></h6>
                            </div>
                        </div>
                        <a href="convo.php?convo_id=<?php echo $convo['convo_id']; ?>" class="btn btn-primary">message</a>
                    </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>