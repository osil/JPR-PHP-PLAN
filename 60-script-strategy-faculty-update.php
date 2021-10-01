<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$phase_id = $_POST["phase_id"];
$strategy_name = $_POST["strategy_name"];
$strategy_code = $_POST["strategy_code"];
$strategy_id = $_POST["strategy_id"];

$sql = "
UPDATE
  `strategy_fac`
SET
  `code` = :strategy_code,
  `name` = :strategy_name,
  `phase_id` = :phase_id
WHERE `id` = :strategy_id
";
$params = array(
    "strategy_id" => $strategy_id,
    "strategy_code" => $strategy_code,
    "strategy_name" => $strategy_name,
    "phase_id" => $phase_id,

);
$result = $con->prepare($sql);
$res = $result->execute($params);
?>

<meta charset="utf-8" />
<script>
window.location = '60-strategy-faculty.php?sent=sucsecc';
</script>