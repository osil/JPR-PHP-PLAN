<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$fac_id = $_SESSION["sess-pjr-fac_id"];

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

                                    <form class="needs-validation" action="60-script-strategic-faculty-insert.php" method="POST" enctype="multipart/form-data" novalidate>
                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">

                                                <input class="form-control" type="hidden" name="strategic_fac" id="strategic_fac" value="<?php echo $fac_id; ?>">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="text" name="strategic_code" id="strategic_code" required>
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
                                                    <input class="form-control" type="text" name="strategic_name" id="strategic_name" required>
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
                                                            <option value="<?php echo $data["id"] ?>">
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

                    <!-- Row start -->
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">ตารางบันทึกกลยุทธ์ (คณะ) </div>
                                    <div class="graph-day-selection" role="group">
                                        <button type="button" class="btn btn-secondary" onclick="_showAdd()"><i class="icon-control_point"></i> เพิ่มกลยุทธ์</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table products-table" id="basicExample">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ชื่อกลยุทธ์ / ชื่อเป้าหมาย / ชื่อแผนยุทธศาสตร์ / แผนปฏิบัติราชการ</th>

                                                    <th>ตัวเลือก</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $sql = "SELECT
                                                strategic_fac.id,
                                                strategic_fac.`code` AS strategic_code,
                                                strategic_fac.`name` AS strategic_name,
                                                target_fac.`code` AS target_code,
                                                target_fac.`name` AS target_name,
                                                strategy_fac.`code` AS strategy_code,
                                                strategy_fac.`name` AS strategy_name,
                                                tb_phase.`name` AS phase_name 
                                            FROM
                                                strategic_fac
                                                INNER JOIN target_fac ON strategic_fac.target_id = target_fac.id
                                                INNER JOIN strategy_fac ON target_fac.strategy_id = strategy_fac.id
                                                INNER JOIN tb_phase ON strategy_fac.phase_id = tb_phase.id 
                                            WHERE
                                                strategic_fac.fac_id = :fac_id
                                            ORDER BY
                                            strategic_fac.phase_id ASC,
                                            strategic_fac.strategy_id ASC,
                                            strategic_fac.target_id ASC,
                                            strategic_fac.`code` ASC";

                                                $params = array(
                                                    'fac_id' => $fac_id,
                                                );
                                                $result = $con->prepare($sql);
                                                $res = $result->execute($params);
                                                $row = $result->rowCount();
                                                while ($data = $result->fetch()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td>
                                                            <strong>กลยุทธ์ : </strong> <u><?php echo $data["strategic_code"] . ". " . $data["strategic_name"] ?></u> <br />
                                                            <strong>เป้าหมาย : </strong> <?php echo $data["target_code"] . ". " . $data["target_name"] ?> <br />
                                                            <strong>แผนยุทธศาสตร์ : </strong> <?php echo $data["strategy_code"] . ". " . $data["strategy_name"] ?> <br />
                                                            <strong>แผนปฏิบัติราชการ : </strong> <?php echo $data["phase_name"] ?> <br />
                                                        </td>

                                                        <td>
                                                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="_editPlan(<?php echo $data['id'] ?>)"><span class="icon-border_color"></span></button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="_delPlan(<?php echo $data['id'] ?>)"><span class="icon-delete"></span></button>


                                                        </td>
                                                    </tr>
                                                <?php $i++;
                                                } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
            $('#basicExample').DataTable();

            $("#phase").hide()

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

        function _showAdd() {
            $("#phase").show()
            $("#strategic_code").focus();
        }

        function _hideAdd() {
            $("#phase").hide()

        }

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

        function _editPlan(id) {
            window.location = '60-strategic-faculty-edit.php?strategic_id=' + id;
        }

        function _delPlan(id) {

            Swal.fire({
                title: 'ยืนยันการทำรายการ?',
                text: "คุณต้องการที่จะลบข้อมูลนี้หรือไม่!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "60-script-strategic-faculty-delete.php",
                        data: {
                            id: id
                        },
                        success: function(msg) {

                            if (msg == 1) {
                                Swal.fire(
                                    'ทำรายการสำเร็จ!',
                                    'ลบข้อมูลเรียบร้อยแล้ว',
                                    'success'
                                )
                                setInterval(webreload, 3000)
                            }
                        }
                    })


                }
            })

        }

        function webreload() {
            window.location = '60-strategic-faculty.php';
        }
    </script>






</body>

</html>