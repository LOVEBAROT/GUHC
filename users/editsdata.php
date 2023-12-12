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
        }
        tr:hover{
            background-color: #363636;
            color: white;
        }
        table,td,th{
            border: 1px solid black;
            alignment: center;
            width: 1000px;
        }
        .headeing{
                background-color: #222222;
                color: white;
                margin-top: -20px;
        }
        textarea:hover{
            background-color: #333333;
            color: white;
        }
        .sdata{
            margin-bottom: -15px;
        }
    </style>
</head>
<body>
<?php
require ('../header.php');
?>
<div class="headeing">
    <h3 align="center">Update Patient Medical Record</h3>
</div>
</body>
</html>
<?php

include ('../dbbcon.php');
$data1='';
if(isset($_GET['sid'])){
    $sid=$_GET['sid'];
    $sql1="SELECT * FROM `sform` WHERE  `id`='$sid'";
    $run1=mysqli_query($con,$sql1);
    $data1=mysqli_fetch_assoc($run1);
    ?>
    <div class="sdata" style=" background-color:#cccccc;margin-top: -20px">
        <form method="post" action="editsdata.php" enctype="multipart/form-data">
            <table align="center" border="1">
                <tr>
                    <th colspan="2">CaseId:</th>
                    <td><input type="text" name="cid" value="<?Php  echo $data1['caseid']; ?>"  readonly style="background-color: black;color: white;font-weight: bold;width: 290px"></td>
                    <th>Date</th>
                    <td><input type="text" name="date" readonly value="<?php echo $data1['date']; ?>" style="background-color: black;color: white;font-weight: bold;width: 200px"></td>
                    <th colspan="2">Time</th><td><input type="text" name="time" readonly value="<?php echo $data1['time']; ?>" style="background-color: black;color: white;font-weight: bold;width: 200px"></td>

                <tr style="background-color: darkgray">
                    <th colspan="8">Doctor Notes</th>

                </tr>
                <tr>
                    <th colspan="4">complaint</th>
                    <th colspan="4">Symptoms&signs</th>
                </tr>
                <tr>
                    <td colspan="4"><textarea name="complaint" placeholder="Enter Compliments"  id="citites"  style="width: 700px;height: 200px;font-family: 'Arial Black';font-size: 15px;"><?php echo $data1['complaint']; ?></textarea></td>
                    <td colspan="4"><textarea name="Symptoms_signs" placeholder="Enter symptoms And Signs" id="citites1" style="width: 600px;height: 200px;font-family: 'Arial Black';font-size: 15px;"><?php echo $data1['Symptoms_signs']; ?></textarea></td>

                </tr>
                <tr>
                    <th colspan="4">General Examination</th>
                    <th colspan="4"> Investigations</th>
                </tr>
                <tr>
                    <td colspan="4"><textarea name="ge" placeholder="Enter General Examination" id="citites2" style="width: 700px ;height: 200px;font-family: 'Arial Black';font-size: 15px;"><?php echo $data1['ge']; ?></textarea></td>
                    <td colspan="4"><textarea name="investigation" placeholder="Enter Investigations like Medical Reports,X-ray..." style="width: 600px ;height: 200px;font-family: 'Arial Black';font-size: 15px;" id="report"><?php echo $data1['investigation']; ?></textarea></td>
                </tr>
                <tr style="background-color: darkgray">
                    <th colspan="4" width="500px">Systematic Examination</th>
                    <th colspan="4">Treatments</th>
                </tr>
                <tr>
                    <th>CVS</th><td colspan="3"><textarea name="cvs" style="width: 540px;height: 100px;font-family: 'Arial Black';font-size: 15px;"><?php echo $data1['cvs']; ?></textarea></td>

                    <td rowspan="4" colspan="4"><textarea name="Treatments" placeholder="Enter medicines Data" style="width: 600px;height: 400px;font-family: 'Arial Black';font-size: 15px;" id="medicine"><?php echo $data1['Treatments']; ?></textarea></td>
                </tr>
                <tr>
                    <th>RS</th><td colspan="3"><textarea name="rs" style="width: 540px;height: 100px;font-family: 'Arial Black';font-size: 15px;"><?php echo $data1['rs']; ?></textarea></td>
                </tr>
                <tr>
                    <th>P/A</th><td colspan="3"><textarea name="p_a" style="width: 540px;height: 100px;font-family: 'Arial Black';font-size: 15px;"><?php echo $data1['p_a']; ?></textarea></td>
                </tr>
                <tr>

                    <th>CNS</th><td colspan="3"><textarea name="cns" style="width: 540px;height: 100px;font-family: 'Arial Black';font-size: 15px;"><?php echo $data1['cns']; ?></textarea></td>

                </tr>

                <tr>
                    <th>Select Diagnosis </th><td colspan="2"><input list="diagnosis" name="diagnosis" style="width: 290px" value="<?php echo $data1['diagnosis']; ?>">
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

                    <th>Checked by:</th><td> <input list="drlist" name="drlist" value="<?php echo $data1['drlist']; ?>">
                        <datalist id="drlist">
                            <option value="Dr.Shailesh Raval"></option>
                            <option value="Dr.Manasi Dhure Ahire"></option>
                            <option value="Dr.Kiran Goyal"></option>

                        </datalist></td>
                    <th colspan="2" >Refer to Other Doctor</th><td><input list="other_dr" name="other_dr" value="<?php echo $data1['other_dr']; ?>">
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
                        <input type="hidden" name="sid" value="<?php echo $data1['id']; ?>">
                        <input type="submit" name="insert" value="Update Medical Record" class="sbtn" style="font-weight: bold"> </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
}

?>
<?php


if(isset($_POST['insert'])){
    include ('../dbbcon.php');
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
    $sid=$_POST['sid'];

    $query2="UPDATE `sform` SET `complaint` = '$complaint',`Symptoms_signs`='$Symptoms_signs',`ge`='$ge',`investigation`='$investigation',`cvs`='$cvs',`Treatments`='$Treatments',`rs`='$rs',`p_a`='$p_a',`cns`='$cns',`diagnosis`='$diagnosis',`drlist`='$drlist',`other_dr`='$other_dr' WHERE `id` = $sid;";
    $run2 = mysqli_query($con,$query2);
    if($run2==true){
        ?>
        <script>
            alert("data Updated");
            window.open("doctor.php","_self");
        </script>
        <?php


    }
}

?>
<?php require ('../footer.php');?>


