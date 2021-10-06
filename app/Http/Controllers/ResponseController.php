<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;

class ResponseController extends Controller
{
    public function index()
  {
    $items = Response::all();
    foreach ($items as $item) {
      $item->message;
    }
    return response()->json([
      'data' => $items
    ], 200);
  }
  public function store(Request $request)
  {
    $item = Response::create($request->all());
    return response()->json([
      'data' => $item
    ], 201);
  }
  public function show(Response $response)
  {
    $response->message;
    if ($response) {
      return response()->json([
        'data' => $response
      ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
  public function update(Request $request, Response $response)
  {
    $update = [
      'reply' => $request->reply,
    ];
    $item = Response::where('id', $response->id)->update($update);
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
  public function destroy(Response $response)
  {
    $item = Response::where('id', $response->id)->delete();
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
