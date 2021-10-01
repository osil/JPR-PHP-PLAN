<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";


if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}


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
                                    <div class="card-title">เขียนโครงการใหม่</div>
                                </div>
                                <div class="card-body">

                                    <form class="needs-validation" action="70-script-plan-university-add.php" method="POST" enctype="multipart/form-data" novalidate>
                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="text" name="phase_name" id="phase_name" required>
                                                    <div class="field-placeholder">ชื่อโครงการ <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        ชื่อโครงการ
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="number" name="phase_start" id="phase_start" required>
                                                    <div class="field-placeholder">จากปี พ.ศ. <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        ปี พ.ศ. ที่เริ่ม
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="number" name="phase_stop" id="phase_stop" required>
                                                    <div class="field-placeholder">ถึงปี พ.ศ. <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        ปี พ.ศ. ที่สินสุด
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
                                    <div class="card-title">ตารางข้อมูลโครงการทั้งหมด</div>
                                    <div class="graph-day-selection" role="group">
                                        <button type="button" class="btn btn-secondary" onclick="_showAdd()"><i class="icon-control_point"></i> เพิ่มโครงการ</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table products-table">
                                            <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ชื่อโครงการ</th>
                                                    <th>ปีที่เริ่ม</th>
                                                    <th>ปีสิ้นสุด</th>
                                                    <th>ตัวเลือก</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
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
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $data["name"] ?></td>

                                                        <td><?php echo $data["y_start"] ?></td>
                                                        <td><?php echo $data["y_end_"] ?></td>
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

            $("#phase").hide()

            let searchParams = new URLSearchParams(window.location.search);
            searchParams.has('sent')
            let param = searchParams.get('sent')
            if (param) {
                Swal.fire({

                    icon: 'success',
                    title: 'บันทึกข้อมูลโครงการสำเร็จแล้ว',
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

        function _editPlan(id) {
            window.location = '70-plan-university-edit.php?phase_id=' + id;
        }

        function _delPlan(id) {

            Swal.fire({
                title: 'ยืนยันการทำรายการ?',
                text: "คุณต้องการที่จะลบข้อมูลโครงการนี้หรือไม่!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "70-script-plan-university-delete.php",
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
            window.location = '70-plan-university.php';
        }
    </script>






</body>

</html>