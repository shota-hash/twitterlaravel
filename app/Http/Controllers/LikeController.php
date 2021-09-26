<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Contact;
use App\Models\Like;

class LikeController extends Controller
{
  public function index()
  {
    $items = Like::all();
    return response()->json([
      'data' => $items
    ], 200);
  }
  public function store(Request $request)
  {
    $item = Like::where('contact_id', $request->contact_id)->where('message_id', $request->message_id)->first();
    if($item) {
      $item->delete();
    }else{
      $form = $request->all();
      $item = Like::create($form);
    }
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
  public function update(Request $request, like $like)
  {
    $update = [
      'count' => $request->count,
    ];
    $item = Like::where('id', $like->id)->update($update);
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
