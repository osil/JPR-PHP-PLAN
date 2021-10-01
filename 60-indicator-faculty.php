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
                                    <div class="card-title">บันทึกตัวชี้วัด (คณะ)</div>
                                </div>
                                <div class="card-body">

                                    <form class="needs-validation" action="60-script-indicator-faculty-insert.php" method="POST" enctype="multipart/form-data" novalidate>
                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">

                                                <input class="form-control" type="hidden" name="indicator_fac" id="indicator_fac" value="<?php echo $fac_id; ?>">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="text" name="indicator_code" id="indicator_code" required>
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
                                                    <input class="form-control" type="text" name="indicator_name" id="indicator_name" required>
                                                    <div class="field-placeholder">ชื่อตัวชี้วัด <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        ชื่อตัวชี้วัด
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
                                                    <div class="field-placeholder">แผนปฏิบัติราชการ <span class="text-danger">*</span></div>
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

                                                    <div class="field-placeholder">แผนยุทธศาสตร์ <span class="text-danger">*</span></div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <div id="show_target">
                                                        <select class="select-single js-states" title="Select Product Category" data-live-search="true" name="target_id" id="target_id" onchange="_getStrategic(this.value)" required>
                                                            <option value="">เลือกเป้าหมาย</option>

                                                        </select>
                                                    </div>

                                                    <div class="field-placeholder">เป้าหมาย <span class="text-danger">*</span></div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <div id="show_strategic">
                                                        <select class="select-single js-states" title="Select Product Category" data-live-search="true" name="strategic_id" id="strategic_id" required>
                                                            <option value="">เลือกกลยุทธ์</option>

                                                        </select>
                                                    </div>

                                                    <div class="field-placeholder">กลยุทธ์ <span class="text-danger">*</span></div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <hr />

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <select class="select-single js-states" title="Select Product Category" data-live-search="true" name="itype" id="itype" required>
                                                        <option value="">เลือกประเภทตัวชี้วัด</option>

                                                        <?php

                                                        $sql = "SELECT * FROM ind_type";

                                                        $params = array();
                                                        $result = $con->prepare($sql);
                                                        $res = $result->execute($params);
                                                        $row = $result->rowCount();
                                                        while ($data = $result->fetch()) {
                                                        ?>
                                                            <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                                                        <?php } ?>

                                                    </select>


                                                    <div class="field-placeholder">ประเภทตัวชี้วัด <span class="text-danger">*</span></div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <select class="select-single js-states" title="Select Product Category" data-live-search="true" name="unit" id="unit" required>
                                                        <option value="">เลือกหน่วยนับตัวชี้วัด</option>
                                                        <?php

                                                        $sql = "SELECT * FROM ind_unit";

                                                        $params = array();
                                                        $result = $con->prepare($sql);
                                                        $res = $result->execute($params);
                                                        $row = $result->rowCount();
                                                        while ($data = $result->fetch()) {
                                                        ?>
                                                            <option value="<?php echo $data['val1'] ?>"><?php echo $data['val2'] ?></option>
                                                        <?php } ?>

                                                    </select>


                                                    <div class="field-placeholder">หน่วยนับตัวชี้วัด <span class="text-danger">*</span></div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="text" name="target1" id="target1" required>
                                                    <div class="field-placeholder">เป้าหมายปีที่ 1 <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        เป้าหมายปีที่ 1
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="text" name="target2" id="target2" required>
                                                    <div class="field-placeholder">เป้าหมายปีที่ 2 <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        เป้าหมายปีที่ 2
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="text" name="target3" id="target3" required>
                                                    <div class="field-placeholder">เป้าหมายปีที่ 3 <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        เป้าหมายปีที่ 3
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="text" name="target4" id="target4" required>
                                                    <div class="field-placeholder">เป้าหมายปีที่ 4 <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        เป้าหมายปีที่ 4
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="text" name="target5" id="target5" required>
                                                    <div class="field-placeholder">เป้าหมายปีที่ 5 <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        เป้าหมายปีที่ 5
                                                    </div>
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
                                    <div class="card-title">ตารางบันทึกตัวชี้วัด (คณะ) </div>
                                    <div class="graph-day-selection" role="group">
                                        <button type="button" class="btn btn-secondary" onclick="_showAdd()"><i class="icon-control_point"></i> เพิ่มตัวชี้วัด</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table products-table" id="basicExample">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ตัวชี้วัด</th>
                                                    <th>กลยุทธ์ / เป้าหมาย / แผนยุทธศาสตร์ / แผนปฏิบัติราชการ</th>
                                                    <th>ประเภทตัวชี้วัด / ค่าเป้าหมาย</th>
                                                    <th>ตัวเลือก</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $sql = "SELECT
                                                i.id,
                                                i.`code` AS indicator_code,
                                                i.`name` AS indicator_name,
                                                i.target1,
                                                i.target2,
                                                i.target3,
                                                i.target4,
                                                i.target5,
                                                strategic_fac.`code` AS strategic_code,
                                                strategic_fac.`name` AS strategic_name,
                                                target_fac.`code` AS target_code,
                                                target_fac.`name` AS target_name,
                                                strategy_fac.`code` AS strategy_code,
                                                strategy_fac.`name` AS strategy_name,
                                                tb_phase.`name` AS phase_name,
                                                ind_type.`name` AS itype,
                                                ind_unit.val2 AS unit 
                                            FROM
                                                indicator_fac AS i
                                                INNER JOIN strategic_fac ON i.strategic_id = strategic_fac.id
                                                INNER JOIN target_fac ON i.target_id = target_fac.id
                                                INNER JOIN strategy_fac ON i.strategy_id = strategy_fac.id
                                                INNER JOIN tb_phase ON i.phase_id = tb_phase.id
                                                INNER JOIN ind_type ON i.itype = ind_type.id
                                                INNER JOIN ind_unit ON i.unit = ind_unit.val1 
                                            WHERE
                                                i.fac_id = :fac_id 
                                            ORDER BY
                                                i.phase_id ASC,
                                                i.strategy_id ASC,
                                                i.target_id ASC,
                                                i.strategic_id ASC,
                                                i.`code` ASC";

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
                                                        <td><?php echo $data['indicator_code'] . ". " . $data['indicator_name']; ?></td>
                                                        <td>
                                                            <strong>กลยุทธ์ : </strong> <?php echo $data["strategic_code"] . ". " . $data["strategic_name"] ?> <br />
                                                            <strong>เป้าหมาย : </strong> <?php echo $data["target_code"] . ". " . $data["target_name"] ?> <br />
                                                            <strong>แผนยุทธศาสตร์ : </strong> <?php echo $data["strategy_code"] . ". " . $data["strategy_name"] ?> <br />
                                                            <strong>แผนปฏิบัติราชการ : </strong> <?php echo $data["phase_name"] ?> <br />
                                                        </td>
                                                        <td>
                                                            <strong><u><?php echo $data["itype"]; ?></u> </strong> <br />
                                                            <strong>เป้าหมายปีที่ 1 : </strong> <?php echo $data["target1"] . " " . $data["unit"]; ?> <br />
                                                            <strong>เป้าหมายปีที่ 2 : </strong> <?php echo $data["target2"] . " " . $data["unit"]; ?><br />
                                                            <strong>เป้าหมายปีที่ 3 : </strong> <?php echo $data["target3"] . " " . $data["unit"]; ?><br />
                                                            <strong>เป้าหมายปีที่ 4 : </strong> <?php echo $data["target4"] . " " . $data["unit"]; ?><br />
                                                            <strong>เป้าหมายปีที่ 5 : </strong> <?php echo $data["target5"] . " " . $data["unit"]; ?>
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

        function _getStrategic(id) {
            $.ajax({
                type: "POST",
                url: "60-ajax-script-faculty-GetStrategic.php",
                data: {
                    id: id
                },
                success: function(msg) {
                    $("#show_strategic").html(msg)
                }

            })
        }

        function _editPlan(id) {
            window.location = '60-indicator-faculty-edit.php?indicator_id=' + id;
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
                        url: "60-script-indicator-faculty-delete.php",
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
            window.location = '60-indicator-faculty.php';
        }
    </script>






</body>

</html>