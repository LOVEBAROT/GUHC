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
               .heading{
            background-color: #333333;
            margin-top: -20px;
            color: white;

        }

        th{
            background-color:#333333;
            color: white;

        }
        tr:hover{
            background-color: #333333;
            color: white;
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
        .form{
            background-color: #cccccc;
            margin-top: -20px;
            margin-bottom: -15px;
            height: 200px;
        }
        .form{
            padding-top: 50px;
        }
    </style>
</head>
<body>
<?php require ('../header.php');?>

</body>
</html>
<div class="heading">
    <h2 align="center">Add Others Case Record Form</h2>
</div>
<div class="outer">
    <div class="form">
        <form action="addothersrecord.php" method="post">
            <table border="1" align="center" width="1300px">
                <tr>
                    <th>Case No</th>
                    <th>Date</th>
                    <th>Rupee</th>
                    <th>Name</th>
                    <th>Select Gender</th>
                </tr>
                <tr>
                    <td><input type="text" name="cno" placeholder="Enter Student Case Number"  value="<?php if(isset($_SESSION['cno1'])){ echo $_SESSION['cno1']; unset($_SESSION['cno1']); } ?>"required> <input type="submit" name="show" value="show" class="btn"> </td>

                    <td><input type="text" name="date" value="<?php echo date("d/m/y"); ?>" name="date"readonly> </td>
                    <td><input type="number" name="rupee" placeholder="Enter Rupees"></td>
                    <td><input type="text" name="name" placeholder="Enter Name" readonly value="<?php
                        if(isset($cno1)){   echo $data1['name'];}
                        ?>" style="width: 350px"></td>
                    <td><input type="radio" value="male" name="gender">Male<input type="radio" name="gender" value="female">Female</td>
                    <input type="hidden" name="ctype" value="Others">
                </tr>
                <tr>
                    <td colspan="11" align="center"><input type="submit" name="submit" value="Add Data" class="btn"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
include ("../dbbcon.php");
if(isset($_POST['submit']))
{
    $cno=$_POST['cno'];
    $date=$_POST['date'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $rupee=$_POST['rupee'];
    $ctype=$_POST['ctype'];

    $query="INSERT INTO `srecord`( `caseno`, `date`,  `name`, `gender`,`rupee`,`ctype`)
 VALUES ('$cno','$date','$name','$gender','$rupee','$ctype')";
    $result=mysqli_query($con,$query);
    if($result==true){
        ?>
            <script>
                alert("Others Record Inserted");
                window.open('receptionist.php','_self');
            </script>
        <?php
    }else{
        ?>
            <script>
                alert("Data Not Inserted");
            </script>
        <?php
    }

}
?>
<?php include ("../footer.php");?>