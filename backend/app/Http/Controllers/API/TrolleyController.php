<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Services\TrolleyService;

class TrolleyController extends BaseController
{
    protected $trolleyService;

    public function __construct()
    {
        $this->trolleyService = new TrolleyService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function itemList()
    {
        $current_items      = [];
        $response           = [];
        $basic_location     = $this->trolleyService->basicLocation();
        $current_location   = $this->trolleyService->currentLocation();

        array_walk($current_location, function($val, $key) use (&$current_items){
            $current_items[$val->slug] = $val->current_location;
        });
        
        array_walk($basic_location, function($val, $key) use(&$basic_location, $current_items){
            $basic_location[$key]->current_location = !empty($current_items[$val->slug]) ? $current_items[$val->slug] : '';
        });
        $response = $basic_location;

        return $this->sendResponse($response, 'Trolleys retrieved successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function currentLocation()
    {
        $response = $this->trolleyService->currentLocation();

        return $this->sendResponse($response, 'Trolleys retrieved successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function itemCurrentLocation($slug)
    {
        $response = $this->trolleyService->itemCurrentLocation($slug);
    
        return $this->sendResponse($response, 'Trolley retrieved successfully.');
    }

    /**
     * Post current location.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCurrentLocation(Request $request)
    {
        $input    = $request->all();
        $response = $this->trolleyService->postCurrentLocation($input);
    
        return $this->sendResponse($response);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function basicLocation()
    {
        $basic_location     = $this->trolleyService->basicLocation();
    
        return $this->sendResponse($response, 'Trolleys retrieved successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function itemBasicLocation($slug)
    {
        $response = $this->trolleyService->itemBasicLocation($slug);
    
        return $this->sendResponse($response, 'Trolley retrieved successfully.');
    }

    /**
     * Post basic location.
     *
     * @return \Illuminate\Http\Response
     */
    public function postBasicLocation(Request $request)
    {
        $params                     = [];
        $input                      = $request->all();
        $params['name']             = $input['name'];
        $params['slug']             = Str::slug($input['name'] . '-' . Carbon::now()->timestamp);
        $params['description']      = $input['description'];
        $params['size']             = $input['size'];
        $params['basic_location']   = $input['basic_location'];
        $response                   = $this->trolleyService->postCurrentLocation($params);
    
        return $this->sendResponse($response);
    }
}