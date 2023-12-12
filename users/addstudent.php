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
        .heading1{
            background-color: #212121;
            color: white;
            margin-top: -20px;
        }
        .sform-outer{
            background-color: #cccccc;
            height: 550px;
            margin-top: -20px;
        }
        .sform{
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
<?php require ('../header.php');?>
<body>

 <div class="heading1">
            <h2 align="center">Student Case Registration Form</h2>
        </div>
<div class="sform-outer">
    <div class="sform">
        <form  action="addstudent.php" method="post" enctype="multipart/form-data">
            <table border="1" align="center">
                <tr>
                    <?php
                    include('../dbbcon.php');
                    $query1="SELECT MAX(caseid)  FROM sform where `casetype`='Student'";
                    $run1 = mysqli_query($con,$query1);
                    while ($data1=mysqli_fetch_assoc($run1)) {
                        $id=$data1['MAX(caseid)'];
                        error_reporting(0);
                        $id=$id+1;

                    }

                    ?>
                    <th>CaseId</th>
                    <td><input type="text" value="<?php echo $id."/".date("y");?>" name="cid" readonly> </td></tr>
                  <tr>  <th>Date</th>

                      <td><input type="text"  name="cdate" value="<?php echo date("d/m/y");?>" required readonly> </td></tr>
                  <tr>  <th>Photo</th>
                    <td><input type="file" name="simg"></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" placeholder="Enter Name" required style="width: 400px;"></td></tr>
                   <tr> <th>Mobile Number</th>
                       <td><input type="number" name="mobno"  placeholder="Enter Mobile Number"  required></td></tr>

                <tr> <th>Weight</th>
                    <td colspan="1"><input type="number" name="weight" placeholder="Enter Weight" required> </td>
                </tr>
                <tr>
                    <th>Select Gender</th>
                    <td><input type="radio" name="gender" value="male" required style="width: 50px">Male<input type="radio" name="gender" value="female"  required style="width: 50px">Female</td></tr>
                    <tr><th>Select Dob</th>
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
                   <tr> <th >Card Date</th>
                    <td><input type="text"  name="carddate" value="<?php echo date('d/m/y');?>" readonly></td>
                </tr>
                <tr>
                    <th>Select College</th>
                    <td > <input list="cname" name="cname" style="width: 400px" required>
                        <datalist id="cname">
                            <option value="B.K.School Of Business Mangement"></option>
                            <option value="Som-Lalit College"></option>
                            <option value="Naional College"></option>
                            <option value="H.K College Of Commerce"></option>
                            <option value="Gujarat College"></option>
                            <option value="K.K Shastri College"></option>
                            <option value="K.K Jarodwala Maninagar Science College"></option>
                        </datalist> </td></tr>
                   <tr> <th>Course</th>
                       <td><input list="course" name="course" style="width: 400px" required>
                           <datalist id="course">
                               <option value="B.com"></option>
                               <option value="M.com"></option>
                               <option value="BCA"></option>
                               <option value="MCA"></option>
                               <option value="P.hd"></option>
                           </datalist> </td></tr>
                   <tr><th>Card</th>
                       <td ><input type="radio" name="card" value="card" required style="width: 50px">Card<input type="radio" name="card" value="notcard"  required style="width: 50px">Not-Card</td></tr>
                </tr>
                <tr>
                    <th>Address</th>
                    <td colspan="3"><textarea name="add" placeholder="Enter Address" required style="height: 50px; width: 400px;"></textarea> </td></tr>
                   <tr> <th>Rupee</th>
                    <td><input type="number" name="rupee" placeholder="Enter Rupee" required></td>
                </tr>
                <tr>
                    <input type="hidden" name="casetype" value="Student">
                </tr>
                <tr>

                </tr>


                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Submit" class="sbtn"></td>
                </tr>


            </table>
        </form>
    </div>
</div>

</body>
</html>
<?php
$mobno1=$_POST['mobno'];
if(strlen($mobno1)<10 && isset($mobno1)){
    ?>
    <h4 align="center" style="color: red;background-color: #cccccc;margin-top: -10px;margin-bottom:1px">Mobile Number Is Less Than 10 Digits.Re-Enter Mobile Number</h4>
    <?php

}elseif (isset($_POST['submit'])){
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $birthDate = $year.'-'.$month.'-'.$day;

    $dob = new DateTime($birthDate);  //DateTime Object

    $interval = $dob->diff(new DateTime);
   $cid= $_POST['cid'];
   $cdate= $_POST['cdate'];
    $imgname=$_FILES['simg']['name'];
    $tmpname=$_FILES['simg']['tmp_name'];
    move_uploaded_file($tmpname,"../sphoto/$imgname");
    $name= $_POST['name'];
    $age= $interval->y;
    $gender= $_POST['gender'];
    $cname= $_POST['cname'];
    $course = $_POST['course'];
    $carddate= $_POST['carddate'];
    $add= $_POST['add'];
    $rupee=$_POST['rupee'];
    $mobno= $_POST['mobno'];
    $weight = $_POST['weight'];
    $card = $_POST['card'];
    $casetype=$_POST['casetype'];
  

$query="INSERT INTO `sform`( `caseid`, `cdate`, `photo`, `name`, `age`, `gender`, `cname`, `course`, `carddate`, `address`, `mno`, `weight`, `card`,`casetype`) 
VALUES ('$cid','$cdate','$imgname','$name','$age','$gender','$cname','$course','$carddate','$add','$mobno','$weight','$card','$casetype')";
    $run = mysqli_query($con,$query);
$query2="INSERT INTO `srecord`(`caseno`, `date`, `name`, `gender`, `rupee`, `ctype`)
 VALUES ('$cid','$cdate','$name','$gender','$rupee','$casetype')";
    $run2 = mysqli_query($con,$query2);
if($run==true && $run2==true){
    ?>
    <script>
        alert("Student data inserted");
        window.open("receptionist.php","_self");
    </script>
    <?php
}

}
?>
<?php include ('../footer.php');?>