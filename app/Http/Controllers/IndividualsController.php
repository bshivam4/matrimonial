<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Individual;

class IndividualsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $key=env('WHIZ_API_KEY');

        $res = $client->request('GET', 'https://www.whizapi.com/api/v2/util/ui/in/indian-states-list', [
            'form_params' => [
                'project-app-key' => $key,

            ]
        ]);
        $states_json=$res->getBody();
        $states=json_decode($states_json, true);
        return view('individuals.index')->with('states', $states)->with('message', 'initial');


    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|',
            'gender' => 'bail|required|in:Male,Female',
            'dob' => 'bail|required',
            'state' => 'bail|required',
            'city' => 'bail|required',
            'mobile' => 'bail|required|unique:individuals|digits:10',
            'religion' => 'bail|required',
            'marital_status' => 'bail|required',
            'mother_tongue' => 'bail|required',
            'image' => 'mimes:jpeg,bmp,png,jpg|max:5120'
        ]);

        $filename=asset('storage/').$request->mobile."_PP"->$request->image->getE;

        Individual::create([
            'name' => $request->name,
            'gender' =>  $request->gender,
            'dob' =>  $request->dob,
            'state' =>  $request->state,
            'city' =>  $request->city,
            'mobile' =>  $request->mobile,
            'religion' =>  $request->religion,
            'marital_status' =>  $request->marital_status,
            'mother_tongue' =>  $request->mother_tongue,
            'image' => $filename,

        ]);

        if($request->image != NULL){
            $request->image->move(public_path('profile_pictures'),$filename);
        }

        $client = new Client();
        $key=env('WHIZ_API_KEY');

        $res = $client->request('GET', 'https://www.whizapi.com/api/v2/util/ui/in/indian-states-list', [
            'form_params' => [
                'project-app-key' => $key,

            ]
        ]);
        $states_json=$res->getBody();
        $states=json_decode($states_json, true);
        return view('individuals.index')->with('states', $states)->with('message', 'success');

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
