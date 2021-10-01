<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";


if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}

$phase_name = $_POST['phase_name'];
$phase_start = $_POST['phase_start'];
$phase_stop = $_POST['phase_stop'];
$cur_status = 1;

$sql = "
INSERT INTO `tb_phase` (
  `name`,
  `y_start`,
  `y_end_`,
  `cur_status`
)
VALUES
  (
    :phase_name,
    :phase_start,
    :phase_stop,
    :cur_status
  );


";
$params = array(
				"phase_name" => $phase_name,
				"phase_start" => $phase_start,
				"phase_stop" => $phase_stop,
				"cur_status" => $cur_status
				);
$result = $con->prepare($sql);
$res = $result->execute($params);


?>

<meta charset="utf-8" />
<script>
      
	window.location = '70-plan-university.php?sent=sucsecc';
</script>