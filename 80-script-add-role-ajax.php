<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}



$staff_id = $_POST['staffid'];
$role_id = $_POST['role'];



$sql = "SELECT count(0) AS count_row FROM sysuser_role r WHERE r.role_id = :role_id AND r.staff_id = :staff_id";
$params = array(
    "role_id" => $role_id,
    "staff_id" => $staff_id
);
$result = $con->prepare($sql);
$res = $result->execute($params);
$number_of_rows = $result->fetchColumn();

if ($number_of_rows == 0) {
    $sql = "INSERT INTO `sysuser_role` (
        `role_id`,
        `staff_id`
        )
        VALUES
        (
            :role_id,
            :staff_id
        )";
    $params = array(
        "role_id" => $role_id,
        "staff_id" => $staff_id
    );
    $result = $con->prepare($sql);
    $res = $result->execute($params);
} else {
    $sql = "DELETE FROM `sysuser_role` r WHERE r.role_id = :role_id AND r.staff_id = :staff_id";
    $params = array(
        "role_id" => $role_id,
        "staff_id" => $staff_id
    );
    $result = $con->prepare($sql);
    $res = $result->execute($params);
}
