<?php

namespace App\Lib\Utils;

use Illuminate\Support\Facades\Http;

class RequestHelper {
    public static function get($url, $params = []) {
        $response = Http::get($url, $params);
        if ($response->failed()) {
            throw new \Exception('HTTP request failed: ' . $response->body());
        }
        return json_decode($response->body());
    }
}