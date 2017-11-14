<?php
require_once "connection.php";
$id=$_GET['id'];
$sql="select * from routes natural join rates where route_id='$id'";
$result=mysqli_query($con, $sql); $rows=mysqli_fetch_assoc($result);
?>

<h3 align="center">Route detais</h3><hr><br>
Station 1:<?php echo $rows["station_1"];?><br>
Station 2:<?php echo $rows["station_2"];?><br>
Distance:<?php echo $rows["distance"];?><br>
Normal Rate:<?php echo $rows["normal_amt"];?><br>
Student Rate:<?php echo $rows["student_amt"];?><br>
Senior Citizen Rate:<?php echo $rows["senior_amt"];?><br>

<input type="submit" name="delete" value="delete route" onclick="getConfirmation()"><br>

<script type="text/javascript">
   <!--
      function getConfirmation(){
         var retVal = confirm("Are you sure you want to delete this route?");
         if( retVal == true ){
           <?php
              $sql="UPDATE routes set route_status=0 WHERE route_id='$id'";
              $result=mysqli_query($con,$sql);
              if($result) $s="route deleted successfully";
             ?>
             alert("<?php echo $s; ?>");
             window.location.href="route_add.html";
            return true;
         }
         else{
           <?php
           $s="route deletion cancelled";

           ?>
           alert("<?php echo $s; ?>");
           window.location.href="route_search.html";
            return false;
         }
      }
   //-->
</script>
