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
    <title>SearchStudents</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
        tr:hover{
            background-color: #222222;
            color: white;
            font-weight: bold;
        }
        th{
            background-color: #222222;
            color: white;
        }
        .sbtn{
            height: 25px;
            background-color: #4CAF50;
            color: white;
        }
        .sbtn:hover{
            background-color: darkgreen;
            font-weight: bold;
        }
        table,td,th{
            overflow: hidden;
            table-layout: fixed;
        }
    </style>
</head>
<body>
<?php require ('../header.php');?>
<div class="searchform" style="margin-left: auto;margin-right: auto; background-color: #cccccc; height: 300px; padding-left: 450px;padding-top: 30px">
    <form action="searchstudentmannauly.php" method="post">
        <div class="searchtab" style="padding: 70px">
            <table border="1" style="width: 400px; background-color: #cccccc;margin-left: 100px">
                <tr>
                    <th>Enter CaseId:</th>
                    <td><input type="text" name="cid" placeholder="Enter Patient Case Id" required> </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Search" name="submit" class="sbtn"></td>
                </tr>

            </table>
        </div>

    </form>
</div>
<?php
if(isset($_POST['submit'])){
    include ('../dbbcon.php');
    $cid=$_POST['cid'];
    $query="SELECT * FROM `sform` WHERE `caseid`='$cid' AND `name`!=''";
    $run=mysqli_query($con,$query);
if(mysqli_num_rows($run)<1){
    ?>
    <script>
        alert("sorry...No record found..Enter correct CaeID");
    </script>
<?php
}else
{

$count=0;
while ($data=mysqli_fetch_assoc($run)){
$count++;
?>
    <div class="sbox" style="margin-right: auto;margin-left: auto;background-color: #cccccc">
        <table border="1" align="center" style="width: 1300px">
            <tr style="background-color: #d8c499;">
                <th width="100">Sr.No</th>
                <th width="100">Case No</th>

                <th width="300">Name</th>
                <th width="100">Gender</th>
                <th width="200">Add Medical Record</th>
            </tr>
            <tr align="center">
                <td><?php echo $count?></td>
                <td><?php echo $data['caseid'];?></td>
                <td><?php echo $data['name'];?></td>
                <td><?php echo $data['gender'];?></td>
                <td style="background-color: darkgreen;"><a href="updatestudentform.php?sid= <?php echo $data['id']; ?>&caseid=<?php echo $data['caseid'];?>" style="color: white;font-weight: bold">Add Medical Record</a></td>
            </tr>

        </table>
    </div>
    <?PHP

}

}

}
?><?php include ('../footer.php'); ?>
