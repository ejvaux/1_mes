<!DOCTYPE html>
<html>
<body>

<p>Change the date of the date field, and then click the button below.</p>

<input type="date" id="myDate" value="2000-05-05">

<p>Note that the default value is not affected when you change the value of the date field.</p>

<button type="button" onclick="myFunction()">Try it</button>
  
<p><strong>Note:</strong> input elements with type="date" do not show as any date field/calendar in IE 11 and earlier versions.</p>

<p id="demo"></p>

<script>
function myFunction() {
  var x = document.getElementById("myDate");
  var defaultVal = x.defaultValue;
  var currentVal = x.value;
  
  if (defaultVal == currentVal) {
    document.getElementById("demo").innerHTML = "Default value and current value is the same: "
    + x.defaultValue + " and " + x.value
    + "<br>Change the value of the date field to see the difference!";
  } else {
    document.getElementById("demo").innerHTML = "The default value was: " + defaultVal
    + "<br>The new, current value is: " + currentVal;
  }
}
</script>

</body>
</html>


