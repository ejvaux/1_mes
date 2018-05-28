$(document).ready(function() {


	//Change in continent dropdown list will trigger this function and
	//generate dropdown options for county dropdown
	$(document).on('change','#CName', function() {
		var CUSTOMER_CODE = $(this).val();
		if(CUSTOMER_CODE != "") {
			$.ajax({
				url:"find.php",
				type:'POST',
				data:{CUSTOMER_CODE:CUSTOMER_CODE},
				success:function(response) {
					//var resp = $.trim(response);
					if(response != '') {
						$("#ICode").removeAttr('disabled','disabled').html(response);
						$("#IName").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
					} else {
						$("#ICode, #IName").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
					}
				}
			});
		} else {
			$("#ICode, #IName").attr('disabled','disabled').html("<option value=''>------- Select --------</option>");
		}
	});


	




});
