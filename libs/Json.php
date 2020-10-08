<?php

class Json
{
    public static function ajaxReturn($status, $message = null, $result = null)
    {
        $response['status'] = $status;
        $response['result'] = $result;
        $response['message'] = $message;

        echo json_encode($response);
    }
}