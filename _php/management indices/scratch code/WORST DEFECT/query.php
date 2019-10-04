<!DOCTYPE html>
<html>
<head>
  <title>jQuery autocomplete</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style type="text/css">
    #search_container {text-align: center;}
    #results {text-align: left; border: solid 1px #777; display: none; margin: 0 auto; width: 180px;}
  </style>
</head>
<body>
<div id="search_container">
   <h2>Search for country</h2>
   <input type="text" name="country" id="country" autocomplete="off">
   <div id="results"></div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#country").keyup(function(){
      var query = $(this).val();
      if (query != "") {
        $.ajax({
                url: 'query.php',
                method: 'POST',
                data: {query:query},
                success: function(data)
                {
                  $('#results').html(data);
                  $('#results').css('display', 'block');
                    $("#country").focusout(function(){
                        $('#results').css('display', 'none');
                    });
                    $("#country").focusin(function(){
                        $('#results').css('display', 'block');
                    });
                }
        });
      } else {
             $('#results').css('display', 'none');
      }
    });
  });
</script>
</body>
</html>


































<?php
  $connect = mysqli_connect("localhost", "root", "", "countries");
  if (isset($_POST['query'])) {
    $search_query = $_POST['query'];
    
  
    $query = "SELECT * FROM apps_countries WHERE country_name LIKE '$search_query%' LIMIT 12";
    $result = mysqli_query($connect, $query);
  if (mysqli_num_rows($result) > 0) {
   while ($country_row = mysqli_fetch_array($result)) {
    echo $country_row['country_name']."<br/>";
  }
} else {
  echo "<p style='color:red'>Country not found...</p>";
}
}
?>