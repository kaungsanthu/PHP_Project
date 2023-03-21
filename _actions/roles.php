<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;

$table = new UsersTable(new MySQL);
$id = $_GET['id'];
$role = $_GET['role'];
$result = $table->changeRole($id, $role);

if($result){
    HTTP::redirect("/admin.php");
} else{
    HTTP::redirect("/admin.php", "error=role");
}