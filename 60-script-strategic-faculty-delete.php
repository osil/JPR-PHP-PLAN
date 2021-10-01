<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$strategic_id = $_POST["id"];

$sql = "
DELETE FROM `strategic_fac` WHERE `id` = :strategic_id
";
$params = array(
    "strategic_id" => $strategic_id,
);
$result = $con->prepare($sql);
$res = $result->execute($params);

echo $res;
