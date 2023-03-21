<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5" style="max-width: 600px">
    <h1 class="h3">Login</h1>

    <?php if(isset($_GET['incorect'])) : ?>
        <div class="alert alert-warning">
            Incorrect Email or Password
        </div>
    <?php endif ?>

    <?php if(isset($_GET['suspend'])) : ?>
        <div class="alert alert-warning">
            Account is suspended.
        </div>
    <?php endif ?> 
        
    <form action="_actions/login.php" method="post">
        <div class="mb-2">
            <input type="email" name="email" placeholder="Email" required class="form-control">
        </div>
        <div class="mb-2">
            <input type="password" name="password" placeholder="Password" required class="form-control">
        </div>
        <button class="w-100 btn btn-primary mb-2">Login</button>
        <a href="register.php">Register</a>
    </form>
    </div>
</body>
</html>