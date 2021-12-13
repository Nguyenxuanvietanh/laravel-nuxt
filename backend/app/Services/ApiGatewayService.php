<?php

namespace App\Services;

class ApiGatewayService
{
    /**
     * Call API gateway services.
     *
     * @return void
     */
    public function call_api($endpoint, $method, $params)
    {
        $endpoint   = env('API_ENDPOINT') . $endpoint;
        $token      = env('API_TOKEN', null);
        $timeout    = env('API_TIMEOUT', 10);

        try {
            if($token){
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $endpoint);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
                curl_setopt($ch, CURLOPT_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

                $header = array(
                    'Content-Type: application/json;charset=utf-8',
                    // 'Authorization: x-api-key ' . $token,
                );

                if(!empty($custom_header)){
                    $header = array_merge($header, $custom_header);
                }

                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

                if($method == 'POST' && $params) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
                }

                $response   = curl_exec($ch);
                $err        = curl_errno($ch);
                $httpcode   = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                curl_close($ch);

                if($err){
                    $response = [
                        'status' => 0,
                        'error'  => $err
                    ];
                } else {
                    $response = (array) json_decode($response);
                }

                return $response;
            } else {

            }
        } catch (\Exception $e) {
            http_response_code(500);
            return json_encode([
                'status'    => 0,
                'code'      => 500,
                'message'   => $e->getMessage()
            ]);
        }
    }
}
