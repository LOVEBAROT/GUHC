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
        .showstudents{
            background-color: #cccccc;
        }
        tr:hover{
            background-color: #363636;
            font-weight: bold;
            color: white;
        }
        table,td,th{
            overflow: hidden;
            table-layout: fixed;
        }
        .sbox{
            padding-top: 10px;
        }
    </style>
</head>
<body>
<?php require ('../header.php');?>
<div class="showstudents">

<?php error_reporting(0);
include ('../dbbcon.php');
$date=date("d/m/y");
$query1="SELECT `caseno` FROM srecord WHERE date='$date' AND `ctype`='Student'";
$run1=mysqli_query($con,$query1);
while ($data1=mysqli_fetch_assoc($run1)){
    $caseno[]=$data1['caseno'];
}$caseid=join("','",$caseno);
?>
<?php
include ('../dbbcon.php');


 //$cid=$_POST['cid'];


$query="SELECT * FROM `sform` WHERE `caseid` IN ('$caseid') And `name`!=''";
   
    $run=mysqli_query($con,$query);
    if(mysqli_num_rows($run)<1){
       ?> 
            <script>
            alert("sorry...No Student Found...!");
            window.open('doctor.php','_self')
            </script>
       <?php
    }else
    {

        $count=0;
        while ($data=mysqli_fetch_assoc($run)){
            $count++;
            ?>
            <div class="sbox" style="margin-right: auto;margin-left: auto" align="center">
                <table border="1" align="center" style="width: 1350px">
                    <tr style="background-color: #363636;color: white">
                        <th width="100">Sr.No</th>
                        <th width="100">Case No</th>
                        <th width="300">Photo</th>
                        <th width="400">Name</th>
                        <th width="100">Gender</th>
                        <th  width="200">Add Medical Record</th>
                    </tr>
                    <tr align="center">
                        <td><?php echo $count?></td>
                        <td><?php echo $data['caseid'];?></td>
                        <td><img src="../sphoto/<?php echo $data['photo']; ?>"style="max-width: 100px"/> </td>
                        <td><?php echo $data['name'];?></td>
                        <td><?php echo $data['gender'];?></td>
                        <td style="background-color: #363636;color: white"><a href="updatestudentform.php?sid= <?php echo $data['id']; ?>&caseid=<?php echo $data['caseid'];?>" style="color: white" class="btn_click">Add Medical Record</a></td>
                    </tr>

                </table>
            </div>
 <?PHP

        }

}

?>
</div>
</body>
</html>
<?php include ('../footer.php');?>