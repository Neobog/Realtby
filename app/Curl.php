<?php
namespace app;

class Curl
{
    private $result;
    private int $count = 20; //limit apartment
    private $user;
    private $pass;
    private $room;

    public function __construct(
        int    $room,
        string $user = 'test',
        string $pass = 'test',
        string $host = 'https://realt.by/typo3conf/ext/uedb_core/getrecords.php'
    )
    {
        $this->user = $user;
        $this->pass = $pass;
        $this->room = $room;
        $host = $this->createURL($host);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $host);
        $this->result = curl_exec($ch);
        curl_close($ch);
    }

    private function createURL(string $host): ?string
    {
        $urlItems = [
            'login[user]' => $this->user,
            'login[pass]' => $this->pass,
            'config[tableid]' => 1,
            'config[type]' => 1,
            'config[page]' => 1,
            'config[records-per-page]' => $this->count,
            'select[rooms][e]' => $this->room,
        ];

        return $host . '?' . http_build_query($urlItems);
    }


    public function returnCurl(): ?string
    {
        return $this->result;
    }

}

