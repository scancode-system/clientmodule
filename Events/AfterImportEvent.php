<?php

namespace Modules\Client\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Client\Entities\Client;

class AfterImportEvent
{
    use SerializesModels;

    private $data;
    private $client;

    public function __construct(Client $client, $data)
    {
        $this->client = $client;
        $this->data = $data;
    }

    public function client()
    {
        return $this->client;
    }

    public function data()
    {
        return $this->data;
    }
}
