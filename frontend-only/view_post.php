<?php 
    include_once("backend/database.php");
    $id = $_GET['id'];
    
    $book = $database->get("select * from post_books join users on post_books.poser_id = users.user_id where post_id = ?",[$id],"fetch");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>View Book Post</title>
</head>
<body>

<?php include("reusable_code/navbar.php")?>

<div id="applyPopup" class="border shadadow  bg-light p-4 border" style="shadow: 0 0 10px black; display: none; position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%); width: 500px;  z-index: 9999;">
        <form id="swapBookForm" method="post" enctype="multipart/form-data">
            <div class="popup-content">
                <button type="button" class="btn-close" id="close_apply" aria-label="Close" style="position: absolute; top: 10px; right: 10px;"></button>
                <h3 class='text-center'>Request to Swap Books </h3>
                <div class="mb-3">
                    <label for="swap_book_title" class="form-label">Swap Book Title</label>
                    <input type="text" class="form-control" id="swap_book_title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="swap_book_picture" class="form-label">Swap Book Picture</label>
                    <input type="file" class="form-control" id="swap_book_picture" name="img" required>
                </div>
                <div class="mb-3">
                    <label for="swap_book_author" class="form-label">Swap Book Author</label>
                    <input type="text" class="form-control" id="swap_book_author" name="author" required>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Swap Book Genre</label>
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
                    <label for="condition" class="form-label">Swap Book Condition</label>
                    <select class="form-select" id="condition" name="condition" required>
                        <option value="">Select the condition</option>
                        <option value="new">New</option>
                        <option value="good">Good</option>
                        <option value="used">Used</option>
                        <option value="bad">Bad</option>
                    </select>
                </div>
                <input type="hidden" name='post_id' value="<?=$book['post_id']?>">
                <input type="hidden" name='user_request_id' value="<?=$_SESSION['user']['user_id']?>">
                <button id="submit_apply" class="btn btn-success" style="margin-top: 10px;">Submit</button>
            </div>
        </form>
    </div>


<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="container-fluid row">
                                <img src="img/<?php echo $book['profile_picture']; ?>" alt="Profile Picture" class="mb-3 col-6" style="width: 50%; height: 150px; border-radius: 10%;">
                                <div class='col-6 '>
                                    <form action="backend/check_convo.php" method='post'>
                                        <input type="hidden" name="user2_id" value='<?=$book['user_id']?>'>
                                        <input type="hidden" name="user1_id" value='<?=$_SESSION['user']['user_id']?>'>
                                        <?php if($book['poser_id'] != $_SESSION['user']['user_id']): ?>
                                            <input type="submit" class='btn btn-primary mt-2' value='message owner'>
                                        <?php endif; ?>
                                    </form>    
                                    
                                    <?php if($book['poser_id'] != $_SESSION['user']['user_id']): ?>
                                        <a href="owner_wish_list.php?id=<?=$book['poser_id']?>" class='btn btn-info shadow text-light mt-2' id=''>owner wish list</a>
                                    <?php endif; ?>

                                    <?php if($book['poser_id'] != $_SESSION['user']['user_id']): ?>
                                        <input type="submit" class='btn btn-success mt-2' value='request swap' id='request'>
                                    <?php endif; ?>

                                 
                              
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Owner: <?php echo $book['full_name']; ?></h5>
                                    <h5 class="card-title">Title: <?php echo $book['title']; ?></h5>
                                    <p class="card-text">Author: <?php echo $book['author']; ?></p>
                                    <p class="card-text">Genre: <?php echo $book['genre']; ?></p>
                                    <p class="card-text">Description: <?php echo $book['note']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="img/<?php echo $book['img']; ?>" class="card-img-top" alt="<?php echo $book['title']; ?>" style="width: 100%; height: 500px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(() => {

        $("#request").click(()=>{
            $("#applyPopup").show()
        })
            
        $("#close_apply").click(()=>{
            $("#applyPopup").hide()
        })


   
        $('#swapBookForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: 'backend/request_swap.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Request Sent',
                    text: 'Your book swap request has been sent successfully.'
                });
                $("#applyPopup").hide()
                }
            })
        });

    });

   
</script>
</body>
</html>