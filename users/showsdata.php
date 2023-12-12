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
        .heading{
            background-color: #222222;
            color: white;
            margin-top: -20px;
        }
        .show{
            background-color: #cccccc;
            height: 200px;
            margin-top: -20px;
        }
        .box1{
            padding-top: 50px;
        }
        th{
            background-color: #363636;
            color: white;
        }
        tr:hover{
            background-color: #363636;
            color: white;
            font-weight: bold;
        }
        .result{
            background-color: #cccccc;
            margin-bottom: -15px;
        }
        .btn{
            background-color: #4CAF50;
            color: white;
        }
        .btn:hover{
            background-color: darkgreen;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<?php require ('../header.php');?>
<div class="heading">
    <h2 align="center">Display Student Data</h2>
</div>
<div class="show">
    <div class="box1">
        <form action="showsdata.php" method="post">
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
    $query="SELECT * FROM `sform` WHERE `caseid`='$cno' AND `name`!='' AND `casetype`='Student' OR `mno`='$mno' AND `name`!='' AND `casetype`='Student' or `name`='$name' And `name`!='' AND `casetype`='Student'";
    $run=mysqli_query($con,$query);
    while ($data=mysqli_fetch_assoc($run)){
        ?>
        <div class="result">
            <form action="updateshistory.php" method="post" enctype="multipart/form-data">
        <table border="1" width="800px" align="center">
            <tr>
                <th>case Number</th><td><?php echo $data['caseid'];?></td>
                <th rowspan="3">
                    <img src="../sphoto/<?php echo $data['photo']; ?>"style="max-width: 100px"/>
                </th>
            </tr>
            <tr>
                <th>Case Date</th><td><?php echo $data['cdate'];?></td>
            </tr>
            <tr>
                <th>Student Name</th><td><?php echo $data['name']; ?></td>
            </tr>
            <tr>
                <th>Age:</th><td colspan="2"><?php echo $data['age'];?></td>
            </tr>
            <tr>
                <th>gender</th><td colspan="2"><?php echo $data['gender'];?></td>
            </tr>
            <tr>
                <th>College Name</th><td colspan="2"><?php echo $data['cname'];?></td>
            </tr>
            <tr>
                <th>Course</th><td colspan="2"><?php echo $data['course'];?></td>
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
                <th>Card</th><td colspan="2"><?php echo $data['card'];?></td>
            </tr>
            <tr>
                <th>Card Date</th><td colspan="2"><?php echo $data['carddate'];?></td>
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
<?php require ('../footer.php');?>
