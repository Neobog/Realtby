<?php
require_once('vendor/autoload.php');
require_once('config.php');

use Illuminate\Database\Capsule\Manager as Capsule;

class Realty
{
    private $room;

    public function __construct($room)
    {
        $this->room = $room;
        echo $this->getAmChartData();
    }

    private function getAmChartData(): object
    {
        return Capsule::table('apartment')->select(Capsule::raw('count(*) as user_count, price_round'))
            ->where('room', $this->room)
            ->groupBy('price_round')
            ->get();
    }


}

$data = new Realty($_REQUEST);