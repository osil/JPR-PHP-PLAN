<?php
session_start();

// {
//     "status": "ok",
//     "message": "Logged In",
//     "accessToken": "naja",
//     "user": {
//       "staffid": "171",
//       "staffname": "นายทรงศักดิ์ สองสนิท",
//       "departmentname": "คณะครุศาสตร์ (ค.บ.) สาขาวิชาคอมพิวเตอร์ศึกษา",
//       "fac_id": "02",
//       "dept_id": "76",
//       "dept_code": "210205",
//       "positionname": "ผู้ช่วยศาสตราจารย์"
//     },
//     "user_role": {
//       "role_id": "20",
//       "role_name": "ผู้ตรวจโครงการ (หน่วยงาน)"
//     }
//   }

$url = "http://202.29.22.18/rmu_service/authen_project.php?username=" . $_POST["username"] . "&password=" . $_POST["password"] . "";
$json = file_get_contents($url);
$json_data = json_decode($json, true);

$status = $json_data["status"];
if ($status != 'ok') {
    echo "
            <meta charset='utf-8' />
            <script>
            alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');
            window.location = 'login.php';
            </script>
            ";
} else {
    $staffid = $json_data["user"]["staffid"];
    $staffname = $json_data["user"]["staffname"];
    $departmentname = $json_data["user"]["departmentname"];
    $fac_id = $json_data["user"]["fac_id"];
    $dept_id = $json_data["user"]["dept_id"];
    $dept_code = $json_data["user"]["dept_code"];

    $r_id = explode(",", $json_data["user_role"]["role_id"]);
    $r_name = explode(",", $json_data["user_role"]["role_name"]);

    $role_id = $r_id;
    $role_name = $r_name;

    $_SESSION["sess-pjr-login"] = 1;
    $_SESSION["sess-pjr-staffid"] = $staffid;
    $_SESSION["sess-pjr-staffname"] = $staffname;
    $_SESSION["sess-pjr-departmentname"] = $departmentname;
    $_SESSION["sess-pjr-fac_id"] = $fac_id;
    $_SESSION["sess-pjr-dept_id"] = $dept_id;
    $_SESSION["sess-pjr-dept_code"] = $dept_code;
    $_SESSION["sess-pjr-role_id"] = $role_id;
    $_SESSION["sess-pjr-role_name"] = $role_name;

    echo "
            <meta charset='utf-8' />
            <script>
            window.location = 'index.php';
            </script>
            ";
}