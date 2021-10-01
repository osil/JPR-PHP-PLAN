<?php

session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$strategic_fac = $_POST['strategic_fac'];
$strategic_code = $_POST['strategic_code'];
$strategic_name = $_POST['strategic_name'];
$target_id = $_POST['target_id'];
$strategy_id = $_POST['strategy_id'];
$phase_id = $_POST['phase_id'];

$sql = "
INSERT INTO `strategic_fac` (
  `code`,
  `name`,
  `target_id`,
  `strategy_id`,
  `phase_id`,
  `fac_id`
)
VALUES
  (
    :strategic_code,
    :strategic_name,
    :target_id,
    :strategy_id,
    :phase_id,
    :strategic_fac
  );

";
$params = array(
    "strategic_fac" => $strategic_fac,
    "strategic_code" => $strategic_code,
    "strategic_name" => $strategic_name,
    "target_id" => $target_id,
    "strategy_id" => $strategy_id,
    "phase_id" => $phase_id
);
$result = $con->prepare($sql);
$res = $result->execute($params);

?>

<meta charset="utf-8" />
<script>
    window.location = '60-strategic-faculty.php?sent=sucsecc';
</script>