<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";


if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}

$strategy_code = $_POST['strategy_code'];
$strategy_name = $_POST['strategy_name'];
$phase_id = $_POST['phase_id'];

$sql = "
INSERT INTO `strategy` (
  `code`,
  `name`,
  `phase_id`
)
VALUES
  (
    :strategy_code,
    :strategy_name,
    :phase_id
  );


";
$params = array(
				"strategy_code" => $strategy_code,
				"strategy_name" => $strategy_name,
				"phase_id" => $phase_id
				);
$result = $con->prepare($sql);
$res = $result->execute($params);


?>

<meta charset="utf-8" />
<script>
      
	window.location = '70-strategy-university.php?sent=sucsecc';
</script>