<?php
include ('../dbbcon.php');
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
        th{
            background-color: #363636;
            color: white;
        }

        tr:hover{
            background-color: #363636;
            color: white;
        }
        .show{
            background-color: #cccccc;
            height: 200px;
            margin-top: -20px;
        }
        .box1{
            padding-top: 50px;
        }
        .box2{
            padding-top: 150px;
        }
        .btn{
            background-color: #4CAF50;
            color: white;
        }
        .btn:hover{
            background-color: darkgreen;
            font-weight: bold;
        }
        .heading{
            background-color: #222222;
            color: white;
            margin-top: -20px;
        }
        .result{
            background-color: #cccccc;
            margin-bottom: -20px;
        }
    </style>
</head>
<?php require ('../header.php');?>
<div class="heading">
    <h2 align="center">Display Others Case Data</h2>
</div>
<div class="show">
    <div class="box1">
        <form action="showothers.php" method="post">
            <table align="center" border="1">
                <tr>
                    <th>Enter Case Number</th>
                    <td>
                        <input type="text" name="cno" placeholder="Enter Case Number">
                    </td>
                </tr>
                <tr>
                    <th>Enter Mobile Number</th>
                    <td>
                        <input type="text" name="mno" placeholder="Enter  Mobile Number">
                    </td>
                </tr>
                <tr>
                    <th>Enter name</th>
                    <td>
                        <input type="text" name="name" placeholder="Enter name">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="update" value="Show" class="btn"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</html>
<?php
if(isset($_POST['update'])){
    include ('../dbbcon.php');
    $cno=$_POST['cno'];
    $mno=$_POST['mno'];
    $name=$_POST['name'];
    $query="SELECT * FROM `sform` WHERE `caseid`='$cno' AND `name`!='' AND `casetype`='Others' OR `mno`='$mno' AND `name`!=''  AND `casetype`='Others' or `name`='$name' And `name`!=''  AND `casetype`='Others'";
    $run=mysqli_query($con,$query);
    while ($data=mysqli_fetch_assoc($run)){
        ?>
        <div class="result">
            <form action="updatestaffothers.php" method="post" enctype="multipart/form-data">
                <table border="1" width="800px" align="center">
                    <tr>
                        <th>case Number</th><td><?php echo $data['caseid'];?></td>

                    </tr>
                    <tr>
                        <th>Case Date</th><td><?php echo $data['cdate'];?></td>
                    </tr>
                    <tr>
                        <th>Student Name</th><td><?php echo $data['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Department Name</th><td><?php echo $data['department']; ?></td>
                    </tr>
                    <tr>
                        <th>Designation</th><td><?php echo $data['Designation']; ?></td>
                    </tr>
                    <tr>
                        <th>Age:</th><td colspan="2"><?php echo $data['age'];?></td>
                    </tr>
                    <tr>
                        <th>gender</th><td colspan="2"><?php echo $data['gender'];?></td>
                    </tr>
                    <tr>
                        <th>Address</th><td colspan="2"><?php echo $data['address'];?></td>
                    </tr>
                    <tr>
                        <th>Mobile Number</th><td colspan="2"><?php echo $data['mno'];?></td>
                    </tr>
                    <tr>
                        <th>Weight</th><td colspan="2"><?php echo $data['weight'];?></td>
                    </tr>
                    <tr>
                        <th>Case Type</th><td colspan="2"><?php echo $data['other_casetype'];?></td>
                    </tr>
                    <tr>    <th>Patient Copy</th>
                        <td><img src="../OtherCaseImage/<?php echo $data['photo']; ?>"style="width: 500px;height: 600px"/> </td>
                    </tr>
                    <tr>
                        <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                        <td colspan="3" align="center" ><input type="submit" name="Update" value="Update Data" class="btn"></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php

    }

}

?>
<?php include ('../footer.php');?>
