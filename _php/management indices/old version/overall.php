<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
 window.onload = function() {
    document.getElementById('ifYes').style.display = 'none';
    document.getElementById('ifNo').style.display = 'none';
}
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.display = 'block';
        document.getElementById('ifNo').style.display = 'none';
        document.getElementById('redhat1').style.display = 'none';
        document.getElementById('aix1').style.display = 'none';
    } 
    else if(document.getElementById('noCheck').checked) {
        document.getElementById('ifNo').style.display = 'block';
        document.getElementById('ifYes').style.display = 'none';
        document.getElementById('redhat1').style.display = 'none';
        document.getElementById('aix1').style.display = 'none';
   }
}
function yesnoCheck1() {
   if(document.getElementById('redhat').checked) {
       document.getElementById('redhat1').style.display = 'block';
       document.getElementById('aix1').style.display = 'none';
    }
   if(document.getElementById('aix').checked) {
       document.getElementById('aix1').style.display = 'block';
       document.getElementById('redhat1').style.display = 'none';
    }
}
</script>
</head>
<body>
Select os :<br>
windows
<input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"/>Unix
<input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck"/>
<br>
<div id="ifYes" style="display:none">
Windows 2008<input type="radio" name="win" value="2008"/>
Windows 2012<input type="radio" name="win" value="2012"/>
</div>
<div id="ifNo" style="display:none">
Red Hat<input type="radio" name="unix" onclick="javascript:yesnoCheck1();"value="2008" 

id="redhat"/>
AIX<input type="radio" name="unix" onclick="javascript:yesnoCheck1();"  
value="2012" id="aix"/>
</div>
<div id="redhat1" style="display:none">
Red Hat 6.0<input type="radio" name="redhat" value="2008" id="redhat6.0"/>
Red Hat 6.1<input type="radio" name="redhat" value="2012" id="redhat6.1"/>
</div>
<div id="aix1" style="display:none">
aix 6.0<input type="radio" name="aix" value="2008" id="aix6.0"/>
aix 6.1<input type="radio" name="aix" value="2012" id="aix6.1"/
</div>
</body> 
</html>