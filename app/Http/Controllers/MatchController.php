<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use App\Individual;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $client = new Client();
        $key='t7zt2a1cjx6hrzsgeebil7ff';
        $res = $client->request('GET', 'https://www.whizapi.com/api/v2/util/ui/in/indian-states-list', [
            'form_params' => [
                'project-app-key' => $key,

            ]
        ]);
        $states_json=$res->getBody();
        $states=json_decode($states_json, true);
        return view('match.index')->with('data', 'initial')->with('states', $states);
    }

    public function search(Request $request)
    {
        $this->validate($request, [

            'gender' => 'bail|required|in:Male,Female',
            'state' => 'bail|required',
            'religion' => 'bail|required',

        ]);

        $client = new Client();
        $key='t7zt2a1cjx6hrzsgeebil7ff';
        $res = $client->request('GET', 'https://www.whizapi.com/api/v2/util/ui/in/indian-states-list', [
            'form_params' => [
                'project-app-key' => $key,

            ]
        ]);
        $states_json=$res->getBody();
        $states=json_decode($states_json, true);


        $query=Individual::where([
            ['gender' , '=' , $request->gender],
            ['state' , '=' , $request->state],
            ['religion' , '=' , $request->religion],
            ])->orderBy('dob', 'asc');

        $length=$query->count();
        $match=$query->get();




        return view('match.index')
            ->with('data', $request)
            ->with('states', $states)
            ->with('matches', $match)
            ->with('length', $length)
            ;
    }
}
