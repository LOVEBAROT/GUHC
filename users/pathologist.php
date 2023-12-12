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
    <a href="showmedicines.php">Search Patient Record</a>
    <a href ="addpatientreport.php">Add Patient Report</a>
    <a href ="print_patient_report.php">Print Report</a>
    <a href="show_Patient_report_record.php">Generate Record</a>

    <div class="dropdown" style="float: right;margin-right: 10px">
        <button class="dropbtn">Welcome <?php echo $_SESSION['uid']; ?>
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" style="width: 210px">
            <a href="../logout.php">Logout</a>


        </div>
    </div>
</div>
<div class="image">
   <img src="../image/pathologist3.jpg" width="1567" height="550">
</div>

</body>
</html>
<?php require ('../footer.php');?>