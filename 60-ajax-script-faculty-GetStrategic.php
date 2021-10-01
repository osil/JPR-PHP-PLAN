<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$target_id = $_POST['id'];
$fac_id = $_SESSION["sess-pjr-fac_id"];

$sql = "SELECT
t.id,
t.`code`,
t.`name` 
FROM
strategic_fac AS t 
WHERE
t.target_id = :target_id 
AND t.fac_id = :fac_id
ORDER BY
t.`code` ASC";

$params = array(
    'fac_id' => $fac_id,
    'target_id' => $target_id,
);
$result = $con->prepare($sql);
$res = $result->execute($params);
$row = $result->rowCount();

?>
<!doctype html>
<html lang="th">

<body>

    <select class="select-single js-states" title="Select Product Category" data-live-search="true" name="strategic_id" id="strategic_id" required>
        <option value="">เลือกกลยุทธ์</option>
        <?php
        while ($data = $result->fetch()) {
        ?>
            <option value="<?php echo $data["id"] ?>"> <?php echo $data["code"] . ". " . $data["name"] ?></option>
        <?php } ?>

    </select>

</body>

</html>