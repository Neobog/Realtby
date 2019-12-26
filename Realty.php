<?php
require_once('vendor/autoload.php');
include('bd.php');
use Illuminate\Database\Capsule\Manager as Capsule;
class Realty 
{
    public function __construct()
    {
        $a = Capsule::table('apartment')->select('unid','price_m')->where('room', 1)->get();
        echo $a;
        $t = json_decode($a, true);
        // $uno = 1100;
        // $result = round($uno/50);
        // echo $result * 50;

        //echo '<br><pre>';var_dump($t);echo '</pre>';
        foreach($t as $key => $value){
            $t[$key]['price_m'] = $this->roundPrice($value['price_m']);
        }
        //echo '<br><pre>';var_dump($t);echo '</pre>';
        $json = [];
        foreach($t as $key => $value){
            array_push($json, $value['price_m']);
        }
        foreach($json as $key=>$value){
            if (in_array('50', $json)){
                //echo 1;
            }
        }
        //echo '<br><pre>';var_dump($json);echo '</pre>';
    }

    private function roundPrice($number):int
    {
        if($number <50){
            return 50;
        }else{
            
        $result = round($number/50);
        return $result * 50;

        }

    }

}
$b = new Realty();