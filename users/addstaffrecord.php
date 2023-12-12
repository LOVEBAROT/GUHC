<?php

session_start();

if (isset($_POST['show'])){
    include ('../dbbcon.php');
    $cno1=$_POST['bno'];
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
<head><link rel="stylesheet" type="text/css" href="../css/style.css">
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
        .outer{
            background-color: #cccccc;
            height: 200px;
            margin-top: -20px;
        }
        .inner{
            padding-top: 50px;
        }
    </style>
</head>
<body>
<?php require ('../header.php');?>
<div class="heading">
    <h2 align="center">Add Staff Book Record Form</h2>
</div>
<div class="outer">
    <div class="inner">
        <form action="addstaffrecord.php" method="post" >
            <table border="1" align="center" width="1300px">
                <tr style="background-color: #555555;color: white">
                    <th>BooK No</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Relation</th>
                    <th>Rupee</th>
                </tr>
                <tr>
                    <td><input type="text" name="bno" placeholder="Enter Book No" value="<?php if(isset($_SESSION['cno1'])){ echo $_SESSION['cno1']; unset($_SESSION['cno1']); } ?>"> <input type="submit" name="show"  value="show" class="btn"></td>
                    <td><input type="text"  name="date" value="<?php echo date("d/m/y");?>" required readonly> </td>
                    <td><input type="text" name="name" value="<?php
                        if(isset($cno1)){   echo $data1['name'];}
                        ?>" style="width: 350px"></td>
                    <td><input type="radio" value="male" name="gender">Male<input type="radio" name="gender" value="female">Female</td>
                    <td><input type="radio" value="Self" name="relation">Self<input type="radio" name="relation" value="relative">Relative</td>
                    <td><input type="number" name="rupee" placeholder="Enter Rupee"></td>
                    <input type="hidden" value="Staff" name="ctype">
                </tr>
                <tr >
                    <td colspan="7" align="center"><input type="submit" name="submit" value="Add Data" class="btn"></td>
                </tr>
            </table>
        </form>
</div>

</div>
</body>
</html>

<?php
include ("../dbbcon.php");
if(isset($_POST['submit']))
{

    $bno=$_POST['bno'];
    $date=$_POST['date'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $relation=$_POST['relation'];
    $rupee=$_POST['rupee'];
    $ctype=$_POST['ctype'];

    $query="INSERT INTO `srecord`( `sbookno`, `date`,`name`, `gender`, `srelation`,`rupee`,`ctype`)
 VALUES ('$bno','$date','$name','$gender','$relation','$rupee','$ctype')";
    $result=mysqli_query($con,$query);
    if($result==true){
        ?>
        <script>
            alert("Student Record Inserted");
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
<?php require ('../footer.php');?>