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
        .heading{
            background-color: #222222;
            color: white;
            margin-top: -20px;
        }
        .outerblock{
            background-color: #cccccc;
            margin-top: -20px;
            height: 400px;
        }
        .innerblock{
            padding-top: 100px;
            padding-left: 630px;
        }
        tr:hover{
            background-color: #333333;
            color: white;
        }
        th{
            background-color: #333333;
            color: white;
        }
        .sbtn{
            background-color: #4CAF50;
            color: white;

        }
        .sbtn:hover{
            background-color: darkgreen;
        }
        .medshow{
            background-color:#cccccc;
            padding-top: 10px;
            margin-bottom: -18px;
        }

        table,td,th{
            overflow: hidden;
            table-layout: fixed;
        }
        input:hover{
            background-color: #333333;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php require ('../header.php');?>
<div class="heading">
    <h2 align="center">Give Medicines</h2>
</div>
<div class="outerblock">
    <div class="innerblock">
        <form action="givemedicines.php" method="get">
            <table border="1">
                <tr>
                    <td>Enter Case Number</td><td><input type="text" placeholder="Enter patient Case Id" required name="cno"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Show Medicines" class="sbtn"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<?php
if(isset($_GET['submit'])){
    include ('../dbbcon.php');
    $cno=$_GET['cno'];
    $date=date("d/m/y");
    $query="SELECT * FROM sform WHERE caseid='$cno' And 	Treatments!='' and `ge`!='' and `date`='$date'";
    $run=mysqli_query($con,$query);
    $query1="SELECT * FROM sform WHERE caseid='$cno'";
    $run1=mysqli_query($con,$query1);
    $data1=mysqli_fetch_assoc($run1);

    while ($data=mysqli_fetch_assoc($run)){
        ?>
        <div class="medshow">

                    <form action="addmedicinesrecord.php" method="post">
                        <table border="1" align="center">
                            <tr>
                                <th width="100">Date</th>
                                <th width="100">Caseid</th>
                                <th width="300">Name</th>
                                <th width="100">Current Time</th>
                                <th width="300">Medicines</th>
                                <th width="80">Quantity</th>
                            </tr>
                            <tr>
                                <td><input type="text" value="<?php echo $data['date'];?>" name="date" readonly></td>
                                <td><input type="text" value="<?php echo $data1['caseid'];?>" name="caseid" readonly></td>
                                <td><input type="text" value="<?php echo $data1['name'];?>" name="name" readonly style="width: 300px"></td>
                                <td><input type="text" value=" <?php date_default_timezone_set("asia/kolkata");echo date("h:i:s"); ?>" name="time" readonly></td>
                                <td><input type="text" value="<?php echo $data['Treatments'];?>" name="Treatments" readonly style="width: 300px"></td>
                                <td><input type="number" name="quantity" required ></td>
                            </tr>
                            <tr>
                                <td colspan="6" align="center"><input type="submit" name="submit" value="ADD IN RECORD" class="sbtn"></td>
                            </tr>
                        </table>
                    </form>
        </div>

        <?php

    }
}
?>
<?php
include ('../footer.php');
?>