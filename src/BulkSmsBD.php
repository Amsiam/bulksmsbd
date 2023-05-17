<?php

namespace Amsiam\BulkSmsBD;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\RequestOptions;
use SimpleXMLElement;

use Illuminate\Support\Facades\Http;

class BulkSmsBD implements BulkSmsBDInterface
{

    public function send(array $data)
    {
        $config = config('bulksmsbd');

        try {
            $url = 'http://bulksmsbd.net/api/smsapi?api_key=' . $config['api_key'] . '&senderid=' . $config['sender_id'] . '&number=' . $data['mobile_no'] . '&message=' . $data['msg'];
            $response = Http::timeout($config['timeout'])->withHeaders([
                'Accept' => '*/*',
                'Content-Type' => 'application/json',
            ])
                ->get(
                    $url
                );

            if ($response->successful()) {

                $data = json_decode($response->body());
                if ($data["error_message"]) {
                    return [
                        "error" => true,
                        "message" => $data["error_message"]
                    ];
                } else {
                    return [
                        "error" => false,
                        "message" => $data["success_message"]
                    ];
                }
            } else {
                return [
                    "error" => true,
                    "message" => "Unknown error"
                ];
            }
        } catch (\Throwable $th) {
            return [
                "error" => true,
                "message" => $th
            ];
        }
    }
}
