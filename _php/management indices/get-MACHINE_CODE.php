<?php include("conn2.php"); ?>
<?php
if(isset($_POST['MACHINE_GROUP'])) {
$MG=$_POST['MACHINE_GROUP'];

  $sql = "SELECT `MACHINE_CODE` FROM `dmc_machine_list` WHERE `MACHINE_GROUP`='$MG'";
  $res = mysqli_query($conn1, $sql);
  if(mysqli_num_rows($res) >= 0) {
    echo "<option value='OVERALL'>OVERALL</option>";
    while($row = mysqli_fetch_object($res)) {
      echo "<option value='".$row->MACHINE_CODE."'>".$row->MACHINE_CODE."</option>";
    }
  }
} else {
   echo "<option value='OVERALL'>OVERALL</option>";
}
?>