<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}

$sql = "SELECT * FROM strategy_fac WHERE id = :strategy_id";
$params = array("strategy_id" => $_GET["strategy_id"]);
$result = $con->prepare($sql);
$res = $result->execute($params);
$default = $result->fetch();

?>
<!doctype html>
<html lang="th">

<head>
    <?php include "./include/head.php";?>
</head>

<body>

    <!-- Loading wrapper start -->
    <?php include "./include/loading.php";?>
    <!-- Loading wrapper end -->

    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- Sidebar wrapper start -->
        <?php include "./include/sidebar.php";?>
        <!-- Sidebar wrapper end -->

        <!-- *************
				************ Main container start *************
			************* -->
        <div class="main-container">

            <!-- Page header starts -->
            <?php include "./include/header.php";?>
            <!-- Page header ends -->

            <!-- Content wrapper scroll start -->
            <div class="content-wrapper-scroll">

                <!-- Content wrapper start -->
                <div class="content-wrapper">



                    <!-- Row start -->
                    <div class="row gutters" id="phase">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <!-- Card start -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">บันทึกยุทธศาสตร์ (คณะ)</div>
                                </div>
                                <div class="card-body">

                                    <form class="needs-validation" action="60-script-strategy-faculty-update.php"
                                        method="POST" enctype="multipart/form-data" novalidate>
                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">

                                                <input class="form-control" type="hidden" name="strategy_id"
                                                    id="strategy_id" value="<?php echo $default['id']; ?>">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="number" name="strategy_code"
                                                        id="strategy_code" value="<?php echo $default['code']; ?>"
                                                        required>
                                                    <div class="field-placeholder">ลำดับ <span
                                                            class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        ลำดับในการแสดงผล
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="text" name="strategy_name"
                                                        id="strategy_name" value="<?php echo $default['name']; ?>"
                                                        required>
                                                    <div class="field-placeholder">ชื่อแผนยุทธศาสตร์ <span
                                                            class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        ชื่อแผนยุทธศาสตร์
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <select class="select-single js-states"
                                                        title="Select Product Category" data-live-search="true"
                                                        name="phase_id" id="phase_id" required>
                                                        <option>เลือกแผนปฏิบัติราชการ</option>
                                                        <?php

$sql = "SELECT
                                                        tb_phase.id,
                                                        tb_phase.`name`,
                                                        tb_phase.y_start,
                                                        tb_phase.y_end_
                                                    FROM
                                                        tb_phase
                                                    ORDER BY
                                                        tb_phase.id DESC";

$params = array();
$result = $con->prepare($sql);
$res = $result->execute($params);
$row = $result->rowCount();
while ($data = $result->fetch()) {
    ?>
                                                        <option value="<?php echo $data["id"] ?>" <?php
if ($data["id"] == $default['phase_id']) {
        echo 'selected="selected"';
    }
    ?>>
                                                            <?php echo $data["name"] ?></option>
                                                        <?php }?>
                                                    </select>
                                                    <div class="field-placeholder">แผนปฏิบัติราชการ</div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>


                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                                                <button class="btn btn-danger" type="button"
                                                    onclick="_hideAdd()">ยกเลิก</button>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </form>

                                </div>
                            </div>
                            <!-- Card end -->

                        </div>
                    </div>
                    <!-- Row end -->







                </div>
                <!-- Content wrapper end -->

                <!-- App footer start -->
                <?php include "./include/footer.php";?>
                <!-- App footer end -->

            </div>
            <!-- Content wrapper scroll end -->

        </div>
        <!-- *************
				************ Main container end *************
			************* -->

    </div>
    <!-- Page wrapper end -->
    <?php include "./include/script.php";?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {


        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()

    function _hideAdd() {
        window.location = '60-strategy-faculty.php';
    }
    </script>






</body>

</html>