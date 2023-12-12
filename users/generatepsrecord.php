<?php
session_start();
error_reporting(0);
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
        .record{
            background-color: #cccccc;
            height: 300px;
            margin-top: -20px;
        }
        .rform{
            padding-top: 100px;

        }
        .heading{
            background-color: #333333;
            color: white;
            margin-top: -20px;
            margin-bottom: -20px;
        }
        th{
            background-color: #333333;
            color: white;
        }
        tr:hover{
            background-color: #333333;
            color: white;
            font-weight: bold;
        }
        .showop{

            padding-top: 10px;
        }
        .op{
            background-color: #cccccc;


        }
        .sbox{

            background-color:#cccccc;
            padding-top: 10px;

        }

        .sbtn{
            background-color: #4CAF50;
            color: white;
        }
        .sbtn:hover{
            background-color: darkgreen;
            font-weight: bold;
        }
        table,td,th{
            overflow: hidden;
            table-layout: fixed;
        }
    </style>
</head>
<body>
<?php require ('../header.php');?>
<div class="heading">
    <h2 align="center">Generate  Record</h2>
</div>
<div class="record">
    <div class="rform">
        <form method="post" action="generatepsrecord.php">
            <table border="1" align="center">
                <tr>
                    <th>From Date:</th>
                    <td><input type="date" required name="fdate" ></td>
                </tr>
                <tr>
                    <th>To Date:</th>
                    <td><input type="date" required name="tdate" ></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Search" class="sbtn"> </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])) {
    include('../dbbcon.php');
    $fdate = date('d/m/y', strtotime($_POST['fdate']));

    $tdate = date('d/m/y', strtotime($_POST['tdate']));
    $query = "SELECT COUNT(CASE WHEN m_data = 'X_RAY' THEN id END) AS X_RAY,
 COUNT(CASE WHEN m_data = 'ECG' THEN id END) AS ECG, 
 COUNT(CASE WHEN m_data = 'Dressing' THEN id END) AS Dressing, 
 COUNT(CASE WHEN m_data = 'Injection' THEN id END) AS Injection, 
 COUNT(*) AS Total FROM  p_staff_record WHERE date between '$fdate' and '$tdate'";
    $query2="SELECT * FROM p_staff_record WHERE date between '$fdate' and '$tdate'";
    $run=mysqli_query($con,$query);
    $run2=mysqli_query($con,$query2);
    if(mysqli_num_rows($run)<1)
    {
        ?><script>alert("No record found")</script><?PHP
    }
    else{

        while ($data=mysqli_fetch_assoc($run)){

            ?>

            <div class="op">

                <div class="showop">
                    <table border="1" align="center" width="1100">
                        <tr >
                            <th width="150">Total X-RAY</th>
                            <th width="150">Total ECG</th>
                            <th width="150">Total Dressing</th>
                            <th width="150">Total Injection</th>
                            <th width="150">Total</th>
                        </tr>
                        <tr align="center">
                            <td><?php echo $data['X_RAY'];?></td>
                            <td><?php echo $data['ECG'];?></td>
                            <td><?php echo $data['Dressing'];?></td>
                            <td><?php echo $data['Injection'];?></td>
                            <td style="background-color: #333333;color: white;font-weight: bold"><?php echo $data['Total'];?></td>
                        </tr>

                    </table>
                </div>
            </div>

            <?php
        }
    }
    while($data2=mysqli_fetch_assoc($run2)){
        $count++;
        ?>

        <div class="sbox">
            <table border="1" align="center">
                <tr style="background-color: #555555;color: white">
                    <th width="50">Sr.No</th>
                    <th width="100">Date</th>
                    <th width="100">caseNO</th>
                    <th width="250">Name</th>
                    <th width="80">Time</th>
                    <th width="100">Medical Data</th>
                    <th width="400">Notes</th>

                </tr>
                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo date('y/m/d',strtotime($data2['date']));?></td>
                    <td><?php echo $data2['caseid'];?></td>
                    <td><?php echo $data2['name'];?></td>
                    <td><?php echo $data2['time'];?></td>
                    <td><?php echo $data2['m_data'];?></td>
                    <td><?php echo $data2['notes'];?></td>
                </tr>
            </table>
        </div>
        <?php

    }

}
?>
<?php require ('../footer.php');?>
