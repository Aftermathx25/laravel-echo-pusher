<?php

namespace App\Repositories;

use App\User;

interface MessageRepositoryInterface
{
  /**
  * Sends message
  *
  * @param User
  * @param User
  *
  **/
  public function send(User $sender, User $recipent, $data);
}
