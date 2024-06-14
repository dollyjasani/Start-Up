<?php
/**
 * Encrypt decrypt ids
 */
if (!function_exists('id_crypt')) {
    function id_crypt($string, $action = 'e')
    {
        $key = 'FbcCY2yCFBwVCUE9R+6kJ4fAL4BJxxjd';
        $iv = 'e16ce913a20dadb8';
        $output = false;
        $encrypt_method = "AES-256-CBC";

        if ($action == 'e') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, null, $iv));
        } else if ($action == 'd') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, null, $iv);
        }

        return $output;
    }
}