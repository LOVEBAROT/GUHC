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
        .result{
            background-color: #aaaaaa;
            margin-top: -20px;
            height: 80px;

        }
        tr:hover{
            background-color: #222222;
            color: white;
        }
        table,td,th{
            overflow: hidden;
            table-layout: fixed;
        }
        .inner{

            padding-top: 10px;

        }
    </style>
</head>
<body>
<?php require ('../header.php');?>
<div class="heading" style="background-color: #222222;color: white;margin-top: -20px">
    <h2 align="center">Display Medicines</h2>
</div>
</body>
</html>
<?php
include_once ('../dbbcon.php');
$query="SELECT * FROM `available_medicines`";
$run=mysqli_query($con,$query);
While($data=mysqli_fetch_assoc($run)){
    ?>
    <div class="result">
        <div class="inner">
        <table border="1" align="center" width="1100px">
            <tr style="background-color: #363636;color: white">
                <th width="100">Date</th>
                <th width="300">Medicines Names</th>
                <th width="300">Company-name</th>
                <th width="100">Quantity</th>
                <th width="100">Quantity-type</th>
            </tr>
            <tr>
                <td align="center"><?php echo $data['date'];?></td>
                <td align="center"><?php echo $data['medicine_name'];?></td>
                <td align="center"><?php echo $data['Company_name'];?></td>
                <td align="center"><?php echo $data['quantity'];?></td>
                <td align="center"><?php echo $data['quantity_type'];?></td>

            </tr>
        </table>
        </div>
    </div>
    <?php
}
?>
<?php
include_once ('../footer.php');
