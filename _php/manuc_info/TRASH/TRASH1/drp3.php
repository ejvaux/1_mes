<? $country=$_GET['country'];
$link = mysql_connect('localhost', 'root', ''); /change the configuration if required
if (!$link) {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('school'); //change this if required
$query="select city from city where countryid=$country";
$result=mysql_query($query);?>
<select name="city">
<option>Select City</option>
<? while($row=mysql_fetch_array($result)) { ?>
   <option value><?=$row['city']?></option>
<? } ?>
</select>