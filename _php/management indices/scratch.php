<script type="text/javascript">
    $('.continentname').change(function () {
    var id = $(this).find(':selected')[0].id;
    //alert(id); 
    $.ajax({
        type: 'POST',
        url: '../include/continent.php',
        data: {
            'id': id
        },
        success: function (data) {
            // the next thing you want to do 
            var $country = $('#country');
            $country.empty();
            $('#city').empty();
            for (var i = 0; i < data.length; i++) {
                $country.append('<option id=' + data[i].sysid + ' value=' + data[i].name + '>' + data[i].name + '</option>');
            }

            //manually trigger a change event for the contry so that the change handler will get triggered
            $country.change();
        }
    });

});

$('.countryname').change(function () {
    var id = $(this).find(':selected')[0].id;
    $.ajax({
        type: 'POST',
        url: '../include/country.php',
        data: {
            'id': id
        },
        success: function (data) {
            // the next thing you want to do 
            var $city = $('#city');
            $city.empty();
            for (var i = 0; i < data.length; i++) {
                $city.append('<option id=' + data[i].sysid + ' value=' + data[i].name + '>' + data[i].name + '</option>');
            }
        }
    });
});
    
</script>