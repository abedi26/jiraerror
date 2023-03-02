<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Requests\JiraRequest;
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
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JiraRequest $request)
    {
        $data = $request->validated();
        $headers = array(
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        );
        // syed.haider@voltro.com
        // ATATT3xFfGF0HMaJvaQoFnW68qn-pLRfSiwvGYc2nqhcdjmvjqA6bzyZdpEJYSiLFq6HPRw0-5__LxOSko3JsFQtrPlhj7eztyoWBYcBKo2TH1DnRT-nLG4UYD7DzvGdKeE_dhpWm60zEVEYAobJzbJQM7k7NiKWwqyvCCDI9m2Iz91tKGH2zQE=23F2926F
        // https://errorgene.atlassian.net/rest/api/2/issue/
         
        $postData = [
            'fields' => [
                'project' => [
                    'key' => $data['key'],
                ],
                'summary' => $data['summary'],
                'description' => $data['stacktrace'],
                'issuetype' => [
                    'id' => $data['issueType']
                ],
            ]
        ];

        $username = $data['username'];
        $userKey = $data['userKey'];
        $baseUrl = $data['baseUrl']; // errorgene.atlassian.net

        $response = Http::withBasicAuth($username, $userKey)->post(
            "https://$baseUrl/rest/api/2/issue/", $postData, $headers
        );
        return $response;
        dump($response->body());
        dd($response);
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