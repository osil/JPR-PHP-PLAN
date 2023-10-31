<?php
ob_start();
//error_reporting(0);
require_once('tcpdf_include.php');

$y = $_REQUEST["y"];

try {
    $conn_lite = new PDO("sqlite:./birdy/datadb_pre.db");
    $conn_lite->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Unable to connect Lite";
    echo $e->getMessage();
    exit;
}


try {
    $conn_my = new PDO("mysql:host=;dbname=", "", "");
    // set the PDO error mode to exception
    $conn_my->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


function zero($id)
{
    $result = "";
    if ((int)$id == 0) {
        $result = "-";
    } else {
        $result = $id;
    }
    return $result;
}





function empty_data()
{
    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }


    //========= delete all data in lite table
    $sql = "delete from department_order";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "delete from budget_unidb_dept";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "delete from budget_unidb_budgetgroup";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "delete from budget_unidb_product";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "delete from budget_unidb_project";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sql = "delete from budget_unidb_sysconfig";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $stmt = null;
    $sql = null;
    $conn = null;
    //echo "Empty data Sucess!<br /><br />Next step is import data from mysql==>><br />";
}


function add_sysconfig($id, $name, $val)
{
    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    $sql = "INSERT INTO budget_unidb_sysconfig(id,name,value) values(?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id, $name, $val]);
    $stmt = null;
    $sql = null;
    $conn = null;
    //echo "Add sysconfig Sucess!<br />";
}



function add_department_order($departmentid, $order_id)
{
    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    $sql = "INSERT INTO department_order(departmentid,order_id) values(?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$departmentid, $order_id]);
    $stmt = null;
    $sql = null;
    $conn = null;
    //echo "Add sysconfig Sucess!<br />";
}


function add_product($periodid, $strategyuid, $strategyuname, $planid, $planname, $productid, $productname, $acc1, $acc1_pre, $acc2, $acc2_pre, $acc3, $acc3_pre, $acc4, $acc4_pre, $acc5, $acc5_pre, $acc6, $acc6_pre, $acc7, $acc7_pre, $acc8, $acc8_pre, $acc9, $acc9_pre, $total, $total_pre, $strategyuname2, $planname2, $productname2)
{
    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    $sql = "INSERT INTO budget_unidb_product(periodid,strategyuid,strategyuname,planid,planname,productid,productname,acc1, acc1_pre, acc2, acc2_pre, acc3, acc3_pre, acc4, acc4_pre, acc5, acc5_pre, acc6, acc6_pre, acc7, acc7_pre, acc8, acc8_pre, acc9, acc9_pre, total, total_pre,strategyuname2,planname2,productname2) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$periodid, $strategyuid, $strategyuname, $planid, $planname, $productid, $productname, $acc1, $acc1_pre, $acc2, $acc2_pre, $acc3, $acc3_pre, $acc4, $acc4_pre, $acc5, $acc5_pre, $acc6, $acc6_pre, $acc7, $acc7_pre, $acc8, $acc8_pre, $acc9, $acc9_pre, $total, $total_pre, $strategyuname2, $planname2, $productname2]);
    $stmt = null;
    $sql = null;
    $conn = null;
    //echo "Add product Sucess!<br />";
}


function add_budgetgroup($periodid, $budgetgroupid, $budgetgroupname,  $acc1, $acc1_pre, $acc2, $acc2_pre, $acc3, $acc3_pre, $acc4, $acc4_pre, $acc5, $acc5_pre, $acc6, $acc6_pre, $acc7, $acc7_pre, $acc8, $acc8_pre, $acc9, $acc9_pre, $total, $total_pre)
{
    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    $sql = "INSERT INTO budget_unidb_budgetgroup(periodid,budgetgroup_id,budgetgroup_name_full,acc1, acc1_pre, acc2, acc2_pre, acc3, acc3_pre, acc4, acc4_pre, acc5, acc5_pre, acc6, acc6_pre, acc7, acc7_pre, acc8, acc8_pre, acc9, acc9_pre, total, total_pre) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$periodid, $budgetgroupid, $budgetgroupname, $acc1, $acc1_pre, $acc2, $acc2_pre, $acc3, $acc3_pre, $acc4, $acc4_pre, $acc5, $acc5_pre, $acc6, $acc6_pre, $acc7, $acc7_pre, $acc8, $acc8_pre, $acc9, $acc9_pre, $total, $total_pre]);
    $stmt = null;
    $sql = null;
    $conn = null;
    //echo "Add budgetgroup Sucess!<br />";
}


function add_dept($periodid, $strategyuid, $strategyuname, $budgetgroup_id, $budgetgroup_name, $budgetgroup_name_full, $planid, $planname, $productid, $productname, $facultyid, $facultyname, $departmentid, $departmentname, $acc1, $acc1_pre, $acc2, $acc2_pre, $acc3, $acc3_pre, $acc4, $acc4_pre, $acc5, $acc5_pre, $acc6, $acc6_pre, $acc7, $acc7_pre, $acc8, $acc8_pre, $acc9, $acc9_pre, $total, $total_pre, $planname2, $productname2, $departmentname2)
{
    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    $sql = "INSERT INTO budget_unidb_dept(periodid,strategyuid,strategyuname,planid,planname,productid,productname,facultyid,facultyname,departmentid,departmentname,acc1, acc1_pre, acc2, acc2_pre, acc3, acc3_pre, acc4, acc4_pre, acc5, acc5_pre, acc6, acc6_pre, acc7, acc7_pre, acc8, acc8_pre, acc9, acc9_pre, total, total_pre,budgetgroup_id,budgetgroup_name,budgetgroup_name_full,planname2,productname2,departmentname2) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$periodid, $strategyuid, $strategyuname, $planid, $planname, $productid, $productname, $facultyid, $facultyname, $departmentid, $departmentname, $acc1, $acc1_pre, $acc2, $acc2_pre, $acc3, $acc3_pre, $acc4, $acc4_pre, $acc5, $acc5_pre, $acc6, $acc6_pre, $acc7, $acc7_pre, $acc8, $acc8_pre, $acc9, $acc9_pre, $total, $total_pre, $budgetgroup_id, $budgetgroup_name, $budgetgroup_name_full, $planname2, $productname2, $departmentname2]);
    $stmt = null;
    $sql = null;
    $conn = null;
    //echo "Add dept Sucess!<br />";
}






function add_project($periodid, $facultyid, $facutlyname, $departmentid, $departmentname, $budgetgroup_id, $budgetgroup_name, $budgetgroup_name_full, $strategyuid, $strategyuname, $planid, $planname, $productid, $productname, $budgettype_id, $budgettype_name, $budgettype_sub_id, $budgettype_sub_name, $m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10, $m11, $m12, $projectid, $projectname)
{
    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    $sql = "INSERT INTO budget_unidb_project(periodid,facultyid,facutlyname,departmentid,departmentname,budgetgroup_id,budgetgroup_name,budgetgroup_name_full,strategyuid,strategyuname,planid,planname,productid,productname,budgettype_id,budgettype_name,budgettype_sub_id,budgettype_sub_name,m1,m2,m3,m4,m5,m6,m7,m8,m9,m10,m11,m12,projectid,projectname) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$periodid, $facultyid, $facutlyname, $departmentid, $departmentname, $budgetgroup_id, $budgetgroup_name, $budgetgroup_name_full, $strategyuid, $strategyuname, $planid, $planname, $productid, $productname, $budgettype_id, $budgettype_name, $budgettype_sub_id, $budgettype_sub_name, $m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10, $m11, $m12, $projectid, $projectname]);
    $stmt = null;
    $sql = null;
    $conn = null;
    //echo "Add project Sucess!!!!<br /><br />";
}




function budgetgroup_cover($id, $period, $border, $head1_size, $head2_size)
{

    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    $groupname = ""; // budgetgroup name
    $period_pre = 0; // previos budgetyear
    $period_cur = 0; // current buget year
    $bud_pre = 0; //previos budget
    $bud_cur = 0; // current budget
    $bud_dif = 0; //  budget diff from previos year
    $v5 = "";
    //---------------------- get data ------------------------
    $sql = "select budgetgroup_name_full,total_pre from budget_unidb_budgetgroup where periodid=? and budgetgroup_id=? and budgetgroup_id <> 4";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$period, $id]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $groupname = $row["budgetgroup_name_full"];
        $bud_cur = $row["total_pre"];
    }
    $id2 = 0;
    if ($id == 15) {
        $id2 = 5;
    } else if ($id == 17) {
        $id2 = 6;
    } else if ($id == 21) {
        $id2 = 11;
    } else if ($id == 23) {
        $id2 = 8;
    } else if ($id == 31) {
        $id2 = 7;
    } else if ($id == 32) {
        $id2 = 9;
    } else if ($id == 693) {
        $id2 = 10;
    }


    $sql = "select id,name,value from budget_unidb_sysconfig where id in (1,3,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id2]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($row["id"] == "1") {
            $period_cur = $row["value"];
        } else if ($row["id"] == "3") {
            $period_pre = $row["value"];
        } else {
            $bud_pre = $row["value"];
        }
    }
    $sql = null;
    $stmt = null;
    $row = null;
    $conn = null;

    $bud_dif = $bud_cur - $bud_pre;
    if ((int)$bud_cur >= (int)$bud_pre) {
        $v5 = "เพิ่มขึ้น จากปีงบประมาณ  " . $period_pre;
    } else {
        $v5 = "ลดลง จากปีงบประมาณ  " . $period_pre;
    }

    $headtext = "<center><div style=\"font-size:" . $head1_size . "px;width:630px;text-align:center;\"><strong>มหาวิทยาลัยราชภัฏมหาสารคาม<br />กระทรวงการอุดมศึกษา วิทยาศาสตร์ วิจัยและนวัติกรรม<br />(งบพลาง)</strong></div><center><br />";
    $result = $headtext . "<table border=\"" . $border . "\" class=\"\" style=\"font-size: " . $head2_size . "px;\" cellpadding=\"3\">
        <tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"350\" align=\"right\">1. งบประมาณรายจ่ายเงินรายได้ " . $groupname . "</td>
            <td width=\"150\" align=\"right\">ประจำปีงบประมาณ พ.ศ. " . $period_pre . "</td>
			<td width=\"70\" align=\"right\">" . zero(number_format($bud_pre, 0)) . "</td>
			<td width=\"60\" align=\"left\">บาท</td>
        </tr>
        <tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"350\" align=\"right\">2. งบประมาณรายจ่ายเงินรายได้ " . $groupname . "</td>
            <td width=\"150\" align=\"right\">ประจำปีงบประมาณ พ.ศ. " . $period_cur . "</td>
			<td width=\"70\" align=\"right\">" . zero(number_format($bud_cur, 0)) . "</td>
			<td width=\"60\" align=\"left\">บาท</td>
        </tr>
		<tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"500\" colspan =\"2\" align=\"right\">" . $v5 . "</td>
			<td width=\"70\" align=\"right\">" . zero(number_format($bud_dif, 0)) . "</td>
			<td width=\"60\" align=\"left\">บาท</td>
        </tr>
		</table><br /><br />";
    return $result;
}


function budgetgroup_table($id, $period, $border, $head1_size, $head2_size, $head_table_size)
{

    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }
    $s1 = 0;
    $s2 = 0;
    $s3 = 0;
    $s4 = 0;
    $s5 = 0;
    $s6 = 0;
    $s7 = 0;
    $s8 = 0;
    $s9 = 0;
    $s10 = 0;

    //---------------------- get data ------------------------
    $sql = "select budgetgroup_name_full from budget_unidb_budgetgroup where periodid=? and budgetgroup_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$period, $id]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $groupname = $row["budgetgroup_name_full"];
    }




    $headtext = "<center><div style=\"font-size:" . $head1_size . "px;width:980px;text-align:center;\"><strong>สรุปงบประมาณรายจ่ายเงินรายได้ " . $groupname . " ประจำปีงบประมาณ พ.ศ." . $_REQUEST["y"] . " จำแนกตาม แผนงาน ผลผลิต หน่วยงานและงบรายจ่าย</strong></div><center><br />";
    $result = $headtext . "<table border=\"1\" class=\"\" style=\"font-size: " . $head_table_size . "px;\" cellpadding=\"3\">
		<thead>

			<tr style=\"background-color: #D3D3D3;color:#000;\">
				<td width=\"30\" rowspan=\"2\" align=\"center\"><strong>ลำดับที่</strong></td>
				<td width=\"234\" rowspan=\"2\" align=\"center\"><strong>ยุทธศาสตร์การจัดสรรค์งบประมาณ แผนงาน/ผลผลิต/โครงการ</strong></td>
				<td width=\"74\" rowspan=\"1\" align=\"center\"><strong>งบบุคลากร</strong></td>
				<td width=\"290\" colspan=\"4\" align=\"center\"><strong>งบดำเนินงาน</strong></td>
				<td width=\"148\" colspan=\"2\" align=\"center\"><strong>งบลงทุน</strong></td>
				<td width=\"74\" rowspan=\"2\" align=\"center\"><strong>งบเงินอุดหนุน</strong></td>
				<td width=\"50\" rowspan=\"2\" align=\"center\"><strong>งบรายจ่าย<br/>อื่น</strong></td>
				<td width=\"70\" rowspan=\"2\" align=\"center\"><strong>รวมทั้งสิ้น</strong></td>
			</tr>

			<tr style=\"background-color: #D3D3D3;color:#000;\">
				<td width=\"74\" align=\"center\"><strong>ค่าจ้างชั่วคราว</strong></td>
				<td width=\"74\" align=\"center\"><strong>ค่าตอบแทน</strong></td>
				<td width=\"70\" align=\"center\"><strong>ค่าใช้สอย</strong></td>
				<td width=\"70\" align=\"center\"><strong>ค่าวัสดุ</strong></td>
				<td width=\"76\" align=\"center\"><strong>ค่าสาธารณูปโภค</strong></td>
				<td width=\"74\" align=\"center\"><strong>ค่าครุภัณฑ์</strong></td>
				<td width=\"74\" align=\"center\"><strong>ค่าที่ดินและ<br />สิ่งก่อสร้าง</strong></td>
			</tr>
		</thead>";


    //------------ generate top level data --------------------------
    $sql = "select 
	a.periodid
	,a.planid
	,a.planname2
	,sum(a.acc1_pre) as acc1
	,sum(a.acc2_pre) as acc2
	,sum(a.acc3_pre) as acc3
	,sum(a.acc4_pre) as acc4
	,sum(a.acc5_pre) as acc5
	,sum(a.acc6_pre) as acc6
	,sum(a.acc7_pre) as acc7
	,sum(a.acc8_pre) as acc8
	,sum(a.acc9_pre) as acc9
	,sum(a.total_pre) as total
	 from budget_unidb_dept a inner join department_order b on a.departmentid = b.departmentid
	 where a.periodid=? and a.budgetgroup_id=?
	group by 
a.periodid
	,a.planid
	,a.planname2
	order by a.planid,b.order_id ASC
	";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$period, $id]);
    $level0 = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $result . "<tr style=\"background-color: #a3a3a3;color:#000;\">
				<td width=\"30\" align=\"center\"><strong>" . $level0 . "</strong></td>
				<td width=\"234\" align=\"left\"><strong>" . $row["planname2"] . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc1"], 0)) . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc2"], 0)) . "</strong></td>
				<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["acc3"], 0)) . "</strong></td>
				<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["acc4"], 0)) . "</strong></td>
				<td width=\"76\" align=\"right\"><strong>" . zero(number_format($row["acc5"], 0)) . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc6"], 0)) . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc7"], 0)) . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc8"], 0)) . "</strong></td>
				<td width=\"50\" align=\"right\"><strong>" . zero(number_format($row["acc9"], 0)) . "</strong></td>
				<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["total"], 0)) . "</strong></td>
			</tr>";
        $result = $result . budgetgroup_table_head1($id, $period, $border, $head1_size, $head2_size, $head_table_size, $row["planid"], $level0);
        $level0++;
        $s1 = $s1 + $row["acc1"];
        $s2 = $s2 + $row["acc2"];
        $s3 = $s3 + $row["acc3"];
        $s4 = $s4 + $row["acc4"];
        $s5 = $s5 + $row["acc5"];
        $s6 = $s6 + $row["acc6"];
        $s7 = $s7 + $row["acc7"];
        $s8 = $s8 + $row["acc8"];
        $s9 = $s9 + $row["acc9"];
        $s10 = $s10 + $row["total"];
    }

    $result = $result . "<tr style=\"background-color: #e3e3e3;color:#000;\">

            <td width=\"264\" colspan=\"2\" align=\"center\"><strong>รวมทั้งสิ้น</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s1, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s2, 0)) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . zero(number_format($s3, 0)) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . zero(number_format($s4, 0)) . "</strong></td>
            <td width=\"76\" align=\"right\"><strong>" . zero(number_format($s5, 0)) . "</strong></td>
            <td width=\"74\" align=\"right\"><strong>" . zero(number_format($s6, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s7, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s8, 0)) . "</strong></td>
			<td width=\"50\" align=\"right\"><strong>" . zero(number_format($s9, 0)) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . zero(number_format($s10, 0)) . "</strong></td>
        </tr>";


    //--------------------- add percent row -----------------------
    $result = $result . "<tr style=\"background-color: #a3a3a3;color:#000;\">

            <td width=\"264\" colspan=\"2\" align=\"center\"><strong>ร้อยละ</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s1 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s2 * 100 / $s10, 2) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . number_format($s3 * 100 / $s10, 2) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . number_format($s4 * 100 / $s10, 2) . "</strong></td>
            <td width=\"76\" align=\"right\"><strong>" . number_format($s5 * 100 / $s10, 2) . "</strong></td>
            <td width=\"74\" align=\"right\"><strong>" . number_format($s6 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s7 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s8 * 100 / $s10, 2) . "</strong></td>
			<td width=\"50\" align=\"right\"><strong>" . number_format($s9 * 100 / $s10, 2) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . number_format($s10 * 100 / $s10, 2) . "</strong></td>
        </tr>";

    $result = $result . "</table>";



    $sql = null;
    $stmt = null;
    $row = null;
    $conn = null;


    return $result;
}



function budgetgroup_table_head1($id, $period, $border, $head1_size, $head2_size, $head_table_size, $planid, $order)
{

    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }
    //------------ generate top level data --------------------------
    $sql = "select 
	a.periodid
	,a.planid
	,a.planname2
	,a.productid
	,a.productname2
	,sum(a.acc1_pre) as acc1
	,sum(a.acc2_pre) as acc2
	,sum(a.acc3_pre) as acc3
	,sum(a.acc4_pre) as acc4
	,sum(a.acc5_pre) as acc5
	,sum(a.acc6_pre) as acc6
	,sum(a.acc7_pre) as acc7
	,sum(a.acc8_pre) as acc8
	,sum(a.acc9_pre) as acc9
	,sum(a.total_pre) as total
	 from budget_unidb_dept a  inner join department_order b on a.departmentid = b.departmentid
	 where a.periodid=? and a.budgetgroup_id=? and a.planid=?
	group by 
a.periodid
	,a.planid
	,a.planname2
	,a.productid
	,a.productname2
	order by a.planid,a.productid,b.order_id ASC
	";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$period, $id, $planid]);
    $level0 = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $result . "<tr style=\"background-color: #c4c2c2;color:#000;\">
				<td width=\"30\" align=\"center\"><strong>" . $order . "." . $level0 . "</strong></td>
				<td width=\"234\" align=\"left\"><strong>" . $row["productname2"] . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc1"], 0)) . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc2"], 0)) . "</strong></td>
				<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["acc3"], 0)) . "</strong></td>
				<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["acc4"], 0)) . "</strong></td>
				<td width=\"76\" align=\"right\"><strong>" . zero(number_format($row["acc5"], 0)) . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc6"], 0)) . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc7"], 0)) . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc8"], 0)) . "</strong></td>
				<td width=\"50\" align=\"right\"><strong>" . zero(number_format($row["acc9"], 0)) . "</strong></td>
				<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["total"], 0)) . "</strong></td>
			</tr>";
        $result = $result . budgetgroup_table_detail($id, $period, $border, $head1_size, $head2_size, $head_table_size, $row["planid"], $row["productid"]);
        $level0++;
    }



    $sql = null;
    $stmt = null;
    $row = null;
    $conn = null;


    return $result;
}





function budgetgroup_table_detail($id, $period, $border, $head1_size, $head2_size, $head_table_size, $planid, $product)
{

    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }
    //------------ generate top level data --------------------------
    $sql = "select 
	a.periodid
	,a.planid
	,a.planname
	,a.planname2
	,a.productid
	,a.productname
	,a.productname2
	,a.departmentid
	,a.departmentname
	,a.departmentname2
	,a.acc1_pre as acc1
	,a.acc2_pre as acc2
	,a.acc3_pre as acc3
	,a.acc4_pre as acc4
	,a.acc5_pre as acc5
	,a.acc6_pre as acc6
	,a.acc7_pre as acc7
	,a.acc8_pre as acc8
	,a.acc9_pre as acc9
	,a.total_pre as total
	 from budget_unidb_dept  a  inner join department_order b on a.departmentid = b.departmentid
	 where a.periodid=? and a.budgetgroup_id=? and a.planid=? and a.productid=?
	order by a.planid,a.productid,b.order_id ASC
	";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$period, $id, $planid, $product]);
    $level0 = 1;
    $result = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $result . "<tr style=\"background-color: #FFFFFF;color:#000;\">
				<td width=\"30\" align=\"center\"><strong></strong></td>
				<td width=\"234\" align=\"left\" style=\"font-size: 13px; font-weight: bold; \">" . $row["departmentname2"] . "</td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc1"], 0)) . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc2"], 0)) . "</strong></td>
				<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["acc3"], 0)) . "</strong></td>
				<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["acc4"], 0)) . "</strong></td>
				<td width=\"76\" align=\"right\"><strong>" . zero(number_format($row["acc5"], 0)) . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc6"], 0)) . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc7"], 0)) . "</strong></td>
				<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc8"], 0)) . "</strong></td>
				<td width=\"50\" align=\"right\"><strong>" . zero(number_format($row["acc9"], 0)) . "</strong></td>
				<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["total"], 0)) . "</strong></td>
			</tr>";

        $level0++;
    }



    $sql = null;
    $stmt = null;
    $row = null;
    $conn = null;


    return $result;
}













function budgetgroup_dept_head1($id, $period, $border, $head1_size, $head2_size, $departmentid)
{

    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    //---------------------- get data ------------------------
    $sql = "select departmentid,departmentname,budgetgroup_id,budgetgroup_name
,planid,planname
,sum(total) as total
,sum(total_pre) as total_pre
 from budget_unidb_dept where periodid=? and budgetgroup_id=?
	and departmentid=?
	group by 
departmentid,departmentname,budgetgroup_id,budgetgroup_name
,planid,planname
order by departmentid,budgetgroup_id,planid";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$period, $id, $departmentid]);
    $result = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $result . "
        <tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"430\" align=\"left\"><strong>" . $row["planname"] . "</strong></td>
			<td width=\"85\" align=\"right\"><strong>" . zero(number_format($row["total"], 0)) . "</strong></td>
            <td width=\"85\" align=\"right\"><strong>" . zero(number_format($row["total_pre"], 0)) . "</strong></td>
			<td width=\"30\" align=\"right\">บาท</td>
        </tr>";
        $result = $result . budgetgroup_dept_head2($id, $period, $border, $head1_size, $head2_size, $departmentid, $row["planid"]);

        //--------------- add data 

    }
    $sql = null;
    $stmt = null;
    $row = null;
    $conn = null;


    return $result;
}





function budgetgroup_dept_head2($id, $period, $border, $head1_size, $head2_size, $departmentid, $planid)
{

    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    //---------------------- get data ------------------------
    $sql = "select departmentid,departmentname,budgetgroup_id,budgetgroup_name
,planid,planname,productid,productname
,sum(total) as total
,sum(total_pre) as total_pre
 from budget_unidb_dept where periodid=? and budgetgroup_id=?
	and departmentid=? and planid=?
	group by 
departmentid,departmentname,budgetgroup_id,budgetgroup_name
,planid,planname,productid,productname
order by departmentid,budgetgroup_id,planid,productid";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$period, $id, $departmentid, $planid]);
    $result = "";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $result . "
        <tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"430\" align=\"left\"><strong>" . $row["productname"] . "</strong></td>
			<td width=\"85\" align=\"right\"><strong>" . zero(number_format($row["total"], 0)) . "</strong></td>
            <td width=\"85\" align=\"right\"><strong>" . zero(number_format($row["total_pre"], 0)) . "</strong></td>
			<td width=\"30\" align=\"right\">บาท</td>
        </tr>";


        //--------------- add data 
        $result = $result . budgetgroup_dept_head3($id, $period, $border, $head1_size, $head2_size, $departmentid, $planid, $row["productid"]);
    }
    $sql = null;
    $stmt = null;
    $row = null;
    $conn = null;


    return $result;
}

function budgetgroup_dept_head3($id, $period, $border, $head1_size, $head2_size, $departmentid, $planid, $productid)
{

    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    //---------------------- get data ------------------------
    $sql = "select departmentid,departmentname,budgetgroup_id,budgetgroup_name
,planid,planname,productid,productname
,budgettype_id,budgettype_name
,sum(m1+m2+m3+m4+m5+m6+m7+m8+m9+m10+m11+m12) as total
,sum(m1+m2+m3+m4+m5+m6+m7+m8+m9) as total_pre
 from budget_unidb_project where periodid=? and budgetgroup_id=?
	and departmentid=? and planid=? and productid=?
	group by 
departmentid,departmentname,budgetgroup_id,budgetgroup_name
,planid,planname,productid,productname
,budgettype_id,budgettype_name
order by departmentid,budgetgroup_id,planid,productid,budgettype_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$period, $id, $departmentid, $planid, $productid]);
    $result = "";
    $level0 = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $result . "
        <tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"430\" align=\"left\"><strong>" . $level0 . "." . $row["budgettype_name"] . "</strong></td>
			<td width=\"85\" align=\"right\"><strong>" . zero(number_format($row["total"], 0)) . "</strong></td>
            <td width=\"85\" align=\"right\"><strong>" . zero(number_format($row["total_pre"], 0)) . "</strong></td>
			<td width=\"30\" align=\"right\">บาท</td>
        </tr>";
        $result = $result . budgetgroup_dept_head4($id, $period, $border, $head1_size, $head2_size, $departmentid, $planid, $productid, $level0, $row["budgettype_id"]);
        $level0++;

        //--------------- add data 

    }
    $sql = null;
    $stmt = null;
    $row = null;
    $conn = null;


    return $result;
}


function budgetgroup_dept_head4($id, $period, $border, $head1_size, $head2_size, $departmentid, $planid, $productid, $order, $budgettype_id)
{

    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    //---------------------- get data ------------------------
    $sql = "select departmentid,departmentname,budgetgroup_id,budgetgroup_name
,planid,planname,productid,productname
,budgettype_id,budgettype_name,budgettype_sub_id,budgettype_sub_name
,sum(m1+m2+m3+m4+m5+m6+m7+m8+m9+m10+m11+m12) as total
,sum(m1+m2+m3+m4+m5+m6+m7+m8+m9) as total_pre
 from budget_unidb_project where periodid=? and budgetgroup_id=?
	and departmentid=? and planid=? and productid=? and budgettype_id=?
	group by 
departmentid,departmentname,budgetgroup_id,budgetgroup_name
,planid,planname,productid,productname
,budgettype_id,budgettype_name,budgettype_sub_id,budgettype_sub_name
order by departmentid,budgetgroup_id,planid,productid,budgettype_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$period, $id, $departmentid, $planid, $productid, $budgettype_id]);
    $result = "";
    $level0 = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $result . "
        <tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"430\" align=\"left\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $order . "." . $level0 . "." . $row["budgettype_sub_name"] . "</strong></td>
			<td width=\"85\" align=\"right\"><strong>" . zero(number_format($row["total"], 0)) . "</strong></td>
            <td width=\"85\" align=\"right\"><strong>" . zero(number_format($row["total_pre"], 0)) . "</strong></td>
			<td width=\"30\" align=\"right\">บาท</td>
        </tr>";
        $result = $result . budgetgroup_dept_detail($id, $period, $border, $head1_size, $head2_size, $departmentid, $planid, $productid, $order, $budgettype_id, $row["budgettype_sub_id"]);
        $level0++;

        //--------------- add data 

    }
    $sql = null;
    $stmt = null;
    $row = null;
    $conn = null;


    return $result;
}




function budgetgroup_dept_detail($id, $period, $border, $head1_size, $head2_size, $departmentid, $planid, $productid, $order, $budgettype_id, $budgettype_sub_id)
{

    try {
        $conn = new PDO("sqlite:./birdy/datadb_pre.db");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Unable to connect";
        echo $e->getMessage();
        exit;
    }

    //---------------------- get data ------------------------
    $sql = "select departmentid,departmentname,budgetgroup_id,budgetgroup_name
,planid,planname,productid,productname
,budgettype_id,budgettype_name,budgettype_sub_id,budgettype_sub_name,projectid,projectname
,sum(m1+m2+m3+m4+m5+m6+m7+m8+m9+m10+m11+m12) as total
,sum(m1+m2+m3+m4+m5+m6+m7+m8+m9) as total_pre
 from budget_unidb_project where periodid=? and budgetgroup_id=?
	and departmentid=? and planid=? and productid=? and budgettype_id=? and budgettype_sub_id=?
	group by 
departmentid,departmentname,budgetgroup_id,budgetgroup_name
,planid,planname,productid,productname
,budgettype_id,budgettype_name,budgettype_sub_id,budgettype_sub_name,projectid,projectname
order by departmentid,budgetgroup_id,planid,productid,budgettype_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$period, $id, $departmentid, $planid, $productid, $budgettype_id, $budgettype_sub_id]);
    $result = "";
    $level0 = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result = $result . "
        <tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"430\" align=\"left\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(" . $level0 . ") " . $row["projectname"] . "</td>
			<td width=\"85\" align=\"right\">" . zero(number_format($row["total"], 0)) . "</td>
            <td width=\"85\" align=\"right\">" . zero(number_format($row["total_pre"], 0)) . "</td>
			<td width=\"30\" align=\"right\">บาท</td>
        </tr>";
        $level0++;

        //--------------- add data 

    }
    $sql = null;
    $stmt = null;
    $row = null;
    $conn = null;


    return $result;
}


if (is_numeric($y)) {

    //====================================================================================================
    //-------------------------------------- MANIPULATE DAYA from MYSQL TO LITE---------------------------
    //====================================================================================================

    empty_data();
    //==== add sysconfig
    $sql_my = "select * from sysconfig";
    $stmt_my = $conn_my->prepare($sql_my);
    $stmt_my->execute();
    while ($row_my = $stmt_my->fetch(PDO::FETCH_ASSOC)) {
        add_sysconfig($row_my["id"], $row_my["name"], $row_my["value"]);
    }
    //echo "Add sysconfig Sucess!<br />";


    $sql_my = "select * from department_order";
    $stmt_my = $conn_my->prepare($sql_my);
    $stmt_my->execute();
    while ($row_my = $stmt_my->fetch(PDO::FETCH_ASSOC)) {
        add_department_order($row_my["departmentid"], $row_my["order_id"]);
    }









    //==== add product
    $sql_my = "select * from v_rep_invest where periodid=?";
    $stmt_my = $conn_my->prepare($sql_my);
    $stmt_my->execute([$y]);
    while ($row_my = $stmt_my->fetch(PDO::FETCH_ASSOC)) {
        add_product($row_my["periodid"], $row_my["strategyuid"], $row_my["STRATEGYUNAME"], $row_my["planid"], $row_my["PLANNAME"], $row_my["productid"], $row_my["PRODUCTNAME"], $row_my["acc1"], $row_my["acc1_pre"], $row_my["acc2"], $row_my["acc2_pre"], $row_my["acc3"], $row_my["acc3_pre"], $row_my["acc4"], $row_my["acc4_pre"], $row_my["acc5"], $row_my["acc5_pre"], $row_my["acc6"], $row_my["acc6_pre"], $row_my["acc7"], $row_my["acc7_pre"], $row_my["acc8"], $row_my["acc8_pre"], $row_my["acc9"], $row_my["acc9_pre"], $row_my["total"], $row_my["total_pre"], $row_my["STRATEGYUNAME2"], $row_my["PLANNAME2"], $row_my["PRODUCTNAME2"]);
    }
    //echo "Add product Sucess!<br />";
    //==== add budgetgroup
    $sql_my = "select * from v_rep_budgetgroup where periodid=?";
    $stmt_my = $conn_my->prepare($sql_my);
    $stmt_my->execute([$y]);
    while ($row_my = $stmt_my->fetch(PDO::FETCH_ASSOC)) {

        add_budgetgroup($row_my["periodid"], $row_my["budgetgroup_id"], $row_my["budgetgroup_name_full"], $row_my["acc1"], $row_my["acc1_pre"], $row_my["acc2"], $row_my["acc2_pre"], $row_my["acc3"], $row_my["acc3_pre"], $row_my["acc4"], $row_my["acc4_pre"], $row_my["acc5"], $row_my["acc5_pre"], $row_my["acc6"], $row_my["acc6_pre"], $row_my["acc7"], $row_my["acc7_pre"], $row_my["acc8"], $row_my["acc8_pre"], $row_my["acc9"], $row_my["acc9_pre"], $row_my["total"], $row_my["total_pre"]);
    }
    //echo "Add budgetgroup Sucess!<br />";

    //==== add dept
    $sql_my = "select * from v_rep_dept where periodid=?";
    $stmt_my = $conn_my->prepare($sql_my);
    $stmt_my->execute([$y]);
    while ($row_my = $stmt_my->fetch(PDO::FETCH_ASSOC)) {
        add_dept($row_my["periodid"], $row_my["strategyuid"], $row_my["STRATEGYUNAME"], $row_my["budgetgroup_id"], $row_my["budgetgroup_name"], $row_my["budgetgroup_name_full"], $row_my["planid"], $row_my["PLANNAME"], $row_my["productid"], $row_my["PRODUCTNAME"], $row_my["facultyid"], $row_my["facultyname"], $row_my["departmentid"], $row_my["departmentname"], $row_my["acc1"], $row_my["acc1_pre"], $row_my["acc2"], $row_my["acc2_pre"], $row_my["acc3"], $row_my["acc3_pre"], $row_my["acc4"], $row_my["acc4_pre"], $row_my["acc5"], $row_my["acc5_pre"], $row_my["acc6"], $row_my["acc6_pre"], $row_my["acc7"], $row_my["acc7_pre"], $row_my["acc8"], $row_my["acc8_pre"], $row_my["acc9"], $row_my["acc9_pre"], $row_my["total"], $row_my["total_pre"], $row_my["PLANNAME2"], $row_my["PRODUCTNAME2"], $row_my["departmentname2"]);
    }
    //echo "Add department Sucess!<br />";

    //==== add project
    $sql_my = "select * from v_project where periodid=?";
    $stmt_my = $conn_my->prepare($sql_my);
    $stmt_my->execute([$y]);
    while ($row_my = $stmt_my->fetch(PDO::FETCH_ASSOC)) {
        add_project($row_my["periodid"], $row_my["facultyid"], $row_my["facutlyname"], $row_my["departmentid"], $row_my["departmentname"], $row_my["budgetgroup_id"], $row_my["budgetgroup_name"], $row_my["budgetgroup_name_full"], $row_my["strategyuid"], $row_my["STRATEGYUNAME"], $row_my["planid"], $row_my["PLANNAME"], $row_my["productid"], $row_my["PRODUCTNAME"], $row_my["budgettype_id"], $row_my["budgettype_name"], $row_my["budgettype_sub_id"], $row_my["budgettype_sub_name"], $row_my["m1"], $row_my["m2"], $row_my["m3"], $row_my["m4"], $row_my["m5"], $row_my["m6"], $row_my["m7"], $row_my["m8"], $row_my["m9"], $row_my["m10"], $row_my["m11"], $row_my["m12"], $row_my["projectid"], $row_my["projectname"]);
    }

    //==== close mysql connection
    $sql_my = null;
    $stmt_my = null;
    $row_my = null;
    $conn_my = null;


    //====================================================================================================
    //-------------------------------------- START GENERATE REPORT----------------------------------------
    //====================================================================================================
    class MYPDF extends TCPDF
    {

        //Page header
        public function Header()
        {
            // // Logo
            // $image_file = K_PATH_IMAGES . 'RMU.png';
            // $this->Image($image_file, 10, 2, 10, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // // Set font
            // $this->SetFont('thsarabun', 'B', 14);
            // // Title
            // $this->SetXY(22, 7);
            // $this->Cell(0, 15, 'มหาวิทยาลัยราชภัฏมหาสารคาม', 0, false, 'L', 0, '', 0, false, 'M', 'M');
            $this->SetFont('thsarabun', 'B', 11);
            // $this->SetXY(22, 10.5);
            // $this->Cell(0, 15, 'Raja Bhat Maha Sarakham University', 0, false, 'L', 0, '', 0, false, 'M', 'M');

            // $style = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));

            // $this->Line(10, 21, 287, 21, $style);

            // $this->SetFont('thsarabun', 'B', 14);

            // $this->SetXY(283, 10);
            // $this->Cell(0, 15, '' . $this->getAliasNumPage(), 0, false, 'L', 0, '', 0, false, 'M', 'M');
            //$this->Cell(0, 15, '' . $this->getAliasNumPage(), 0, false, 'C', 0, '', 0, false, 'M', 'M');

            $this->Cell(0, 15, '' . $this->getAliasNumPage(), 0, 1, 'C', 0, '', 0);
        }

        // Page footer
        public function Footer()
        {
            /*
        global $budget_year;
        $this->SetFont('thsarabun', 'I', 14);
        $this->SetXY(170, -7);
        $this->Cell(0, 15, 'รายงานการใช้จ่ายงบประมาณ พ.ศ.'.$budget_year.' มหาวิทยาลัยราชภัฏมหาสารคาม', 0, false, 'L', 0, '', 0, false, 'M', 'M');

        $this->SetFont('thsarabun', 'B', 16);
        $this->SetXY(280, -7);
        $this->Cell(0, 15, $this->getAliasNumPage(), 0, false, 'L', 0, '', 0, false, 'M', 'M');
		*/
        }
    }
    $pdf = new MYPDF("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetAuthor('NAJA');
    $pdf->SetTitle('Report DATA');
    $pdf->SetSubject('Report DATA');
    $pdf->SetKeywords('RMU');;
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, 12, "รายงานผลการเบิกจ่ายงบประมาณ", "มหาวิทยาลัยราชภัฏมหาสารคาม\n");
    $pdf->setFooterData();

    // set header and footer fonts
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(15, 18, 10);
    $pdf->SetHeaderMargin(0);
    $pdf->SetFooterMargin(0);


    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, 15);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }


    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);

    $pdf->startPageGroup();



    $pdf->SetPrintHeader(true);
    $pdf->SetPrintFooter(true);
    // PAGE
    // Start Second Page Group



    // add a new page for TOC
    // Start Second Page Group
    $pdf->AddPage("P");
    $border = 0;
    $head1_size = 18;
    $head2_size = 16;
    $detail_size = 14;
    $add_size = 2;
    $head_table_size = 15;
    //---------------------------------- PAGE 1 ----------------------------------------------------------
    //----------------------------------- Get Data--------------------------------------------------------
    $v1 = 0; // current year
    $v2 = 0; // previous year
    $v3 = 0;  // budget previous year
    $v4 = 0;  // budget current year
    $v5 = ""; // text for check up or down
    $V6 = 0; // DIF TOTAL
    $v7 = 0.00; // dif percent

    $sql = "select * from budget_unidb_sysconfig";
    $stmt = $conn_lite->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($row["id"] == "1") {
            $v1 = $row["value"];
        } else if ($row["id"] == "3") {
            $v2 = $row["value"];
        } else if ($row["id"] == "4") {
            $v3 = $row["value"];
        }
    }
    $sql = "select sum(m1+m2+m3+m4+m5+m6+m7+m8+m9+m10+m11+m12) as total,sum(m1+m2+m3+m4+m5+m6+m7+m8+m9) as total_pre from budget_unidb_project where periodid=? and budgetgroup_id <> 4";
    $stmt = $conn_lite->prepare($sql);
    $stmt->execute([$y]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $v4 = $row["total_pre"];
    }
    if ((int)$v4 >= (int)$v3) {
        $v5 = "เพิ่มขึ้น จากปี " . $v2;
    } else {
        $v5 = "ลดลง จากปี " . $v2;
    }
    $v6 = $v4 - $v3;
    $v7 = number_format($v6 * 100 / $v3, 2);

    //---------------------------------- Render html page 1 ----------------------------------------------
    $headtext = "<center><div style=\"font-size:" . $head1_size . "px;width:490;text-align:center;\"><strong>กระทรวงการอุดมศึกษา วิทยาศาสตร์ วิจัยและนวัตกรรม<br />มหาวิทยาลัยราชภัฏมหาสารคาม <br/>(งบพลาง)</strong></div><center><br />";
    $tbl = $headtext . "<table border=\"" . $border . "\" class=\"\" style=\"font-size: " . $head2_size . "px;\" cellpadding=\"3\">
        <tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"230\" align=\"right\"><strong>งบประมาณรายจ่ายเงินรายได้</strong></td>
            <td width=\"60\" align=\"right\"><strong>ปี " . $v2 . "</strong></td>
			<td width=\"160\" align=\"right\"><strong>" . zero(number_format($v3, 0)) . "</strong></td>
			<td width=\"60\" align=\"left\"><strong>บาท</strong></td>
        </tr>
		
        <tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"230\" align=\"right\"><strong>งบประมาณรายจ่ายเงินรายได้ (งบพลาง)</strong></td>
            <td width=\"60\" align=\"right\"><strong>ปี " . $v1 . "</strong></td>
			<td width=\"160\" align=\"right\"><strong>" . zero(number_format($v4, 0)) . "</strong></td>
			<td width=\"60\" align=\"left\"><strong>บาท</strong></td>
        </tr>
		<tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"290\" colspan =\"2\" align=\"right\"><strong>" . $v5 . "</strong></td>
			<td width=\"160\" align=\"right\"><strong>" . zero(number_format($v6, 0)) . "</strong></td>
			<td width=\"60\" align=\"left\"><strong>บาท</strong></td>
        </tr>
		<tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"290\" colspan =\"2\" align=\"right\"><strong>คิดเป็นร้อยละ</strong></td>
			<td width=\"160\" align=\"right\"><strong>" . zero(number_format($v7, 2)) . "</strong></td>
			<td width=\"60\" align=\"left\"><strong></strong></td>
		</tr>
		</table><br /><br />";

    $tbl = $tbl . "<table border=\"" . $border . "\" class=\"\"  cellpadding=\"3\">
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . $head2_size . "px;\">
            <td width=\"590\" colspan=\"4\" align=\"left\"><strong>1.ข้อมูลหน่วยงาน</strong></td>
        </tr>
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . $head2_size . "px;\">
            <td width=\"10\" align=\"left\"><strong></strong></td>
			<td width=\"580\" colspan=\"3\" align=\"left\"><strong>1.1 วิสัยทัศน์</strong></td>
        </tr>
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . ($detail_size + $add_size) . "px;\">
            <td width=\"10\" colspan=\"3\" align=\"left\"><strong></strong></td>
			<td width=\"580\" align=\"left\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\"มหาวิทยาลัยที่มีคุณภาพ เพื่อการพัฒนาท้องถิ่นให้มีความเข้มแข็งและยั่งยืน\"</td>
        </tr>		
		</table><br /><br />";


    $tbl = $tbl . "<table border=\"" . $border . "\" class=\"\"  cellpadding=\"3\">
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . $head2_size . "px;\">
            <td width=\"10\" align=\"left\"><strong></strong></td>
			<td width=\"580\" colspan=\"3\" align=\"left\"><strong>1.2 พันธกิจ</strong></td>
        </tr>
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . ($detail_size + $add_size) . "px;\">
            <td width=\"10\" colspan=\"2\" align=\"left\"><strong></strong></td>
			<td width=\"20\" align=\"right\">1.</td>
			<td width=\"560\" align=\"left\">วิจัยสร้างองค์ความรู้และนวัตกรรมบูรณาการ การบริการวิชาการ และศิลปะวัฒนธรรม สร้างความเข้มแข็งให้กับชุมชนท้องถิ่น และชุมชนอื่น</td>
        </tr>	
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . ($detail_size + $add_size) . "px;\">
            <td width=\"10\" colspan=\"2\" align=\"left\"><strong></strong></td>
			<td width=\"20\" align=\"right\">2.</td>
			<td width=\"560\" align=\"left\">ผลิตและพัฒนาครูมืออาชีพตามความต้องการของท้องถิ่นและประเทศ</td>
        </tr>	
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . ($detail_size + $add_size) . "px;\">
            <td width=\"10\" colspan=\"2\" align=\"left\"><strong></strong></td>
			<td width=\"20\" align=\"right\">3.</td>
			<td width=\"560\" align=\"left\">ผลิตบัณฑิต และพัฒนากำลังคนให้มีสมรรถนะ และศักยภาพตามความต้องการของประเทศ มีทัศนคติที่ดี และเป็นพลเมืองดีในสังคม</td>
        </tr>
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . ($detail_size + $add_size) . "px;\">
            <td width=\"10\" colspan=\"2\" align=\"left\"><strong></strong></td>
			<td width=\"20\" align=\"right\">4.</td>
			<td width=\"560\" align=\"left\">บริหารจัดการด้วยหลักธรรมาภิบาล และจริยธรรม</td>
        </tr>
       
		
		
		</table><br /><br />";

    $tbl = $tbl . "<table border=\"" . $border . "\" class=\"\"  cellpadding=\"3\">
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . $head2_size . "px;\">
            <td width=\"10\" align=\"left\"><strong></strong></td>
			<td width=\"580\" colspan=\"3\" align=\"left\"><strong>1.3 ยุทธศาสตร์</strong></td>
        </tr>
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . ($detail_size + $add_size) . "px;\">
            <td width=\"10\" colspan=\"2\" align=\"left\"><strong></strong></td>
			<td width=\"20\" align=\"right\">1.</td>
			<td width=\"560\" align=\"left\">พันธกิจสัมพันธ์เพื่อการพัฒนาท้องถิ่นอย่างสร้างสรรค์</td>
        </tr>	
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . ($detail_size + $add_size) . "px;\">
            <td width=\"10\" colspan=\"2\" align=\"left\"><strong></strong></td>
			<td width=\"20\" align=\"right\">2.</td>
			<td width=\"560\" align=\"left\">การผลิตและพัฒนาครูมืออาชีพ</td>
        </tr>	
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . ($detail_size + $add_size) . "px;\">
            <td width=\"10\" colspan=\"2\" align=\"left\"><strong></strong></td>
			<td width=\"20\" align=\"right\">3.</td>
			<td width=\"560\" align=\"left\">ยกระดับคุณภาพการศึกษาสู่ความเป็นเลิศ</td>
        </tr>
        <tr style=\"background-color: #FFFFFF;color:#000;font-size:" . ($detail_size + $add_size) . "px;\">
            <td width=\"10\" colspan=\"2\" align=\"left\"><strong></strong></td>
			<td width=\"20\" align=\"right\">4.</td>
			<td width=\"560\" align=\"left\">พัฒนาระบบบริหารจัดการบนพื้นฐานธรรมาภิบาล</td>
        </tr>
        
		
		
		</table><br /><br />";
    $html = $tbl;
    $pdf->writeHTML($html, true, false, true, false, '');




    $pdf->AddPage("L");
    //---------------------------------- PAGE 2 ----------------------------------------------------------
    //----------------------------------- Get Data--------------------------------------------------------
    //--- reset -----
    $html = "";
    $tbl = "";
    $headtext = "";
    //------------------------ function for generate data 2 level deep ----------------------------------
    function head_p2_a($strategyuid, $y, $id)
    {
        $xxx = "";
        $level1 = 1;
        $result = "";
        try {
            $conn = new PDO("sqlite:./birdy/datadb_pre.db");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Unable to connect";
            echo $e->getMessage();
            exit;
        }

        $sql = "select 
periodid
,strategyuid
,planid
,planname2
,sum(acc1_pre) as acc1
,sum(acc2_pre) as acc2
,sum(acc3_pre) as acc3
,sum(acc4_pre) as acc4
,sum(acc5_pre) as acc5
,sum(acc6_pre) as acc6
,sum(acc7_pre) as acc7
,sum(acc8_pre) as acc8
,sum(acc9_pre) as acc9
,sum(total_pre) as total
 from budget_unidb_product
 where periodid=? and strategyuid=?
group by 
periodid
,strategyuid
,planid
,planname2";
        //echo $sql;exit();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$y, $strategyuid]);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result = $result . "<tr style=\"background-color: #c4c2c2;color:#000;\">
            <td width=\"30\" align=\"center\"><strong>" . $id . "." . $level1 . "</strong></td>
            <td width=\"224\" align=\"left\"><strong>" . $row["planname2"] . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc1"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc2"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc3"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc4"], 0)) . "</strong></td>
            <td width=\"76\" align=\"right\"><strong>" . zero(number_format($row["acc5"], 0)) . "</strong></td>
            <td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc6"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc7"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc8"], 0)) . "</strong></td>
			<td width=\"52\" align=\"right\"><strong>" . zero(number_format($row["acc9"], 0)) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["total"], 0)) . "</strong></td>
        </tr>";


            $level1++;
            //echo "<br .> xxxx : ".$row["PRODUCTCODE"]."<br />";
            $xxx = head_p2_b($row["strategyuid"], $row["planid"], $y);
            $result = $result . $xxx;
        }
        $stmt = null;
        $row = null;
        $conn = null;
        return $result;
    }


    function head_p2_b($strategyuid, $planid, $y)
    {
        //$level1 = 1;
        $result = "";
        try {
            $conn = new PDO("sqlite:./birdy/datadb_pre.db");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Unable to connect";
            echo $e->getMessage();
            exit;
        }

        $sql = " 
select 
periodid
,planid
,planname2
,productid
,productname2
,sum(acc1_pre) as acc1
,sum(acc2_pre) as acc2
,sum(acc3_pre) as acc3
,sum(acc4_pre) as acc4
,sum(acc5_pre) as acc5
,sum(acc6_pre) as acc6
,sum(acc7_pre) as acc7
,sum(acc8_pre) as acc8
,sum(acc9_pre) as acc9
,sum(total_pre) as total
 from budget_unidb_product
 where periodid=? and strategyuid=? and planid=?
group by 
periodid
,planid
,planname2
,productid
,productname2";
        //echo $sql;exit();
        $stmt = $conn->prepare($sql);
        $stmt->execute([$y, $strategyuid, $planid]);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result = $result . "<tr style=\"background-color: #FFFFFF;color:#000; font-size: 14px;\">
            <td width=\"30\" align=\"right\"><strong></strong></td>
            <td width=\"224\" align=\"left\"><strong>" . $row["productname2"] . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc1"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc2"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc3"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc4"], 0)) . "</strong></td>
            <td width=\"76\" align=\"right\"><strong>" . zero(number_format($row["acc5"], 0)) . "</strong></td>
            <td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc6"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc7"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc8"], 0)) . "</strong></td>
			<td width=\"52\" align=\"right\"><strong>" . zero(number_format($row["acc9"], 0)) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["total"], 0)) . "</strong></td>
        </tr>";


            //$level1++;
            //echo "<br .> xxxx : ".$row["PRODUCTCODE"]."<br />";
            //$xxx = head3($row["PRODUCTCODE"],$y);
            //$result = $result.$xxx;
        }
        $stmt = null;
        $row = null;
        $conn = null;
        return $result;
    }


    //---------------------------------- Render html page 2 ----------------------------------------------
    $s1 = 0;
    $s2 = 0;
    $s3 = 0;
    $s4 = 0;
    $s5 = 0;
    $s6 = 0;
    $s7 = 0;
    $s8 = 0;
    $s9 = 0;
    $s10 = 0;

    $headtext = "<center><div style=\"font-size:" . $head1_size . "px;width:980px;text-align:center;\"><strong>สรุปงบประมาณรายจ่ายเงินรายได้ ประจำปีงบประมาณ พ.ศ." . $_REQUEST["y"] . " จำแนกตามยุทธศาสตร์การจัดสรรงบประมาณ แผนงาน ผลผลิตและงบรายจ่าย (งบพลาง)</strong></div><center><br />";
    $tbl = $headtext . "<table border=\"1\" class=\"\" style=\"font-size: " . $head_table_size . "px;\" cellpadding=\"3\">
    <thead>

        <tr style=\"background-color: #D3D3D3;color:#000;\">
            <td width=\"30\" rowspan=\"2\" align=\"center\"><strong>ลำดับที่</strong></td>
			<td width=\"224\" rowspan=\"2\" align=\"center\"><strong>ยุทธศาสตร์การจัดสรรค์งบประมาณ แผนงาน/ผลผลิต/โครงการ</strong></td>
			<td width=\"74\" rowspan=\"1\" align=\"center\"><strong>งบบุคลากร</strong></td>
			<td width=\"298\" colspan=\"4\" align=\"center\"><strong>งบดำเนินงาน</strong></td>
			<td width=\"148\" colspan=\"2\" align=\"center\"><strong>งบลงทุน</strong></td>
			<td width=\"74\" rowspan=\"2\" align=\"center\"><strong>งบเงินอุดหนุน</strong></td>
			<td width=\"52\" rowspan=\"2\" align=\"center\"><strong>งบรายจ่าย<br/>อื่น</strong></td>
			<td width=\"70\" rowspan=\"2\" align=\"center\"><strong>รวมทั้งสิ้น</strong></td>
        </tr>

        <tr style=\"background-color: #D3D3D3;color:#000;\">
            <td width=\"74\" align=\"center\"><strong>ค่าจ้างชั่วคราว</strong></td>
			<td width=\"74\" align=\"center\"><strong>ค่าตอบแทน</strong></td>
            <td width=\"74\" align=\"center\"><strong>ค่าใช้สอย</strong></td>
			<td width=\"74\" align=\"center\"><strong>ค่าวัสดุ</strong></td>
			<td width=\"76\" align=\"center\"><strong>ค่าสาธารณูปโภค</strong></td>
			<td width=\"74\" align=\"center\"><strong>ค่าครุภัณฑ์</strong></td>
			<td width=\"74\" align=\"center\"><strong>ค่าที่ดินและ<br />สิ่งก่อสร้าง</strong></td>
        </tr>
    </thead>";

    //------------ generate top level data --------------------------
    $sql = "select 
periodid
,strategyuid
,strategyuname2
,sum(acc1_pre) as acc1
,sum(acc2_pre) as acc2
,sum(acc3_pre) as acc3
,sum(acc4_pre) as acc4
,sum(acc5_pre) as acc5
,sum(acc6_pre) as acc6
,sum(acc7_pre) as acc7
,sum(acc8_pre) as acc8
,sum(acc9_pre) as acc9
,sum(total_pre) as total
 from budget_unidb_product
 where periodid=?
group by 
periodid
,strategyuid
,strategyuname2";
    $stmt = $conn_lite->prepare($sql);
    $stmt->execute([$y]);
    $level0 = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $tbl = $tbl . "<tr style=\"background-color: #a3a3a3;color:#000; \">
            <td width=\"30\" align=\"center\"><strong>" . $level0 . "</strong></td>
            <td width=\"224\" align=\"left\"><strong>" . $row["strategyuname2"] . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc1"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc2"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc3"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc4"], 0)) . "</strong></td>
            <td width=\"76\" align=\"right\"><strong>" . zero(number_format($row["acc5"], 0)) . "</strong></td>
            <td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc6"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc7"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc8"], 0)) . "</strong></td>
			<td width=\"52\" align=\"right\"><strong>" . zero(number_format($row["acc9"], 0)) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["total"], 0)) . "</strong></td>
        </tr>";
        $tbl = $tbl . head_p2_a($row["strategyuid"], $y, $level0);
        $level0++;
        $s1 = $s1 + $row["acc1"];
        $s2 = $s2 + $row["acc2"];
        $s3 = $s3 + $row["acc3"];
        $s4 = $s4 + $row["acc4"];
        $s5 = $s5 + $row["acc5"];
        $s6 = $s6 + $row["acc6"];
        $s7 = $s7 + $row["acc7"];
        $s8 = $s8 + $row["acc8"];
        $s9 = $s9 + $row["acc9"];
        $s10 = $s10 + $row["total"];
    }
    //------------------ add total row ---------------------------
    $tbl = $tbl . "<tr style=\"background-color: #e3e3e3;color:#000;\">

            <td width=\"254\" colspan=\"2\" align=\"center\"><strong>รวมทั้งสิ้น</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s1, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s2, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s3, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s4, 0)) . "</strong></td>
            <td width=\"76\" align=\"right\"><strong>" . zero(number_format($s5, 0)) . "</strong></td>
            <td width=\"74\" align=\"right\"><strong>" . zero(number_format($s6, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s7, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s8, 0)) . "</strong></td>
			<td width=\"52\" align=\"right\"><strong>" . zero(number_format($s9, 0)) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . zero(number_format($s10, 0)) . "</strong></td>
        </tr>";


    //--------------------- add percent row -----------------------
    $tbl = $tbl . "<tr style=\"background-color: #a3a3a3;color:#000; \">

            <td width=\"254\" colspan=\"2\" align=\"center\"><strong>ร้อยละ</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s1 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s2 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s3 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s4 * 100 / $s10, 2) . "</strong></td>
            <td width=\"76\" align=\"right\"><strong>" . number_format($s5 * 100 / $s10, 2) . "</strong></td>
            <td width=\"74\" align=\"right\"><strong>" . number_format($s6 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s7 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s8 * 100 / $s10, 2) . "</strong></td>
			<td width=\"52\" align=\"right\"><strong>" . number_format($s9 * 100 / $s10, 2) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . number_format($s10 * 100 / $s10, 2) . "</strong></td>
        </tr>";

    $tbl = $tbl . "</table>";
    $html = $tbl;
    $pdf->writeHTML($html, true, false, true, false, '');




















    $pdf->AddPage("L");
    //---------------------------------- PAGE 3 ----------------------------------------------------------
    //----------------------------------- Get Data--------------------------------------------------------
    //--- reset -----
    $html = "";
    $tbl = "";
    $headtext = "";
    //------------------------ function for generate data 3 level deep ----------------------------------


    //---------------------------------- Render html page 3 ----------------------------------------------
    // Start หน้ารายละเอียดแยกตามประเภทงบประมาณ
    // Start

    $s1 = 0;
    $s2 = 0;
    $s3 = 0;
    $s4 = 0;
    $s5 = 0;
    $s6 = 0;
    $s7 = 0;
    $s8 = 0;
    $s9 = 0;
    $s10 = 0;


    $headtext = "<center><div style=\"font-size:" . $head1_size . "px;width:980px;text-align:center;\"><strong>งบประมาณรายจ่ายเงินรายได้ ประจำปีงบประมาณ พ.ศ." . $_REQUEST["y"] . " จำแนกตามประเภทงบประมาณและงบรายจ่าย (งบพลาง)</strong></div><center><br />";
    $tbl = $headtext . "<table border=\"1\" class=\"\" style=\"font-size: " . $head_table_size . "px;\" cellpadding=\"3\">
    <thead>

        <tr style=\"background-color: #D3D3D3;color:#000;\">
            <td width=\"30\" rowspan=\"2\" align=\"center\"><strong>ลำดับที่</strong></td>
			<td width=\"224\" rowspan=\"2\" align=\"center\"><strong>ประเภทงบประมาณ</strong></td>
			<td width=\"74\" rowspan=\"1\" align=\"center\"><strong>งบบุคลากร</strong></td>
			<td width=\"298\" colspan=\"4\" align=\"center\"><strong>งบดำเนินงาน</strong></td>
			<td width=\"148\" colspan=\"2\" align=\"center\"><strong>งบลงทุน</strong></td>
			<td width=\"74\" rowspan=\"2\" align=\"center\"><strong>งบเงินอุดหนุน</strong></td>
			<td width=\"52\" rowspan=\"2\" align=\"center\"><strong>งบรายจ่าย<br/>อื่น</strong></td>
			<td width=\"70\" rowspan=\"2\" align=\"center\"><strong>รวมทั้งสิ้น</strong></td>
        </tr>

        <tr style=\"background-color: #D3D3D3;color:#000;\">
            <td width=\"74\" align=\"center\"><strong>ค่าจ้างชั่วคราว</strong></td>
			<td width=\"74\" align=\"center\"><strong>ค่าตอบแทน</strong></td>
            <td width=\"74\" align=\"center\"><strong>ค่าใช้สอย</strong></td>
			<td width=\"74\" align=\"center\"><strong>ค่าวัสดุ</strong></td>
			<td width=\"76\" align=\"center\"><strong>ค่าสาธารณูปโภค</strong></td>
			<td width=\"74\" align=\"center\"><strong>ค่าครุภัณฑ์</strong></td>
			<td width=\"74\" align=\"center\"><strong>ค่าที่ดินและ<br />สิ่งก่อสร้าง</strong></td>
        </tr>
    </thead>";

    //------------ generate top level data --------------------------


    $sql = "
select
periodid
,budgetgroup_id
,budgetgroup_name_full
,sum(acc1_pre) as acc1
,sum(acc2_pre) as acc2
,sum(acc3_pre) as acc3
,sum(acc4_pre) as acc4
,sum(acc5_pre) as acc5
,sum(acc6_pre) as acc6
,sum(acc7_pre) as acc7
,sum(acc8_pre) as acc8
,sum(acc9_pre) as acc9
,sum(total_pre) as total
 from budget_unidb_budgetgroup
 where periodid=? AND budgetgroup_id <> 4
group by 
periodid
,budgetgroup_id
,budgetgroup_name_full";
    $stmt = $conn_lite->prepare($sql);
    $stmt->execute([$y]);
    $level0 = 1;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $tbl = $tbl . "<tr style=\"background-color: #FFFFFF;color:#000; font-site:12px;\">
            <td width=\"30\" align=\"center\"><strong>" . $level0 . "</strong></td>
            <td width=\"224\" align=\"left\"><strong>" . $row["budgetgroup_name_full"] . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc1"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc2"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc3"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc4"], 0)) . "</strong></td>
            <td width=\"76\" align=\"right\"><strong>" . zero(number_format($row["acc5"], 0)) . "</strong></td>
            <td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc6"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc7"], 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($row["acc8"], 0)) . "</strong></td>
			<td width=\"52\" align=\"right\"><strong>" . zero(number_format($row["acc9"], 0)) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . zero(number_format($row["total"], 0)) . "</strong></td>
        </tr>";
        $tbl = $tbl . head_p2_a($row["strategyuid"], $y, $level0);
        $level0++;
        $s1 += $row["acc1"];
        $s2 += $row["acc2"];
        $s3 += $row["acc3"];
        $s4 += $row["acc4"];
        $s5 += $row["acc5"];
        $s6 += $row["acc6"];
        $s7 += $row["acc7"];
        $s8 += $row["acc8"];
        $s9 += $row["acc9"];
        $s10 += $row["total"];
    }
    //------------------ add total row ---------------------------
    $tbl = $tbl . "<tr style=\"background-color: #e3e3e3;color:#000;\">

            <td width=\"254\" colspan=\"2\" align=\"center\"><strong>รวมทั้งสิ้น</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s1, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s2, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s3, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s4, 0)) . "</strong></td>
            <td width=\"76\" align=\"right\"><strong>" . zero(number_format($s5, 0)) . "</strong></td>
            <td width=\"74\" align=\"right\"><strong>" . zero(number_format($s6, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s7, 0)) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . zero(number_format($s8, 0)) . "</strong></td>
			<td width=\"52\" align=\"right\"><strong>" . zero(number_format($s9, 0)) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . zero(number_format($s10, 0)) . "</strong></td>
        </tr>";


    //--------------------- add percent row -----------------------
    $tbl = $tbl . "<tr style=\"background-color: #a3a3a3;color:#000;\">

            <td width=\"254\" colspan=\"2\" align=\"center\"><strong>ร้อยละ</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s1 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s2 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s3 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s4 * 100 / $s10, 2) . "</strong></td>
            <td width=\"76\" align=\"right\"><strong>" . number_format($s5 * 100 / $s10, 2) . "</strong></td>
            <td width=\"74\" align=\"right\"><strong>" . number_format($s6 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s7 * 100 / $s10, 2) . "</strong></td>
			<td width=\"74\" align=\"right\"><strong>" . number_format($s8 * 100 / $s10, 2) . "</strong></td>
			<td width=\"52\" align=\"right\"><strong>" . number_format($s9 * 100 / $s10, 2) . "</strong></td>
			<td width=\"70\" align=\"right\"><strong>" . number_format($s10 * 100 / $s10, 2) . "</strong></td>
        </tr>";

    $tbl = $tbl . "</table>";
    $html = $tbl;
    $pdf->writeHTML($html, true, false, true, false, '');

    //end หน้ารายละเอียดแยกตามประเภทงบประมาณ



    //$sql = "select budgetgroup_id from budget_unidb_budgetgroup order by budgetgroup_id";
    // remove budgetgroup_id = 4
    $sql = "select budgetgroup_id from budget_unidb_budgetgroup where budgetgroup_id <> 4 order by budgetgroup_id";
    // end remove budgetgroup_id = 4
    $stmt = $conn_lite->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pdf->AddPage("P");
        //---------------------------------- PAGE BUDGETGROUP COVER ----------------------------------------------------------
        $html = "";
        $html = budgetgroup_cover($row["budgetgroup_id"], $y, $border, $head1_size, $head2_size);
        $pdf->writeHTML($html, true, false, true, false, '');


        $pdf->AddPage("L");
        //---------------------------------- PAGE BUDGETGROUP TABLE----------------------------------------------------------
        $html = "";
        $html = budgetgroup_table($row["budgetgroup_id"], $y, $border, $head1_size, $head2_size, $head_table_size);
        $pdf->writeHTML($html, true, false, true, false, '');

        //------------------- add department detail -------------------------------------------


        $sql2 = "SELECT DISTINCT
        a.departmentid,
        a.departmentname,
        a.budgetgroup_id,
        a.budgetgroup_name,
        b.order_id 
    FROM
        budget_unidb_dept a
        INNER JOIN department_order b ON a.departmentid = b.departmentid 
    WHERE
        a.periodid = ?
        AND a.budgetgroup_id = ?
    ORDER BY
        CAST ( a.facultyid AS INTEGER ),
        b.order_id ASC,
        CAST ( a.departmentid AS INTEGER )";
        $stmt2 = $conn_lite->prepare($sql2);
        $stmt2->execute([$y, $row["budgetgroup_id"]]);
        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {

            $html = "";

            //แก้ปัญหาขึ้นซ้อนกัน
            // if ($row2["budgetgroup_id"] == 23 && $row2["departmentid"] == 1) {
            //     $pdf->AddPage("P");
            // }
            //แก้ปัญหาขึ้นซ้อนกัน

            $pdf->AddPage("P");
            //$html = budgetgroup_dept($row["budgetgroup_id"],$y,$border,$head1_size,$head2_size);
            $headtext = "<center><div style=\"font-size:" . $head1_size . "px;width:630px;text-align:center;\"><strong>" . $row2["departmentname"] . "</strong></div><center><br />";
            $html = $headtext . "<table border=\"" . $border . "\" class=\"\" style=\"font-size: " . $head2_size . "px;\" cellpadding=\"3\">
        <tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"630\" colspan=\"4\" align=\"right\"> <strong>" . $row2["budgetgroup_name"] . "</strong></td>
        </tr>
        <tr style=\"background-color: #FFFFFF;color:#000;\">
            <td width=\"430\" align=\"left\"><strong></strong></td>
			<td width=\"85\" align=\"right\"><strong>งบทั้งหมด</strong></td>
            <td width=\"85\" align=\"right\"><strong>งบพลาง</strong></td>
			<td width=\"30\" align=\"right\"></td>
        </tr>
        
        ";
            $html = $html . budgetgroup_dept_head1($row2["budgetgroup_id"], $y, $border, $head1_size, $head2_size, $row2["departmentid"]);
            $html = $html . "</table>";
            $pdf->writeHTML($html, true, false, true, false, '');
        }
    }


    ob_end_clean();

    //$pdf_file = 'REPORT-ALL-' . $budget_year . '.pdf';
    $pdf_file = 'รายงานเล่มยาว(งบพลาง)-' . $budget_year . '.pdf';
    $pdf->Output($pdf_file, 'I');
}
