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
$phase_name = $_POST["phase_name"];
$phase_start = $_POST["phase_start"];
$phase_stop = $_POST["phase_stop"];

$sql = "
UPDATE
  `tb_phase`
SET
  `name` = :phase_name,
  `y_start` = :phase_start,
  `y_end_` = :phase_stop
WHERE `id` = :phase_id
";
$params = array(
				"phase_id" => $phase_id,
				"phase_name" => $phase_name,
				"phase_start" => $phase_start,
				"phase_stop" => $phase_stop
				);
$result = $con->prepare($sql);
$res = $result->execute($params);
?>

<meta charset="utf-8" />
<script>
      
	window.location = '70-plan-university.php?sent=sucsecc';
</script>