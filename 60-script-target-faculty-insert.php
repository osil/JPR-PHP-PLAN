<?php

session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$strategy_id = $_POST['strategy_id'];
$phase_id = $_POST['phase_id'];
$target_code = $_POST['target_code'];
$target_name = $_POST['target_name'];
$fac_id = $_POST["target_fac"];

$sql = "
INSERT INTO `target_fac` (
  `phase_id`,
  `strategy_id`,
  `code`,
  `name`,
  `fac_id`
)
VALUES
  (
    :phase_id,
    :strategy_id,
    :target_code,
    :target_name,
    :fac_id
  );

";
$params = array(
    "phase_id" => $phase_id,
    "strategy_id" => $strategy_id,
    "target_code" => $target_code,
    "target_name" => $target_name,
    "fac_id" => $fac_id,
);
$result = $con->prepare($sql);
$res = $result->execute($params);

?>

<meta charset="utf-8" />
<script>
window.location = '60-target-faculty.php?sent=sucsecc';
</script>