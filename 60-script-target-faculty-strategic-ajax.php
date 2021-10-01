<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$strategy_id = $_POST['id'];
$fac_id = $_SESSION["sess-pjr-fac_id"];

$sql = "SELECT
t.id,
t.`code`,
t.`name` 
FROM
target_fac AS t 
WHERE
t.strategy_id = :strategy_id 
AND t.fac_id = :fac_id
ORDER BY
t.`code` ASC";

$params = array(
    'fac_id' => $fac_id,
    'strategy_id' => $strategy_id,
);
$result = $con->prepare($sql);
$res = $result->execute($params);
$row = $result->rowCount();

?>
<!doctype html>
<html lang="th">

<body>

    <select class="select-single js-states" title="Select Product Category" data-live-search="true" name="target_id" id="target_id" onchange="_getStrategic(this.value)" required>
        <option value="">เลือกเป้าหมาย</option>
        <?php
        while ($data = $result->fetch()) {
        ?>
            <option value="<?php echo $data["id"] ?>"> <?php echo $data["code"] . ". " . $data["name"] ?></option>
        <?php } ?>

    </select>

</body>

</html>