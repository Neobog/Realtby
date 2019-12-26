<?php
require_once('Parse.php');
for($i =1;$i<=3;$i++){
    new Parse(new Curl($i));
}
