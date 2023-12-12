<?php
session_start();

if (isset($_SESSION['uid'])){
    echo "";
}else
{
    header('Location: ../login.php');
}?>
<?php
if(isset($_POST['submit'])){
    include ('../dbbcon.php');
    $caseid=$_POST['caseid'];
    $name=$_POST['name'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $Treatments=$_POST['Treatments'];
    $quantity=$_POST['quantity'];

    $query="INSERT INTO `medicine_record`(`caseid`, `name`, `date`, `Treatments`,`time`,`quantity`) VALUES ('$caseid','$name','$date','$Treatments','$time','$quantity')";
    $run=mysqli_query($con,$query);
    if($run==true){
        ?>
        <script>
            alert("Record Inserted");
            window.open("pharmacist.php","_self");
        </script>
        <?php
    }

}

?>