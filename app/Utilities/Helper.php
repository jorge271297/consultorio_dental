<?php

namespace App\Utilities;

class Helper {
    public static function response(int $status, string $message, array $data = []) {
        $response = [
            "status"  => $status,
            "message" => $message,
        ];
        if (count($data) > 0) {
            $response["data"] = $data;
        }

        return response()->json($response, $status);
    }
}
