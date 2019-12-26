<?php
include('vendor/autoload.php');

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$test = $capsule->addConnection(['driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'realty',
    'username' => 'realty',
    'password' => '123',
    'charset' => 'utf8',
    'prefix' => '']);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
