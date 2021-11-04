<?php
require_once('Curl.php');
require_once('vendor/autoload.php');
require_once('config.php');

use Illuminate\Database\Capsule\Manager as Capsule;

class Parse
{
    private $post;

    public function __construct(Curl $post)
    {
        $this->post = $post;
        $this->parseData();
    }

    private function parseData(): void
    {
        $xml = $this->post->returnCurl();

        $data = $this->getXML($xml);
        foreach ($data->records->record as $key) {
            if ($key->price_m2) {
                $round = $this->roundPrice($key->price_m2);
                Capsule::table('apartment')->updateOrInsert(
                    ['unid' => $key->unid, 'room' => $key->rooms, 'price_m' => $key->price_m2, 'price_round' => $round],
                    ['unid' => $key->unid]
                );
            }

        }
    }

    /**
     * @throws Exception
     */
    private function getXML($xml): ?object
    {
        return new SimpleXMLElement($xml);
    }

    private function roundPrice($number): int
    {
        if ($number < 50) {
            return 50;
        } else {
            $result = round($number / 50);
            return $result * 50;
        }
    }

}



