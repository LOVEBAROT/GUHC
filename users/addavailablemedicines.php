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
            height: 250px;
            margin-top: -20px;
        }
        .inner{
            padding-top: 80px;
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
        }
        .sbtn:hover{
            background-color: darkgreen;
            color: white;
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
    <div class="heading" style="background-color: #222222;color: white;margin-top: -20px">
        <h2 align="center">Available Medicines</h2>
    </div>
    <div class="outer">
        <div class="inner">
            <form action="addavailablemedicines.php" method="post" >
                <table border="1" align="center">
                    <tr>
                        <th width="100">Date</th>
                        <th width="200">medicines Name</th>
                        <th width="300" >Company name</th>
                        <th width="100">Quantity</th>
                        <th width="100">quantity_type</th>
                    </tr>
                    <tr>

                        <td><input type="text" name="date" value="<?php echo date("d/m/y");?>" readonly></td>
                        <td> <input list="medicine" name="medicine" required style="width: 200px">
                            <datalist id="medicine">
                                <option value="AZITHRO"></option>
                                <option value="MOX-Clav-625"></option>
                                <option value="Cefadroxyl-500"></option>
                                <option value="Cifixim-200"></option>
                                <option value="DOxy-100"></option>
                                <option value="Anti - Spasmin"></option>
                                <option value="P.C.M"></option>
                                <option value="Antacid"></option>
                                <option value="Anti-Emetic"></option>
                                <option value="Pain + MR"></option>
                                <option value="Pain + Anti infl"></option>
                                <option value="Anti Diarial"></option>
                                <option value="Anti - Cold"></option>
                                <option value="Calcium"></option>
                                <option value="M.Vit"></option>
                                <option value="Albendazoal"></option>
                                <option value="Fole-150"></option>
                                <option value="CQ - 250 -500"></option>
                                <option value="Zinc"></option>
                                <option value="Amlodepin"></option>
                                <option value="Atenanlol"></option>
                                <option value="FA"></option>
                                <option value="Iron-Folic"></option>
                                <option value="Alprex"></option>
                                <option value="Prednisolone"></option>
                                <option value="Asthalin"></option>
                                <option value=""></option>
                            </datalist></td>
                        <td><input type="text" name="company" placeholder="Enter Company Name" style="width: 300px"></td>
                        <td><input type="number" name="quantity" placeholder="Enter Quantity In Number" required></td>
                        <td><input list="quantity_type" name="quantity_type" required>
                            <datalist id="quantity_type">
                                <option value="medicines"></option>
                                <option value="Strip"></option>
                            </datalist></td>
                    </tr>
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="submit" value="Add Medicines" class="sbtn"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    include_once ('../dbbcon.php');
    $date=$_POST['date'];
    $medicine=$_POST['medicine'];
    $company=$_POST['company'];
    $quantity=$_POST['quantity'];
    $quantity_type=$_POST['quantity_type'];

    $query="INSERT INTO `available_medicines`(`date`,`medicine_name`,`Company_name`,`quantity`,`quantity_type`) VALUES ('$date','$medicine','$company','$quantity','$quantity_type')";
    $run=mysqli_query($con,$query);
    if($run==true){
        ?>
        <script>
            alert("Medicine Record Inserted");
            window.open("pharmacist.php","_self");
        </script>
        <?php
    }

}
?>
<?php require ('../footer.php');?>
