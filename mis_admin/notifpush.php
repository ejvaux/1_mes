<?php
    require $_SERVER['DOCUMENT_ROOT']. '/1_mes/vendor/autoload.php';

    $dotenv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT'].'\1_mes');
    $dotenv->load();

    $options = array(
        'cluster' => getenv('PUSHER_APP_CLUSTER'),
        'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
        getenv('PUSHER_APP_KEY'),
        getenv('PUSHER_APP_SECRET'),
        getenv('PUSHER_APP_ID'),
        $options
    );

    $data['message'] = "success";
    $pusher->trigger('notif', 'my-event', $data);

    echo "true";
?>