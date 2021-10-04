<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";

if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}
$staffid = $_GET["staffid"];
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
INNER JOIN departments AS d ON d.DEPARTMENTID = u.dept_id
WHERE u.staffid = :staffid";
$params = array("staffid" => $staffid);
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
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <!-- Card start -->
                            <div class="card">
                                <div class="card-header-lg">
                                    <h4>รายละเอียด</h4>
                                </div>
                                <div class="card-body">

                                    <div class="row gutters">
                                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                            <div class="row gutters">

                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="text" class="form-control" placeholder="" value="<?php echo $default['staffname'] ?>" disabled>
                                                        <div class="field-placeholder">ชื่อ - สกุล</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="text" class="form-control" placeholder="" value="<?php echo $default['FACULTYNAME'] ?>" disabled>
                                                        <div class="field-placeholder">คณะ</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="text" class="form-control" placeholder="" value="<?php echo $default['DEPARTMENTNAME'] ?>" disabled>
                                                        <div class="field-placeholder">หน่วยงาน</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="text" class="form-control" placeholder="" value="<?php echo $default['SECTIONNAME'] ?>" disabled>
                                                        <div class="field-placeholder">สาขา/กอง</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="account-settings-block">

                                                <div class="settings-block">
                                                    <div class="settings-block-title">สิทธิ์การใช้งาน</div>
                                                    <div class="settings-block-body">
                                                        <div class="list-group">
                                                            <?php
                                                            $sql = "SELECT
                                                            a.id,
                                                            a.NAME,
                                                            IFNULL( b.role_id, '' ) AS role_id,
                                                            IFNULL( b.staff_id, '' ) AS staffid 
                                                        FROM
                                                            sysrole a
                                                            LEFT JOIN ( SELECT * FROM sysuser_role WHERE staff_id = :staff_id ) b ON a.`id` = b.role_id";

                                                            $params = array(
                                                                'staff_id' => $_GET['staffid']
                                                            );
                                                            $result = $con->prepare($sql);
                                                            $res = $result->execute($params);
                                                            $row = $result->rowCount();
                                                            while ($data = $result->fetch()) {
                                                            ?>
                                                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                                                    <div><?php echo $data['id'] . " " . $data['NAME']; ?></div>
                                                                    <div class="form-switch">
                                                                        <input class="form-check-input" type="checkbox" onclick="_addRole(this.value)" id="<?php echo $data['id']; ?>" name="<?php echo $data['id']; ?>" value="<?php echo $data['id']; ?>" <?php if ($data['role_id'] != "") {
                                                                                                                                                                                                                                                                echo    "checked";
                                                                                                                                                                                                                                                            } ?>>
                                                                        <label class="form-check-label" for="<?php echo $data['id']; ?>"></label>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

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


        function _addRole(role) {
            const staffid = "<?php echo $staffid ?>"
            $.ajax({
                type: "POST",
                url: "80-script-add-role-ajax.php",
                data: {
                    staffid,
                    role
                }

            })
        }
    </script>






</body>

</html>