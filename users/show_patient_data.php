<?php
session_start();

if (isset($_SESSION['uid'])){
    echo "";
}else
{
    header('Location: ../login.php');
}?>
<?php require ('../header.php');?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
       .heading{
           background-color: #222222;
           color: white;
           margin-top: -20px;
       }
        .outer
        {
            background-color: #cccccc;
            margin-top: -20px;
        }
        th{
            background-color: #333333;
            color: white;
        }
        tr:hover
        {
            background-color: #333333;
            color: white;
        }
        input{
            font-size: 15px;
            background-color: #cccccc;
        }
        input:hover{
            background-color: #363636;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="heading">
    <h3 align="center">Previous Patient Medical Data</h3>
</div>
<div class="result">
    <?php
    if(isset($_GET['caseid']))
    {
        include ('../dbbcon.php');
        $caseid=$_GET['caseid'];
        $query="SELECT * FROM `sform` WHERE `id`='$caseid' and `ge`!='' AND `Treatments`!='' ";
        $run=mysqli_query($con,$query);
        while ($data=mysqli_fetch_assoc($run)){
            ?>
            <div class="outer">
                <div class="inner">
                    <table border="1" align="center" width="660px">
                        <tr>
                            <th>Case Id</th>
                            <td><input type="text" readonly value="<?php echo $data['caseid'];?>"style="width: 530px"></td>
                        </tr>
                        <tr>
                            <th> Date</th>
                            <td><input type="text" readonly value="<?php echo $data['date'];?>"style="width: 530px"></td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td><input type="text" readonly value="<?php echo $data['time'];?>"style="width: 530px"></td>
                        </tr>
                        <tr>
                            <th>Complaint</th>
                            <td><input type="text" readonly value="<?php echo $data['complaint'];?>" style="height: 50px;width: 530px"></td>
                        </tr>
                        <tr>
                            <th>Symptoms_signs</th>
                            <td><input type="text" readonly value="<?php echo $data['Symptoms_signs'];?>" style="height: 50px;width: 530px"></td>
                        </tr>
                        <tr>
                            <th>GE</th>
                            <td><input type="text" readonly value="<?php echo $data['ge'];?>" style="height: 50px;width: 530px"></td>
                        </tr>
                        <tr>
                            <th>Investigation</th>
                            <td><input type="text" readonly value="<?php echo $data['investigation'];?>" style="height: 50px;width: 530px"></td>
                        </tr>
                        <tr>
                            <th>CVS</th>
                            <td><input type="text" readonly value="<?php echo $data['cvs'];?>" style="height: 50px;width: 530px"></td>
                        </tr>
                        <tr>
                            <th>RS</th>
                            <td><input type="text" readonly value="<?php echo $data['rs'];?>" style="height: 50px;width: 530px"></td>
                        </tr>
                        <tr>
                            <th>PA</th>
                            <td><input type="text" readonly value="<?php echo $data['p_a'];?>" style="height: 50px;width: 530px"></td>
                        </tr>
                        <tr>
                            <th>CNS</th>
                            <td><input type="text" readonly value="<?php echo $data['cns'];?>" style="height: 50px;width: 530px"></td>
                        </tr>
                        <tr>
                            <th>Treatments</th>
                            <td><input type="text" readonly value="<?php echo $data['Treatments'];?>" style="height: 50px;width: 530px"></td>
                        </tr>
                        <tr>
                            <th>Diagnosis</th>
                            <td><input type="text" readonly value="<?php echo $data['diagnosis'];?>" style="width: 530px"></td>
                        </tr>
                        <tr>
                            <th>Checked By</th>
                            <td><input type="text" readonly value="<?php echo $data['drlist'];?>"style="width: 530px"></td>
                        </tr>
                        <tr>
                            <th>Refer To</th>
                            <td><input type="text" readonly value="<?php echo $data['other_dr'];?>"style="width: 530px"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php
        }
    }

    ?>
</div>
</body>
</html>
<?php require ('../footer.php');?>