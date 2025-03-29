<?php 
    include_once("backend/database.php");
    $my_request = $database->get("select * from swap_request join post_books on swap_request.post_id = post_books.post_id where user_request_id = ? order by request_id desc", [$_SESSION['user']['user_id']], "fetchAll");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Post a Book</title>
</head>
<body>

<?php include("reusable_code/navbar.php")?>


<div class="container-fluid mt-5">
    <h2 class="text-center mb-4">Your Requests</h2>
    <table class="table table-stripped border table-bordered ">
        <thead class='table-dark'>
            <tr>
                <th scope="col" class='text-center'> offered_book </th>
                <th scope="col" class='text-center'>desired_book</th>
                <th scope="col" class='text-center'>Request Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($my_request as $request): ?>
                <tr>
                    <td><img src="img/<?php echo $request['swap_img']; ?>" alt="<?php echo $request['swap_title']; ?>" style="width: 100%; height: 500px;"></td>
                    <td><img src="img/<?php echo $request['img']; ?>" alt="<?php echo $request['swap_title']; ?>" style="width: 100%; height: 500px;"></td>
                    <td class="text-center">
                        <div class='container'>
                            <?php if($request['request_status'] == 'pending'): ?>
                                <span class="badge bg-warning text-light p-5 " style='font-size:2em; position:relative; top:120px'>
                                    <?php echo $request['request_status']; ?>
                                </span>
                            <?php elseif($request['request_status'] == 'rejected'): ?>
                                <span class="badge bg-danger text-light p-5 " style='font-size:2em; position:relative; top:120px'>
                                    <?php echo $request['request_status']; ?>
                                </span>
                            <?php elseif($request['request_status'] == 'completed'): ?>
                                <span class="badge bg-success text-light p-5 " style='font-size:2em; position:relative; top:120px'>
                                    <?php echo $request['request_status']; ?>
                                </span>
                            <?php endif; ?>
                            <br> <br>
                            <form action="backend/check_convo.php" method='post'>
                                <input type="hidden" name="user2_id" value='<?=$request['poser_id']?>'>
                                <input type="hidden" name="user1_id" value='<?=$_SESSION['user']['user_id']?>'>
                                        
                                <input type="submit" class='btn btn-primary btn-lg' style='font-size:2em; position:relative; top:120px' value='message owner'>
                                 
                            </form>    
                            
                        </div>    
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
    
    });

</script>
</body>
</html>