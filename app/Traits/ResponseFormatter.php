<?php

namespace App\Traits;

trait ResponseFormatter
{
  protected function success($data, $message = "success", $code = 200)
  {
    $payload = [
      'status' => 'success',
      'message' => $message,
      'data' => $data
    ];

    return response()->json($payload, $code);
  }

  protected function error($errors, $message = "INTERNAL_SERVER_ERROR")
  {
    $payload = [
      'status' => 'error',
      'message' => $message,
      'errors' => $errors
    ];

    $code = 500;

    if ($message === "INTERNAL_SERVER_ERROR") {
      $payload['message'] = "INTERNAL_SERVER_ERROR";
    } else if ($message === "NOT_FOUND") {
      $payload['message'] = "NOT_FOUND";
      $code = 404;
    } else if ($message === "UNAUTHORIZED") {
      $payload['message'] = "UNAUTHORIZED";
      $code = 401;
    } else if ($message === "FORBIDDEN") {
      $payload['message'] = "FORBIDDEN";
      $code = 403;
    } else if ($message === "UNPROCESSABLE_ENTITY") {
      $payload['message'] = "UNPROCESSABLE_ENTITY";
      $code = 422;
    } else if ($message === "BAD_REQUEST") {
      $payload['message'] = "BAD_REQUEST";
      $code = 400;
    } else if ($message === "VALIDATION_ERROR") {
      $payload['message'] = "VALIDATION_ERROR";
      $code = 422;
    }

    return response()->json($payload, $code);
  }
}
