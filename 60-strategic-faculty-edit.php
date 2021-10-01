<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}


$sql = "SELECT * FROM strategic_fac WHERE id = :strategic_id";
$params = array("strategic_id" => $_GET["strategic_id"]);
$result = $con->prepare($sql);
$res = $result->execute($params);
$default = $result->fetch();

?>
<!doctype html>
<html lang="th">

<head>
    <?php include "./include/head.php"; ?>
</head>

<body>

    <!-- Loading wrapper start -->
    <?php include "./include/loading.php"; ?>
    <!-- Loading wrapper end -->

    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- Sidebar wrapper start -->
        <?php include "./include/sidebar.php"; ?>
        <!-- Sidebar wrapper end -->

        <!-- *************
				************ Main container start *************
			************* -->
        <div class="main-container">

            <!-- Page header starts -->
            <?php include "./include/header.php"; ?>
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
                                    <div class="card-title">บันทึกกลยุทธ์ (คณะ)</div>
                                </div>
                                <div class="card-body">

                                    <form class="needs-validation" action="60-script-strategic-faculty-update.php" method="POST" enctype="multipart/form-data" novalidate>
                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">


                                                <input class="form-control" type="hidden" name="strategic_id" id="strategic_id" value="<?php echo $default['id']; ?>">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="text" name="strategic_code" id="strategic_code" value="<?php echo $default['code']; ?>" required>
                                                    <div class="field-placeholder">ลำดับ <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        ลำดับในการแสดงผล
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="text" name="strategic_name" id="strategic_name" value="<?php echo $default['name']; ?>" required>
                                                    <div class="field-placeholder">ชื่อกลยุทธ์ <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        ชื่อกลยุทธ์
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <select class="select-single js-states" title="Select Product Category" data-live-search="true" name="phase_id" id="phase_id" onchange="_getStrategy(this.value)" required>
                                                        <option value="">เลือกแผนปฏิบัติราชการ</option>
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
                                                            <option value="<?php echo $data["id"] ?>" <?php if ($data["id"] == $default['phase_id']) {
                                                                                                            echo "selected";
                                                                                                        } ?>>
                                                                <?php echo $data["name"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="field-placeholder">แผนปฏิบัติราชการ</div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <div id="show_strategy">
                                                        <select class="select-single js-states" title="Select Product Category" data-live-search="true" name="strategy_id" id="strategy_id" onchange="_getTarget(this.value)" required>
                                                            <option value="">เลือกแผนยุทธศาสตร์</option>

                                                            <?php
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
                                                                'fac_id' => $default['fac_id'],
                                                                'phase_id' => $default['phase_id'],
                                                            );


                                                            $result = $con->prepare($sql);
                                                            $res = $result->execute($params);
                                                            $row = $result->rowCount();
                                                            while ($data = $result->fetch()) {
                                                            ?>
                                                                <option value="<?php echo $data["id"] ?>" <?php if ($data["id"] == $default['strategy_id']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $data["code"] . ". " . $data["name"] ?></option>
                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                    <div class="field-placeholder">แผนยุทธศาสตร์</div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <div id="show_target">
                                                        <select class="select-single js-states" title="Select Product Category" data-live-search="true" name="target_id" id="target_id" required>
                                                            <option value="">เลือกเป้าหมาย</option>
                                                            <?php
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
                                                                'fac_id' => $default['fac_id'],
                                                                'strategy_id' => $default['strategy_id'],
                                                            );
                                                            $result = $con->prepare($sql);
                                                            $res = $result->execute($params);
                                                            $row = $result->rowCount();
                                                            while ($data = $result->fetch()) {
                                                            ?>
                                                                <option value="<?php echo $data["id"] ?>" <?php if ($data["id"] == $default['target_id']) {
                                                                                                                echo "selected";
                                                                                                            } ?>> <?php echo $data["code"] . ". " . $data["name"] ?></option>
                                                            <?php } ?>


                                                        </select>
                                                    </div>

                                                    <div class="field-placeholder">เป้าหมาย</div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>


                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                                                <button class="btn btn-danger" type="button" onclick="_hideAdd()">ยกเลิก</button>
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
                <?php include "./include/footer.php"; ?>
                <!-- App footer end -->

            </div>
            <!-- Content wrapper scroll end -->

        </div>
        <!-- *************
				************ Main container end *************
			************* -->

    </div>
    <!-- Page wrapper end -->
    <?php include "./include/script.php"; ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {



            let searchParams = new URLSearchParams(window.location.search);
            searchParams.has('sent')
            let param = searchParams.get('sent')
            if (param) {
                Swal.fire({

                    icon: 'success',
                    title: 'บันทึกข้อมูลสำเร็จแล้ว',
                    showConfirmButton: false,
                    timer: 2500
                })
            }



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





        function _getStrategy(id) {
            $.ajax({
                type: "POST",
                url: "60-script-target-faculty-strategy-ajax.php",
                data: {
                    id: id
                },
                success: function(msg) {
                    $("#show_strategy").html(msg)
                }

            })
        }

        function _getTarget(id) {
            $.ajax({
                type: "POST",
                url: "60-script-target-faculty-strategic-ajax.php",
                data: {
                    id: id
                },
                success: function(msg) {
                    $("#show_target").html(msg)
                }

            })
        }

        function _hideAdd() {
            window.location = '60-strategic-faculty.php';
        }
    </script>






</body>

</html>