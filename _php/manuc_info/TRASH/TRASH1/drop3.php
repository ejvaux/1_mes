<html>
<head></head>
<body>
	
<form method="post" action="" name="form1">
Country : <select name="country" nChange="getCity('findcity.php?country='+this.value)">
 <option value="">Select Country</option>
 <option value="1">USA</option>
 <option value="2">Canada</option>
     </select>
<br />City : <div id="citydiv">
 <select name="select">
 <option>Select City</option>
     </select>
 </div>
</form>

	<script>
		function getCity(strURL)
{         
 var req = getXMLHTTP(); // fuction to get xmlhttp object
 if (req)
 {
  req.onreadystatechange = function()
 {
  if (req.readyState == 4) { //data is retrieved from server
   if (req.status == 200) { // which reprents ok status                    
     document.getElementById('citydiv').innerHTML=req.responseText;
  }
  else
  { 
     alert("There was a problem while using XMLHTTP:\n");
  }
  }            
  }        
req.open("GET", strURL, true); //open url using get method
req.send(null);
 }
}
	</script>
</body>
</html>