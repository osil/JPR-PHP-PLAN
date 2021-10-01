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

                            <!-- Card start -->
                            <div class="card">
                                <div class="card-header-lg">
                                    <h4>Account Settings</h4>
                                </div>
                                <div class="card-body">

                                    <div class="row gutters">
                                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                            <div class="row gutters">

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="text" class="form-control" placeholder="Abigail">
                                                        <div class="field-placeholder">First Name</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="text" class="form-control" placeholder="Winter">
                                                        <div class="field-placeholder">Last Name</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="text" class="form-control" placeholder="abigail.winter786@wmail.com">
                                                        <div class="field-placeholder">Email</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="text" class="form-control" placeholder="123-456-7890">
                                                        <div class="field-placeholder">Phone</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="text" class="form-control" placeholder="1980 Walnut Street">
                                                        <div class="field-placeholder">Address</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="text" class="form-control" placeholder="Mcallen">
                                                        <div class="field-placeholder">City</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="text" class="form-control" placeholder="New York">
                                                        <div class="field-placeholder">State</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="text" class="form-control" placeholder="11789">
                                                        <div class="field-placeholder">Zip Code</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <select class="select-single js-states" title="Select Product Category" data-live-search="true">
                                                            <option>United States</option>
                                                            <option>Australia</option>
                                                            <option>Canada</option>
                                                            <option>Gremany</option>
                                                            <option>India</option>
                                                            <option>Japan</option>
                                                            <option>England</option>
                                                            <option>Brazil</option>
                                                        </select>
                                                        <div class="field-placeholder">Country</div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input type="password" class="form-control" placeholder="Enter Password">
                                                        <div class="field-placeholder">Password</div>
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
                                                                        <input class="form-check-input" type="checkbox" id="<?php echo $data['id']; ?>" name="<?php echo $data['id']; ?>" <?php if ($data['role_id'] != "") {
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
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <button class="btn btn-primary mb-3">Save Settings</button>
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


        function _addRole(id) {
            window.location = '80-staff-add-role.php?staffid=' + id;
        }
    </script>






</body>

</html>