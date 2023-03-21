<?php
    // session_start();
    // if(!isset($_SESSION['user'])) {
    //     header("location: index.php");
    //     exit();
    // }
    include("vendor/autoload.php");
    use Helpers\Auth;
    $user = Auth::check();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mb-3 mt-3"><?= $user->name ?>'s Profile</h1>
        <?php if (isset ($_GET['error'])): ?>
            <div class="alert alert-warning">
                Cannot upload file
            </div>
        <?php endif ?>

        <?php if ($user->photo): ?>
            <img src="_actions/photos/<?= $user->photo ?>" alt="Profile Photo" class="img-thumbnails mb-3" width="200">
        <?php endif ?>

        <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" name="photo" class="form-control">
                <button class="btn btn-secondary">Upload</button>
            </div>
        </form>
        <ul class="list-group mb-4">
        <li class="list-group-item">
                 <b>Name:</b> <?= $user->name ?>
        </li>
        <li class="list-group-item">
                 <b>Email:</b> <?= $user->email ?>
        </li>
        <li class="list-group-item">
                 <b>Phone:</b> <?= $user->phone ?>
             </li>
             <li class="list-group-item">
                 <b>Address:</b> <?= $user->address ?>
             </li>
        </ul>

        <a href="admin.php" class="btn btn-primary">Admin</a>
        <a href="_actions/logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>