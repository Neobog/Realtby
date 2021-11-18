<?php
require_once('vendor/autoload.php');
require_once('config.php');

use app\Curl;
use app\Parse;

for ($i = 1; $i <= 3; $i++) {
    try {
        new Parse(new Curl($i));
    } catch (Exception $e) {
        echo 'test';
        die;
    }

}
