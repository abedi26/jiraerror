<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JiraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd("index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $headers = array(
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        );

        $response = Http::withBasicAuth('syed.haider@voltro.com', 'ATATT3xFfGF0gIe-C9aKxQYzJqIQZuf1E-VASS8TYuKZuXL_x4GG-qx08FAEN6ZNjOfo88FqbhSXCFpJPIpHAh83ZwwUBLJJPuWkfBexGTZtoqETAbIGjn4yShoY1MAJ7IXqvHkYTrSFNwrk1MgU0ACYLEUFQd00_7k8mvzLnhLpjPiGmC-YBFQ=5A2BB00C')->post('https://errorgene.atlassian.net/rest/api/2/issue/', $request);

        return $response;
        dump($response->body());
       
        // https://errorgene.atlassian.net/rest/api/2/issue/
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
