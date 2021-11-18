<?php
namespace app;

use Illuminate\Database\Capsule\Manager as Capsule;

class Realty
{
    private $room;

    public function __construct($room)
    {
        $this->room = $room;
    }

    private function getAmChartData(): object
    {
        return Capsule::table('apartment')->select(Capsule::raw('count(*) as user_count, price_round'))
            ->where('room', $this->room)
            ->groupBy('price_round')
            ->orderBy('price_round')
            ->get();
    }

    public function showAmChartData()
    {
        echo $this->getAmChartData();
    }


}