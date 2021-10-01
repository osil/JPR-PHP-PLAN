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
                                    <div class="card-title">บันทึกเป้าหมาย (คณะ)</div>
                                </div>
                                <div class="card-body">

                                    <form class="needs-validation" action="60-script-target-faculty-insert.php" method="POST" enctype="multipart/form-data" novalidate>
                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">

                                                <input class="form-control" type="hidden" name="target_fac" id="target_fac" value="<?php echo $fac_id; ?>">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="text" name="target_code" id="target_code" required>
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
                                                    <input class="form-control" type="text" name="target_name" id="target_name" required>
                                                    <div class="field-placeholder">ชื่อเป้าหมาย <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        ชื่อเป้าหมาย
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
                                                        <select class="select-single js-states" title="Select Product Category" data-live-search="true" name="strategy_id" id="strategy_id" required>
                                                            <option value="">เลือกแผนยุทธศาสตร์</option>

                                                        </select>
                                                    </div>

                                                    <div class="field-placeholder">แผนยุทธศาสตร์</div>
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
                                    <div class="card-title">ตารางบันทึกเป้าหมาย (คณะ) </div>
                                    <div class="graph-day-selection" role="group">
                                        <button type="button" class="btn btn-secondary" onclick="_showAdd()"><i class="icon-control_point"></i> เพิ่มแผนเป้าหมาย</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table products-table" id="basicExample">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ลำดับ</th>
                                                    <th>ชื่อเป้าหมาย</th>
                                                    <th>ชื่อแผนยุทธศาสตร์</th>
                                                    <th>แผนปฏิบัติราชการ</th>
                                                    <th>ตัวเลือก</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $sql = "SELECT
                                                            t.id,
                                                            t.phase_id,
                                                            t.strategy_id,
                                                            t.`code`,
                                                            t.`name` AS target_name,
                                                            t.fac_id,
                                                            s.`name` AS strategy_name,
                                                            p.`name` AS phase_name
                                                            FROM
                                                            target_fac AS t
                                                            INNER JOIN strategy_fac AS s ON s.id = t.strategy_id
                                                            INNER JOIN tb_phase AS p ON p.id = t.phase_id
                                                            WHERE
                                                            t.fac_id = :fac_id
                                                            ORDER BY
                                                            t.phase_id ASC,
                                                            t.strategy_id ASC,
                                                            t.`code` ASC";

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
                                                        <td><?php echo $data["code"] ?></td>
                                                        <td><?php echo $data["target_name"] ?></td>
                                                        <td><?php echo $data["strategy_name"] ?></td>
                                                        <td><?php echo $data["phase_name"] ?></td>
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
            $("#phase_name").focus();
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

        function _editPlan(id) {
            window.location = '60-target-faculty-edit.php?target_id=' + id;
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
                        url: "60-script-target-faculty-delete.php",
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
            window.location = '60-target-faculty.php';
        }
    </script>






</body>

</html>