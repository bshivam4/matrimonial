<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getCity(Request $request)
    {
        $key=env('WHIZ_API_KEY');
        $state=$request->stateID;
        $stateID=explode('|', $request->stateID);
        $client_city = new Client();
        $result = $client_city->request('GET', 'https://www.whizapi.com/api/v2/util/ui/in/indian-city-by-state', [
            'query' => [
                'project-app-key' => $key,
                'stateid' =>  $stateID

            ]
        ]);
        $cities_json=$result->getBody();
        $cities=json_decode($cities_json, true);
        //return $cities;
        return view('ajaxresponse.getCity')->with('cities', $cities);
    }
}
