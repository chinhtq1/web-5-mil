<?php

namespace App\Events\Backend\Partners;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PartnerCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $partners;


    public function __construct($partners)
    {
        $this->partners = $partners;
    }
}
