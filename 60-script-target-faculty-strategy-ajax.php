<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$phase_id = $_POST['id'];
$fac_id = $_SESSION["sess-pjr-fac_id"];

$sql = "SELECT
s.id,
s.code,
s.`name`
FROM
strategy_fac AS s
WHERE
s.fac_id = :fac_id AND
s.phase_id = :phase_id";

$params = array(
    'fac_id' => $fac_id,
    'phase_id' => $phase_id,
);
$result = $con->prepare($sql);
$res = $result->execute($params);
$row = $result->rowCount();

?>
<!doctype html>
<html lang="th">

<body>

    <select class="select-single js-states" title="Select Product Category" data-live-search="true" name="strategy_id" id="strategy_id" onchange="_getTarget(this.value)" required>
        <option value="">เลือกแผนยุทธศาสตร์</option>
        <?php
        while ($data = $result->fetch()) {
        ?>
            <option value="<?php echo $data["id"] ?>"> <?php echo $data["code"] . ". " . $data["name"] ?></option>
        <?php } ?>

    </select>

</body>

</html>