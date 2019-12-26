<?php

class Curl
{
    private $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
    private $result;
    private $count = 20; //limit apartment
    private $user;
    private $pass;
    private $room;

    public function __construct(int $room, string $user = 'test', string $pass = 'test' ,string $host = 'https://realt.by/typo3conf/ext/uedb_core/getrecords.php')
    {
        $this->user = $user;
        $this->pass = $pass;
        $this->room = $room;
        $host = $this->createURL($host);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $host);
        $this->result = curl_exec($ch);
    }

    private function createURL(string $host): ?string
    {
        $url = $host . '?login[user]=' . $this->user . '&login[pass]=' . $this->pass . '&config[tableid]=1&config[type]=1&config[page]=1&config[records-per-page]=' . $this->count . '&select[rooms][e]=' . $this->room . '';
        return $url;
    }


    public function returnCurl(): ?string
    {
        return $this->result;
    }

    public function __destruct()
    {
        curl_close($this->result);
    }
}

