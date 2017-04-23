<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getCity(Request $request)
    {
        $client_city = new Client();
        $result = $client_city->request('GET', 'https://www.whizapi.com/api/v2/util/ui/in/indian-city-by-state', [
            'query' => [
                'project-app-key' => 't7zt2a1cjx6hrzsgeebil7ff',
                'stateid' =>  $request->stateID

            ]
        ]);
        $cities_json=$result->getBody();
        $cities=json_decode($cities_json, true);
        //return $cities;
        return view('ajaxresponse.getCity')->with('cities', $cities);
    }
}
