<?php
include ('../dbbcon.php');
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
        th{
            background-color: #363636;
            color: white;
        }

        tr:hover{
            background-color: #363636;
            color: white;
        }
        .box1{
            height: 500px;
            background-color: #cccccc;
            margin-top: -20px;
        }
        .box2{
                padding-top: 150px;
        }
        .btn{
            background-color: #4CAF50;
            color: white;
        }
        .btn:hover{
            background-color: darkgreen;
            font-weight: bold;
        }
        .heading{
            background-color: #222222;
            color: white;
            margin-top: -20px;
        }
    </style>
</head>
<body>
<?php require ('../header.php');?>
<div class="heading">
    <h2 align="center">Update Student Data</h2>
</div>
<?php
include ('../dbbcon.php');
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $query="SELECT * FROM `sform` WHERE `id`='$id'";
    $run=mysqli_query($con,$query);
    while ($data=mysqli_fetch_assoc($run)){
        ?>
        <div class="box1">
            <div class="box2">
                <form action="updateshistory1.php" method="post" enctype="multipart/form-data">
                    <table border="1" width="600px" align="center">
                         <tr>
                            <th>Name</th>
                            <td colspan="2"><input type="text" name="name" value="<?php echo $data['name'];?>" style="width: 400px"></td>
                        </tr>
                        <tr>
                            <th>Mobile no</th>
                            <td colspan="2"><input type="text" name="mno" value="<?php echo $data['mno'];?>" style="width: 400px"></td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td colspan="2"><input type="text" name="age" value="<?php echo $data['age'];?>"style="width: 400px"></td>
                        </tr>
                        <tr>
                            <th>College Name</th>
                            <td colspan="2"><input type="text" name="cname" value="<?php echo $data['cname'];?>"style="width: 400px"></td>
                        </tr>
                        <tr>
                            <th>Course</th>
                            <td colspan="2"><input type="text" name="course" value="<?php echo $data['course'];?>"style="width: 400px"></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td colspan="2"><input type="text" name="Address" value="<?php echo $data['address'];?>"style="width: 400px"></td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td colspan="2"><input type="text" name="Weight" value="<?php echo $data['weight'];?>"style="width: 400px"></td>
                        </tr>
                        <tr>
                            <th>Card Date</th>
                            <td colspan="2"><input type="text" name="carddate" value="<?php echo $data['carddate'];?>"style="width: 400px"></td>
                        </tr>
                        <tr>
                        <th>Select Card Type</th>
                        <td><input type="radio" name="card" value="Card">Card<input type="radio" name="card" value="Not-Card">Not-card</td>
                       <td><input type="text" readonly value="<?php echo $data['card']; ?>"></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                            <td colspan="3" align="center"><input type="submit" name="uodate" value="Update Data" class="btn"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <?php include ('../footer.php');
    }
}

?>
</body>
</html>