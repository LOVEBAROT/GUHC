
<?php
include ('dbbcon.php');
include ('header.php');
  session_start();
?>

    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <title>Login</title>
        <style>
            select{
                width: 200px;
                background-color: lightgrey;
                font-size: 15px;
                font-family: "Arial Black";
            }
            .lbtn{
                background-color: #4CAF50;
                color: white;
                width: 250px;
                height: 25px;
                font-size: 18px;
            }
            tr:hover{
                background-color: #363636;
                color: white;
            }
            .lbtn:hover{
                background-color: darkgreen;
                font-weight: bold;
            }
            .loginform{
                background-image: url("image/doc6.jpg");
            }
        </style>
        <script>
       <SCRIPT language=JavaScript>

<!-- http://www.spacegun.co.uk -->

var message = "function disabled";

function rtclickcheck(keyp){ if (navigator.appName == "Netscape" && keyp.which == 3){ alert(message); return false; }

if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) { alert(message); return false; } }

document.onmousedown = rtclickcheck;

</SCRIPT>
    </script>
        <div class="heading1">
            <h2>Login Your Account</h2>
        </div>
    </head>
    <body>
    <div class="loginform">
        <form method="POST"style="alignment: center">
            <div class="logintab">
                <table border="1" align="center" width="400px">
                    <tr>
                        <th>Select user type: <select name="usertype">
                                <option>--Select Any One--</option>
                                <option value="Doctor" >Doctor</option>
                                <option value="Pharmacist">Pharmacist</option>
                                <option value="Lab_Technician">Lab_Technician</option>
                                <option value="Receptionist">Receptionist</option>
                                <option value="Paramedical_Staff">Paramedical_staff</option>
                                <option value="others">Others</option>

                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th>Username: <input type="TEXT" name="user" required placeholder="enter username" style="font-size: 15px"></th>
                    </tr>
                    <tr>
                        <th>Password: <input type="password" name="pass" required placeholder="enter Password" style="font-size: 15px"></th>
                    </tr>
                       

                    <tr>
                        <td align="center"><input type="submit" name="Login" value="Login" class="lbtn"></td>
                    </tr>

                </table>
            </div>

        </form>
    </div>
    </body>
    </html>

    <?php

    if(isset($_POST['Login'])){
    $username=$_POST['user'];
    $password=md5($_POST['pass']);
    $usertype=$_POST['usertype'];
    $query="SELECT * FROM multiuserlogin WHERE username='".$username."' and password='".$password."' and usertype='".$usertype."'";
    $result = mysqli_query($con, $query);
    if($result){
    while($row = mysqli_fetch_array($result)){
        echo '<script type="text/javascript">alert("you are logined successfully and you are logined as '. $row['usertype'] . '")</script>';

    }
  
    $_SESSION['uid']=$usertype;
    if(mysqli_num_rows($result)>0 && $usertype=="Doctor"){
    ?>
    <script type="text/javascript">

        window.location.href = "users/doctor.php";


    </script>
    <?php

}else if(mysqli_num_rows($result)>0 && $usertype=="Pharmacist"){
    ?>
    <script type="text/javascript">

        window.location.href = "users/pharmacist.php";
    </script>
    <?php
}else if(mysqli_num_rows($result)>0 && $usertype=="Lab_Technician"){
        ?>
        <script type="text/javascript">

            window.location.href = "users/pathologist.php";
        </script>
        <?php
    }else if(mysqli_num_rows($result)>0 && $usertype=="Receptionist"){
        ?>
        <script type="text/javascript">

            window.location.href = "users/receptionist.php" ;

        </script>
        <?php
    }else if(mysqli_num_rows($result)>0 && $usertype=="Paramedical_Staff"){
        ?>
        <script type="text/javascript">

            window.location.href = "users/paramedical_staff.php" ;

        </script>
        <?php
    }else if(mysqli_num_rows($result)>0 && $usertype=="others"){
        ?>
        <script type="text/javascript">

            window.location.href = "users/others.php" ;

        </script>
        <?php
    }

    }
    if (!mysqli_num_rows($result)>0){
    ?>
        <script>
            alert('Please Enter Valid Username And Password OR Select User Type');
        </script>
        <?php
}
}
    include ('footer.php');
?>




