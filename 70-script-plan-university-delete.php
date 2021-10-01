<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";


if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$phase_id = $_POST["id"];

$sql = "
DELETE FROM `tb_phase` WHERE `id` = :phase_id
";
$params = array(
				"phase_id" => $phase_id
				);
$result = $con->prepare($sql);
$res = $result->execute($params);

echo $res;