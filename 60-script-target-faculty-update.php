<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}

$target_id = $_POST["target_id"];
$target_code = $_POST["target_code"];
$target_name = $_POST["target_name"];
$phase_id = $_POST["phase_id"];
$strategy_id = $_POST["strategy_id"];

$sql = "
UPDATE
  `target_fac`
SET
  `code` = :target_code,
  `name` = :target_name,
  `phase_id` = :phase_id,
  `strategy_id` = :strategy_id
WHERE `id` = :target_id
";
$params = array(
    "target_id" => $target_id,
    "target_code" => $target_code,
    "target_name" => $target_name,
    "phase_id" => $phase_id,
    "strategy_id" => $strategy_id,

);
$result = $con->prepare($sql);
$res = $result->execute($params);
?>


<meta charset="utf-8" />
<script>
window.location = '60-target-faculty.php?sent=sucsecc';
</script>