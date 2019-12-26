<?php
require_once ('Curl.php');
require_once('vendor/autoload.php');
include('bd.php');
use Illuminate\Database\Capsule\Manager as Capsule;
class Parse
{
    private $xml;
    private $document;
    private $text;
    private $img;

    public function __construct(Curl $post)
    {

        $xml = $post->returnCurl();
        $this->xml = iconv('Windows-1251','UTF-8',$xml);
        //file_put_contents('test.txt', $this->xml);

        $data = new SimpleXMLElement($this->xml);
            //file_put_contents('test.txt', $xmll);
            foreach ($data->records->record as $key){
                Capsule::table('apartment')->updateOrInsert(
                    ['unid' => $key->unid, 'room' => $key->rooms, 'price_m' => $key->price_m2],
                    ['unid' => $key->unid]
                );
            }


    }

    private function validate($validate)
    {
        $key = key($validate);
        $url = str_replace('_', '.', $key);
        $result = filter_var($url, FILTER_VALIDATE_URL);
        return $result;
    }

   

    private function parseText()
    {
        $document = $this->document;
        $text = $document->find('record')->text();
        $this->text = $text;
        return $text;

    }

   

    public function parse()
    {
        $this->parseText();

    }



}
$a = new Parse(new Curl(1));

