<?php
if(isset($_POST['id'])){
    include ('../dbbcon.php');
    $id=$_POST['id'];
    $name=$_POST['name'];
    $mno=$_POST['mno'];
    $age=$_POST['age'];
    $cname=$_POST['cname'];
    $course=$_POST['course'];
    $address=$_POST['Address'];
    $weight=$_POST['Weight'];
    $card=$_POST['card'];
    $cdate=$_POST['carddate'];
    $query="UPDATE `sform` SET `name`='$name',`mno`='$mno',`age`='$age',`cname`='$cname',`course`='$course',`address`='$address',`weight`='$weight',`card`='$card',`carddate`='$cdate'  WHERE `id`='$id';";
    $run=mysqli_query($con,$query);
   if($run==true){
    ?>
        <script>
            alert("Student Data Updated.....!");
            window.open("receptionist.php","_self");
        </script>
        <?php
    }
}
?>