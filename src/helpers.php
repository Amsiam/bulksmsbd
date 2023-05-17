<?php

if (!function_exists('bulksmsbd')) {
    function bulksmsbd(array $data)
    {
        return app('BulkSmsBD')->send($data);
    }
}
