<?php 
    include_once("backend/database.php");
    $owner_id = $_GET['id'];
    $owner = $database->get("select * from users where user_id = ?", [$owner_id], "fetch");
    $wish_lists = $database->get("select * from wish_list where user_id = ?", [$owner_id], "fetchAll");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Member Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-picture {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
        }
        .book-cover {
            width: 100px;
            height: 150px;
            object-fit: cover;
        }

     
    </style>
</head>
<body>

<?php include("reusable_code/navbar.php")?>
<br>
<a href="javascript:history.back()" class="btn btn-primary  text-start ms-4">Back</a> 
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-4 bg-light p-3 shadow" style='border-radius:7%'>
                <div class="text-center">
                     
                    <img src="img/<?=$owner['profile_picture']?>" alt="Member Profile Picture" class="profile-picture mb-3">
                    <h2 id="userFullName"><?=$owner['full_name']?></h2>
                </div>
                <hr>
               
            </div>

            <div class="col-md-8  overflow-auto">
                <br>

                <h3>Books Wishlist</h3>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <?php foreach ($wish_lists as $list): ?>
                        <div class="col">
                            <div class="card h-100 shadow">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($list['title']) ?></h5>
                                    <p class="card-text text-muted"> by <?= htmlspecialchars($list['author']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
    <br>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

</script>
</body>
</html>