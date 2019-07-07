<?php

namespace App\Repositories;

use App\User;
use App\Message;

class MessageRepository implements MessageRepositoryInterface
{
  /**
  * Sends message
  *
  * @param int
  *
  *
  **/
  public function send(User $sender, User $recipent, $data)
  {
    $message = new Message;
    $message->sender_id = $sender->id;
    $message->recipent_id = $recipent->id;
    $message->data = $data;
    $message->save();

    return $message;
  }
}
