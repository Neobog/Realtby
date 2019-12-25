<?php

class Curl
{
    private $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
    private $result;
    private $count = 3; //limit news
    private $user;
    private $pass;
    private $room;

    public function __construct(int $room, string $host = 'https://realt.by/typo3conf/ext/uedb_core/getrecords.php', string $user = 'test', string $pass = 'test')
    {
        $this->user = $user;
        $this->pass = $pass;
        $this->room = $room;
        $host = $this->createURL($host);
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_USERAGENT, $this->agent);
        curl_setopt($ch, CURLOPT_URL, $host);
        $this->result = curl_exec($ch);
    }

    private function createURL(string $host): ?string
    {
        $url = $host. '?login[user]='.$this->user.'&login[pass]='.$this->pass.'&config[tableid]=1&config[type]=1&config[page]=1&config[records-per-page]='.$this->count.'&select[rooms][e]='.$this->room.'';
        return $url;
    }


    public function returnJson(): ?array
    {
        $data = json_decode($this->result, true);
        return $data;
    }

    public function returnCurl(): ?string
    {
        return $this->result;
    }

    public function __destruct()
    {
        curl_close($this->data);
    }
}
