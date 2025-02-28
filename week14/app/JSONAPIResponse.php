<?php

namespace App;

trait JSONAPIResponse
{
	public function success($data = null, $message = 'success', $code = 200) {
		return response()->json([
			'status' => 'success',
			'message' => $message,
			'data' => $data
		], $code);
	}	

	public function error($message = 'error', $code = 400) {
		return response()->json([
			'status' => 'error',
			'message' => $message,
		], $code);
	}
}
