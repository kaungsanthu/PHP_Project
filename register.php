<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Register</title>
</head>
<body>
    <div class="container text-center mt-5" style="max-width: 600px">
    <h1 class="h3">Register</h1>
    <form action="_actions/create.php" method="post">
        <div class="mb-2">
            <input type="text" name="name" placeholder="Name" required class="form-control">
        </div>
        <div class="mb-2">
            <input type="email" name="email" placeholder="Email" required class="form-control">
        </div>
        <div class="mb-2">
            <input type="text" name="phone" placeholder="Phone" required class="form-control">
        </div>
        <div class="mb-2">
            <textarea name="address" class="form-control" required placeholder="Address"></textarea>
        </div>
        <div class="mb-2">
            <input type="password" name="password" placeholder="Password" required class="form-control">
        </div>
        <button class="w-100 btn btn-primary mb-2">Register</button>
        <a href="index.php">Login</a>
    </form>
    </div>
    
</body>
</html>