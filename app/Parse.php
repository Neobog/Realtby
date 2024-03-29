<?php
namespace app;

use Exception;
use Illuminate\Database\Capsule\Manager as Capsule;
use SimpleXMLElement;

class Parse
{
    private Curl $post;

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
                    ['unid' => $key->unid, 'room' => $key->rooms, 'price_m' => (int)$key->price_m2, 'price_round' => $round],
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



