<?php
$day=date('d',strtotime($_POST['from']));

echo "<a href='x' class='btn btn-sm btn-outline-info' download='down.xls' id='btnExportSMT".$day."'>
Export 
    </a>
    <div id='dvDataSMT".$day."'>";
include ('SMTL1.php');
include ('SMTL2.php');
include ('SMTL3.php');
include ('SMTL6.php');
include ('SMTL12.php');
include ('SMTL13.php');
include ('DIPL1.php');
include ('DIPL2.php');

?>
</table>





<!-- 

$link = mysql_connect("localhost", "mysql_user", "mysql_password");
mysql_select_db("database", $link);

$sql = "SELECT id, name FROM myTable";

$result = mysql_query($sql, $link);

$rowCount = mysql_num_rows($result);

while($row = mysql_fetch_object){
    echo "id: ".$row->id." name: ".$row->name."<BR>";
}
echo "total: ".$rowCount;

 -->
















<script type="text/javascript">$('#btnExportSMT'+<?php echo $day;?>+'').click(function (e) {
    $(this).attr({
        'download': "SMTL & DIPL <?php echo $_POST['from']; ?> upto <?php echo $_POST['to']; ?>.xls",
            'href': 'data:application/csv;charset=utf-8,' + encodeURIComponent( $('#dvDataSMT'+<?php echo $day;?>+'').html())
    })
});</script>