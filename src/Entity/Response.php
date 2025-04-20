<?php
declare(strict_types=1);

namespace App\Entity;

use App\Enum\Status;

class Response
{
    public Status $status;
    public string $message;
    public mixed $data;


    public function __construct(Status $status, string $message, mixed $data = null)
    {
        $this->status  = $status;
        $this->message = $message;
        $this->data    = $data;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getJson()
    {
        return json_encode([
            'status' => $this->status,
            'message' => $this->message,
            'data' => $this->data
        ]);
    }
}