<?php 
    include_once("backend/database.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Book Swap Buddy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .hero {
            background-image: url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            padding: 100px 0;
        }
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .book-stack {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .cta-section {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
 
    <?php include("reusable_code/navbar.php")?>
    <main>
        <section class="hero">
            <div class="container text-center">
                <h1 class="display-4 fw-bold mb-4">Welcome to Book Swap Buddy</h1>
                <p class="lead mb-4">Your journey of literary exploration begins here!</p>
                
            </div>
        </section>

        <section class="py-5" id="features">
            <div class="container">
                <h2 class="text-center mb-5">What You Can Do</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="text-center">
                            <div class="feature-icon">📚</div>
                            <h3>Swap Books</h3>
                            <p>Exchange your books with other members and discover new stories.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="text-center">
                            <div class="feature-icon">🤝</div>
                            <h3>Connect</h3>
                            <p>Meet fellow book lovers and engage in literary discussions.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="text-center">
                            <div class="feature-icon">🌟</div>
                            <h3>favorites</h3>
                            <p>Find your favorite books on listing, and explore more!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="mb-4"> Exchange your Book to others</h2>
                        <p class="lead">Exchange your read books for new ones and discover fresh stories. Swap your way to a new favorite!</p>
                        <a href="post_book.php" class="btn btn-primary btn-lg mt-3"> Share Book </a>
                    </div>
                    <div class="col-lg-6">
                        <img src="https://images.unsplash.com/photo-1524578271613-d550eacf6090?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Stack of books" class="book-stack img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5 cta-section">
            <div class="container text-center">
                <h2 class="mb-4">Ready to Dive In?</h2>
                <p class="lead mb-4">Explore our vast collection of books and start your swapping journey today!</p>
                <a href="listing.php" class="btn btn-success btn-lg">Browse Books</a>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2023 Book Swap Buddy. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>