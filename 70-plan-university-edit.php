<?php
session_start();
include "./authen/check_authen.php";
include "./config/global.php";
include "./config/database.php";


if ($code == 0) {
    echo "Please Set code variable.";
    exit();
}

$sql = "SELECT * FROM tb_phase WHERE id = :phase_id";
$params = array("phase_id" => $_GET["phase_id"]);
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
										<div class="card-title">แก้ไขแผนยุทธศาสตร์ (มหาวิทยาลัย)</div>
									</div>
									<div class="card-body">
										
                                    <form class="needs-validation" action="70-script-plan-university-update.php" method="POST" enctype="multipart/form-data" novalidate>
										<!-- Row start -->
										<div class="row gutters">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												
												<!-- Field wrapper start -->
												<div class="field-wrapper">
                                                    <input type="hidden" class="form-control" name="phase_id" value="<?php echo $default["id"]?>" >
													<input class="form-control" type="text" name="phase_name" id="phase_name" value="<?php echo $default["name"]?>" required>
													<div class="field-placeholder">ชื่อแผนยุทธศาสตร์ <span class="text-danger">*</span></div>
													<div class="form-text">
                                                    ชื่อแผนยุทธศาสตร์
													</div>
												</div>
												<!-- Field wrapper end -->

											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												
												<!-- Field wrapper start -->
												<div class="field-wrapper">
													<input class="form-control" type="number" name="phase_start" id="phase_start" value="<?php echo $default["y_start"]?>"  required>
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
													<input class="form-control" type="number" name="phase_stop" id="phase_stop" value="<?php echo $default["y_end_"]?>"  required>
													<div class="field-placeholder">ถึงปี พ.ศ. <span class="text-danger">*</span></div>
													<div class="form-text">
                                                    ปี พ.ศ. ที่สินสุด
													</div>
												</div>
												<!-- Field wrapper end -->

											</div>
											
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<button class="btn btn-primary" type="submit" >บันทึกข้อมูล</button>
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
			(function () {

                

                let searchParams = new URLSearchParams(window.location.search);
                searchParams.has('sent')
                let param = searchParams.get('sent')
                if(param){
                    Swal.fire({
                        
                        icon: 'success',
                        title: 'บันทึกข้อมูลแผนยุทธศาสตร์สำเร็จแล้ว',
                        showConfirmButton: false,
                        timer: 2500
                        })
                }

			  'use strict'

			  // Fetch all the forms we want to apply custom Bootstrap validation styles to
			  var forms = document.querySelectorAll('.needs-validation')

			  // Loop over them and prevent submission
			  Array.prototype.slice.call(forms)
			    .forEach(function (form) {
			      form.addEventListener('submit', function (event) {
			        if (!form.checkValidity()) {
			          event.preventDefault()
			          event.stopPropagation()
			        }

			        form.classList.add('was-validated')
			      }, false)
			    })
			})()

            
		</script>



    


</body>

</html>