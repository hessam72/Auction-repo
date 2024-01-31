<?php
namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MyEvent implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $data;

  public function __construct($data)
  {
      $this->data = $data;
  }

  public function broadcastOn()
  {
    //   return ['my-channel'];
      return new PrivateChannel('my-channel');
  }

  public function broadcastAs()
  {
      return 'my-event';
  }
}