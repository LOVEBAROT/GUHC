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
            background-color: #222222;
            color: white;
            font-weight: bold;
        }
        .sbtn{
            background-color: #4CAF50;
            color: white;


        }
        .sbtn:hover{
            background-color: darkgreen;
            font-weight: bold;
        }
        .medshow{
            background-color:#cccccc;
            font-size: 50px;
            font-weight: bold;

        }
        .showname{
            background-color:#cccccc;
        }
        table,td,th{
            overflow: hidden;
            table-layout: fixed;
        }
        .medshow{
            padding-top: 10px;
        }
        th{
            background-color: #222222;
            color: white;
        }
        .link{
            background-color: #cccccc;
        }
    </style>
</head>
<body>
<?php require ('../header.php');?>
<div class="heading">
    <h2 align="center">Search Patient data</h2>
</div>
<div class="outerblock">
<div class="innerblock">
    <form action="showmedicines.php" method="post">
        <table border="1">
            <tr>
                <td>Enter Case Number</td><td><input type="text" placeholder="Enter patient Case Id" required name="cno"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Show Data" class="sbtn"></td>
            </tr>
        </table>
    </form>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']) && $_SESSION['uid']=='Lab_Technician'){
    include ('../dbbcon.php');
    $cno=$_POST['cno'];
    $query = "SELECT * FROM sform WHERE caseid='$cno' And 	Treatments!='' and `ge`!=''";
    $run=mysqli_query($con,$query);
    $query1="SELECT * FROM sform WHERE caseid='$cno'";
    $run1=mysqli_query($con,$query1);
    $data1=mysqli_fetch_assoc($run1);
    ?>
<div class="showname">
    <table align="center" border="1" >
        <tr><th width="100">Case Id</th><td style="background-color: black;color: white;font-weight: bold;width: 100px"><?php echo $data1['caseid'];?></td>
            <th>Name</th><td style="background-color: black;color: white;font-weight: bold;width: 400px"><?php echo $data1['name'];?></td></tr>
    </table>
</div>


    <?php
    while ($data=mysqli_fetch_assoc($run)){
        ?>
        <div class="medshow">
            <table border="1" align="center" width="800">
                <tr>
                    <th width="100">Date</th>
                    <th width="200">Dr. Checking Time</th>
                    <th width="150">Dr.Name</th>
                    <th width="200">GE</th>
                    <th width="300">investigation</th>
                    <th width="200">view All data</th>
                </tr>
                <tr>
                    <td><?php echo $data['date'];?></td>
                    <td><?php echo $data['time'];?></td>
                    <td><?php echo $data['drlist'];?></td>
                    <td><?php echo $data['ge']; ?></td>
                    <td><?php echo $data['investigation']; ?></td>
                    <td style="background-color: #333333;color:white;font-weight: bold" align="center"><a href="show_patient_data.php?caseid=<?php echo $data['id'];?>"
                                                                                     style="color: white" target="_blank">Show All Record</a></td>
                </tr>

            </table>
        </div>


        <?php
    }
    ?>
    <div class="link">
        <a href="addpatientreport.php" style="font-size: 20px;color: white;background-color:#333333;margin-left: 750px">ADD REPORT</a>
    </div>
    <?php

}else if (isset($_POST['submit']) && $_SESSION['uid']=='Pharmacist'){

    include ('../dbbcon.php');
    $cno=$_POST['cno'];
    $query = "SELECT * FROM sform WHERE caseid='$cno' And 	Treatments!='' and `ge`!=''";
    $run=mysqli_query($con,$query);
    $query1="SELECT * FROM sform WHERE caseid='$cno'";
    $run1=mysqli_query($con,$query1);
    $data1=mysqli_fetch_assoc($run1);
    ?>
    <div class="showname">
        <table align="center" border="1">
            <tr><th>Case Id</th><td style="background-color: #363636;color: white;font-weight: bold;width: 100px"><?php echo $data1['caseid'];?></td>
                <th>Name</th><td style="background-color: #363636;color: white;font-weight: bold;width: 400px"><?php echo $data1['name'];?></td></tr>
        </table>
    </div>


    <?php
    while ($data=mysqli_fetch_assoc($run)) {
        ?>
        <div class="medshow">
        <table border="1" align="center" width="800">
            <tr>
                <th width="100">Date</th>
                <th width="200">Dr. Checking Time</th>
                <th width="150">Dr.Name</th>
                <th width="300">GE</th>
                <th width="400">Treatments</th>
                <th width="200">view All data</th>
            </tr>
            <tr>
                <td><?php echo $data['date'];?></td>
                <td><?php echo $data['time'];?></td>
                <td><?php echo $data['drlist'];?></td>
                <td><?php echo $data['ge']; ?></td>
                <td><?php echo $data['Treatments'];?></td>
                <td style="background-color: #333333;color:white;font-weight: bold" align="center"><a href="show_patient_data.php?caseid=<?php echo $data['id'];?>"
                                                                                                      style="color: white" target="_blank">Show All Record</a></td>
            </tr>

        </table>
        </div><?php
    }?><div class="link">
        <a href="givemedicines.php" style="font-size: 20px;color: white;background-color:#333333;margin-left: 750px">Give Medicines</a>
    </div><?php
        }else if (isset($_POST['submit']) && $_SESSION['uid']=='Paramedical_Staff'){

    include ('../dbbcon.php');
    $cno=$_POST['cno'];
    $query = "SELECT * FROM sform WHERE caseid='$cno' And 	Treatments!='' and `ge`!=''";
    $run=mysqli_query($con,$query);
    $query1="SELECT * FROM sform WHERE caseid='$cno'";
    $run1=mysqli_query($con,$query1);
    $data1=mysqli_fetch_assoc($run1);
    ?>
    <div class="showname">
        <table align="center" border="1" >
            <tr><th>Case Id </th><td style="background-color: black;color: white;font-weight: bold;width: 100px"><?php echo $data1['caseid'];?></td>
                <th>Name </th><td style="background-color: black;color: white;font-weight: bold;width: 400px"><?php echo $data1['name'];?></td></tr>
        </table>
    </div>


    <?php
    while ($data=mysqli_fetch_assoc($run)) {
        ?>
        <div class="medshow">
        <table border="1" align="center" width="800">
            <tr>
                <th width="100">Date</th>
                <th width="200">Dr. Checking Time</th>
                <th width="150">Dr.Name</th>
                <th width="300">GE</th>
                <th width="300">investigation</th>
                <th width="200">view All data</th>
            </tr>
            <tr>
                <td><?php echo $data['date'];?></td>
                <td><?php echo $data['time'];?></td>
                <td><?php echo $data['drlist'];?></td>
                <td><?php echo $data['ge']; ?></td>
                <td><?php echo $data['investigation']; ?></td>
                <td style="background-color: #333333;color:white;font-weight: bold" align="center"><a href="show_patient_data.php?caseid=<?php echo $data['id'];?>"
                                                                                                      style="color: white" target="_blank">Show All Record</a></td>
            </tr>

        </table>

        </div><?php
    }?><div class="link">
        <a href="pstaff_record.php" style="font-size: 20px;color: white;background-color:#363636;margin-left: 750px">Add In Record</a>
    </div><?php
}
?>



<?php
include ('../footer.php');
?>