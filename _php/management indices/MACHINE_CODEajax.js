$(document).ready(function() {
  $("#MACHINE_GROUP").change(function() {
    var MACHINE_GROUP = $(this).val();
    if(MACHINE_GROUP != "") {
      $.ajax({
        url:"get-MACHINE_CODE.php",
        data:{MACHINE_GROUP:MACHINE_GROUP},
        type:'POST',
        success:function(response) {
          var resp = $.trim(response);
          $("#MACHINE_CODE").html(resp);
        }
      });
    } else {
      $("#MACHINE_CODE").html("<option value='OVERALL'>OVERALL</option>");
    }
  });
});