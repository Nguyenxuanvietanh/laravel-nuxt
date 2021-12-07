<?php

namespace App\Services;
use App\Services\ApiGatewayService;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class TrolleyService
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function currentLocation()
    {
        $response = [];
        // $cache_key = 'current_location';
        // if(Cache::get($cache_key)){
        //     $response = Cache::get($cache_key);
        // } else {
        //     $endpoint = '/trolley';
        //     $response = $this->apiGateway($endpoint);
        //     Cache::put($cache_key, $response);
        // }
        $endpoint = '/trolley';
        $response = $this->apiGateway($endpoint);
        if($response && !empty($response['response'])){
            $response = $response['response'];
        }

        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function itemCurrentLocation($slug)
    {
        $response = [];
        $cache_key = "current_location_$slug";
        if(Cache::get($cache_key)){
            $response = Cache::get($cache_key);
        } else {
            $endpoint = "/trolley/{$slug}";
            $response = $this->apiGateway($endpoint);
            Cache::put($cache_key, $response);
        }

        if($response && !empty($response['response'])){
            $response = $response['response'];
        }
    
        return $response;
    }

    /**
     * Post current location.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCurrentLocation($request)
    {
        $response               = [];
        $input['imported_time'] = Carbon::now()->format('Y-m-d H:i:s');
        $endpoint               = "/current_location";

        $response               = $this->apiGateway($endpoint, 'POST', $request);
    
        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function basicLocation()
    {
        $response     = [];
        // $cache_key    = "basic_location";
        // if(Cache::get($cache_key)){
        //     $response = Cache::get($cache_key);
        // } else {
        //     $endpoint = '/basic_location';
        //     $response = $this->apiGateway($endpoint);
        //     Cache::put($cache_key, $response);
        // }
        $endpoint = '/basic_location';
        $response = $this->apiGateway($endpoint);
        if($response && !empty($response['response'])){
            $response = $response['response'];
        }
    
        return $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function itemBasicLocation($slug)
    {
        $response     = [];
        $cache_key    = "basic_location_$slug";
        if(Cache::get($cache_key)){
            $response = Cache::get($cache_key);
        } else {
            $endpoint = "/basic_location/{$slug}";
            $response = $this->apiGateway($endpoint);
            Cache::put($cache_key, $response);
        }
    
        return $response;
    }

    /**
     * Post basic location.
     *
     * @return \Illuminate\Http\Response
     */
    public function postBasicLocation(Request $request)
    {
        $response                   = [];
        $params                     = [];
        $input                      = $request->all();
        $params['name']             = $input['name'];
        $params['slug']             = Str::slug($input['name'] . '-' . Carbon::now()->timestamp);
        $params['description']      = $input['description'];
        $params['size']             = $input['size'];
        $params['basic_location']   = $input['basic_location'];
        $endpoint                   = "/basic_location";

        $response                   = $this->apiGateway($endpoint, 'POST', $params);
    
        return $response;
    }
    
    public function apiGateway($endpoint, $method='GET', $params=null)
    {
        $service = new ApiGatewayService();

        $response = $service->call_api($endpoint, $method, $params);

        return $response;
    }
}