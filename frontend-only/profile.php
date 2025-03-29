<?php 
    include_once("backend/database.php");
    $wish_lists = $database->get("select * from wish_list where user_id = ?", [$_SESSION['user']['user_id']], "fetchAll");
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

    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-4 bg-light p-3 shadow" style='border-radius:7%'>
                <div class="text-center">
                    <img src="img/<?=$_SESSION['user']['profile_picture']?>" alt="Member Profile Picture" class="profile-picture mb-3">
                    <h2 id="userFullName"><?=$_SESSION['user']['full_name']?></h2>
                </div>
                <hr>
                <form action='backend/change_profile.php' method='post' class="mt-3" enctype="multipart/form-data"> 
                    <div class="mb-3">
                        <label for="profilePicture" class="form-label">Change Profile Picture</label>
                        <input type="file" class="form-control text-light" id="profilePicture" accept="image/*" name='fileUpload'>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload Picture</button>
                </form>
                <form action='backend/change_fullname.php' method='post' class="mt-3">
                    <div class="mb-3">
                        <label for="newName" class="form-label">Change Name</label>
                        <input type="text" class="form-control text-dark" id="newName" placeholder="Enter new name" name='fullname'>
                    </div>
                    <input type="submit" class="btn btn-primary" value='update'>
                </form>
            </div>

            <div class="col-md-8  overflow-auto">
                <form action="backend/add_to_wishlist.php" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label text-dark">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label text-dark">Author</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    </div>
                    <input type="hidden" name="user_id" value="<?=$_SESSION['user']['user_id']?>">
                    <button type="submit" class="btn btn-primary " style='width:100%'>Add to Wishlist</button>
                </form>
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