<?php
include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$auth = Auth::check();

$table = new UsersTable(new MySQL);
$users = $table->getAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="h3 mt-4 mb-3">User Admin</h1>
        <table class="table table-striped table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Change Role</th>
            <th>Role</th>
            <th>#</th>
        </tr>
    <?php foreach ($users as $user): ?>
        <tr>
        <td><?= $user->id ?></td>
        <td><?= $user->name ?></td>
        <td><?= $user->email ?></td>
        <td><?= $user->phone ?></td>
        <td>
            <div class="btn-group dropdown">
                <?php if ($auth->role_id == 3) : ?>
                    <a href="#" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                        Change Role
                    </a>
                    <div class="dropdown-menu dropdown-menu-dark">
                        <a href="_actions/roles.php?role=1&id=<?= $user->id ?>" class="dropdown-item">User</a>
                        <a href="_actions/roles.php?role=2&id=<?= $user->id ?>" class="dropdown-item">Editor</a>
                        <a href="_actions/roles.php?role=3&id=<?= $user->id ?>" class="dropdown-item">Admin</a>
                    </div>
            </div>
            <?php endif ?>
            <?php if($auth->role_id == 3) : ?>
                <a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-outine-danger btn-sm">Delete</a>
            <?php endif ?>
        </td>
        <td>
            <?php if ($user->role_id === 3): ?>
                <span class="badge bg-success">
            <?php elseif ($user->role_id === 2) : ?>
                <span  class="badge bg-primary">
            <?php else: ?>
                <span class="badge bg-secondary">
            <?php endif ?>
                <?= $user->role ?>
            
                </span>
        </td>
        <td>
            <div class="btn-group">
                <?php if ($user->suspended) : ?>
                    <a href="_actions/unsuspend.php?id=<?= $user->id ?>" class="btn btn-warning btn-sm">Unban</a>
                <?php else : ?>
                    <a href="_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-outline-warning btn-sm">Ban</a>
                <?php endif ?>
                <a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-outline-danger btn-sm">Delete</a>
            </div>
        </td>
    </tr>
    <?php endforeach ?>
    </table>
    </div>

    <script src="css/bootstrap.bundle.js"></script>
</body>
</html>