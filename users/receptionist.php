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
        .dropdown {
            float: left;
            overflow: hidden;
        }

        /* Dropdown button */
        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 20px 16px;
            background-color: inherit;
            font-family: inherit; /* Important for vertical align on mobile phones */
            margin: 0; /* Important for vertical align on mobile phones */
        }

        /* Add a red background color to navbar links on hover */
        .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: #ddd;
            color: black;
        }

        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: lightblue;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        /* Add a grey background color to dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;

        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
<?php require ('../header.php');?>




<div class="topnav">
    <div class="dropdown">
        <button class="dropbtn">Add patient
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="addstudent.php">Add Students Case</a>
            <a href="add%20staff.php">Add Staff Case</a>
            <a href="addothers.php">Add other Case</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Add Case Record
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="addsrecord.php">Add Students Case Record</a>
            <a href="addstaffrecord.php">Add Staff Case Record</a>
            <a href="addothersrecord.php">Add other Case Record</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Show Patient Data
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="showsdata.php">Show Student Data</a>
            <a href="showstaffothers.php">Show Staff Data</a>
            <a href="showothers.php">Show Other Data</a>
        </div>
    </div>

    <a href="generaterecord.php">Generate Record</a>
   
    <div class="dropdown" style="float:right; margin-right: 10px;width: 180px">
        <button class="dropbtn">Welcome <?php echo $_SESSION['uid'];?>
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" style="width: 190px;" >
            <a href="../logout.php">Logout</a>

        </div>
    </div>


</div>
<div class="image">
    <img src="../image/receptionist.jpg" width="1565" height="550">
</div>
</body>
</html>
<?php require ('../footer.php');?>