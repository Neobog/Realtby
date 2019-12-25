<?php
include('vendor/autoload.php');

use Illuminate\Database\Capsule\Manager as Capsule;

//$a = (int)((0.1+0.8)*10);
//var_dump($a);
//$array = array(
//
//    'count' => 1,
//
//    'references' => 0,
//
//    'ghosts' => 1
//
//);
//
//var_dump(in_array('aurelio', $array, true));
//echo 'first professional web developer on this computer';
$capsule = new Capsule();
$test = $capsule->addConnection(['driver' => 'pgsql',
    'host' => 'localhost',
    'database' => 'bot',
    'username' => 'admin',
    'password' => 'agent',
    'charset' => 'utf8',
    'prefix' => '']);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();


var_dump($test);//$capsule = new Capsule();
//$test = $capsule->addConnection(['driver'    => 'pgsql',
//    'host'      => 'localhost',
//    'database'  => 'bot',
//    'username'  => 'admin',
//    'password'  => 'agent',
//    'charset'   => 'utf8',
//    'prefix'    => '']);
//var_dump($test);
//$data = Capsule::table('city.cards')->get();
//var_dump($data);
$data = Capsule::table('city.cards')->get();
foreach ($data as $user) {
    echo $user->name;
}
//var_dump($data);
//
//    $dbh = new PDO('pgsql:host=localhost;dbname=bot;user=admin;password=agent');
//$result = $dbh->query('SELECT * FROM city.cards');
//    foreach ($result as $key){
//        var_dump($key);
//
//    }
//    var_dump($dbh);


'create table apartment
(
    id      int auto_increment
        primary key,
    unid    varchar(20) not null,
    room    int         not null,
    price_m int         not null
);';
