<?php

include $_SERVER['DOCUMENT_ROOT'].'/1_mes/_php/manuc_info/1_MES_DB.php';


if (isset($_POST['CUSTOMER_CODE1'])) 
{	
	$ccode=$_POST['CUSTOMER_CODE1'];

	$qry = "select * from dmc_item_list where CUSTOMER_CODE='$ccode'";
	$res = mysqli_query($conn, $qry);
	if(mysqli_num_rows($res) > 0) {
		echo '<option value="">------- Select -------</option>';
		while($row = mysqli_fetch_object($res)) {
			echo '<option value="'.$row->ITEM_CODE.'">'.$row->ITEM_CODE.'</option>';

		}
	} else {
		echo '<option value="">No Record</option>';
	}
}
	
	
else if (isset($_POST['CUSTOMER_CODE'])) 
{	
	$ccode=$_POST['CUSTOMER_CODE'];


	$qry = "select * from dmc_customer where CUSTOMER_NAME='$ccode'";
	$res = mysqli_query($conn, $qry);
	if(mysqli_num_rows($res) > 0) {
		echo '<option value="">------- Select -------</option>';
		while($row = mysqli_fetch_object($res)) {
			echo '<option value="'.$row->CUSTOMER_CODE.'">'.$row->CUSTOMER_CODE.'</option>';

		}
	} else {
		echo '<option value="">No Record</option>';
	}
	
}
	



else if (isset($_POST['ITEM_CODE'])) 
{	
	$ccode=$_POST['ITEM_CODE'];

	$qry = "select * from dmc_item_list where ITEM_CODE='$ccode'";
	$res = mysqli_query($conn, $qry);
	if(mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_object($res)) {
			echo '<option value="'.$row->ITEM_NAME.'">'.$row->ITEM_NAME.'</option>';

		}
	} else {
		echo '<option value="">No Record</option>';
	}
}
	







