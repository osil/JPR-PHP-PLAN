<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";


if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$strategy_id = $_POST["id"];

$sql = "
DELETE FROM `strategy` WHERE `id` = :strategy_id
";
$params = array(
				"strategy_id" => $strategy_id
				);
$result = $con->prepare($sql);
$res = $result->execute($params);

echo $res;