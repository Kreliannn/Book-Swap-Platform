<?php 
    include_once("backend/database.php");
    $books = $database->get("select * from post_books where poser_id = ? && post_status = 'active'", [$_SESSION['user']['user_id']], "fetchAll");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Post a Book</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="image/website_image/logo-house1-removebg.png">
</head>
<body>

<?php include("reusable_code/navbar.php")?>

<div class='container-fluid row mt-3'>


<div class="container-fluid col-6">
    <div class="row ">
        <div class="col-md-6 " style='width:100%'>
            <h2 class="text-center mb-4">Post a Book</h2>
            <form id="postBookForm" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title of Post</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" required>
                    <div id="titleHelp" class="form-text">Enter the title of your post.</div>
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Picture of Book</label>
                    <input type="file" class="form-control" id="picture" name="picture" required>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">book author</label>
                    <input type="text" class="form-control" id="author" name="author" aria-describedby="authorHelp" required>
                    <div id="authorHelp" class="form-text">Enter the author of your post.</div>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select class="form-select" id="genre" name="genre" required>
                        <option value="">Select a genre</option>
                        <option value="fiction">Fiction</option>
                        <option value="non-fiction">Non-Fiction</option>
                        <option value="romance">Romance</option>
                        <option value="thriller">Thriller</option>
                        <option value="mystery">Mystery</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="mb-3">
                    <label for="condition" class="form-label">Condition</label>
                    <select class="form-select" id="condition" name="condition" required>
                        <option value="">Select the condition</option>
                        <option value="new">New</option>
                        <option value="good">Good</option>
                        <option value="used">Used</option>
                        <option value="bad">bad</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="note" class="form-label">Personal Note</label>
                    <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post Book</button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid col-6 shadow-lg row " style='overflow:auto; height :100dvh'>
    <h1 class='text-center mb-3 mt-2 col-12'>your post</h1>
   <?php foreach($books as $book):?>
        <div class="col-md-6 mb-3">
            <div class="card shadow">
                <img src="img/<?php echo $book['img']; ?>" class="card-img-top" alt="<?php echo $book['title']; ?>" style="width: 100%; height: 350px;">
                <div class="card-body">
                    <?php 
                        $req = $database->get("select * from swap_request where post_id = ? && request_status = ?", [$book['post_id'], "pending"], "fetchAll");
                    ?>
                    <div class=" text-center border border-rounded shadow p-1  mb-2 bg-success text-light" style='width:100%'> <?=count($req)?> request</div>
                    <a href="manage_book.php?id=<?php echo $book['post_id']; ?>" class="btn btn-primary" style='width:100%'>View Post</a>
                </div>
            </div>
        </div>
   <?php endforeach ?>
</div>

</div>

<br><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#postBookForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: 'backend/post_book.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response == "success") window.location.reload()
                    else alert(response)
                }
            })
        });
    });

</script>
</body>
</html>