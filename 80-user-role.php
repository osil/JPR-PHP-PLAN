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
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">จัดการสิทธิ์ผู้ใช้งาน</div>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered m-0" id="basicExample">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ชื่อ-สกุล</th>
                                                    <th>หน่วยงาน</th>
                                                    <th>สถานะ</th>
                                                    <th>ตัวเลือก</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $sql = "SELECT
                                                u.staffid,
                                                u.staffname,
                                                d.FACULTYNAME,
                                                IFNULL( d.DEPARTMENTNAME, d.FACULTYNAME ) AS DEPARTMENTNAME,
                                                IFNULL( d.SECTIONNAME, d.DEPARTMENTNAME ) AS SECTIONNAME,
                                                u.fac_id,
                                                u.dept_id,
                                                u.dept_code,
                                                u.`status` 
                                            FROM
                                                sysuser AS u
                                                INNER JOIN departments AS d ON d.DEPARTMENTID = u.dept_id";

                                                $params = array();
                                                $result = $con->prepare($sql);
                                                $res = $result->execute($params);
                                                $row = $result->rowCount();
                                                while ($data = $result->fetch()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $data['staffname']; ?></td>
                                                        <td>
                                                            <strong>คณะ : </strong> <?php echo $data["FACULTYNAME"] ?> <br />
                                                            <strong>หน่วยงาน : </strong> <?php echo $data["DEPARTMENTNAME"] ?> <br />
                                                            <strong>กลุ่มงาน/สาขา : </strong> <?php echo $data["SECTIONNAME"] ?> <br />
                                                        </td>
                                                        <td>
                                                            <?php if ($data['status'] == 1) {
                                                                echo '<span class="badge rounded-pill bg-success">ปกติ</span>';
                                                            } else {
                                                                echo '<span class="badge rounded-pill bg-warning">รออนุมัติ</span>';
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="_addRole(<?php echo $data['staffid'] ?>)"><span class="icon-settings1"></span> กำหนดสิทธิ์</button>



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


        function _addRole(id) {
            window.location = '80-staff-add-role.php?staffid=' + id;
        }
    </script>






</body>

</html>