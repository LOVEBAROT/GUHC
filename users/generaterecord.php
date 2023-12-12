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
      <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <link href="lib/stylesheets/jquery.ui.all.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="lib/stylesheets/app.css" rel="stylesheet" type="text/css"/>
    <script src="lib/javascripts/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="lib/javascripts/jquery-ui-1.8.20.custom.js" type="text/javascript"></script>
     <link rel="stylesheet" type="text/css" href="../css/style.css">
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
        .record{
            background-color: #cccccc;
            height: 300px;
            margin-top: -20px;
        }
        .rform{
            padding-top: 100px;

        }
        .showop{

                padding-top: 70px;
        }
        .op{
            background-color: #cccccc;
            height: 200px;

        }
        .sbox{

            background-color:#cccccc;
            padding-top: 10px;

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
}
#back2Top:hover {
    background-color: #DDF;
    color: #000;
}
    </style>
</head>
<body>
<?php require ('../header.php');?>
<div class="heading">
    <a id="back2Top" title="Back to top" href="#">&#10148;</a>
    <h2 align="center">Generate Student Record</h2>
</div>
    <div class="record">
        <div class="rform">
            <form method="post" action="generaterecord.php">
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
    $fdate=date('d/m/y',strtotime($_POST['fdate']));

    $tdate=date('d/m/y',strtotime($_POST['tdate']));
    $query="SELECT COUNT(CASE WHEN gender = 'male' THEN id END) AS males,
 COUNT(CASE WHEN gender = 'female' THEN id END) AS females, 
 COUNT(*) AS Total FROM srecord WHERE date between '$fdate' and '$tdate'";

    $query1="SELECT SUM(rupee) as rupee FROM srecord WHERE date between '$fdate' and '$tdate'";

    $query2="SELECT COUNT(CASE WHEN ctype = 'Student' THEN id END) AS student, 
COUNT(CASE WHEN ctype = 'Staff' THEN id END) AS staff, 
COUNT(CASE WHEN ctype = 'Others' THEN id END) AS others, 
COUNT(*) AS Total1 FROM srecord WHERE date between '$fdate' and '$tdate'";

    $query3="SELECT * FROM srecord WHERE date between '$fdate' and '$tdate' And `ctype`='Student'";
    $query4="SELECT * FROM srecord WHERE date between '$fdate' and '$tdate' And `ctype`='Staff'";
    $query5="SELECT * FROM srecord WHERE date between '$fdate' and '$tdate' And `ctype`='Others'";

    $run=mysqli_query($con,$query);
    $run1=mysqli_query($con,$query1);
    $run2=mysqli_query($con,$query2);
    $run3=mysqli_query($con,$query3);
    $run4=mysqli_query($con,$query4);
    $run5=mysqli_query($con,$query5);
    $data1=mysqli_fetch_assoc($run1);
    $data2=mysqli_fetch_assoc($run2);
    if(mysqli_num_rows($run)<1){
        ?><script>alert("No record found")</script><?PHP
    }
    else{

        while ($data=mysqli_fetch_assoc($run)){

            ?>

            <div class="op">

                <div class="showop">
                    <table border="1" align="center" width="1100">
                        <tr >
                            <th width="150">Total Students</th>
                            <th width="150">Total Staff Members</th>
                            <th width="150">Total Others Cases</th>
                            <th width="150">Total Cases</th>
                            <th width="150">Total Males</th>
                            <th width="150">Total Females</th>
                            <th width="150">Total Cases</th>
                            <th width="150">Total Amount</th>
                        </tr>
                        <tr align="center">
                            <td><?php echo $data2['student'];?></td>
                            <td><?php echo $data2['staff'];?></td>
                            <td><?php echo $data2['others'];?></td>
                            <td style="background-color: #333333;color: white;font-weight: bold"><?php echo $data2['Total1'];?></td>
                            <td><?php echo $data['males'];?></td>
                            <td><?php echo $data['females'];?></td>
                            <td><?php echo $data['Total'];?></td>
                            <td  style="background-color: #333333;color: white;font-weight: bold"><?php echo $data1['rupee']." Rupees";?></td>
                        </tr>

                    </table>
                </div>
            </div>

            <?php
        }
    }

}if (isset($run3) && mysqli_num_rows($run3)>0){
    ?><div class="heading">
        <h2 align="center">Student Record</h2>
    </div><?php
}
    $count=0;

    ?>  <?php
    while($data3=mysqli_fetch_assoc($run3)){
        $count++;
        ?>

    <div class="sbox">
                <table border="1" align="center" width="1100px">
                    <tr style="background-color: #555555;color: white">
                        <th width="50">Sr.No</th>
                        <th width="100">Date</th>
                        <th width="100">caseNO</th>
                        <th width="250">Name</th>
                        <th width="80">Gender</th>
                        <th width="80">Rupee</th>

                    </tr>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo date('y/m/d',strtotime($data3['date']));?></td>
                        <td><?php echo $data3['caseno'];?></td>
                        <td><?php echo $data3['name'];?></td>
                        <td><?php echo $data3['gender'];?></td>
                        <td><?php echo $data3['rupee'];?></td>
                    </tr>
                </table>
    </div>
        <?php

    }if (isset($run5)&& mysqli_num_rows($run5)>0){
    ?><div class="heading">
        <h2 align="center">Others Case Record</h2>
    </div><?php
}
    $count2=0;
    ?>  <?php
    while($data5=mysqli_fetch_assoc($run5)){
        $count2++;
        ?>

        <div class="sbox">
            <table border="1" align="center" width="1100px">
                <tr style="background-color: #555555;color: white">
                    <th width="50">Sr.No</th>
                    <th width="100">Date</th>
                    <th width="100">caseNO</th>
                    <th width="250">Name</th>
                    <th width="80">Gender</th>
                    <th width="80">Rupee</th>

                </tr>
                <tr>
                    <td><?php echo $count2;?></td>
                    <td><?php echo date('y/m/d',strtotime($data5['date']));?></td>
                    <td><?php echo $data5['caseno'];?></td>
                    <td><?php echo $data5['name'];?></td>
                    <td><?php echo $data5['gender'];?></td>
                    <td><?php echo $data5['rupee'];?></td>
                </tr>
            </table>
        </div>
        <?php
    }
if (isset($run4)&& mysqli_num_rows($run4)>0){
    ?><div class="heading">
        <h2 align="center">Staff Record</h2>
    </div><?php
}
    $count1=0;
    ?><?php
    while($data4=mysqli_fetch_assoc($run4)){
        $count1++;
        ?>

        <div class="sbox">
            <table border="1" align="center" width="1100px">
                <tr>
                    <th width="50">Sr.No</th>
                    <th width="100">Date</th>
                    <th width="100">Book No</th>
                    <th width="250">Name</th>
                    <th width="80">Gender</th>
                    <th width="100">Relation</th>
                    <th width="80">Rupee</th>
                </tr>
                <tr>
                    <td><?php echo $count1;?></td>
                    <td><?php echo date('y/m/d',strtotime($data4['date']));?></td>
                    <td><?php echo $data4['sbookno'];?></td>
                    <td><?php echo $data4['name'];?></td>
                    <td><?php echo $data4['gender'];?></td>
                    <td><?php echo $data4['srelation'];?></td>
                    <td><?php echo $data4['rupee'];?></td>
                </tr>
            </table>
        </div>
        <?php

    }
    ?>

<?php  require ('../footer.php');?>