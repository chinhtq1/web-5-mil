<?php

namespace App\Events\Backend\Banners;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BannerDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $banners;


    public function __construct($banners)
    {
        $this->banners = $banners;
    }
}
