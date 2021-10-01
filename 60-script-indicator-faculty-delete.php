<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$indicator_id = $_POST["id"];

$sql = "
DELETE FROM `indicator_fac` WHERE `id` = :indicator_id
";
$params = array(
    "indicator_id" => $indicator_id,
);
$result = $con->prepare($sql);
$res = $result->execute($params);

echo $res;
