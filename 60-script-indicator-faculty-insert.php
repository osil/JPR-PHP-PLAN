<?php

session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$indicator_fac = $_POST['indicator_fac'];
$indicator_code = $_POST['indicator_code'];
$indicator_name = $_POST['indicator_name'];
$strategic_id = $_POST['strategic_id'];
$target_id = $_POST['target_id'];
$strategy_id = $_POST['strategy_id'];
$phase_id = $_POST['phase_id'];
$itype = $_POST['itype'];
$unit = $_POST['unit'];
$target1 = $_POST['target1'];
$target2 = $_POST['target2'];
$target3 = $_POST['target3'];
$target4 = $_POST['target4'];
$target5 = $_POST['target5'];

$sql = "
INSERT INTO `indicator_fac` (
  `code`,
  `name`,
  `strategic_id`,
  `target_id`,
  `strategy_id`,
  `phase_id`,
  `fac_id`,
  `itype`,
  `unit`,
  `target1`,
  `target2`,
  `target3`,
  `target4`,
  `target5`
)
VALUES
  (
    :indicator_code,
    :indicator_name,
    :strategic_id,
    :target_id,
    :strategy_id,
    :phase_id,
    :indicator_fac,
    :itype,
    :unit,
    :target1,
    :target2,
    :target3,
    :target4,
    :target5
  );

";
$params = array(
    "indicator_fac" => $indicator_fac,
    "indicator_code" => $indicator_code,
    "indicator_name" => $indicator_name,
    "strategic_id" => $strategic_id,
    "target_id" => $target_id,
    "strategy_id" => $strategy_id,
    "phase_id" => $phase_id,
    "itype" => $itype,
    "unit" => $unit,
    "target1" => $target1,
    "target2" => $target2,
    "target3" => $target3,
    "target4" => $target4,
    "target5" => $target5
);
$result = $con->prepare($sql);
$res = $result->execute($params);

?>

<meta charset="utf-8" />
<script>
    window.location = '60-indicator-faculty.php?sent=sucsecc';
</script>