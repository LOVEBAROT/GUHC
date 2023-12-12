<?php

session_start();

if (isset($_POST['show'])){
    include ('../dbbcon.php');
    $cno1=$_POST['cno'];
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
        .outer{
            background-color: #cccccc;
            height: 300px;
            margin-top: -20px;
        }
        .inner{
            padding-top: 100px;
        }
        th{
            background-color: #333333;
            color: white;
        }
        tr:hover{
            background-color: #333333;
            color: white;
        }
        .submitbtn{
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        .submitbtn:hover{
            background-color: darkgreen;
        }
        table,td,th{
            overflow: hidden;
            table-layout: fixed;
        }
        .heading{
            background-color: #333333;
            margin-top: -20px;
            color: white;

        }

    </style>
</head>
<body>
<?php require ('../header.php');?>
    <div class="heading">
        <h2 align="center">Add Record Form</h2>
    </div>
<div class="outer">
    <div class="inner">
        <form action="pstaff_record.php" method="post">
            <table border="1" align="center">
                <tr>
                    <th>Case Id</th>
                    <th>Name</th>
                    <th>date</th>
                    <th>time</th>
                    <th>Select Any One</th>
                    <th>Notes</th>
                </tr>
                <tr>
                    <td><input type="text" name="cno" placeholder="Enter Case Number" value="<?php if(isset($_SESSION['cno1'])){ echo $_SESSION['cno1']; unset($_SESSION['cno1']); } ?>"required><input type="submit" name="show" value="show" class="submitbtn"></td>
                    <td><input type="text" name="name" readonly value="<?php
                        if(isset($cno1)){   echo $data1['name'];}
                        ?>" style="width: 250px"></td>
                     <?php date_default_timezone_set("asia/kolkata");?>
                    <td><input type="text" name="date"  value="<?php echo date("d/m/y")?>" readonly></td>
                    <td><input type="text" name="time" value="<?php echo date("h:i:s"); ?>" readonly></td>
                    <td><input list="mdata" name="mdata">
                        <datalist id="mdata">
                            <option value="X_RAY"></option>
                            <option value="ECG"></option>
                            <option value="Dressing"></option>
                            <option value="Injection"></option>
                        </datalist></td>
                    <td>
                        <textarea name="notes" rows="3" cols="45" placeholder="Enter Notes"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" align="center"><input type="submit" name="submit" value="Add Record" class="submitbtn"></td>
                </tr>
            </table>
        </form>
    </div>

</div>
<?php
if(isset($_POST['submit'])){
    include ('../dbbcon.php');
    $cid=$_POST['cno'];
    $name=$_POST['name'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $mdata=$_POST['mdata'];
    $notes=$_POST['notes'];
    $query="INSERT INTO `p_staff_record`( `caseid`, `name`, `date`, `time`, `m_data`, `notes`) VALUES ('$cid','$name','$date','$time','$mdata','$notes')";
    $run=mysqli_query($con,$query);
    if($run==true){
        ?>
        <script>
            alert("Record Successfully Inserted");
            window.open("paramedical_staff.php","_self");
        </script>
        <?php
    }

}

?>
<?php include ('../footer.php');?>