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
        .form{
            background-color: lightgrey;
            height: 550px;
            margin-top: -20px;
        }
        .table{
            padding-top: 50px;
        }
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
            color: white;
        }
        .sbtn:hover{
            background-color: darkgreen;
            font-weight: bold;
        }
    </style>
</head>
</html>
<body>
<?php require ('../header.php');?>
<div class="heading">
    <h2 align="center">Add Staff Case Book</h2>
</div>
<div class="form">
<div class="table">
    <form action="add%20staff.php" method="post" enctype="multipart/form-data">
        <table border="1" align="center" width="550px">
            <tr>
                <th>Book No:</th>
                <td><input type="text" name="bno" value="<?php echo "S/";?>" required></td><tr>
              <tr> <th>Name</th>
                <td><input type="text" name="name" placeholder="Enter Name"  required style="width: 400px"></td></tr>
                <tr><th>Date</th>
                <td><input type="text" value="<?php echo date("d/m/y");?>" name="date" readonly></td>
            </tr>
            <tr>
                <th>Mobile No</th>
                <td><input type="number" name="mobno" required placeholder="Enter Mobile Number"></td></tr>
                <tr><th>Address</th>
                    <td><textarea name="add" placeholder="Enter Address" required style="height: 50px; width: 400px;"></textarea></td></tr>
            </tr>
            <tr>
                <th>Select Dob:</th>
                <td><?php
                    for ($i = 1; $i <= 31; $i++)
                    {
                        $arDays[] = $i;
                    }
                    echo '<select name="day">';
                    foreach ($arDays as $option) {
                        echo '<option value="'.$option.'">'.$option.'</option>';
                    }
                    echo '</select>';
                    ?>
                    <select name="month" required>
                        <option value="01">Jan</option>
                        <option value="02">Feb</option>
                        <option value="03">Mar</option>
                        <option value="04">Apr</option>
                        <option value="05">May</option>
                        <option value="06">Jun</option>
                        <option value="07">Jul</option>
                        <option value="08">Aug</option>
                        <option value="09">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>
                    <?php
                    $currentYear = date("Y");
                    for ($i = $currentYear; $i >= 1920; $i--)
                    {
                        $arYears[] = $i;
                    }
                    echo '<select name="year">';
                    foreach ($arYears as $option) {
                        echo '<option value="'.$option.'">'.$option.'</option>';
                    }
                    echo '</select>';
                    ?>
                </td></tr>
                <tr>
                <th>Select Department</th>
                <td>
                    <input list="dept" name="dept">
                    <datalist id="dept">
                        <option value="Health centre"></option>
                        <option value="Computer"></option>
                        <option value="Law Bhavan"></option>
                        <option value="Tower(office)"></option>
                        <option value="Account"></option>
                    </datalist>
                </td></tr>
                <tr><th>Select Designation</th>
                <td>
                    <input list="Designation" name="Designation">
                    <datalist id="Designation">
                        <option value="Professor"></option>
                        <option value="Asst professor"></option>
                        <option value="Clerk"></option>
                        <option value="Peon"></option>
                        <option value="Auditer"></option>
                    </datalist>
                </td>

            </tr>
            <tr>
                <th>Select Gender:</th>
                <td><input type="radio" name="gender" value="male" required style="width: 50px">Male<input type="radio" name="gender" value="female"  required style="width: 50px">Female</td></tr>
               <tr> <th>Weight</th>
                   <td><input type="number" name="weight" placeholder="Enter Weight" required></td></tr>
                <input type="hidden" name="casetype" value="Staff">
               <tr> <th>Office Audit Copy</th>
                <td><input type="file" name="simg"></td>
            </tr>
            <tr>
                <th>Relation</th>
                <td><input type="radio" value="Self" name="relation" required>Self<input type="radio" name="relation" required value="relative">Relative</td>
            </tr>
            <tr>
                <th>Rupee</th>
                <td><input type="number" name="rupee" placeholder="Enter Rupee"></td>

            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="submit" class="sbtn"></td>
            </tr>
        </table>
    </form>
</div>
</div>
</body>
<?php
include ('../dbbcon.php');
error_reporting(0);
$bno1=$_POST['bno'];
$query3="SELECT `caseid` from sform WHERE `caseid`='$bno1'";
$run3=mysqli_query($con,$query3);
$data3=mysqli_fetch_assoc($run3);
$caseid=$data3['caseid'];
if(isset($_POST['submit']) && $_POST['bno']==$caseid){
    ?>
    <h4 align="center" style="color: red;background-color: #cccccc;margin-top: -10px;margin-bottom:1px">This Book Number Is Already Exist.</h4>
    <?php

}elseif (isset($_POST['submit']) && strlen($_POST['mobno'])<10){
    ?>
    <h4 align="center" style="color: red;background-color: #cccccc;margin-top: -10px;margin-bottom:1px">Mobile Number Is Less Than 10 Digits.Re-Enter Mobile Number</h4>
    <?php
}elseif (isset($_POST['submit'])){
    include ('../dbbcon.php');
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $birthDate = $year.'-'.$month.'-'.$day;

    $dob = new DateTime($birthDate);  //DateTime Object

    $interval = $dob->diff(new DateTime);
   $bno=$_POST['bno'];
   $name=$_POST['name'];
   $date=$_POST['date'];
   $mobno=$_POST['mobno'];
   $add=$_POST['add'];
   $age=$interval->y;
   $dept=$_POST['dept'];
   $Designation=$_POST['Designation'];
   $gender=$_POST['gender'];
   $weight=$_POST['weight'];
    $casetype=$_POST['casetype'];
    $imgname=$_FILES['simg']['name'];
    $tmpname=$_FILES['simg']['tmp_name'];
    $relation=$_POST['relation'];
    $rupee=$_POST['rupee'];
    move_uploaded_file($tmpname,"../StaffAuditCopy/$imgname");
   $query="INSERT INTO `sform`( `caseid`, `name`, `cdate`, `mno`, `address`, `age`, `department`, `Designation`, `gender`, `weight`,`casetype`,`photo`) 
VALUES ('$bno','$name','$date','$mobno','$add','$age','$dept',' $Designation','$gender','$weight','$casetype','$imgname')";
   $run=mysqli_query($con,$query);
    $query2="INSERT INTO `srecord`(`sbookno`, `date`, `name`, `gender`, `srelation`, `rupee`, `ctype`)
 VALUES ('$bno','$date','$name','$gender','$relation','$rupee','$casetype')";
    $run2 = mysqli_query($con,$query2);
   if($run==true){
       ?>
       <script>
           alert("Staff Book Successfully Insrted");
           window.open("receptionist.php","_self");
       </script>
       <?php
   }
}
?>
<?php include ('../footer.php');?>