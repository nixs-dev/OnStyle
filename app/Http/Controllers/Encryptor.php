<?php

namespace App\Http\Controllers;

class Encryptor extends Controller {

    public static function encrypt($input, $key) {
        $c = '';
        while (strlen($key) < strlen($input)) {
             $key .= $key;
        }
        for($i=0; $i < strlen($input); $i++) {
            $value1 = ord($input[$i]);
            $value2 = ord($key[$i]);

            $xorValue = $value1 ^ $value2;

            $c .= chr($xorValue);
        }

        return bin2hex($c);
    }

    public static function decrypt($input, $key) {
        $input = hex2bin($input);

        $c = '';

        while (strlen($key) < strlen($input)) {
             $key .= $key;
        }

        for($i=0; $i < strlen($input); $i++) {
            $value1 = ord($input[$i]);
            $value2 = ord($key[$i]);

            $xorValue = $value1 ^ $value2;
            $c .= chr($xorValue);
        }

        return $c;
    }
}

?>