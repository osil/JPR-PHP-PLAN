<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$target_id = $_POST["id"];

$sql = "
DELETE FROM `target_fac` WHERE `id` = :target_id
";
$params = array(
    "target_id" => $target_id,
);
$result = $con->prepare($sql);
$res = $result->execute($params);

echo $res;