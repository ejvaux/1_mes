<html>
<body>
 <div> 
 <?php 

		include('conn.php');
				$line = $conn->query("SELECT ID, MACHINE_CODE FROM mis_prod_plan_dl where MACHINE_CODE like 'S%'group by MACHINE_CODE ASC ");
				//or die("Invalid query: " . mysql_query());
			//	$rowCount = $line->num_rows;
				echo '<label>Option:</label>';
				echo '<select>';
				//if ($rowCount > 0){
				echo '<option value=" ">Select Line</option>';
				while ($lrow = $line->fetch_assoc()) {
				
			//	$lrow['MACHINE_CODE'];
				echo "<option value='".$lrow['ID']."'>";
				echo $lrow['MACHINE_CODE']."</option>";
				} //}
				echo '</select>'; 
	?>

  </div>


	<div> 
 <?php 

		include('conn1.php');
				$line = $conn1->query("SELECT id, name FROM smt_line_names where name like 'SMTL%' order by id");
				//or die("Invalid query: " . mysql_query());
			//	$rowCount = $line->num_rows;
				echo '<label>Option:</label>';
				echo '<select>';
				//if ($rowCount > 0){
				echo '<option value=" ">Select Line</option>';
				while ($lrow = $line->fetch_assoc()) {
				
			//	$lrow['MACHINE_CODE'];
				echo "<option value='".$lrow['id']."'>";
				echo $lrow['name']."</option>";
				} //}
				echo '</select>'; 
	?>

  </div>
  
</body>
  </html>