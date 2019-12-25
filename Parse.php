<?php
require_once ('Curl.php');
require_once('vendor/autoload.php');
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

        $data = new SimpleXMLElement($this->xml);
            //file_put_contents('test.txt', $xmll);
            foreach ($data->records->record as $key){
                echo '<br>';
                echo $key->unid;
                echo '<br>';
                echo $key->price_m2;
            }


    }

    private function validate($validate)
    {
        $key = key($validate);
        $url = str_replace('_', '.', $key);
        $result = filter_var($url, FILTER_VALIDATE_URL);
        return $result;
    }

    private function initQuery()
    {
        $this->document = phpQuery::newDocument($this->data);
    }

    private function parseText()
    {
        $document = $this->document;
        $text = $document->find('record')->text();
        $this->text = $text;
        return $text;

    }

    private function pasreImage()
    {
        $image = $this->document;
        $img = $image->find('.article__main-image')->find('img')->attr('src');
        $this->img = $img;
        return $img;
    }

    public function parse()
    {
        $text = $this->parseText();
        var_dump($text);
        //$image = $this->pasreImage();

    }

    public function __destruct()
    {
        $this->document = phpQuery::unloadDocuments();
    }


}
$a = new Parse(new Curl(1));

