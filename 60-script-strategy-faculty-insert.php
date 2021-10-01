<?php

session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
  echo "Please Set code variable.";
  exit();
}
$strategy_fac = $_POST['strategy_fac'];
$strategy_code = $_POST['strategy_code'];
$strategy_name = $_POST['strategy_name'];
$phase_id = $_POST['phase_id'];

$sql = "
INSERT INTO `strategy_fac` (
  `code`,
  `name`,
  `phase_id`,
  `fac_id`
)
VALUES
  (
    :strategy_code,
    :strategy_name,
    :phase_id,
    :strategy_fac
  );

";
$params = array(
  "strategy_fac" => $strategy_fac,
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