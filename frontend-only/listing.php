<?php 
    include_once("backend/database.php");
    $books = $database->get("select * from post_books where post_status = 'active' order by post_id desc", [], "fetchAll");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $title = $_POST['title'];


        $unfiltered_books = $books;

        if(!empty($title))
        {
            $unfiltered_books = array_filter($unfiltered_books, fn($data) => $data['title'] ==  $title );
        }

        if(!empty($author))
        {
            $unfiltered_books = array_filter($unfiltered_books, fn($data) => $data['author'] ==  $author );
        }

        if(!empty($genre))
        {
            $unfiltered_books = array_filter($unfiltered_books, fn($data) => $data['genre'] == $genre );
        }

        $books = $unfiltered_books;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Book Listings</title>
    <style>
        body{
            background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        }
    </style>
</head>
<body>

<?php include("reusable_code/navbar.php")?>
<br>
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-12 mb-4 text-center">
            <form action="" method="post" class='bg-light p-4 rounded shadow'>
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <label for="author" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter author">
                    </div>
                    <div class="col-md-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="Enter author">
                    </div>
                    <div class="col-md-3">
                        <label for="genre" class="form-label">Genre</label>
                        <select class="form-select" id="genre" name="genre">
                            <option value="">Select a genre</option>
                            <option value="fiction">Fiction</option>
                            <option value="non-fiction">Non-Fiction</option>
                            <option value="romance">Romance</option>
                            <option value="thriller">Thriller</option>
                            <option value="mystery">Mystery</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary mt-4" style='width:100%; position:relative; top:7px'>Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <?php foreach($books as $book): ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <img src="img/<?php echo $book['img']; ?>" class="card-img-top" alt="<?php echo $book['title']; ?>" style="width: 100%; height: 350px;">
                <div class="card-body">
                    <h5 class="card-title text-dark mb-3"><?php echo $book['title']; ?></h5>
                    <p class="card-text mb-2">By <span class="text-secondary"><?php echo $book['author']; ?></span></p>
                    <p class="card-text mb-4">Genre: <span class="text-muted"><?php echo $book['genre']; ?></span></p>
                    <a href="view_post.php?id=<?php echo $book['post_id']; ?>" class="btn btn-primary rounded p-2 d-block mx-auto">View Book</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

</script>
</body>
</html>