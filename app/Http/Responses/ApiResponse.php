<?php

namespace App\Http\Responses;

class ApiResponse {
  public static function success($message = 'Turbobanana nuclear', $statusCode = 200, $data = []) {
    return response()->json([
      'message' => $message,
      'statusCode' => $statusCode,
      'error' => false,
      'data'=> $data
    ], $statusCode);
  }

  public static function error($message = 'Turbobanana nuclear pocha', $statusCode = 422, $data = []) {
    return response()->json([
      'message' => $message,
      'statusCode' => $statusCode,
      'error' => true,
      'data'=> $data
    ], $statusCode);
  }
}
