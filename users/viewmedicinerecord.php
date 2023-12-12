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

        tr:hover{
            background-color: #363636;
            color: white;
        }
        .showop{

            padding-top: 10px;
        }
        .op{
            background-color: #cccccc;


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
        <form method="post" action="viewmedicinerecord.php">
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
if(isset($_POST['submit'])){
    include ('../dbbcon.php');
    $fdate = date('d/m/y', strtotime($_POST['fdate']));

    $tdate = date('d/m/y', strtotime($_POST['tdate']));
    $query="SELECT * FROM `medicine_record` WHERE date between '$fdate' and '$tdate'";
    $run=mysqli_query($con,$query);

    if(mysqli_num_rows($run)<1){
        ?><script>alert("No record found")</script><?PHP
    }
    else{
        $count=0;
        while ($data=mysqli_fetch_assoc($run)){
        $count++;
            ?>

            <div class="op">

                <div class="showop">
                    <table border="1" align="center" width="1100">
                        <tr >
                            <th width="150">Sr.No</th>
                            <th width="150">Caseid</th>
                            <th width="150">Name</th>
                            <th width="150">Date</th>
                            <th width="150">Time</th>
                            <th width="150">Treatments</th>
                            <th width="150">Quantity</th>

                        </tr>
                        <tr align="center">
                            <td><?php echo $count;?></td>
                            <td><?php echo $data['caseid'];?></td>
                            <td><?php echo $data['name'];?></td>
                            <td><?php echo date('y/m/d',strtotime($data['date']));?></td>
                            <td><?php echo $data['time'];?></td>
                            <td><?php echo $data['Treatments'];?></td>
                            <td><?php echo $data['quantity'];?></td>
                        </tr>

                    </table>
                </div>
            </div>

            <?php
        }
    }

}
?>
<?php
include_once ('../footer.php');
?>
