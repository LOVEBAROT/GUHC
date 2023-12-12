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
        <title>SearchStudents</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">

        <style>
            .showstudents{
                background-color: #cccccc;
            }
            table,td,th{
                overflow: hidden;
                table-layout: fixed;
            }
            th{
                background-color: #363636;
                color: white;
            }
            tr:hover{
                background-color: #363636;
                color: white;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
   <?php require ('../header.php');?>
    <div class="showstudents">

        <?php error_reporting(0);
        include ('../dbbcon.php');
        $date=date("d/m/y");
        $query1="SELECT `caseno` FROM srecord WHERE date='$date' AND `ctype`='Others'";
        $run1=mysqli_query($con,$query1);
        while ($data1=mysqli_fetch_assoc($run1)){
            $caseno[]=$data1['caseno'];
        }$caseid=join("','",$caseno);
        ?>
        <?php
        include ('../dbbcon.php');


        $query="SELECT * FROM `sform` WHERE `caseid` IN ('$caseid') And `name`!=''";

        $run=mysqli_query($con,$query);
        if(mysqli_num_rows($run)<1){
            ?>
            <script>
                alert("sorry...No Case Found....!");
                window.open('doctor.php','_self')
            </script>
        <?php
        }else
        {

        $count=0;
        while ($data=mysqli_fetch_assoc($run)){
        $count++;
        ?>
            <div class="sbox" style="margin-right: auto;margin-left: auto">
                <table border="1" align="center" style="width: 1350px">
                    <tr style="background-color: #d8c499;">
                        <th width="100">Sr.No</th>
                        <th width="100">Case No</th>
                        <th width="400">Name</th>
                        <th width="100">Gender</th>
                        <th width="300">Add Medical Record</th>
                    </tr>
                    <tr align="center" >
                        <td><?php echo $count?></td>
                        <td><?php echo $data['caseid'];?></td>
                        <td><?php echo $data['name'];?></td>
                        <td><?php echo $data['gender'];?></td>
                        <td style="background-color:darkgreen"><a href="updatestudentform.php?sid= <?php echo $data['id']; ?>&caseid=<?php echo $data['caseid'];?>" style="color: white;font-weight: bold">Add Medical Record</a></td>
                    </tr>

                </table>
            </div>
            <?PHP

        }

        }

        ?>
    </div>
    </body>
    </html>
<?php include ('../footer.php');?>