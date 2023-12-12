<?php
if(isset($_POST['id'])){
    include ('../dbbcon.php');
    $id=$_POST['id'];
    $name=$_POST['name'];
    $mno=$_POST['mno'];
    $age=$_POST['age'];
    $department=$_POST['department'];
    $Designation=$_POST['Designation'];
    $address=$_POST['Address'];
    $weight=$_POST['Weight'];

    $query="UPDATE `sform` SET `name`='$name',`mno`='$mno',`age`='$age',`department`='$department',`Designation`='$Designation',`address`='$address',`weight`='$weight'  WHERE `id`='$id';";
    $run=mysqli_query($con,$query);
    if($run==true){
        ?>
        <script>
            alert("Patient Data Updated.....!");
            window.open("receptionist.php","_self");
        </script>
        <?php
    }
}
?>