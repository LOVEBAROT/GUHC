<?php

session_start();

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
            background-color: #999999;
            height: 300px;
        }
        .inner{
            padding-top: 100px;
        }
        th{
            background-color: #363636;
            color: white;
            font-weight: bold;
        }
        tr:hover{
            background-color: #363636;
            color: white;
            font-weight: bold;
        }
        .sbtn{
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            width: 100px;
        }
        .sbtn:hover{
            background-color: darkgreen;
        }
        .result{
            background-color: #999999;
        }
        .heading{
            background-color: #222222;
            color: white;
            margin-top: -20px;
            margin-bottom: -20px;
        }
        .result{
            padding-top: 10px;
        }
        table,td,th{
            overflow: hidden;
            table-layout: fixed;
        }
    </style>
</head>
<body>
<?php require ('../header.php');?>
<div class="heading">
    <h2 align="center">Print Patient Report</h2>
</div>
<div class="outer">
    <div class="inner">
        <form action="print_patient_report.php" method="post">
            <table border="1" align="center" width="400px">
                <tr>
                    <th>
                        CaseId:
                    </th>
                    <td>
                        <input type="text" name="cid" required placeholder="Enter Case Number" style="width: 300px">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Show" class="sbtn"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    include ('../dbbcon.php');
    $cid=$_POST['cid'];
    $query="SELECT * FROM `patient_report` WHERE `caseid`='$cid'";
    $run=mysqli_query($con,$query);
    while ($row=mysqli_fetch_array($run)){
        ?>
        <div class="result">
        <table border="1" align="center" width="1300px">
            <?php
            $file_filed=$row['report'];
            $file_show="../Patient_Reports/$file_filed";
            ?>
            <tr>
                <th width="100">Date</th>
                <th width="300">Name</th>
                <th width="200">Report-Type</th>
                <th width="350">Report</th>
                <th width="500">Notes</th>
            </tr>
            <tr>
                <td align="center"><?php echo date('y/m/d',strtotime($row['date']));?></td>
                <td align="center"><?php echo $row['name'];?></td>
                <td align="center"><?php echo $row['report_type'];?></td>
                <td>
                    <?php
                    echo "<div align=center><a href='$file_show' style='color: white;background-color: #333333;font-weight: bold' target='_blank'>$file_filed</a></div>"
                    ?>
                </td>
                <td align="center"><?php echo $row['notes'];?></td>
            </tr>

        </table>
        <?php
    }
}
?><?php include ('../footer.php');?>
