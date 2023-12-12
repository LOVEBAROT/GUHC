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
            background-color: #cccccc;
            margin-top: -20px;
            height: 300px;
        }
        .inner{
            padding-top: 80px;
        }
        th{
            background-color:#363636;
            color: white;
        }
        tr:hover{
            background-color:#363636;
            color: white;
        }
        .sbtn{
            background-color: #4CAF50;
            color: white;
            width: 200px;
        }
        .sbtn:hover{
            background-color: darkgreen;
            font-weight: bold;
        }
    </style>
</head>
</html>
<?php  require ('../header.php');?>
<div class="heading">
    <h2 align="center" style="background-color: #212121;color: white;margin-top: -6px">Change User Password</h2>
</div>
<div class="outer">
    <div class="inner">
        <form action="change_pass.php" method="post">
            <table border="1" align="center">
                <tr>
                    <th>Select user:</th>
                    <td><select name="usertype" required style="width: 170px;">
                            <option></option>
                            <option value="doctor" >Doctor</option>
                            <option value="pharmacist">Pharmacist</option>
                            <option value="lab_technician">Lab_Technician</option>
                            <option value="receptionist">Receptionist</option>
                            <option value="paramedical_staff">Paramedical_staff</option>
                            <option value="others">Others</option>

                        </select></td>
                </tr>

                <tr>
                    <th>New Password</th>
                    <td>
                        <input type="password" name="npass" required placeholder="Enter New Password">
                    </td>
                </tr>
                <tr>
                    <th>Confirm Password</th>
                    <td>
                        <input type="password" name="renpass" required placeholder="Enter New Password Again ">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Change Password" name="submit" class="sbtn">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
if (isset($_POST['submit'])){
    include ('../dbbcon.php');
    $utype=$_POST['usertype'];
    $npass=md5($_POST['npass']);
    $renpass=md5($_POST['renpass']);
    $query="SELECT * FROM `multiuserlogin` where `usertype`='$utype'";
    $run=mysqli_query($con,$query);
    $data=mysqli_fetch_assoc($run);
    $old_pass=$data['password'];
    $usertype=$data['usertype'];
    if($npass==$renpass){
        $query1="UPDATE `multiuserlogin` SET `password`='$npass' where `usertype`='$usertype'";
        $run1=mysqli_query($con,$query1);
        if($run1==true){
            ?>
            <script>
                alert('Password Successfully Changed..!');
                window.open('doctor.php','_self');
            </script>
            <?php
        }
    }else if($npass != $renpass){
        ?>
        <script>
            alert('New Password And Confirm Password is Does Not Match...!')
        </script>
        <?php
    }

}
?>
<?php require ('../footer.php');?>