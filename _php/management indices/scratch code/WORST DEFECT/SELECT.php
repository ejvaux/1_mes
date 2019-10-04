<?php
 $defect_name=$_POST['name'];
  $defect_id=$_POST['id'];
    $from=date('Y-m-d H:i:s', strtotime($_POST['from'].' 06:00:00'));
    $to=date('Y-m-d H:i:s', strtotime($_POST['to'].' 05:59:59'));
?>

<form action="select1.php" method="post" id="my_form">

  <input type="text" name="defect_name" value="<?php echo $defect_name; ?>" />
    <input type="text" name="defect_id" value="<?php echo $defect_id; ?>" />
      <input type="text" name="from" value="<?php echo $from; ?>" />
        <input type="text" name="to" value="<?php echo $to; ?>" />
    <input type="text" name="serial_number" />
    <div style="display: none;"><input type="submit" name="submit" value="Submit Form" /></div>
<div id="server-results"><!-- For server results --></div>
</form>

<script type="text/javascript">
  document.getElementById("#my_form").submit();
  $("#my_form").submit(function(event){
  event.preventDefault(); //prevent default action 
  var post_url = $(this).attr("action"); //get form action url
  var request_method = $(this).attr("method"); //get form GET/POST method
  var form_data = $(this).serialize(); //Encode form elements for submission
  
  $.ajax({
    url : post_url,
    type: request_method,
    data : form_data
  }).done(function(response){ //
    $("#server-results").html(response);
  });
});
</script>