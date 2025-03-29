<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .register-title {
            color:#0d6efd;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }
        .form-control {
            border: none;
            border-bottom: 2px solid#0d6efd;
            border-radius: 0;
            padding-left: 0;
        }
        .form-control:focus {
            box-shadow: none;
            border-color:#0d6efd;
        }
        .btn-register {
            background-color:#0d6efd;
            border: none;
            border-radius: 25px;
            padding: 0.5rem 2rem;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            background-color: blue;
            transform: translateY(-2px);
        }
        .form-text {
            color: #6c757d;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
<a href='index.php' style="position: absolute; top: 10px; left: 10px;" class='btn btn-light'>Back</a>    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="register-container">
                    <h2 class="text-center register-title">Register for Book Swap Buddy</h2>
                    <div>
                        <div class="mb-4">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control shadow-sm" id="fullname" aria-describedby="fullNameHelp" required>
                            <div id="fullNameHelp" class="form-text">Please enter your full name.</div>
                        </div>
                        <div class="mb-4">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control shadow-sm" id="username" aria-describedby="usernameHelp" required>
                            <div id="usernameHelp" class="form-text">Choose a unique username.</div>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-sm" id="password" required>
                        </div>
                        <div class="d-grid">
                            <button id="submit" class="btn btn-register btn-success shadow">Register</button>
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
    $(document).ready(()=>{
        $("#submit").click(() => {
            $.ajax({
                url : "backend/register.php",
                method : "post",
                data : {
                    fullname : $("#fullname").val(),
                    username : $("#username").val(),
                    password : $("#password").val()
                },
                success : (response) => {
                    if(response == "success")
                    {                        
                        Swal.fire({
                            icon: 'success',
                            title: "account created",
                            text: "success",
                        });
                        $("#fullname").empty()
                        $("#username").empty()
                        $("#password").empty()
                    }
                    else
                    {
                        Swal.fire({
                            icon: 'error',
                            title: response,
                            text: "invalid",
                        }); 
                    }
                }
            })
        })
    })
</script>

</body>
</html>