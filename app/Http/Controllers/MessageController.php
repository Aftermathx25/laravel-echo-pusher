<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;
use App\User;

use App\Repositories\MessageRepositoryInterface;

class MessageController extends Controller
{
  /**
   * The message repository instance.
   */
  protected $message;

  /**
   * Create a new controller instance.
   *
   * @param  MessageRepositoryInterfaceRepository  $message
   * @return void
   */
  public function __construct(MessageRepositoryInterface $message)
  {
      $this->message = $message;
  }

  public function send(Request $request)
  {
    $data = $this->message->send($request->user(), User::findOrFail(1), 'test');
    return $data;
  }
}
