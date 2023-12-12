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
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <link href="lib/stylesheets/jquery.ui.all.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="lib/stylesheets/app.css" rel="stylesheet" type="text/css"/>
    <script src="lib/javascripts/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="lib/javascripts/jquery-ui-1.8.20.custom.js" type="text/javascript"></script>
    <script src="lib/javascripts/application.js" type="text/javascript"></script>
    <script src="lib/javascripts/aplication1.js" type="text/javascript"></script>
    <script src="lib/javascripts/aplication2.js" type="text/javascript"></script>
    <script src="lib/javascripts/aplication3.js" type="text/javascript"></script>
    <script src="lib/javascripts/aplication4.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 100) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
    </script>
    <style>
        th{
            background-color: #363636;
            color: white;
        }
        .sbtn{
            background-color: #4CAF50;
            color: white;
            height: 30px;
            width: 200px;
        }
        .sbtn:hover{
            background-color: darkgreen;
            font-weight: bold;
        }
        tr:hover{
            background-color: #363636;
            color: white;
            font-weight: bold;
        }
        table,td,th{
            border: 1px solid black;
            alignment: center;
            overflow: hidden;

        }
        .heading{
            background-color: #222222;
            color: white;
            margin-top: -20px;
        }
        .heading2{
            background-color: #222222;
            color: white;


        }
        .result{
            background-color: #cccccc;

        }
        .outer{
            background-color: #cccccc;
            height: 200px;

        }
        .sbox{
            padding-top: 10px;

        }
        table{
            table-layout: fixed;
        }

        .heading3{
            background-color: #222222;
            color: white;
        }
        .sbox{
            padding-top: 10px;
        }
        textarea:hover{
            background-color: #333333;
            color: white;
        }
        #back2Top {
    width: 40px;
    line-height: 40px;
    overflow: hidden;
    z-index: 999;
    display: none;
    cursor: pointer;
    -moz-transform: rotate(270deg);
    -webkit-transform: rotate(270deg);
    -o-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    transform: rotate(270deg);
    position: fixed;
    bottom: 50px;
    right: 0;
    background-color: #DDD;
    color: #555;
    text-align: center;
    font-size: 30px;
    text-decoration: none;
    border-radius: 20px;
}
#back2Top:hover {
    background-color: #DDF;
    color: #000;
}
    </style>
</head>
<body bgcolor="cccccc">
<?php require ('../header.php');?>
</div>
</body>
</html>
<div class="heading">
    <a id="back2Top" title="Back to top" href="#">&#10148;</a>
    <h3 align="center">Previous patient Medical Record</h3>
</div>

<div class="show-info">

    <?php
if(isset($_GET['caseid'])){
    $caseid=$_GET['caseid'];
    include ('../dbbcon.php');
    $query="SELECT * FROM `sform` WHERE `caseid`='$caseid' and `ge`!='' AND `Treatments`!='' ";
    $run=mysqli_query($con,$query);
    $count = 0;
    while ($data = mysqli_fetch_assoc($run)){


    $count++;
    ?>
    <div class="outer">
        <div class="sbox">
            <table border="1" align="center" style="width: 1400px;">
                <tr align="center" >
                    <th>Sr.No</th>
                    <th>Date</th>
                    <th>time</th>
                    <th>Checked By</th>
                    <th>Refer to Other Doctor</th>
                    <th>Show Record</th>
                    <th>Edit Record</th>

                </tr>
                <tr align="center">
                    <td><?php echo $count ?></td>
                    <td><?php echo $data['date']; ?></td>
                    <td><?php echo $data['time']; ?></td>
                    <td><?php echo $data['drlist']; ?></td>
                    <td><?php echo $data['other_dr']; ?></td>
                    <td style="background-color: darkgreen;font-weight: bold"><a href="show_patient_data.php?caseid=<?php echo $data['id'];?>"
                                                             style="color: white" target="_blank">Show All Record</a></td>
                    <td style="background-color: darkgreen;font-weight: bold"><a href="editsdata.php?sid= <?php echo $data['id']; ?>"
                                                             style="color: white" target="_blank">Edit Record</a></td>
                </tr>

            </table>
            <?php
            }
            }
            ?>

        </div>
        <div class="heading2">
            <h3 align="center">Add patient Medical Record</h3>
        </div>
</div>
    <?php

    include ('../dbbcon.php');
   
    if(isset($_GET['sid'])){
        $sid=$_GET['sid'];
        $sql1="SELECT * FROM `sform` WHERE  id='$sid'";
        $run1=mysqli_query($con,$sql1);
        $data1=mysqli_fetch_assoc($run1);
        ?>
        <div class="sdata" style=" background-color:#cccccc;">
            <form method="post" action="updatestudentform.php" enctype="multipart/form-data">
                <table align="center">
                    <tr>
                        <th>CaseId:</th>
                        <td width="100"><input type="text" name="cid" value="<?Php  echo $data1['caseid']; ?>"  readonly style="background-color: black;color: white;font-weight: bold"></td>
                        <th>Name:</th>

                        <td width="230"><input type="text" name="name" value="<?Php  echo $data1['name']; ?>" readonly style="background-color:black;color: white;font-weight: bold;width: 230px"></td>
                        <th>Weight</th>
                        <td><input type="text" name="weight" value="<?Php  echo $data1['weight']; ?>" readonly style="background-color: black;color: white;font-weight: bold"></td>
                        <th>category</th>
                        <td><input type="text" name="gender" value="<?Php  echo $data1['gender']; ?>" readonly style="background-color: black;color: white;font-weight: bold"></td>
                    <tr>
                        <th>Case generation Date:</th>
                        <td><input type="text" name="cdate" value="<?Php  echo $data1['cdate']; ?>" readonly style="background-color: black;color: white;font-weight: bold"></td>
                        <th>Date</th>
                        <?php date_default_timezone_set("asia/kolkata"); ?>
                        <td><input type="text" name="date" readonly value="<?php echo date("d/m/y"); ?>" style="background-color: black;color: white;font-weight: bold;width: 230px"></td>
                        <th>Time</th><td><input type="text" name="time" readonly value="<?php echo date("h:i:s"); ?>" style="background-color: black;color: white;font-weight: bold"></td>
                        <th>Age</th>
                        <td><input type="text" name="age" value="<?Php  echo $data1['age']; ?>" readonly style="background-color: black;color: white;font-weight: bold"></td>
                    </tr>
                    <tr style="background-color: darkgray">
                        <th colspan="8">Doctor Notes</th>

                    </tr>
                    <tr>
                        <th colspan="4">complaint</th>
                        <th colspan="4">Symptoms&signs</th>
                    </tr>
                    <tr>
                        <td colspan="4"><textarea name="complaint" placeholder="Enter Compliments" id="citites"  style="width: 740px;height: 200px;font-family: 'Arial Black';font-size: 15px;"></textarea></td>
                        <td colspan="4"><textarea name="Symptoms_signs" placeholder="Enter symptoms And Signs" id="citites1" style="width: 600px;height: 200px;font-family: 'Arial Black';font-size: 15px;"></textarea></td>

                    </tr>
                    <tr>
                        <th colspan="4">General Examination</th>
                        <th colspan="4"> Investigations</th>
                    </tr>
                    <tr>
                        <td colspan="4"><textarea name="ge" placeholder="Enter General Examination" id="citites2" style="width: 740px ;height: 200px;font-family: 'Arial Black';font-size: 15px;" required></textarea></td>
                        <td colspan="4"><textarea name="investigation" placeholder="Enter Investigations like Medical Reports,X-ray..." style="width: 600px ;height: 200px;font-family: 'Arial Black';font-size: 15px;" id="report"></textarea></td>
                    </tr>
                    <tr style="background-color: darkgray">
                        <th colspan="4" width="500px">Systematic Examination</th>
                        <th colspan="4">Treatments</th>
                    </tr>
                    <tr>
                        <th>CVS</th><td colspan="3"><textarea name="cvs" style="width: 540px;height: 100px;font-family: 'Arial Black';font-size: 15px;"></textarea></td>

                        <td rowspan="4" colspan="4"><textarea name="Treatments" placeholder="Enter medicines Data" required style="width: 600px;height: 400px;font-family: 'Arial Black';font-size: 15px;" id="medicine"></textarea></td>
                    </tr>
                   <tr>
                       <th>RS</th><td colspan="3"><textarea name="rs" style="width: 540px;height: 100px;font-family: 'Arial Black';font-size: 15px;"></textarea></td>
                   </tr>
                    <tr>
                        <th>P/A</th><td colspan="3"><textarea name="p_a" style="width: 540px;height: 100px;font-family: 'Arial Black';font-size: 15px;"></textarea></td>
                    </tr>
                    <tr>

                        <th>CNS</th><td colspan="3"><textarea name="cns" style="width: 540px;height: 100px;font-family: 'Arial Black';font-size: 15px;"></textarea></td>

                    </tr>
                    <tr>
                        <th>Select Provisional Diagnosis </th><td colspan="2"><input list="diagnosis" name="diagnosis" style="width: 300px">
                            <datalist id="diagnosis">
                                <option value="Pharyngitis"></option>
                                <option value="Common Cold"></option>
                                <option value="Tonsillitis"></option>
                                <option value="Bronchial Asthma"></option>
                                <option value="Chronic Obstructive Pulmonary Disease"></option>
                                <option value="Asthma-Chronic Obstructive"></option>
                                <option value="Pneumonia"></option>
                                <option value="Dengue"></option>
                                <option value="malaria"></option>
                                <option value="Chickengunia"></option>
                                <option value="Anemia"></option>
                                <option value="Thrombocytopenia"></option>
                                <option value="B12 Deficiency"></option>
                                <option value="Mouth Ulcers"></option>
                                <option value="Caries Tooth"></option>
                                <option value="Gingivitis"></option>
                                <option value="Gastroesophageal Reflux Disease"></option>
                                <option value="Nausea-Vomiting/Constipation"></option>
                                <option value="Diarrihea"></option>
                                <option value="Abdominal Pain"></option>
                                <option value="Renal calculi/Renal Colick"></option>
                                <option value="Ameabiosis"></option>
                                <option value="Jaundice"></option>
                                <option value="Fungal Bacterial Viral Infections"></option>
                                <option value="Scabies"></option>
                                <option value="Pimples,Ache"></option>
                                <option value="dandruff"></option>
                                <option value="Non Healing Ulcers"></option>
                                <option value="Conjunctivitis"></option>
                                <option value="Stye"></option>
                                <option value="Cataract"></option>
                                <option value="Refractive Errors(Spects)"></option>
                                <option value="Server Headache"></option>
                                <option value="Giddjness"></option>
                                <option value="Meningitis"></option>
                                <option value="Epilepsy"></option>
                                <option value="Fracture"></option>
                                <option value="Arthritis"></option>
                                <option value="Backache"></option>
                                <option value="Accidential Injury(Blunt,Sharp)Due TO Fall"></option>
                                <option value="Hypertension"></option>
                                <option value="chestpain(Angina)"></option>
                                <option value="Pass H/O Ang-Plast-Graphy"></option>
                                <option value="Diabetes Mellitus"></option>
                                <option value="Hypothyroidsm"></option>
                                <option value="Hyperthyroidsm"></option>

                            </datalist>
                        </td>   

                        <th>Checked by:</th><td> <input list="drlist" name="drlist">
                            <datalist id="drlist">
                                <option value="Dr.Shailesh Raval"></option>
                                <option value="Dr.Manasi Dhure Ahire"></option>
                                <option value="Dr.Kiran Goyal"></option>

                            </datalist></td>
                        <th colspan="2" >Refer to Other Doctor</th><td><input list="other_dr" name="other_dr" >
                            <datalist id="other_dr">
                                <option value="Physician"></option>
                                <option value="E.N.T. Surgeon"></option>
                                <option value="Orthopedic Surgeon"></option>
                                <option value="Gynaecologist"></option>
                                <option value="Paediatrician"></option>
                                <option value="Opthalmologist"></option>
                                <option value="Psychiatrist"></option>
                                <option value="Dermatologist"></option>
                                <option value="Psychotherapist"></option>
                                <option value="Pathologist"></option>

                            </datalist></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="10">

                            <input type="submit" name="insert" value="Add Medical Record" class="sbtn" style="font-weight: bold"> </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
    }

    ?>

    <?php
    if(isset($_POST['insert']))
    {
    $cid=$_POST['cid'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $complaint=$_POST['complaint'];
    $Symptoms_signs=$_POST['Symptoms_signs'];
    $ge=$_POST['ge'];
    $investigation=$_POST['investigation'];
    $cvs=$_POST['cvs'];
    $Treatments=$_POST['Treatments'];
    $rs=$_POST['rs'];
    $p_a=$_POST['p_a'];
    $cns=$_POST['cns'];
    $diagnosis=$_POST['diagnosis'];
    $drlist=$_POST['drlist'];
    $other_dr=$_POST['other_dr'];


    $query2="INSERT INTO `sform`( `caseid`,`date`, `time`, `complaint`, `Symptoms_signs`, `ge`, `investigation`, `cvs`, `Treatments`, `rs`, `p_a`, `cns`, `diagnosis`, `drlist`, `other_dr`) 
VALUES ('$cid','$date','$time','$complaint','$Symptoms_signs','$ge','$investigation','$cvs','$Treatments','$rs','$p_a','$cns','$diagnosis','$drlist','$other_dr')";
    $run2 = mysqli_query($con,$query2);
    if($run2==true){
        ?>
        <script>
            alert("data inserted");
            window.open("doctor.php","_self");
        </script>
        <?php
    }

    }?>
    <div class="heading3">
        <h3 align="center">Patient Medical Report</h3>
    </div>
    <?php
    if(isset($_GET['caseid'])){
        include ('../dbbcon.php');
        $caseid=$_GET['caseid'];
        $query3="SELECT * FROM `patient_report` WHERE `caseid`='$caseid'";
        $run3=mysqli_query($con,$query3);
        while($row=mysqli_fetch_array($run3)){

            ?>
            <div class="result" style="padding-top: 10px">
                <table border="1" align="center" width="1300px">
                <?php
                $file_filed=$row['report'];
                $file_show="../Patient_Reports/$file_filed";
                ?>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Report-Type</th>
                        <th>Report</th>
                        <th>Notes</th>
                    </tr>
                <tr>
                    <td align="center"><?php echo date('y/m/d',strtotime($row['date']));?></td>
                    <td align="center"><?php echo $row['name'];?></td>
                    <td align="center"><?php echo $row['report_type'];?></td>
                    <td>
                        <?php
                        echo "<div align=center><a href='$file_show' style='color: white;background-color: #333333' target='_blank'>$file_filed</a></div>"
                        ?>
                    </td>
                    <td align="center"><?php echo $row['notes'];?></td>
                </tr>

                </table>
            <?php
        }
    }

    ?>
<?php include ('../footer.php'); ?>



