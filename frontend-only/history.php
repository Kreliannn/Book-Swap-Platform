<?php 
    include_once("backend/database.php");
    $transaction = $database->get("select * from transaction where user_id = ?", [$_SESSION['user']['user_id']], "fetchAll");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Trading History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .book-cover {
            width: 50px;
            height: 75px;
            object-fit: cover;
        }
        body{
            background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        }

       
    </style>
</head>
<body>
<?php include("reusable_code/navbar.php")?>

    <div class="container mt-5">
        <h1 class="text-center mb-4 text-light">Book Trading History</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Book You Traded</th>
                        <th>Book You Received</th>
                        <th>Date of Transaction</th>
                        <th>Type of Transaction</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaction as $row): ?>
                    <tr>
                        <td>
                            <?= htmlspecialchars($row['your_book']) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($row['received_book']) ?>
                        </td>
                        <td><?= htmlspecialchars($row['date']) ?></td>
                        <td><?= htmlspecialchars($row['type']) ?></td>
                        <td><span class="badge bg-success"> completed </span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>