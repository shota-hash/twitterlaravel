<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Contact;
use App\Models\Like;

class MessageController extends Controller
{
  public function index()
  {
    $items = Like::all();
    foreach ($items as $item) {
      $item->message;
    }
    return response()->json([
      'data' => $items
    ], 200);
  }
  public function store(Request $request)
  {
    $item = Like::create($request->all());
    return response()->json([
      'data' => $item
    ], 201);
  }
  public function show(Like $like)
  {
    $item = Like::find($like);
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
  public function destroy(Like $like)
  {
    $item = Like::where('id', $like->id)->delete();
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
