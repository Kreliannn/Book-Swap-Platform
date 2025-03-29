<?php 
    include_once("backend/database.php");
    $id = $_GET['id'];
    
    $book = $database->get("select * from post_books join users on post_books.poser_id = users.user_id where post_id = ?",[$id],"fetch");

    $request = $database->get("select * from swap_request where post_id = ? && request_status = ?", [$id, "pending"], "fetchAll");
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
<br>

<input type="hidden" id="user_id" value="<?=$_SESSION['user']['user_id']?>">

<div class="container">
    <div class="row ">
        <div class="col-md-6 shadow p-0 m-0" style='background:whitesmoke'>
            <img src="img/<?php echo $book['img']; ?>" class="card-img-top" alt="<?php echo $book['title']; ?>" style="width: 100%; height: 615px;">
        </div>
        <div class="col-md-6 ">
            <!-- Additional content can be added here -->
             <h1 class='text-center'> Swap Request </h1>
             <div class='container border m-0 p-0' style='height:500px'>
                 <?php foreach($request as $req): ?>
                     <div class="mb-3 d-flex justify-content-between border p-2 container-fluid">
                         <h5>Swap Title: <?php echo $req['swap_title']; ?></h5>
                         <button class='request btn btn-primary' value="<?=$req['request_id']?>">View Request</button>
                     </div>
                 <?php endforeach; ?>
             </div>
             <br>
             <form action="backend/delete_post.php"  method="post">
                <input type="hidden" name='post_id' value="<?=$book['post_id']?>">
                <input type="submit" value='delete' class='btn btn-danger'>
             </form>
            
        </div>
    </div>
</div>

<br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(() => {

        $(".request").click((e) => {
            let req_id = e.target.value
            $.ajax({
                url : "backend/fetch_request_info.php",
                method : "post",
                data : {
                    request_id : req_id
                },
                success : (response) => {
                    let res = JSON.parse(response)
                    component = `
                        <div id="pop_up" class="card border-0 shadow-lg" style=" z-index: 9999; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 70%; max-height: 80vh; overflow-y: auto;">
                            <div class="card-header  text-white d-flex justify-content-between align-items-center py-3 bg-primary" '>
                                <h5 class="card-title mb-0" style=''> request information </h5>
                                <button id="close" type="button" class="btn-close btn-close-white" aria-label="Close"></button>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <img src="img/${res.profile_picture}" alt="Profile Picture" class="img-fluid rounded" style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                        <div class="mb-4">
                                            <strong>Name:</strong> <span class="text-dark">${res.full_name}</span>
                                        </div>
                                        <div class="mb-4">
                                            <strong>Book Title:</strong> <span class="text-dark">${res.swap_title}</span>
                                        </div>
                                        <div class="mb-4">
                                            <strong>Book Author:</strong> <span class="text-dark">${res.swap_author}</span>
                                        </div>
                                        <div class="mb-4">
                                            <strong>Book Genre:</strong> <span class="text-dark">${res.swap_genre}</span>
                                        </div>
                                        <div class="mb-4">
                                            <strong>Book Condition:</strong> <span class="text-dark">${res.swap_condition}</span>
                                        </div>
                                        
                                        <div class="d-flex justify-content-center gap-3 mt-4">
                                            <button class="btn btn-success btn-lg" id="approve" value="${JSON.stringify([res.request_id, res.post_id])}">Approve</button>
                                            <button class="btn btn-danger btn-lg" id="decline" value="${res.request_id}">Decline</button>
                                             <form action="backend/check_convo.php" method='post'>
                                                <input type="hidden" name="user2_id" value='${res.user_request_id}'>
                                                <input type="hidden" name="user1_id" value='${$("#user_id").val()}'>
                                        
                                                <input type="submit" class='btn btn-primary mt-2  btn-lg' value='message'>
                                            </form>  
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="text-center mb-4">
                                            <img class="img-fluid rounded" style="max-height: 400px; object-fit: contain;" src="img/${res.swap_img}" alt="Landlord Verification Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                             
                    `

                    $("body").append(component)

                    $("#close").click(() => {
                        $("#pop_up").remove()
                    })

                    $("#approve").click((event)=>{
                        let info = JSON.parse(event.target.value);
                        $.ajax({
                            url : "backend/approve_request.php",
                            method : "post",
                            data : {
                                post_id  : info[1],
                                request_id : info[0]
                            },
                            success : (response) => {
                                window.location.href = "post_book.php";
                            }
                        })
                    })

                    $("#decline").click((event)=>{
                        let request_id = event.target.value;
                        $.ajax({
                            url : "backend/decline_request.php",
                            method : "post",
                            data : {
                                request_id : request_id
                            },
                            success : (response) => {
                                window.location.reload()
                            }
                        })
                    })

                }
            })
        })
        })
    
</script>
</body>
</html>