<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Swap Buddy - Share Your Love for Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .hero {
            background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            position: relative;
        }
        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .book-stack {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <main>
        <section class="hero d-flex align-items-center">
            <div class="hero-overlay"></div>
            <div class="container hero-content text-white">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 fw-bold mb-4">Welcome to Book Swap Buddy</h1>
                        <p class="lead mb-4">Discover, share, and connect with fellow book lovers. Swap your favorite reads and explore new worlds through the pages of books.</p>
                        <a href="login.php" class="btn btn-primary btn-lg">Login</a>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <img src="https://images.unsplash.com/photo-1524578271613-d550eacf6090?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Stack of books" class="book-stack">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-5">Why Choose Book Swap Buddy?</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="text-center">
                            <div class="feature-icon text-primary">📚</div>
                            <h3>Vast Library</h3>
                            <p>Access tons of books across various genres and discover new favorites.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="text-center">
                            <div class="feature-icon text-primary">🤝</div>
                            <h3>Easy Swaps</h3>
                            <p>Our intuitive platform makes it simple to exchange books with other members.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="text-center">
                            <div class="feature-icon text-primary">💬</div>
                            <h3>Community</h3>
                            <p>Connect with book enthusiasts, join discussions, and share recommendations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-light py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="mb-4">How It Works</h2>
                        <ol class="list-group list-group-flush list-group-numbered">
                            <li class="list-group-item bg-transparent">Sign up for a free account</li>
                            <li class="list-group-item bg-transparent">List the books you want to swap</li>
                            <li class="list-group-item bg-transparent">Browse books offered by other members</li>
                            <li class="list-group-item bg-transparent">Request a swap and arrange the exchange</li>
                            <li class="list-group-item bg-transparent">Enjoy your new book</li>
                        </ol>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Person reading a book" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container text-center">
                <h2 class="mb-4">Ready to Start Your Book Swapping Journey?</h2>
                <p class="lead mb-4">Join our community of book lovers and start exchanging stories today!</p>
                <a href="register.php" class="btn btn-primary btn-lg">Sign Up Now</a>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2023 Book Swap Buddy. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>