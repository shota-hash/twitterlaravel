<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Like;
use App\Models\Contact;

class MessageController extends Controller
{
    public function index()
  {
    $items = Message::all();
    foreach($items as $item) {
      $item->contact;
    }
    return response()->json([
      'data' => $items
    ], 200);
  }
  public function store(Request $request)
  {
    $item = Message::create($request->all());
    return response()->json([
      'data' => $item
    ], 201);
  }
  public function show(Message $message)
  {
    $item = Message::find($message);
    if ($item) {
      return response()->json([
        'data' => $item
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
  public function update(Request $request, Message $message)
  {
    $update = [
      'news' => $request->news,
    ];
    $item = Message::where('id', $message->id)->update($update);
    if ($item) {
      return response()->json([
        'message' => 'Updated successfully',
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
  public function destroy(Message $message)
  {
    $item = Message::where('id', $message->id)->delete();
    if ($item) {
      return response()->json([
        'message' => 'Deleted successfully',
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
  public function __construct()
  {
    $this->middleware(['contact', 'verified'])->only(['like', 'unlike']);
  }
  public function like($id)
  {
    Like::create([
      'message_id' => $id,
      'contact_id' => Contact::id(),
    ]);

    session()->flash('success', 'You Liked the Message.');

    return redirect()->back();
  }
  public function unlike($id)
  {
    $like = Like::where('message_id', $id)->where('contact_id', Contact::id())->first();
    $like->delete();

    session()->flash('success', 'You Unliked the Message.');

    return redirect()->back();
  }
}

