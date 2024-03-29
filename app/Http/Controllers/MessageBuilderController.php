<?php namespace convercity\Http\Controllers;

use convercity\Http\Requests;
use convercity\Http\Controllers\Controller;

use convercity\Message;
use Illuminate\Http\Request;
use convercity\Reply;

class MessageBuilderController extends Controller {

	public function getIndex()
	{
		$replies = Reply::where('open', true)->get();
		$pre_messages = Message::all();
		$messages = [];
		foreach($pre_messages as $message)
		{
			$messages[] = ['id' => $message->id, 'text' => $message->message];
		}

		$messages = json_encode($message);

		return view('app.replies.builder', compact('replies', 'messages'));

	}

}
