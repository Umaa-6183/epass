<?php
require_once "connection.php";

  $id=$_REQUEST['id'];

  $query = "UPDATE routes SET ";
 $c=0;
 $d=0; $result=0;
  if(!empty($_POST['station_1'])) {$c=1; $us1 = $_POST['station_1']; $query .="station_1='$us1' ";  }
  if(!empty($_POST['station_2'])) {$us2 = $_POST['station_2']; if($c==1) $query .=",station_2='$us2' "; else $query .="station_2='$us2' "; $c=1;}
  if(!empty($_POST['distance'])) {$ud = $_POST['distance'];if($c==1) $query .=",distance='$ud' "; else $query .="distance='$ud' "; $c=1;}
  if(!empty($_POST['route_status'])) {$stat = $_POST['route_status'];if($c==1) $query .=",route_status='$stat' "; else $query .="route_status='$stat' "; $c=1;}
  $query .= " WHERE route_id='$id'";
  echo $query;
  $sql="";
if(!empty($_POST['rate'])) {
                          $urate=$_POST['rate'];
                          $snr_amt=$urate-($urate*(50/100));
                          $nrml_amt=$urate;
                          $std_amt=$urate-($urate*(50/100)); echo $urate.$snr_amt.$std_amt;
                          $sql="UPDATE rates SET senior_amt='$snr_amt',normal_amt='$nrml_amt',student_amt='$std_amt' WHERE route_id='$id'";
                          $d=1;

echo $sql;

                }

    if($c==1) $result=mysqli_query($con,$query);
    if($d==1) $result=mysqli_query($con,$sql);
  if($result){
    ?>
      <script type="text/javascript">
        alert("update successful");window.location.href="route_add.html";


      </script>
    <?php
  }









 ?>
