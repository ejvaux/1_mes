
<!--  Session Check - START --> 
<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/1_mes/_includes/logcheck.php";
    $auth = $_SESSION['auth'];
    $auth = stripslashes($auth);
    require $_SERVER['DOCUMENT_ROOT']. '/1_mes/vendor/autoload.php';

    $dotenv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT'].'\1_mes');
    $dotenv->load();
?>
<script>

    var app_key = "<?php echo getenv('PUSHER_APP_KEY') ?>";
    var app_cluster = "<?php echo getenv('PUSHER_APP_CLUSTER') ?>";

</script>
<!--  Session Check - END -->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="/1_mes/node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/1_mes/node_modules/bootstrap-select/dist/css/bootstrap-select.min.css">

<!-- Datatables CSS link -->
<link rel="stylesheet" type="text/css" href="/1_mes/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="/1_mes/node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="/1_mes/node_modules/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="/1_mes/node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="/1_mes/node_modules/datatables.net-scroller-dt/css/scroller.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="/1_mes/node_modules/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.css">

<!-- Select datatables -->
<link rel="stylesheet" type="text/css" href="/1_mes/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">

<!-- Font Awesome -->
<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> -->
<link rel="stylesheet" href="/1_mes/node_modules/fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.min.css">
<link rel="stylesheet" type="text/css" href="/1_mes/node_modules/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/1_mes/node_modules/font-awesome-animation/dist/font-awesome-animation.min.css">

<!-- Hover.css -->
<link rel="stylesheet" type="text/css" href="/1_mes/node_modules/hover.css/css/hover-min.css">

<!-- Animate.css -->
<link rel="stylesheet" type="text/css" href="/1_mes/node_modules/animate.css/animate.min.css">

<!-- IZITOAST Notification -->
<link rel="stylesheet" href="/1_mes/node_modules/izitoast/dist/css/iziToast.min.css">

<!-- Nprogress -->
<link rel='stylesheet' href='/1_mes/node_modules/nprogress/nprogress.css'/>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- JQuery CSS -->
<link rel="stylesheet" href="/1_mes/node_modules/select2/dist/css/select2.min.css">

<!-- JQuery -->
<script src="/1_mes/node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="/1_mes/node_modules/jquery/dist/jquery.js"></script> 
<script src="/1_mes/node_modules/jquery-ui/ui/jqueryui.js"></script>
  
<script src="/1_mes/node_modules/select2/dist/js/select2.min.js"></script>

<!-- Popper JS -->
<script src="/1_mes/node_modules/popper.js/dist/umd/popper.min.js" ></script>

<!-- Bootstrap JS -->
<script src="/1_mes/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/1_mes/node_modules/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

<!-- DataTables Plugin JS -->
<script src="/1_MES/node_modules/jszip/dist/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="/1_mes/node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="/1_mes/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/1_mes/node_modules/datatables.net-fixedheader/js/dataTables.fixedHeader.js"></script>
<script src="/1_mes/node_modules/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/1_mes/node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/1_mes/node_modules/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/1_mes/node_modules/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/1_mes/node_modules/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="/1_mes/node_modules/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js"></script>

<!-- Select/altEditor datatables -->
<script src="/1_mes/node_modules/datatables.net-select/js/dataTables.select.min.js"></script>

<!-- Bootstrap Notify -->
<script src="/1_mes/node_modules/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- Sweet Alert 2 -->
<link rel="stylesheet" href="/1_mes/node_modules/sweetalert2/dist/sweetalert2.min.css">
<script src="/1_mes/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Jquery Hotkeys -->
<script src="/1_mes/node_modules/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="/1_mes/_includes/shortcuts.js"></script>

<!-- Moment.js -->
<script src="/1_mes/node_modules/moment/min/moment.min.js"></script>

<!-- IZITOAST Notification -->
<script src="/1_mes/node_modules/izitoast/dist/js/iziToast.min.js" type="text/javascript"></script>

<!-- Nprogress -->
<script src='/1_mes/node_modules/nprogress/nprogress.js'></script>

<!-- Custom CSS link -->
<link rel="stylesheet" href="/1_mes/_css/page.css">
<link rel="icon" href="/1_MES/favicon.ico"/>

<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script src="/1_mes/_includes/sessioncheck.js"></script>
<script src="/1_mes/_includes/notif/rtnotif.js"></script>

<!-- Always put this on the last line - BY: JEFF -->

<link href="/1_mes/_php/manuc_info/dist/css/tabulator.min.css" rel="stylesheet">
<script type="text/javascript" src="/1_mes/_php/manuc_info/dist/js/tabulator.min.js"></script>
<link href="/1_mes/_php/manuc_info/dist/css/tabulator_simple.min.css" rel="stylesheet">
<script type="text/javascript" src="/1_mes/node_modules/xlsx-org/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="/1_mes/node_modules/jspdf/dist/jspdf.min.js"></script>
<script type="text/javascript" src="/1_mes/node_modules/jspdf-autotable/dist/jspdf.plugin.autotable.js"></script>
<!-- End of Script -->