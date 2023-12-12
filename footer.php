
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="footer">
    <h3 align="center" style="color: white;margin-top: -13px">Gujarat University Health Centre <h4 align="center" style="margin-top: -20px;color: white;;font-size: 20px "">&copy Copyright 2019.All Rights Reserved</h4></h3>
    <?php date_default_timezone_set("asia/kolkata");?>


    <?php
    if(isset($_SESSION['uid']) && $_SESSION['uid']=='Lab_Technician')
    {
        //$user_type=$_SESSION['uid'];
        ?>
        <a href="pathologist.php" style="float: right;color: white;font-weight: bold;margin-top: -60px;margin-right: 20px;font-size: 15px ">Home</a>
        <?php
    } elseif(isset($_SESSION['uid']) && $_SESSION['uid']=='Doctor')
    {
        //$user_type=$_SESSION['uid'];
        ?>
        <a href="doctor.php" style="float: right;color: white;font-weight: bold;margin-top: -60px;margin-right: 20px;font-size: 15px ">Home</a>
        <?php
    }elseif(isset($_SESSION['uid']) && $_SESSION['uid']=='Receptionist')
    {
        //$user_type=$_SESSION['uid'];
        ?>
        <a href="receptionist.php" style="float: right;color: white;font-weight: bold;margin-top: -60px;margin-right: 20px;font-size: 15px ">Home</a>
        <?php
    }elseif(isset($_SESSION['uid']) && $_SESSION['uid']=='others')
    {
        //$user_type=$_SESSION['uid'];
        ?>
        <a href="Others.php" style="float: right;color: white;font-weight: bold;margin-top: -60px;margin-right: 20px;font-size: 15px ">Home</a>
        <?php
    } elseif(isset($_SESSION['uid']) && $_SESSION['uid']=='Paramedical_Staff')
    {
        //$user_type=$_SESSION['uid'];
        ?>
        <a href="paramedical_staff.php" style="float: right;color: white;font-weight: bold;margin-top: -60px;margin-right: 20px;font-size: 15px ">Home</a>
        <?php
    } elseif(isset($_SESSION['uid']) && $_SESSION['uid']=='Pharmacist')
    {
        //$user_type=$_SESSION['uid'];
        ?>
        <a href="pharmacist.php" style="float: right;color: white;font-weight: bold;margin-top: -60px;margin-right: 20px;font-size: 15px ">Home</a>
        <?php
    }  else {
        ?>
        <a href="index.php" style="float: right;color: white;font-weight: bold;margin-top: -60px;margin-right: 20px;font-size: 15px ">Home</a>
        <?php
    }

    ?>


</div>
</body>
</html>