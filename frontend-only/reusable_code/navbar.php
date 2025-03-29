<style>
    .link{
        transition:1s
    }
    .link:hover{
        text-shadow: 2px 2px 15px #FFFFFF;
        
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-primary text-light t shadow">
    <div class="container-fluid">
        <a class="navbar-brand text-light " href="#">
            <img src="img/<?=$_SESSION['user']['profile_picture']?>" alt="Profile Picture" class="d-inline-block align-text-top text-light " style="width: 30px; height: 30px; border-radius: 50%; margin-right: 8px;">
            BOOK SWAP BUDDY
        </a>
        <button class="navbar-toggler text-light " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item link">
                    <a class="nav-link text-light  active" aria-current="page" href="home_page.php">Home</a>
                </li>
                <li class="nav-item link">
                    <a class="nav-link text-light " href="profile.php">profile</a>
                </li>
                <li class="nav-item link">
                    <a class="nav-link text-light " href="post_book.php"> post book </a>
                </li>
                <li class="nav-item link">
                    <a class="nav-link text-light " href="listing.php"> books listing </a>
                </li>
                <li class="nav-item link">
                    <a class="nav-link text-light " href="message.php"> messenger </a>
                </li>
                <li class="nav-item link">
                    <a class="nav-link text-light " href="history.php"> history </a>
                </li>
                <li class="nav-item link">
                    <a class="nav-link text-light " href="my_request.php"> your request </a>
                </li>
            </ul>
        </div>
        <form action='backend/logout.php' class="navbar-nav ml-auto">
            <button type='submit' class='btn btn-danger'> log out </button>
        </form >
    </div>
</nav>

