<?php

$response_data = array(
    'api_status' => 400,
);
if (empty($_POST['group_id'])) {
    $error_code    = 3;
    $error_message = 'group_id (POST) is missing';
}
if (empty($_POST['user_id'])) {
    $error_code    = 4;
    $error_message = 'user_id (POST) is missing';
}

if (empty($error_code)) {
    $group_id   = Wo_Secure($_POST['group_id']);
    $user_id   = Wo_Secure($_POST['user_id']);

    if (Wo_LeaveGroup($group_id, $user_id) === true) {
        $response_data = array(
            'api_status' => 200,
            'message' => 'removed'
        );
    }
}