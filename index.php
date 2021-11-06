<?php
require_once('Parse.php');
for ($i = 1; $i <= 3; $i++) {
    try {
        new Parse(new Curl($i));
    } catch (Exception $e) {
        echo 'test';
        die;
    }

}
