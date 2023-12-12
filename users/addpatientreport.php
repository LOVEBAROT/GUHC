<?php

session_start();

                    if (isset($_POST['show'])){
                        include ('../dbbcon.php');
                        $cno1=$_POST['caseid'];
                        $query1="SELECT `name` FROM `sform` WHERE `caseid`='$cno1'";
                        $run1=mysqli_query($con,$query1);
                        $data1=mysqli_fetch_assoc($run1);
                        $_SESSION['cno1']=$cno1;
                    }


if (isset($_SESSION['uid'])){
    echo "";
}else
{
    header('Location: ../login.php');
}?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
        th{
            background-color: #212121;
            color: white;
        }
        tr:hover{
            background-color: #212121;
            color: white;
        }
        .sbtn{
            background-color: #4CAF50;
            width: 100px;
            color: white;
            font-weight: bold;
        }
        .sbtn:hover{
            background-color: darkgreen;
        }
        .outer{
            background-color: #999999;
            height: 300px;
            margin-top: -20px;
        }
        .inner{
            padding-top: 100px;
        }
        .show_btn{
            background-color: #4CAF50;
            color: white;
        }
        .show_btn:hover{
            background-color: darkgreen;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php require ('../header.php');?>
<div class="heading">
    <h2 align="center" style="background-color: #222222;color: white; margin-top: -5px">Patient Report Form</h2>
</div>
<div class="outer">
    <div class="inner">
        <form action="addpatientreport.php" method="post" enctype="multipart/form-data">
            <table border="1" align="center">
                <tr>
                    <th width="300">Caseid</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Select Report type</th>
                    <th>Select Report</th>
                    <th>Notes</th>
                </tr>
                <tr>
                    <td width="300"><input type="text" name="caseid" value="<?php if(isset($_SESSION['cno1'])){ echo $_SESSION['cno1'];unset($_SESSION['cno1']); } ?>" placeholder="Enter Case Number" required>   <input type="submit" name="show"  value="show" class="show_btn"></td>

                    <td><input type="text" name="name"  value="<?php
                        if(isset($cno1)){   echo $data1['name'];}
                        ?>"placeholder="Enter Name"></td>
                    <td><input type="text" name="date" value="<?php echo date("d/m/y")?>"></td>
                    <td>
                        <input list="rtype" name="rtype">
                        <datalist id="rtype">
                            <option value="CBC"></option>
                            <option value="BLOOD GROUP"></option>
                            <option value="BLEEDING TIME"></option>
                            <option value="CLOTING TIME"></option>
                            <option value="MD"></option>
                            <option value="ESR"></option>
                            <option value="FBS"></option>
                            <option value="PPBS"></option>
                            <option value="RBS"></option>
                            <option value="RBS ON GLUCOMETER"></option>
                            <option value="HbA1C"></option>
                            <option value="S.CHOLESTEROL"></option>
                            <option value="S.TRIGLY"></option>
                            <option value="S.HDL"></option>
                            <option value="S.LDL"></option>
                            <option value="BLOOD UREA"></option>
                            <option value="S.CREATININE"></option>
                            <option value="S.URIC ACID"></option>
                            <option value="S.BILLIRUBIN"></option>
                            <option value="S.ALKALINE PHOSPHATE"></option>
                            <option value="SGPT"></option>
                            <option value="S.WIDAL"></option>
                            <option value="URINE ROUTINE/MICRO"></option>
                            <option value="STOOL EXAM"></option>
                            <option value="S.T3"></option>
                            <option value="S.T4"></option>
                            <option value="S.TSH"></option>
                            <option value="DANGUE NS1"></option>
                            <option value="TRIPLE MARKER"></option>
                            <option value="HIV 1 2"></option>
                            <option value="HBSAG"></option>
                            <option value="VDRL"></option>

                        </datalist>
                    </td>
                    <td><input type="file" name="file" ></td>
                    <td><textarea name="notes"  cols="50" PLACEHOLDER="Enter Notes"></textarea></td>

                </tr>
                <tr>
                    <td colspan="6" align="center"><input type="submit" name="submit" value="Submit" class="sbtn"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
if(isset($_POST['submit'])){
    include ('../dbbcon.php');
    $caseid=$_POST['caseid'];
    $name=$_POST['name'];
    $date=$_POST['date'];
    $rtype=$_POST['rtype'];
    $filename=$_FILES['file']['name'];
    $file_tmp_name=$_FILES['file']['tmp_name'];
    $path='../Patient_Reports/';
    move_uploaded_file($file_tmp_name,$path.$filename);
    $notes=$_POST['notes'];
    $query="INSERT INTO `patient_report`(`caseid`, `name`, `date`, `report_type`, `report`, `notes`) 
VALUES ('$caseid','$name','$date','$rtype','$filename','$notes')";
    $run = mysqli_query($con,$query);
    if($run==true){
        ?>
        <script>
            alert("Report Successfully inserted");
            window.open("pathologist.php","_self");
        </script>
        <?php
    }
}
?>
<?php include ('../footer.php');?>