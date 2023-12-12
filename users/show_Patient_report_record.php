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
        tr:hover{
            background-color: #333333;
            color: white;
            font-weight: bold;
        }
        .outer{
            background-color: #cccccc;
            height: 300px;
        }
        .inner{
            padding-top: 100px;
        }
        .sbtn{
            background-color: #4CAF50;
            font-weight: bold;
            color: white;
            width: 100px;
        }
        .sbtn:hover{
            background-color: darkgreen;
        }
        th{
            background-color: #333333;
            color: white;
            font-weight: bold;
        }
        .result{
            background-color: #cccccc;
        }
        .heading{
            background-color: #222222;
            color: white;
            margin-top: -20px;
            margin-bottom: -20px;
        }
        .result1{
            background-color: #cccccc;
            padding-top: 10px;
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
    <h2 align="center">Generate Record</h2>
</div>
<div class="outer">
    <div class="inner">
        <form action="show_Patient_report_record.php" method="post">
            <table border="1" align="center" width="500px">
                <tr>
                    <th>From Date</th>
                    <td><input type="date" name="fdate" required placeholder="Enter Date"></td>
                </tr>
                <tr>
                    <th>To Date</th>
                    <td><input type="date" name="tdate" required placeholder="Enter Date"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Show" class="sbtn">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
    include ('../dbbcon.php');
    $fdate=date('d/m/y',strtotime($_POST['fdate']));

    $tdate=date('d/m/y',strtotime($_POST['tdate']));

    $query="SELECT * FROM `patient_report` WHERE `date` between '$fdate' and '$tdate'";
    $run=mysqli_query($con,$query);

    $query1="SELECT COUNT(CASE WHEN report_type	 = 'CBC' THEN id END) AS CBC,
 COUNT(CASE WHEN report_type = 'BLOOD GROUP' THEN id END) AS BLOODGROUP, 
  COUNT(CASE WHEN report_type = 'BLEEDING TIME' THEN id END) AS BLEEDINGTIME,
   COUNT(CASE WHEN report_type = 'CLOTING TIME' THEN id END) AS CLOTINGTIME,
    COUNT(CASE WHEN report_type = 'MD' THEN id END) AS MD,
     COUNT(CASE WHEN report_type = 'ESR' THEN id END) AS ESR,
      COUNT(CASE WHEN report_type = 'FBS' THEN id END) AS FBS,
       COUNT(CASE WHEN report_type = 'PPBS' THEN id END) AS PPBS,
        COUNT(CASE WHEN report_type = 'RBS' THEN id END) AS RBS,
         COUNT(CASE WHEN report_type = 'RBS ON GLUCOMETER' THEN id END) AS RBSONGLUCOMETER,
          COUNT(CASE WHEN report_type = 'HbA1C' THEN id END) AS HbA1C,
           COUNT(CASE WHEN report_type = 'S.CHOLESTEROL' THEN id END) AS SCHOLESTEROL,
            COUNT(CASE WHEN report_type = 'S.TRIGLY' THEN id END) AS STRIGLY,
            COUNT(CASE WHEN report_type = 'S.HDL' THEN id END) AS SHDL,
            COUNT(CASE WHEN report_type = 'S.LDL' THEN id END) AS SLDL,
            COUNT(CASE WHEN report_type = 'BLOOD UREA' THEN id END) AS BLOODUREA,
            COUNT(CASE WHEN report_type = 'S.CREATININE' THEN id END) AS SCREATININE,
            COUNT(CASE WHEN report_type = 'S.URIC ACID' THEN id END) AS SURICACID,
            COUNT(CASE WHEN report_type = 'S.BILLIRUBIN' THEN id END) AS SBILLIRUBIN,
            COUNT(CASE WHEN report_type = 'S.ALKALINE PHOSPHATE' THEN id END) AS SALKALINEPHOSPHATE,
            COUNT(CASE WHEN report_type = 'SGPT' THEN id END) AS SGPT,
             COUNT(CASE WHEN report_type = 'S.WIDAL' THEN id END) AS SWIDAL,
              COUNT(CASE WHEN report_type = 'URINE ROUTINE/MICRO' THEN id END) AS URINEROUTINEMICRO,
               COUNT(CASE WHEN report_type = 'STOOL EXAM' THEN id END) AS STOOLEXAM,
                COUNT(CASE WHEN report_type = 'S.T3' THEN id END) AS ST3,
                 COUNT(CASE WHEN report_type = 'S.TSH' THEN id END) AS STSH,
                  COUNT(CASE WHEN report_type = 'S.T4' THEN id END) AS ST4,
                   COUNT(CASE WHEN report_type = 'DANGUE NS1' THEN id END) AS DANGUENS1,
                    COUNT(CASE WHEN report_type = 'TRIPLE MARKER' THEN id END) AS TRIPLEMARKER,
                     COUNT(CASE WHEN report_type = 'HIV 1 2' THEN id END) AS HIV12,
                      COUNT(CASE WHEN report_type = 'HBSAG' THEN id END) AS HBSAG,
                       COUNT(CASE WHEN report_type = 'VDRL' THEN id END) AS VDRL,
 COUNT(*) AS Total FROM patient_report WHERE date between '$fdate' and '$tdate'";
    $run2=mysqli_query($con,$query1);
    while ($data1=mysqli_fetch_assoc($run2)){
        ?>
        <div class="result">
            <table border="1" align="center" width="1100px">
                <tr>
                    <th width="100">TOTAL CBC</th>
                    <td width="100" align="center"><?php echo $data1['CBC'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL BLOOD GROUP</th>
                    <td width="100" align="center"><?php echo $data1['BLOODGROUP'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL BLEEDING TIME</th>
                    <td width="100" align="center"><?php echo $data1['BLEEDINGTIME'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL CLOTING TIME</th>
                    <td width="100" align="center"><?php echo $data1['CLOTINGTIME'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL MP</th>
                    <td width="100" align="center"><?php echo $data1['MD'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL ESR</th>
                    <td width="100" align="center"><?php echo $data1['ESR'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL FBS</th>
                    <td width="100" align="center"><?php echo $data1['FBS'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL PPBS</th>
                    <td width="100" align="center"><?php echo $data1['PPBS'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL RBS</th>
                    <td width="100" align="center"><?php echo $data1['RBS'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL RBS ON GLUCOMETER</th>
                    <td width="100" align="center"><?php echo $data1['RBSONGLUCOMETER'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL HbA1C</th>
                    <td width="100" align="center"><?php echo $data1['HbA1C'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL S.CHOLESTEROL</th>
                    <td width="100" align="center"><?php echo $data1['SCHOLESTEROL'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL S.TRIGLY</th>
                    <td width="100" align="center"><?php echo $data1['STRIGLY'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL S.HDL</th>
                    <td width="100" align="center"><?php echo $data1['SHDL'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL S.LDL</th>
                    <td width="100" align="center"><?php echo $data1['SLDL'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL BLOOD UREA</th>
                    <td width="100" align="center"><?php echo $data1['BLOODUREA'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL S.CREATININE</th>
                    <td width="100" align="center"><?php echo $data1['SCREATININE'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL S.URIC ACID</th>
                    <td width="100" align="center"><?php echo $data1['SURICACID'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL S.BILLIRUBIN</th>
                    <td width="100" align="center"><?php echo $data1['SBILLIRUBIN'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL S.ALKALINE PHOSPHATE</th>
                    <td width="100" align="center"><?php echo $data1['SALKALINEPHOSPHATE'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL SGPT</th>
                    <td width="100" align="center"><?php echo $data1['SGPT'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL S.WIDAL</th>
                    <td width="100" align="center"><?php echo $data1['SWIDAL'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL URINE ROUTINE/MICRO</th>
                    <td width="100" align="center"><?php echo $data1['URINEROUTINEMICRO'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL STOOL EXAM</th>
                    <td width="100" align="center"><?php echo $data1['STOOLEXAM'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL ST 3</th>
                    <td width="100" align="center"><?php echo $data1['ST3'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL STSH</th>
                    <td width="100" align="center"><?php echo $data1['STSH'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL ST 4</th>
                    <td width="100" align="center"><?php echo $data1['ST4'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL DANGUE NS1</th>
                    <td width="100" align="center"><?php echo $data1['DANGUENS1'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL TRIPLE MARKER</th>
                    <td width="100" align="center"><?php echo $data1['TRIPLEMARKER'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL HIV 1 AND 2</th>
                    <td width="100" align="center"><?php echo $data1['HIV12'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL HBSAG</th>
                    <td width="100" align="center"><?php echo $data1['HBSAG'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL VDRL</th>
                    <td width="100" align="center"><?php echo $data1['VDRL'];?></td>
                </tr>
                <tr>
                    <th width="100">TOTAL REPORTS</th>
                    <td width="100" align="center" style="background-color: #333333;color: white;font-weight: bold"><?php echo $data1['Total'];?></td>
                </tr>
            </table>
        </div>
        <?php
    }
    ?>

    <?PHP
    while ($data=mysqli_fetch_assoc($run)){
        ?>
        <div class="result1">
            <table border="1" align="center" width="1100px">

                <tr>
                    <th width="100">Date</th>
                    <th width="100">Caseid</th>
                    <th width="350">Name</th>
                    <th width="300">Report-Type</th>
                    <th width="500">Notes</th>
                </tr>
                <tr>
                    <td><?php echo date('y/m/d',strtotime($data['date']));?></td>
                    <td><?php echo $data['caseid'];?></td>
                    <td><?php echo $data['name'];?></td>
                    <td><?php echo $data['report_type'];?></td>
                    <td><?php echo $data['notes'];?></td>
                </tr>
            </table>
        </div>
        <?php
    }

}
?>
<?php include ('../footer.php'); ?>