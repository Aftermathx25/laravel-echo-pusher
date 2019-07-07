<?php

namespace App\Events;

use App\Message;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMessageEvent implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $message;
  public $recipent;
  public $sender;

  public function __construct(Message $message)
  {
      $this->message = $message->data;
      $this->recipent = $message->recipent_id;
      $this->sender = $message->sender_id;
  }

  public function broadcastOn()
  {
      return new PrivateChannel('App.User.'.$this->recipent);
  }

}
