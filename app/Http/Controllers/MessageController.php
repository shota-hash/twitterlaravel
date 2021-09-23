<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Contact;

class MessageController extends Controller
{
    public function index()
  {
    $items = Message::with('like')->get();
    foreach ($items as $item) {
      $item->like()->count();
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
}

